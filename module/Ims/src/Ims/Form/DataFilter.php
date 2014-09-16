<?php
namespace Ims\Form;

 use Zend\InputFilter\InputFilter;

 class DataFilter extends InputFilter
 {
     public function __construct()
     {
//         $this->add(array(
//             'name' => 'id',
//             'required' => true,
//             'filters' => array(
//                 array('name' => 'Int'),
//             ),
//         ));
         
         $this->add(array(
             'name' => 'exam_id',
             'required' => true,
             'filters' => array(
                 array('name' => 'Int'),
             ),
         ));

         $this->add(array(
             'name' => 'examname',
             'required' => true,
             'filters' => array(
                 array('name' => 'StripTags'),
                 array('name' => 'StringTrim'),
             ),
             'validators' => array(
                 array(
                     'name' => 'StringLength',
                     'options' => array(
                         'encoding' => 'UTF-8',
                         'max' => 400
                     ),
                 ),
             ),
         ));

         $this->add(array(
             'name' => 'visible',
             'required' => false,
         ));
     }
 }