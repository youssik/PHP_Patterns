<?php

Interface NamingStrategy
{
	public function createName($fileName);
}

class ZipFileNamingStrategy implements NamingStrategy
{
	public function createName($fileName)
	{
		return "http://downloads.foo.bar/{$fileName}.zip";
	}
}

class TarGzFileNamingStrategy implements NamingStrategy
{
	public function createName($fileName)
	{
		return "http:///downloads.foo.bar/{$fileName}.tar.gz";
	}
}

class Context
{
	private $namingStrategy;

	public function __construct(NamingStrategy $strategy)
	{
		$this->namingStrategy = $strategy;
	}

	function execute()
	{
		$url[] = $this->namingStrategy->createName('calc101');
		$url[] = $this->namingStrategy->createName('stat2000');

		return $url;
	}
}


if(strstr($_SERVER["HTTP_USER_AGENT"], 'Win'))
	$context = new Context(new ZipFileNamingStrategy());
else 
	$context = new Context(new TarGzFileNamingStrategy());

$url = $context->execute();

echo "<pre>";
print_r($url);
echo "</pre>";