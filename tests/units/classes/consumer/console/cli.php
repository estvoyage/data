<?php

namespace estvoyage\data\tests\units\consumer\console;

require __DIR__ . '/../../../runner.php';

use
	estvoyage\data\tests\units,
	estvoyage\data,
	estvoyage\data\consumer\console,
	mock\estvoyage\data as mockOfData
;

class cli extends units\test
{
	function testClass()
	{
		$this->testedClass
			->isFinal
			->implements('estvoyage\data\consumer')
		;
	}

	function testConstructor()
	{
		$this
			->given(
				$prompt = new console\cli\prompt('# '),
				$controller = new data\consumer\controller\buffer
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance)->isEqualTo($this->newTestedInstance($prompt, $controller))
		;
	}

	function testNewData()
	{
		$this
			->given(
				$prompt = new console\cli\prompt(uniqid()),
				$controller = new mockOfData\consumer\controller,
				$data = new data\data
			)
			->if(
				$this->newTestedInstance($prompt, $controller)
			)
			->then
				->output(function() use ($data) { $this->object($this->testedInstance->newData($data))->isTestedInstance; })
					->isEqualTo($prompt . $data . PHP_EOL)
				->mock($controller)
					->receive('numberOfBytesConsumedByDataConsumerIs')
						->withArguments($this->testedInstance, new data\data\numberOfBytes)
							->once

			->given(
				$data = new data\data(uniqid())
			)
			->if(
				$this->newTestedInstance($prompt, $controller)
			)
			->then
				->output(function() use ($data) { $this->testedInstance->newData($data); })
					->isEqualTo($prompt . $data . PHP_EOL)
				->mock($controller)
					->receive('numberOfBytesConsumedByDataConsumerIs')
						->withArguments($this->testedInstance, new data\data\numberOfBytes(strlen($data)))
							->once
		;
	}

	function testNoMoreData()
	{
		$this->object($this->newTestedInstance->noMoreData())->isTestedInstance;
	}

	function testDataProviderIs()
	{
		$this
			->given(
				$dataProvider = new mockOfData\provider
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->dataProviderIs($dataProvider))->isTestedInstance
				->mock($dataProvider)
					->receive('dataConsumerIs')
						->withArguments($this->testedInstance)
							->once
		;
	}

	function testDataConsumerControllerIs()
	{
		$this
			->given(
				$dataConsumerController = new mockOfData\consumer\controller,
				$data = new data\data(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->newTestedInstance->dataConsumerControllerIs($dataConsumerController))
					->isEqualTo($this->newTestedInstance(null, $dataConsumerController))
		;
	}
}
