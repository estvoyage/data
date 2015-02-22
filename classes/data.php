<?php

namespace estvoyage\data;

final class data extends \estvoyage\value\string
{
	function __construct($value)
	{
		$domainException = null;

		try
		{
			parent::__construct($value);
		}
		catch (\domainException $domainException)
		{
			throw new exception\domain('Data should be a string');
		}
	}
}
