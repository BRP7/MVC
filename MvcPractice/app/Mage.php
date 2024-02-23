<?php
class Mage
{
    private static $baseDir = 'C:/xampp/htdocs/practice/MvcPractice';
    private static $baseUrl = 'http://localhost/practice/MvcPractice';

    public static function init()
    {
        $frontModel = new Core_Controller_Front();
        $frontModel->init();
    }
    public static function getSingleton($className)
    {
    }
    public static function getModel($className)
    {
        $className = str_replace('/', '_Model_', $className);
        $className = ucwords($className, "_");
        return new $className();
    }
    public static function getBlock($className)
    {
        $className = str_replace('/', '_Block_', $className);
        $className = ucwords($className, "_");
        return new $className();
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . '/' . $subDir;
        }
        return self::$baseDir;
    }
    public static function getBaseUrl($subUrl = null)
    {
        if ($subUrl) {
            return self::$baseUrl . '/skin/' . $subUrl;
            
        }
        return self::$baseUrl;
    }
}
?>