<?php

namespace estvoyage\data\tests\units;

require __DIR__ . '/../runner.php';

use
	estvoyage\data\tests\units
;

class data extends units\test
{
	function testClass()
	{
		$this->testedClass
			->isFinal
			->extends('estvoyage\value\string')
		;
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
