<?php

namespace estvoyage\data\consumer\console;

use
	estvoyage\data
;

final class cli implements data\consumer
{
	private
		$prompt,
		$controller
	;

	function __construct(cli\prompt $prompt = null, data\consumer\controller $controller = null)
	{
		$this->prompt = $prompt ?: new cli\prompt('# ');
		$this->controller = $controller ?: new data\consumer\controller\buffer;
	}

	function newData(data\data $data)
	{
		echo $this->prompt . $data . PHP_EOL;

		$this->controller
			->numberOfBytesConsumedByDataConsumerIs(
				$this,
				new data\data\numberOfBytes(strlen($data))
			)
		;

		return $this;
	}

	function noMoreData()
	{
		return $this;
	}

	function dataProviderIs(data\provider $provider)
	{
		$provider->dataConsumerIs($this);

		return $this;
	}

	function dataConsumerControllerIs(data\consumer\controller $controller)
	{
		return new self($this->prompt, $controller);
	}
}
