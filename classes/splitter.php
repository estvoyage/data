<?php

namespace estvoyage\data;

interface splitter
{
	function noDelimiterInData(data $data);
	function delimitedDataIs(data $data);
	function dataForDataConsumerUseDataDelimiter(data $data, consumer $dataConsumer, data\delimiter $dataDelimiter);
}
