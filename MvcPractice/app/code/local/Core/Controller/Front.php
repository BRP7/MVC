<?php
class Core_Controller_Front
{
    public function init()
    {
        $request = Mage::getModel('core/request');
        $actionName = $request->getActionName();
        if (strpos($actionName, '?')) {
            $actionName = stristr($actionName, '?', true);
        }
        $actionName = $actionName . 'Action';
        $className = $request->getFullControllerClass();
        $layout = new $className();
        $layout->$actionName();
    }
}
?>