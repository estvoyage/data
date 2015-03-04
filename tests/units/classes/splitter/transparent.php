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
				$this->newTestedInstance(new mockOfData\consumer)
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
				$this->newTestedInstance(new mockOfData\consumer)
			)
			->then
				->object($this->testedInstance->delimitedDataIs($data))->isTestedInstance
		;
	}

	function testDataUseDelimiter()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer,
				$data = new data\data(uniqid()),
				$dataDelimiter = new mockOfData\data\delimiter
			)
			->if(
				$this->newTestedInstance($dataConsumer)
			)
			->then
				->object($this->testedInstance->dataUseDelimiter($data, $dataDelimiter))->isTestedInstance
				->mock($dataConsumer)->receive('newData')->withArguments($data)->once
		;
	}
}
