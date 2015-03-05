<?php

namespace estvoyage\data;

interface splitter
{
	function dataConsumerIs(consumer $consumer);
	function dataUseDelimiter(data $data, data\delimiter $dataDelimiter);
	function noDelimiterInData(data $data);
	function delimitedDataIs(data $data);
}
