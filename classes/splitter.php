<?php

namespace estvoyage\data;

interface splitter extends data\consumer
{
	function dataUseDelimiter(data $data, data\delimiter $dataDelimiter);
}
