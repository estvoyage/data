<?php

namespace estvoyage\data\splitter;

use
	estvoyage\data
;

class transparent implements data\splitter
{
	private
		$dataConsumer
	;

	function __construct(data\consumer $dataConsumer)
	{
		$this->dataConsumer = $dataConsumer;
	}

	function dataConsumerIs(data\consumer $dataConsumer)
	{
		$splitter = clone $this;
		$splitter->dataConsumer = $dataConsumer;

		return $splitter;
	}

	function dataUseDelimiter(data\data $data, data\data\delimiter $dataDelimiter)
	{
		$this->dataConsumer->newData($data);

		return $this;
	}

	function noDelimiterInData(data\data $data)
	{
		return $this;
	}

	function delimitedDataIs(data\data $data)
	{
		return $this;
	}
}
