<?php
namespace Ims\Form;

use Zend\InputFilter\InputFilter;

class TestFilter extends InputFilter{
    
    public function __construct() {
        $this->add(array(
             'name' => 'user_id',
             'required' => true,
             'filters' => array(
                 array('name' => 'Int'),
             ),
         ));

         $this->add(array(
             'name' => 'name',
             'required' => true,
         ));
    }
}
