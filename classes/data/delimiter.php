<?php

namespace estvoyage\data\data;

use
	estvoyage\data
;

interface delimiter
{
	function dataSplitterNeedDelimitedDataFromData(data\splitter $splitter, data\data $data);
}
