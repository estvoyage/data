<?php

namespace estvoyage\data\tests\units\data;

require __DIR__ . '/../../runner.php';

use
	estvoyage\data\tests\units,
	estvoyage\data,
	mock\estvoyage\data as mockOfData
;

class buffer extends units\test
{
	function testClass()
	{
		$this->testedClass
			->isFinal
			->implements('estvoyage\data\provider')
			->implements('estvoyage\data\consumer')
		;
	}

	function testNewData()
	{
		$this
			->given(
				$data = new data\data(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->newData($data))->isTestedInstance
		;
	}

	function testDataConsumerIs()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->dataConsumerIs($dataConsumer))->isTestedInstance
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data)
							->once

			->given(
				$data = new data\data(uniqid())
			)
			->if(
				$this->testedInstance->newData($data)->dataConsumerIs($dataConsumer)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments($data)
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
				$controller = new mockOfData\consumer\controller
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->newTestedInstance->dataConsumerControllerIs($controller))->isTestedInstance;
		;
	}
}
