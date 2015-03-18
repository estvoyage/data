<?php

namespace estvoyage\data\tests\units\consumer;

require __DIR__ . '/../../runner.php';

use
	estvoyage\data\tests\units
;

class mtu extends units\test
{
	function testClass()
	{
		$this->testedClass
			->extends('estvoyage\value\integer\unsigned')
			->isFinal
		;
	}

	function testConstructorWithInvalidValue()
	{
		$this->exception(function() { $this->newTestedInstance(rand(- PHP_INT_MAX, 67)); })
			->isInstanceOf('estvoyage\data\consumer\mtu\exception\domain')
			->hasMessage('Data MTU should be an integer greater than or equal to 68')
		;
	}
}
