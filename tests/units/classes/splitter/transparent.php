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

	function testNoDelimiterInData()
	{
		$this
			->given(
				$data = new data\data(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->noDelimiterInData($data))->isTestedInstance
		;
	}

	function testDelimitedDataIs()
	{
		$this
			->given(
				$data = new data\data(uniqid())
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->delimitedDataIs($data))->isTestedInstance
		;
	}

	function testDataForDataConsumerUseDataDelimiter()
	{
		$this
			->given(
				$data = new data\data(uniqid()),
				$dataConsumer = new mockOfData\consumer,
				$dataDelimiter = new mockOfData\data\delimiter
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->dataForDataConsumerUseDataDelimiter($data, $dataConsumer, $dataDelimiter))->isTestedInstance
				->mock($dataConsumer)->receive('newData')->withArguments($data)->once
		;
	}
}
