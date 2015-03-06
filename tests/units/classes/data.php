<?php

namespace estvoyage\data\tests\units;

require __DIR__ . '/../runner.php';

use
	estvoyage\data\tests\units,
	mock\estvoyage\data as mockOfData
;

class data extends units\test
{
	function testClass()
	{
		$this->testedClass
			->isFinal
			->extends('estvoyage\value\string')
			->implements('estvoyage\data\consumer')
		;
	}

	function testNewData()
	{
		$this
			->given(
				$emptyData = $this->newTestedInstance(''),
				$data = $this->newTestedInstance(uniqid())
			)

			->if(
				$this->newTestedInstance('')
			)
			->then
				->object($this->testedInstance->newData($data))
					->isIdenticalTo($data)

			->if(
				$this->newTestedInstance(uniqid())
			)
			->then
				->object($this->testedInstance->newData($emptyData))
					->isTestedInstance

			->if(
				$this->newTestedInstance(uniqid())
			)
			->then
				->object($this->testedInstance->newData($data))
					->isEqualTo($this->newTestedInstance($this->testedInstance . $data))
		;
	}

	function testDataProviderIs()
	{
		$this
			->given(
				$dataProvider = new mockOfData\provider
			)
			->if(
				$this->newTestedInstance('')
			)
			->then
				->object($this->testedInstance->dataProviderIs($dataProvider))->isTestedInstance
				->mock($dataProvider)
					->receive('dataConsumerIs')
						->withArguments($this->testedInstance)->once
		;
	}

	function testConstructorWithoutAnyArgument()
	{
		$this->castToString($this->newTestedInstance)->isEmpty;
	}

	/**
	 * @dataProvider invalidValueProvider
	 */
	function testConstructorWithInvalidValue($invalidValue)
	{
		$this->exception(function() use ($invalidValue) { $this->newTestedInstance($invalidValue); })
			->isInstanceOf('estvoyage\data\exception\domain')
			->hasMessage('Data should be a string')
		;
	}

	protected function invalidValueProvider()
	{
		return [
			rand(- PHP_INT_MAX, PHP_INT_MAX)
		];
	}
}
