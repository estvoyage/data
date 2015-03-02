<?php

namespace estvoyage\data\data;

use
	estvoyage\data,
	estvoyage\data\consumer
;

interface delimiter
{
	function dataSplitterNeedDelimitedDataFromData(consumer\splitter $splitter, data\data $data);
}
