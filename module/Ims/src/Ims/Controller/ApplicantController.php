<?php
namespace Ims\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Ims\Form\ApplicantForm;
use Ims\Model\ApplicantEntity;

class ApplicantController extends AbstractActionController{

    public function indexAction(){
        
        $form = new ApplicantForm();
        $entity = new ApplicantEntity();
        $form->bind($entity);
        $authService = $this->getServiceLocator()->get('zfcuser_auth_service');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
//            echo "<pre>";
//            print_r($request);
//            echo "</pre>";
            $form->setData($request->getPost());
            if ($form->isValid()) { 
                $this->getApplicantMapper()->saveDetails($entity);

                // Redirect to homepage
//                return $this->redirect()->toRoute('data');
            }
        }
        return array('form' => $form, 'authService' => $authService);
     }
     
     public function photoAction(){
        /*To load a different layout with no navigation*/
        $this->layout('layout/no_navigation');
        
//         echo $this->getViewHelper('HeadScript')->prependFile($this->basePath() . '/js/somejs.js');
//         $upload = new ApplicantMapper();
         
//         $imagine = $this->getServiceLocator()->get('my_image_service');
        
        $authService = $this->getServiceLocator()->get('zfcuser_auth_service');
        $mapper = $this->getApplicantMapper();
        return array('mapper' => $mapper,'authService' => $authService);

//        return new ViewModel();
        ////To set this page as terminal and not rendering the layout
//        $viewModel = new ViewModel(array(
//            'upload' => $upload,
//        ));
//        $viewModel->setTerminal(true);
//        return $viewModel;
        
        ////To load the map.phtml without default layout, its functioning but css and js not working
//        $viewModel = new ViewModel(array('mapper' => $mapper,'authService' => $authService));
//        $viewModel->setTerminal(true);
//        return $viewModel;
     }
     
     public function mapAction(){
        $this->layout('layout/no_navigation');
//        $viewModel = new ViewModel();
//        $viewModel->setTerminal(true);
//        return $viewModel;
     }
     public function testAction(){
         echo "test entered";
         $form = new ApplicantForm();
         $data = new ApplicantEntity();
        $form->bind($data);

        $request = $this->getRequest();
        echo "<br/>test request";
        if ($request->isPost()) {
//            var_dump($request);
            echo "<br/>test if 1";
            $form->setData($request->getPost());
//            var_dump($data);
            echo "<br/>set data";
            if ($form->isValid()) {
                echo "<br/>test if 2";
                $this->getApplicantMapper()->saveTest($data);

                // Redirect to list of tasks
                return $this->redirect()->toRoute('data');
            }
        }
        echo "<br/>test end";
         return array('form' => $form);
     }
     
     public function getApplicantMapper(){
          $sm = $this->getServiceLocator();
          return $sm->get('ApplicantMapper');
    }
    public function getViewHelper($helperName) {
        return $this->getServiceLocator()->get('viewhelpermanager')->get($helperName);
    }

    
    
//    protected $_registrationForm;
// 
//    public function preDispatch() {
//        parent::preDispatch();
// 
//        //Instantiate the form
//        $this->_registrationForm = new Application_Form_RegisterForm();
//    }
//     
//    public function init() {
//        /* Initialize action controller here */
//    }
// 
    protected $applicantForm;
    protected function _getCreateUserForm()
    {
        if (!$this->applicantForm) {
            $this->_setCreateUserForm(
//                $this->getServiceLocator()->get('contentuser_create_user_form')
            );
        }
        return $this->applicantForm;
    }

    protected function _setCreateUserForm(\Zend\Form\Form $createUserForm)
    {
        $this->applicantForm = $createUserForm;
    }


//    public function indexAction()
//    {
//        $form = $this->_getCreateUserForm();
//        $applicant = new \Ims\Model\ApplicantEntity();
//        $form->bind($applicant);
//
//        if ($this->request->isPost()) {
//            $form->setData($this->request->getPost());
//
//            if ($form->isValid()) {
//                // take action
//                echo "Hello";
//            }
//        }
//
//        return new ViewModel(array('form' => $form));
//    }

    
    
//    public function indexAction() {
//         
//        if($this->_request->isPost()) {
//            $data = $this->_request->getPost(); //Get post data from request object
//            if($this->_registrationForm->isValid( $data )) { //This checks if all validators are satisfied
//                //Don't show the form again. Get the values from the form object
//                $name       = $this->_registrationForm->getValue('name');
//                $email      = $this->_registrationForm->getValue('email');
//                $password   = $this->_registrationForm->getValue('password');
//                 
//                echo "<p>Name: {$name}<p/>";
//                echo "<p>Email: {$email}<p/>";
//                echo "<p>Password: {$password}<p/>";
//            } else {
//                $this->view->form = $this->_registrationForm; //Send form to the view with errors
//            }
//        } else {
//            $this->view->form = $this->_registrationForm; //Send form to the view
//        }
//    }
}
 

?>