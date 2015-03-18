<?php

namespace estvoyage\data\tests\units\consumer\mtu\exception;

require __DIR__ . '/../../../../runner.php';

use
	estvoyage\data\tests\units
;

class overflow extends units\test
{
	function testClass()
	{
		$this->testedClass
			->extends('overflowException')
			->implements('estvoyage\data\consumer\mtu\exception')
		;
	}
}
