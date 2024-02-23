<?php
class Page_Block_Head extends Core_Block_Template
{
    protected $_css = [];
    protected $_js = [];
    public function __construct()
    {
        $this->setTemplate('page/head.phtml');
    }
    public function addJs($file)
    {
        $this->_js[] = $this->getJsUrl($file);
    }
    public function addCss($file)
    {
        $this->_css[] = $this->getCssUrl($file);
        return $this;
    }
    public function getJs()
    {
        return $this->_js;
    }
    public function getCss()
    {
        return $this->_css;
    }
    public function getCssUrl($file)
    {
        return Mage::getBaseUrl('css/') . $file;
    }
    public function getJsUrl($file)
    {
        return Mage::getBaseUrl('js/') . $file;
    }
}

?>