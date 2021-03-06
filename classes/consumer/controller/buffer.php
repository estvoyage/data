<?php

namespace estvoyage\data\consumer\controller;

use
	estvoyage\data
;

final class buffer implements data\consumer\controller
{
	private
		$data
	;

	function __construct(data\data $data = null)
	{
		$this->data = $data ?: new data\data;
	}

	function newData(data\data $data)
	{
		return new self($data);
	}

	function numberOfBytesConsumedByDataConsumerIs(data\consumer $dataConsumer, data\data\numberOfBytes $bytes)
	{
		$data = substr($this->data, $bytes->asInteger);

		if ($data)
		{
			$dataConsumer->newData(new data\data($data));
		}

		return $this;
	}
}
