<?php

namespace estvoyage\data\tests\units\data\delimiter;

require __DIR__ . '/../../../runner.php';

use
	estvoyage\data\tests\units
;

class string extends units\test
{
	function testClass()
	{
		$this->testedClass
			->extends('estvoyage\value\string')
			->implements('estvoyage\data\data\delimiter')
			->isAbstract
		;
	}
}
