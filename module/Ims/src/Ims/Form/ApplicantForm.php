<?php
namespace Ims\Form;

//use Zend\Form\Form;
//use Zend\Form\Element;
//use ZfcBase\Form\ProvidesEventsForm;
//use Zend\InputFilter\InputFilter;
//use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;
//
//class ApplicantForm extends Form{
//    
//    public function __construct(){
//        
//        parent::__construct('Applicant');
//
//        $this->setAttribute('method', 'post')
//             ->setHydrator(new ObjectPropertyHydrator(false))
//             ->setInputFilter(new InputFilter());
//
//        $this->add(array(
//            'type' => 'Ims\Form\ApplicantFilter',
//            'options' => array(
//                'use_as_base_fieldset' => true
//            )
//        ));
//        
//        $this->add(array(
//            'type' => 'Zend\Form\Element\Csrf',
//            'name' => 'csrf'
//        ));
//
//        $this->add(array(
//            'name' => 'submit',
//            'attributes' => array(
//                'type' => 'submit',
//                'value' => 'Submit'
//            )
//        ));
//    }
//}
        
//use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilter;

class ApplicantForm extends Form{
    
    public function __construct($name = null, $options = array()){

        parent::__construct('applicant');
        
        $this->setAttribute('method', 'post');
        $this->setInputFilter(new ApplicantFilter());
        $this->setHydrator(new ClassMethods());

//        $this->captcha = $captcha;

        // add() can take either an Element/Fieldset instance,
        // or a specification, from which the appropriate object
        // will be built.

        $this->add(array(
             'name' => 'user_id',
             'type' => 'hidden',
         ));
        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Your name',
            ),
            'type'  => 'Text',
        ));
        $this->add(array(
            'name' => 'fathersname',
            'options' => array(
                'label' => 'Father\'s name',
            ),
            'type'  => 'Text',
        ));
        $this->add(array(
            'name' => 'mothersname',
            'options' => array(
                'label' => 'Mother\'s name',
            ),
            'type'  => 'Text',
        ));
        $this->add(array(
            'name' => 'sex',
            'options' => array(
                'label' => 'Sex',
                'value_options' => array(
                    array(
                        'value' => 'Male',
                        'label' => 'Male',
                        'selected' => true,
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                    array(
                        'value' => 'Female',
                        'label' => 'Female',
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                ),
            ),
            'type'  => 'Zend\Form\Element\Radio',
        ));
        $this->add(array(
            'name' => 'dob',
            'options' => array(
                'label' => 'Date of Birth',
            ),
            'type'  => 'Date',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'age',
            'options' => array(
                'label' => 'Age',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'religion',
            'options' => array(
                'label' => 'Religion',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )            
        ));
        $this->add(array(
            'name' => 'nationality',
            'options' => array(
                'label' => 'Nationality',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'maritalstatus',
            'options' => array(
                'label' => 'Marital Status',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'handicapped',
            'options' => array(
                'label' => 'Handicapped',
                'value_options' => array(
                    array(
                        'value' => '0',
                        'label' => 'No',
                        'selected' => true,
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                    array(
                        'value' => '1',
                        'label' => 'Yes',
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                ),
            ),
            'type'  => 'Zend\Form\Element\Radio',
        ));
        $this->add(array(
            'name' => 'community',
            'options' => array(
                'label' => 'Community',
                'value_options' => array(
                    array(
                        'value' => 'General',
                        'label' => 'General',
                        'selected' => true,
                    ),
                    array(
                        'value' => 'OBC',
                        'label' => 'OBC',
                    ),
                    array(
                        'value' => 'SC',
                        'label' => 'SC',
                    ),
                    array(
                        'value' => 'ST',
                        'label' => 'ST',
                    ),
                ),
                'label_attributes' => array(
//                    'class' => 'select',
                ),
            ),
            'type'  => 'Select',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'minority',
            'options' => array(
                'label' => 'Minority',
                'value_options' => array(
                    array(
                        'value' => '0',
                        'label' => 'No',
                        'selected' => true,
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                    array(
                        'value' => '1',
                        'label' => 'Yes',
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                ),
            ),
            'type'  => 'Radio',
        ));
        $this->add(array(
            'name' => 'feeremission',
            'options' => array(
                'label' => 'Fee remission',
                'value_options' => array(
//                    '0' => 'No',
//                    '1' => 'Yes',
                    array(
                        'value' => '0',
                        'label' => 'No',
                        'selected' => true,
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                    array(
                        'value' => '1',
                        'label' => 'Yes',
                        'label_attributes' => array(
                            'class' => 'radio-inline',
                        ),
                    ),
                ),
            ),
            'type'  => 'radio',
        ));
        
        $this->add(array(
            'name' => 'edu_id',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'c1ass_degree',
            'options' => array(
                'label' => 'Address',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'caddl2',
            'options' => array(
                'label' => ' ',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'ccity',
            'options' => array(
                'label' => 'City',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'cstate',
            'options' => array(
                'label' => 'State/Region/Province',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'cpincode',
            'options' => array(
                'label' => 'Pincode',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'ccountry',
            'options' => array(
                'label' => 'Country',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'paddl1',
            'options' => array(
                'label' => 'Permanent Address',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'paddl2',
            'options' => array(
                'label' => ' ',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'pcity',
            'options' => array(
                'label' => 'City',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'pstate',
            'options' => array(
                'label' => 'State/Region/Province',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'ppincode',
            'options' => array(
                'label' => 'Pincode',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'pcountry',
            'options' => array(
                'label' => 'Country',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'place_id',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'caddl1',
            'options' => array(
                'label' => 'Address',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'caddl2',
            'options' => array(
                'label' => ' ',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'ccity',
            'options' => array(
                'label' => 'City',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(array(
            'name' => 'cstate',
            'options' => array(
                'label' => 'State/Region/Province',
            ),
            'type'  => 'Text',
            'attributes' => array(
                'class' => 'form-control',
            )
        ));
        $this->add(new Element\Csrf('security'));
        $this->add(array(
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Submit',
            ),
        ));

        // We could also define the input filter here, or
        // lazy-create it in the getInputFilter() method.
    }
}
?>