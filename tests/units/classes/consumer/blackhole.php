<?php

namespace estvoyage\data\tests\units\consumer;

require __DIR__ . '/../../runner.php';

use
	estvoyage\data\tests\units,
	estvoyage\data,
	mock\estvoyage\data as mockOfData
;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\data\consumer')
			->isFinal
		;
	}

	function testNewData()
	{
		$this
			->given(
				$data = new data\data
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->newData($data))->isTestedInstance
		;
	}

	function testNoMoreData()
	{
		$this->object($this->testedInstance->noMoreData($data))->isTestedInstance;
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
					->didNotReceiveAnyMessage
		;
	}
}
