<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();//As soon As getLayout Called Constructor Of Core_Block_Layout is executed and setTemplate method is run & then prepareChildren inside this function createBlock & addChild will be called in which we are setting Associative array for keys->head,header,footer,content
        $layout->getChild('head')->addJs('js/navigation.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/navigation.css');
        $layout->getChild('head')->addCss('css/page.css');

        $banner = $layout->createBlock('core/template')
            ->setTemplate('banner/banner.phtml');


        $layout->getChild('content')
            ->addChild('banner', $banner)
            ->addChild('banner1', $banner);
        // $layout->getChild('header');
        // $layout->getChild('content');
        // $layout->getChild('footer');
        $layout->toHtml();

    }
    public function newAction()
    {
        echo dirname(__FILE__);

    }
    public function listAction()
    {
        echo dirname(__FILE__);

    }
    public function saveAction()
    {
        echo dirname(__FILE__);

    }
    public function deleteAction()
    {
        echo dirname(__FILE__);

    }
}
?>