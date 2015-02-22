<?php

namespace estvoyage\data\tests\units\exception;

require __DIR__ . '/../../runner.php';

use
	estvoyage\data\tests\units
;

class domain extends units\test
{
	function testClass()
	{
		$this->testedClass
			->extends('domainException')
			->implements('estvoyage\data\exception')
		;
	}
}
