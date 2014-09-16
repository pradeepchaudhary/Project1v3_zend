<?php
namespace Ims\Form;

use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class TestForm extends Form{
    
    public function __construct($name = null, $options = array()) {
        parent::__construct('test');
        
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new TestFilter());
        $this->setHydrator(new ClassMethods());
        
        $this->add(array(
             'name' => 'user_id',
             'type' => 'hidden',
         ));

         $this->add(array(
             'name' => 'name',
             'type' => 'text',
             'options' => array(
                 'label' => 'Name',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'attributes' => array(
                 'type'  => 'submit',
                 'value' => 'Submit',
                 'class' => 'btn btn-primary',
             ),
         ));
    }
}