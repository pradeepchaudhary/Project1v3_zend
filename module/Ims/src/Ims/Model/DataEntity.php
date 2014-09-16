<?php
 namespace Ims\Model;

 class DataEntity
 {
     protected $exam_id;
     protected $examname;
     protected $postedon;
     protected $lastdate;

     public function __construct()
     {
//         $this->created = date('Y-m-d H:i:s');
         $this->postedon = date('Y-m-d');
         $this->lastdate = date('Y-m-d');
     }

     public function getexamID()
     {
       return $this->exam_id;
     }

     public function setexamID($Value)
     {
       $this->exam_id = $Value;
     }
     public function getexamname()
     {
       return $this->examname;
     }

     public function setexamname($Value)
     {
       $this->examname = $Value;
     }
     public function getpostedon()
     {
       return $this->postedon;
     }

     public function setpostedon($Value)
     {
       $this->postedon = $Value;
     }
     public function getlastdate()
     {
       return $this->lastdate;
     }

     public function setlastdate($Value)
     {
       $this->lastdate = $Value;
     }
 }