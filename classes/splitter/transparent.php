<?php

namespace estvoyage\data\splitter;

use
	estvoyage\data
;

class transparent implements data\splitter
{
	function noDelimiterInData(data\data $data)
	{
		return $this;
	}

	function delimitedDataIs(data\data $data)
	{
		return $this;
	}

	function dataForDataConsumerUseDataDelimiter(data\data $data, data\consumer $dataConsumer, data\data\delimiter $dataDelimiter)
	{
		$dataConsumer->newData($data);

		return $this;
	}
}
