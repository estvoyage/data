<?php

namespace estvoyage\data;

final class data extends \estvoyage\value\string implements consumer
{
	function __construct($value = '')
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

	function newData(data $data)
	{
		switch (true)
		{
			case ! $this->asString:
				return $data;

			case $this->asString && $data->asString:
				return new self($this . $data);

			default:
				return $this;
		}
	}

	function dataProviderIs(provider $provider)
	{
		$provider->dataConsumerIs($this);

		return $this;
	}
}
