<?php

namespace estvoyage\data\tests\units\splitter;

require __DIR__ . '/../../runner.php';

use
	estvoyage\data\tests\units,
	estvoyage\data,
	mock\estvoyage\data as mockOfData
;

class transparent extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\data\splitter')
		;
	}

	function testNewData()
	{
		$this
			->given(
				$data = new data\data(uniqid()),
				$dataConsumer = new mockOfData\consumer
			)
			->if(
				$this->newTestedInstance($dataConsumer)
			)
			->then
				->object($this->testedInstance->newData($data))->isTestedInstance
				->mock($dataConsumer)->receive('newData')->withArguments($data)->once
		;
	}

	function testDataUseDataDelimiter()
	{
		$this
			->given(
				$data = new data\data(uniqid()),
				$dataConsumer = new mockOfData\consumer,
				$dataDelimiter = new mockOfData\data\delimiter
			)
			->if(
				$this->newTestedInstance($dataConsumer)
			)
			->then
				->object($this->testedInstance->dataUseDataDelimiter($data, $dataDelimiter))->isTestedInstance
				->mock($dataConsumer)->receive('newData')->withArguments($data)->once
		;
	}

	function testDataProviderIs()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer,
				$dataProvider = new mockOfData\provider
			)
			->if(
				$this->newTestedInstance($dataConsumer)
			)
			->then
				->object($this->testedInstance->dataProviderIs($dataProvider))->isTestedInstance
				->mock($dataProvider)->receive('dataConsumerIs')->withArguments($this->testedInstance)->once
		;
	}
}
