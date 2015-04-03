<?php

namespace estvoyage\data;

interface loader
{
	function newLoadableData(data\loadable $loadableData);
	function loadableDataNeedDataNamed(data\name $dataName);
}
