<?php
class Admin_Controller_Catalog_List extends Core_Controller_Front_Action
{
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $list = $layout->createBlock('catalog/admin_list');
        $child->addChild('list', $list);
        $layout->toHtml();
    }
}
?>