<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $this->includeCss('form.css');
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $categoryForm = $layout->createBlock('catalog/admin_category_form');
        $child->addChild('form', $categoryForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        echo "<pre>";

        $id = $this->getRequest()->getParams('id');
        $data = $this->getRequest()->getParams('catalog_category');
        if ($id) {
            $data = ['category_name' => 'braclate'];
            $category = Mage::getModel('catalog/category')
                ->setData($data)->setId($id);
        } else {
            $category = Mage::getModel('catalog/category')
                ->setData($data);
        }
        $category->save();
    }
    public function deleteAction()
    {
        Mage::getModel('catalog/category')
            ->setId($this->getRequest()->getParams('id'))
            ->delete();

    }
}

?>