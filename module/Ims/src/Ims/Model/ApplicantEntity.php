<?php
 namespace Ims\Model;

 class ApplicantEntity{
	
//	protected $exam_id;
//	protected $examname;
//	protected $postedon;
//	protected $lastdate;
    protected $user_id;
//    protected $username;
//    protected $password;
//    protected $firstname;
//    protected $lastname;
    protected $name;
    protected $dob;
    protected $age;
    protected $fathersname;
    protected $mothersname;
    protected $religion;
    protected $sex;
    protected $nationality;
    protected $maritalstatus;
    protected $handicapped;
    protected $community;
    protected $minority;
    protected $feeremission;
//    protected $created;

//     public function __construct()
//     {
////         $this->created = date('Y-m-d H:i:s');
////         $this->postedon = date('Y-m-d');
////         $this->lastdate = date('Y-m-d');
//     }

//     public function getexamID()
//     {
//       return $this->exam_id;
//     }
//
//     public function setexamID($Value)
//     {
//       $this->exam_id = $Value;
//     }
//     public function getexamname()
//     {
//       return $this->examname;
//     }
//
//     public function setexamname($Value)
//     {
//       $this->examname = $Value;
//     }
//     public function getpostedon()
//     {
//       return $this->postedon;
//     }
//
//     public function setpostedon($Value)
//     {
//       $this->postedon = $Value;
//     }
//     public function getlastdate()
//     {
//       return $this->lastdate;
//     }
//
//     public function setlastdate($Value)
//     {
//       $this->lastdate = $Value;
//     }
     
    public function getuser_id()
    {
      return $this->user_id;
    }

    public function setuser_id($Value)
    {
      $this->user_id = $Value;
    }

//    public function getusername()
//    {
//      return $this->username;
//    }
//
//    public function setusername($Value)
//    {
//      $this->username = $Value;
//    }
//    
//    public function getpassword()
//    {
//      return $this->password;
//    }
//
//    public function setpassword($Value)
//    {
//      $this->password = $Value;
//    }
    
//    public function getfirstname()
//    {
//      return $this->firstname;
//    }
//
//    public function setfirstname($Value)
//    {
//      $this->firstname = $Value;
//    }

//    public function getlastname()
//    {
//      return $this->lastname;
//    }
//
//    public function setlastname($Value)
//    {
//      $this->lastname = $Value;
//    }
    public function getname()
    {
      return $this->name;
    }

    public function setname($Value)
    {
      $this->name = $Value;
    }

    public function getdob()
    {
      return $this->dob;
    }

    public function setdob($Value)
    {
      $this->dob = $Value;
    }
    
    public function getage()
    {
      return $this->age;
    }

    public function setage($Value)
    {
      $this->age = $Value;
    }
    
    public function getfathersname()
    {
      return $this->fathersname;
    }

    public function setfathersname($Value)
    {
      $this->fathersname = $Value;
    }
    
    public function getmothersname()
    {
      return $this->mothersname;
    }

    public function setmothersname($Value)
    {
      $this->mothersname = $Value;
    }
    
    public function getreligion()
    {
      return $this->religion;
    }

    public function setreligion($Value)
    {
      $this->religion = $Value;
    }
    
    public function getsex()
    {
      return $this->sex;
    }

    public function setsex($Value)
    {
      $this->sex = $Value;
    }
    
    public function getnationality()
    {
      return $this->nationality;
    }

    public function setnationality($Value)
    {
      $this->nationality = $Value;
    }
    
    public function getmaritalstatus()
    {
      return $this->maritalstatus;
    }

    public function setmaritalstatus($Value)
    {
      $this->maritalstatus = $Value;
    }
    
    public function gethandicapped()
    {
      return $this->handicapped;
    }

    public function sethandicapped($Value)
    {
      $this->handicapped = $Value;
    }
    
    public function getcommunity()
    {
      return $this->community;
    }

    public function setcommunity($Value)
    {
      $this->community = $Value;
    }
    
    public function getminority()
    {
      return $this->minority;
    }

    public function setminority($Value)
    {
      $this->minority = $Value;
    }
    
    public function getfeeremission()
    {
      return $this->feeremission;
    }

    public function setfeeremission($Value)
    {
      $this->feeremission = $Value;
    }
    
//    public function getCreated()
//    {
//      return $this->created;
//    }
//
//    public function setCreated($Value)
//    {
//      $this->created = $Value;
//    }
 }
 
 
 /*The code of original example of applicant*/
 // namespace Ims\Model;

// class ApplicantEntity{
    
    // CONST DISPLAY_NAME_FIRSTLAST = "firstLast";
    // CONST DISPLAY_NAME_LASTFIRST = "lastFirst";

    // public $UserId;

    // public $firstName;

    // public $lastName;

    // public function exchangeArray($data)
    // {
        // $this->UserId = (isset($data['UserId'])) ? $data['UserId'] : null;
        // $this->firstName = (isset($data['FirstName'])) ? $data['FirstName'] : null;
        // $this->lastName = (isset($data['LastName'])) ? $data['LastName'] : null;
    // }

    // public function getFullName($displayOrder = self::DISPLAY_NAME_FIRSTLAST)
    // {
        // if ($displayOrder === self::DISPLAY_NAME_FIRSTLAST) {
            // return sprintf("%s %s", $this->firstName, $this->lastName);
        // } else {
            // return sprintf("%s %s", $this->lastName, $this->firstName);
        // }
    // }
// }
 ?>