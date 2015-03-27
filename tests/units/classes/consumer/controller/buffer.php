<?php

namespace estvoyage\data\tests\units\consumer\controller;

require __DIR__ . '/../../../runner.php';

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
			->implements('estvoyage\data\consumer\controller')
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
				->object($this->testedInstance->newData($data))
					->isNotTestedInstance
					->isEqualTo($this->newTestedInstance($data))
		;
	}

	function testNumberOfBytesConsumedByDataConsumerIs()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer,
				$numberOfBytes = new data\data\numberOfBytes
			)
			->if(
				$this->newTestedInstance
			)
			->then
				->object($this->testedInstance->numberOfBytesConsumedByDataConsumerIs($dataConsumer, $numberOfBytes))->isTestedInstance
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data)
							->once

			->given(
				$data = new data\data('hello world!')
			)
			->if(
				$this->newTestedInstance($data)->numberOfBytesConsumedByDataConsumerIs($dataConsumer, $numberOfBytes)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments($data)
							->once

			->given(
				$numberOfBytes = new data\data\numberOfBytes(5)
			)
			->if(
				$this->testedInstance->numberOfBytesConsumedByDataConsumerIs($dataConsumer, $numberOfBytes)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data(' world!'))
							->once
		;
	}
}
