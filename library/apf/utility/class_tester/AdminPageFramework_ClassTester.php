<?php 
/**
	Admin Page Framework v3.8.8 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/admin-page-framework>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class AdminPageFramework_ClassTester {
    static public function getInstance($sClassName, array $aParameters = array()) {
        $_oReflection = new ReflectionClass($sClassName);
        return $_oReflection->newInstanceArgs($aParameters);
    }
    static public function call($oClass, $sMethodName, $aParameters) {
        if (version_compare(phpversion(), '<', '5.3.0')) {
            trigger_error('Program Name' . ': ' . sprintf('The method cannot run with your PHP version: %1$s', phpversion()), E_USER_WARNING);
            return;
        }
        $_sClassName = get_class($oClass);
        $_oMethod = self::_getMethod($_sClassName, $sMethodName);
        return $_oMethod->invokeArgs($oClass, $aParameters);
    }
    static private function _getMethod($sClassName, $sMethodName) {
        $_oClass = new ReflectionClass($sClassName);
        $_oMethod = $_oClass->getMethod($sMethodName);
        $_oMethod->setAccessible(true);
        return $_oMethod;
    }
}
