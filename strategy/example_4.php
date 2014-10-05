<?php

Interface AppNamingStrategy {
	public function make();
}

class OldIe implements AppNamingStrategy 
{
	public function make()
	{
		echo "Setting for Ie";
	}
}

class Android implements AppNamingStrategy
{
	public function make()
	{
		//подключение других стилей
		echo "Setting for Android";
	}
}

class AppStrategy
{
	private $_systemType;

	public function __construct(AppNamingStrategy $systemType)
	{
		$this->_systemType = $systemType;
	}
	
	private function connectGeneralCss()
	{

	}

	private function connectGeneralJavaScript()
	{

	}

	public function executeGeneralSetting()
	{
		$this->connectGeneralCss();
		$this->connectGeneralJavaScript();
	}

	public function setSystem(AppNamingStrategy $systemType)
	{
		$this->_systemType = $systemType;
	}

	public function makeSettingBySystemType()
	{
		$this->_systemType->make();
	}
}


$app = new AppStrategy(new Android());
$app->makeSettingBySystemType();
$app->setSystem(new OldIe());
$app->makeSettingBySystemType();