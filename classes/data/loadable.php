<?php

namespace estvoyage\data\data;

use
	estvoyage\data
;

interface loadable
{
	function dataLoaderIs(data\loader $dataLoader);
	function dataLoaderHasDataWithName(data\loader $dataLoader, data\data $data, data\name $dataName);
	function dataLoaderHasNoDataWithName(data\loader $dataLoader, data\name $dataName);
	function dataLoaderHasNoMoreData(data\loader $dataLoader);
}
