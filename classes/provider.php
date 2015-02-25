<?php

namespace estvoyage\data;

interface provider
{
	function lengthOfDataWrittenIs(data\length $lenth);
	function useDataConsumer(consumer $consumer);
}
