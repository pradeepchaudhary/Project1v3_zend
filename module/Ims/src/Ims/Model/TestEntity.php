<?php
namespace Ims\Model;

class TestEntity{
    
    protected $user_id;
    protected $name;

//    public function __construct(){
//    
//        
//    }

    public function getuserID()
    {
      return $this->user_id;
    }

    public function setuserID($Value)
    {
      $this->user_id = $Value;
    }
    public function getname()
    {
      return $this->name;
    }

    public function setname($Value)
    {
      $this->name = $Value;
    }
}
