<?php
namespace Ims;

use Ims\Model\DataMapper;
use Ims\Model\LoginMapper;
use Ims\Model\ApplicantMapper;
use Ims\Model\TestMapper;

use Ims\Model\ApplicantEntity;

//use ContentCore\Model\UserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getServiceConfig(){
        
         return array(
             'factories' => array(
                 'DataMapper' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $mapper = new DataMapper($dbAdapter);
                     return $mapper;
                 },
                'ApplicantMapper' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $mapper = new ApplicantMapper($dbAdapter);
                     return $mapper;
                 },
                'TestMapper' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $testmapper = new TestMapper($dbAdapter);
                     return $testmapper;
                 },
                'contentuser_create_user_form' => function($sm) {
                        $form = new Form\ApplicantForm();
                        return $form;
                },
                'zfcuser_login_form' => 'ZfcUser\Factory\Form\LoginFormFactory',
                
                // defining it as invokable here, any factory will do too
//                'my_image_service' => 'Imagine\Gd\Imagine',
             ),
         );
     }
}
