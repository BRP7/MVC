<?php
class Core_Controller_Front
{
    public function init()
    {
        $request = Mage::getModel('core/request');
        $actionName = $request->getActionName();
        $actionName = $actionName . 'Action';
        $className = $request->getFullControllerClass();
        $layout = new $className();
        $layout->$actionName();//for any Url this part is common from here based on urlActoin Further routing is done
    }
}
?>