<?php
class Core_Block_Abstract
{
    public $template;
    public function setTemplate($template)
    {
        // echo "yyyy".$template;
        // echo "<br>";
        $this->template = $template;
        return $this;
    }
    public function getTemplate()
    {
        return $this->template;
    }
    public function __get($key)
    {

    }
    public function __unset($key)
    {

    }
    public function __set($key, $value)
    {

    }
    public function addData($key, $value)
    {

    }
    public function getData($key = null)
    {

    }
    public function setData($data)
    {

    }
    //public function getUrl($action = null, $controller = null, $params = [], $resetParams = false)
    public function getUrl($path)
    {
        return "http://localhost/practice/MvcPractice/" . $path;
    }
    public function getRequest()
    {

    }
    public function render()
    {
        // echo "hhh".$this->getTemplate();
        // echo "<br>";
        include Mage::getBaseDir('app') . '/design/frontend/template/' . $this->getTemplate();
    }
    public function getImageUrl($file)
    {
        return Mage::getBaseUrl('images/') . $file;
    }
}
?>