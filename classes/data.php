<?php

namespace estvoyage\data;

final class data extends \estvoyage\value\string implements consumer, provider
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

	function dataConsumerIs(consumer $consumer)
	{
		$consumer->newData($this);

		return $this;
	}

	function dataProviderIs(provider $provider)
	{
		$provider->dataConsumerIs($this);

		return $this;
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

	function noMoreData()
	{
		return $this;
	}
}
