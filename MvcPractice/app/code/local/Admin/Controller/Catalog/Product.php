<?php
class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $this->includeCss('product.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $productForm = $layout->createBlock('catalog/admin_product_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        echo "<pre>";
        $obj = Mage::getModel('core/request');
        $id = $obj->getQueryData('id');
        if ($id) {
            $data = ['name' => 'bhumi'];
        } else {
            $data = $this->getRequest()->getParams('catalog_product');
        }
        $product = Mage::getModel('catalog/product')
            ->setData($data);
        $product->save();
    }
    public function deleteAction()
    {
        $id = $this->getRequest()->getQueryData('id');
        $product = Mage::getModel('catalog/product')
            ->setData(['product_id' => $id]);
        $product->delete();
    }

}
?>