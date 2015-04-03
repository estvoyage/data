<?php

namespace estvoyage\data\tests\units\consumer\console\cli;

require __DIR__ . '/../../../../runner.php';

use
	estvoyage\data\tests\units
;

class prompt extends units\test
{
	function testClass()
	{
		$this->testedClass
			->isFinal
			->extends('estvoyage\value\string')
		;
	}
}
