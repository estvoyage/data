<?php

namespace estvoyage\data;

interface consumer
{
	function dataProviderIs(provider $provider);
	function dataConsumerControllerIs(consumer\controller $controller);
	function newData(data $data);
	function noMoreData();
}
