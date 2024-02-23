<?php
class Core_Controller_Front_Action
{
    protected $_layout = null;
    public function __construct()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('content.css')
            ->addCss('footer.css');

    }
    public function includeCss($file = null)
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addCss($file);
    }
    public function getLayout()
    {
        if (is_null($this->_layout)) {
            $this->_layout = Mage::getBlock('core/layout');
        }
        return $this->_layout;
    }

    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
}

?>