<?php

namespace estvoyage\data\consumer;

use
	estvoyage\data
;

interface controller
{
	function newData(data\data $data);
	function numberOfBytesConsumedByDataConsumerIs(data\consumer $dataConsumer, data\data\numberOfBytes $numberOfBytes);
}
