<?php

namespace estvoyage\data\consumer;

use
	estvoyage\data
;

interface splitter extends data\consumer
{
	function noDelimiterInData(data\data $data);
	function delimitedDataIs(data\data $data);
}
