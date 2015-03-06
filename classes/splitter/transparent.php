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

	function newData(data\data $data)
	{
		$this->dataConsumer->newData($data);

		return $this;
	}

	function dataUseDataDelimiter(data\data $data, data\data\delimiter $dataDelimiter)
	{
		return $this->newData($data);
	}

	function dataProviderIs(data\provider $dataProvider)
	{
		$dataProvider->dataConsumerIs($this);

		return $this;
	}
}
