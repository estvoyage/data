<?php

namespace estvoyage\data;

interface splitter extends consumer
{
	function dataUseDataDelimiter(data $data, data\delimiter $dataDelimiter);
}
