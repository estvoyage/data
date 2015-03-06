<?php

namespace estvoyage\data\data;

use
	estvoyage\data
;

interface delimiter
{
	function newDataFromDataSplitter(data\data $data, data\splitter $splitter);
}
