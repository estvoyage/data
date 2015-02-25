<?php

namespace estvoyage\data\tests\units\data;

require __DIR__ . '/../../runner.php';

use
	estvoyage\data\tests\units
;

class length extends units\test
{
	function testClass()
	{
		$this->testedClass
			->isFinal
			->extends('estvoyage\value\integer\unsigned')
		;
	}
}
