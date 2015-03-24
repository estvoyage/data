<?php

namespace estvoyage\data\consumer;

use
	estvoyage\data
;

interface controller
{
	function numberOfBytesConsumedByDataConsumerIs(data\consumer $dataConsumer, data\data\numberOfBytes $numberOfBytes);
}
