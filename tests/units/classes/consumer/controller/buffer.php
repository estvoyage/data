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

	function testNumberOfBytesConsumedByDataConsumerIs()
	{
		$this
			->given(
				$dataConsumer = new mockOfData\consumer,
				$numberOfBytes = new data\data\numberOfBytes,
				$data = new data\data
			)
			->if(
				$this->newTestedInstance($data)
			)
			->then
				->object($this->testedInstance->numberOfBytesConsumedByDataConsumerIs($dataConsumer, $numberOfBytes))->isTestedInstance
				->mock($dataConsumer)
					->receive('newData')
						->withArguments($data)
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
				$numberOfBytes = new data\data\numberOfBytes(1)
			)
			->if(
				$this->testedInstance->numberOfBytesConsumedByDataConsumerIs($dataConsumer, $numberOfBytes)
			)
			->then
				->mock($dataConsumer)
					->receive('newData')
						->withArguments(new data\data('ello world!'))
							->once
			->given(
				$numberOfBytes = new data\data\numberOfBytes(4)
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
