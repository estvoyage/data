<?php

namespace estvoyage\data\tests\units\consumer\mtu\exception;

require __DIR__ . '/../../../../runner.php';

use
	estvoyage\data\tests\units
;

class domain extends units\test
{
	function testClass()
	{
		$this->testedClass
			->extends('domainException')
			->implements('estvoyage\data\consumer\mtu\exception')
		;
	}
}
