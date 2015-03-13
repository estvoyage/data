<?php

namespace estvoyage\data\consumer;

use
	estvoyage\data
;

final class blackhole implements data\consumer
{
	function newData(data\data $data)
	{
		return $this;
	}

	function noMoreData()
	{
		return $this;
	}

	function dataProviderIs(data\provider $provider)
	{
		return $this;
	}
}
