<?php
namespace Ims\Form;

//use Ims\Model\ApplicantEntity;
//use Zend\Form\Fieldset;
//use Zend\InputFilter\InputFilterProviderInterface;
//use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;
//
//class ApplicantFilter extends Fieldset implements InputFilterProviderInterface
//{
//    public function __construct()
//    {
//        parent::__construct('User');
//        $this->setHydrator(new ObjectPropertyHydrator(false))
//             ->setObject(new ApplicantEntity());
//        $this->setLabel('User');
//        
//         $this->add(array(
//            'name' => 'name',
//           'options' => array(
//               'label' => 'Name'			   
//           ),
//            'attributes' => array(
//                'required' => 'required'
//            )
//        ));
//
//        $this->add(array(
//            'name' => 'fathersname',
//           'options' => array(
//               'label' => 'Father\'s Name'
//           ),
//            'attributes' => array(
//                'required' => 'required'
//            )
//        ));
//		
//		$this->add(array(
//            'name' => 'mothersname',
//           'options' => array(
//               'label' => 'Mother\'s Name'
//           ),
//            'attributes' => array(
//                'required' => 'required'
//            )
//        ));
//		
//		//Radio inline
//		$this->add(array(
//			'name'          => 'radioInline',
//			'type'          => 'Radio',
//			'options'       => array(
//				'label'             => 'Gender',
//				'description'       => 'Description.',
//				'value_options'     => array(
//					'a'                 => 'Male',
//					'b'                 => 'Female'
//				),
//				'label_attributes' => array(
//					'class'=>'radio'
//				)
//			),
//		));
//		$this->add(array(
//             'name' => 'gender',
//             'type' => 'radio',
//             'options' => array(
//                 'label' => 'Gender',
//                 'label_attributes' => array('class'=>'radio-btn radio-inline'),
//				 'value_options'     => array(
//					'a'                 => 'Male',
//					'b'                 => 'Female'
//				),
//             ),
//         ));
//    }
//    
//    public function getInputFilterSpecification() {
//        
//        return array(
//            'name' => array(
//                'required' => true,
//            ),
//            'fname' => array(
//                'required' => true,
//            )
//        );
//    }
//
//}

use Ims\Model\ApplicantEntity;
use Zend\InputFilter\InputFilter;
use Zend\Form\Element;
use Zend\InputFilter\InputProviderInterface;

 class ApplicantFilter extends InputFilter{
// class ApplicantFilter extends Element implements InputProviderInterface{
     
     public function __construct(){
         
//         parent::__construct('applicant');
//         $this->add(array(
//             'name' => 'id',
//             'required' => true,
//             'filters' => array(
//                 array('name' => 'Int'),
//             ),
//         ));
         
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
             'name' => 'fathersname',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'mothersname',
             'required' => true,
         ));
         $this->add(array(
            'name' => 'sex',
            'required' => true,
//             'allow_empty' => true,
            'validators' => array(
                array(
                    'name'    => 'InArray',
                     'options' => array(
                         'haystack' => array('Male','Female'),
                         'messages' => array(
//                             'notInArray' => 'Please select your gender !' 
                        ),
                    ),
                ),
            ),
         ));
         $this->add(array(
             'name' => 'dob',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'age',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'religion',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'nationality',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'maritalstatus',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'handicapped',
             'required' => true,
             'validators' => array(
                array(
                    'name'    => 'InArray',
                     'options' => array(
                         'haystack' => array('0','1'),
//                         'messages' => array(
////                             'notInArray' => 'Please select an option !' 
//                        ),
                    ),
                ),
            ),
         ));
         $this->add(array(
             'name' => 'community',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'minority',
             'required' => true,
             'validators' => array(
                array(
                    'name'    => 'InArray',
                     'options' => array(
                         'haystack' => array('0','1'),
//                         'messages' => array(
////                             'notInArray' => 'Please select atleast !' 
//                        ),
                    ),
                ),
            ),
         ));
         $this->add(array(
             'name' => 'feeremission',
             'required' => true,
             'validators' => array(
                array(
                    'name'    => 'InArray',
                     'options' => array(
                         'haystack' => array('0','1'),
                         'messages' => array(
//                             'notInArray' => 'Please select atleast !' 
                        ),
                    ),
                ),
            ),
         ));
         
         $this->add(array(
             'name' => 'place_id',
             'required' => true,
             'filters' => array(
                 array('name' => 'Int'),
             ),
         ));
         $this->add(array(
             'name' => 'caddl1',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'caddl2',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'ccity',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'cstate',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'cpincode',
             'required' => true,
         ));
         $this->add(array(
             'name' => 'ccountry',
             'required' => true,
         ));
//         $this->add(array(
//             'name' => 'caddl1',
//             'required' => true,
//         ));
     }
     
//     public function getInputSpecification()
//     {
//         return array(
//             'name' => $this->getName(),
//             'required' => true,
//             'filters' => array(
//                 array('name' => 'Zend\Filter\StringTrim'),
//                 array('name' => 'Zend\Filter\StringToLower'),
//             ),
//             'validators' => array(
//                 $this->getValidator(),
//             ),
//         );
//     }
   
 }
 
 