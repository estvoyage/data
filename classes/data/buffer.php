<?php

namespace estvoyage\data\data;

use
	estvoyage\data
;

final class buffer implements data\provider, data\consumer
{
	private
		$data
	;

	function __construct()
	{
		$this->data = new data\data;
	}

	function dataConsumerIs(data\consumer $consumer)
	{
		$consumer->newData($this->data);

		return $this;
	}

	function newData(data\data $data)
	{
		$this->data = $this->data->newData($data);

		return $this;
	}

	function noMoreData()
	{
		return $this;
	}

	function dataProviderIs(data\provider $provider)
	{
		$provider->dataConsumerIs($this);

		return $this;
	}

	function dataConsumerControllerIs(data\consumer\controller $controller)
	{
		return $this;
	}
}
