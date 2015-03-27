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

	function __construct(data\data $data)
	{
		$this->data = $data;
	}

	function numberOfBytesConsumedByDataConsumerIs(data\consumer $dataConsumer, data\data\numberOfBytes $bytes)
	{
		if ($bytes->asInteger > 0)
		{
			$this->data = new data\data(substr($this->data, $bytes->asInteger) ?: '');
		}

		$dataConsumer->newData($this->data);

		return $this;
	}
}
