<?php

namespace estvoyage\data\consumer;

use
	estvoyage\data
;

interface controller
{
	function dataNotWriteByDataConsumerIs(data\consumer $dataConsumer, data\data $data);
}
