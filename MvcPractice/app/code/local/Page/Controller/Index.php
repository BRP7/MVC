<?php
class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
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