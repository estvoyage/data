<?php

namespace estvoyage\data;

interface provider
{
	function dataConsumerIs(consumer $consumer);
	function mtuOfDataConsumerIs(consumer $consumer, consumer\mtu $mtu);
}
