<?php
namespace Ims\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Ims\Model\TestEntity;
use Ims\Form\TestForm;
use Zend\View\Model\JsonModel;

class TestController extends \Zend\Mvc\Controller\AbstractActionController{
    public function indexAction(){
        $this->_getHelper('HeadScript', $this->getServiceLocator())
        ->appendFile('js/modules/javascript/ajax.js');
    }
    /* For handling javascript/css files dynamically */
    protected function _getHelper($helper, $serviceLocator)
    {
        return $this->getServiceLocator()
        ->get('viewhelpermanager')
        ->get($helper);
    }
    public function processAjaxRequestAction(){
        
        $result = array('status' => 'error', 'message' => 'There was some error. Try again.');
        
        $request = $this->getRequest();
        
        if($request->isXmlHttpRequest()){
            
            $data = $request->getPost();
            
            if(isset($data['tempData']) && !empty($data['tempData'])){
                $result['status'] = 'success';
                $result['message'] = 'We got the posted data successfully.';
            }
        }
        
        return new JsonModel($result);
    }
    
    public function getHtmlResponseAction(){
//        $this->layout('layout/no_navigation');  
        $request = $this->getRequest();
        $view = new ViewModel();
        if($request->isXmlHttpRequest()){
        
            $data = $request->getPost();
            
            if(isset($data['tempData']) && !empty($data['tempData'])){
                $view->setVariable('tempData', $data['tempData']);
            }
        }        
        
//        $view->setTerminal(true);
        return $view;
    }
}
