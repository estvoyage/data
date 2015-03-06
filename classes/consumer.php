<?php

namespace estvoyage\data;

interface consumer
{
	function dataProviderIs(provider $provider);
	function newData(data $data);
}
