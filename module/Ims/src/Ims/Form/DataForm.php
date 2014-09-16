<?php
namespace Ims\Form;

 use Zend\Form\Form;
 use Zend\Stdlib\Hydrator\ClassMethods;

 class DataForm extends Form
 {
     public function __construct($name = null, $options = array())
     {
         parent::__construct('data');

         $this->setAttribute('method', 'post');
         $this->setInputFilter(new DataFilter());
         $this->setHydrator(new ClassMethods());

//         $this->add(array(
//             'name' => 'id',
//             'type' => 'hidden',
//         ));
//         
         $this->add(array(
             'name' => 'exam_id',
             'type' => 'hidden',
         ));

         $this->add(array(
             'name' => 'examname',
             'type' => 'text',
             'options' => array(
                 'label' => 'Examination',
             ),
             'attributes' => array(
                 'id' => 'examname',
                 'maxlength' => 400,
             )
         ));

         $this->add(array(
             'name' => 'visible',
             'type' => 'checkbox',
             'options' => array(
                 'label' => 'Visible',
                 'label_attributes' => array('class'=>'checkbox'),
             ),
         ));

         $this->add(array(
             'name' => 'submit',
             'attributes' => array(
                 'type'  => 'submit',
                 'value' => 'Go',
                 'class' => 'btn btn-primary',
             ),
         ));
     }
 }