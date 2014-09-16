<?php
namespace Ims\Model;

use Zend\Db\Adapter\Adapter;
use Ims\Model\ApplicantEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class ApplicantMapper{
    
     protected $tableName = 'user_details';
//     protected $tableName = 'test';
     protected $dbAdapter;
     protected $sql;

     public function __construct(Adapter $dbAdapter)
     {
         $this->dbAdapter = $dbAdapter;
         $this->sql = new Sql($dbAdapter);
         $this->sql->setTable($this->tableName);

     }

     public function fetchDetails()
     {
 
     }
     
    public function saveDetails(ApplicantEntity $entity)
     {
         $hydrator = new ClassMethods();
         $extracted_applicant = $hydrator->extract($entity);

         if ($entity->getuser_id()) {
             // update action
             $action = $this->sql->update();
             $action->set($extracted_applicant);
             $action->where(array('user_id' => $entity->getuser_id()));
         } else {
             // insert action
             $action = $this->sql->insert();
             unset($extracted_applicant['user_id']);
             $action->values($extracted_applicant);
         }
         
         $statement = $this->sql->prepareStatementForSqlObject($action);
         $result = $statement->execute();

         if (!$entity->getuser_id()) {
             $entity->setuser_id($result->getGeneratedValue());
         }
         return $result;
     }
     
    public function getData($id)
    {
       
    }
    // For test page
    public function saveTest(ApplicantEntity $data){
//        echo "save test entered";
        $hydrator = new ClassMethods();
        $data2 = $hydrator->extract($data);
        if ($data->getuserID()) {
             // update action
//            echo "updating data";
             $action = $this->sql->update();
             $action->set($data2);
             $action->where(array('userID' => $data->getuserID()));
         } else {
             // insert action
//             echo "inserting data";
             $action = $this->sql->insert();
             unset($data2['userID']);
             $action->values($data2);
         }
         
         $statement = $this->sql->prepareStatementForSqlObject($action);
//         var_dump($statement);
         $result = $statement->execute();

         if (!$data->getuserID()) {
             $data->setuserID($result->getGeneratedValue());
         }
         return $result;
    }
    
    public function uploadImageFile($check, $authService) { // Note: GD library is required for this function
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $iWidth = 150;
            //### write code for checking the requirement then changing the height as desired.
            if($check==1){
                $iHeight = 200; // desired image result dimensions
            }else if($check==2){
                $iHeight = 100; // desired image result dimensions
            }
            $iJpgQuality = 90;

            if ($_FILES) {
                // if no errors and size less than 2MB
                if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 2048 * 1024) {
                    if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

                        // new unique filename
                        //$photo_loc = NULL;
    //                    $sign_loc = NULL;
                        if($check==1){
//                            if(isset($_SESSION)){
                            if($authService->hasIdentity()){
                                $sTempFileName = 'public/img/user_uploads/' . $authService->getIdentity()->getId().'photo';
                            }else{
                                $sTempFileName = 'public/img/user_uploads/' . md5(time().rand()).'photo';
                            }
    //                        $_SESSION['photo_loc'] = $sTempFileName;
                        }else if($check==2){
                            if(isset($_SESSION)){
                                $sTempFileName = 'public/img/user_uploads/' . $_SESSION['username'].'sign';
                            }else{
                                $sTempFileName = 'public/img/user_uploads/' . md5(time().rand()).'sign';
                            }
    //                        $_SESSION['sign_loc'] = $sTempFileName;
                        }

                        // move uploaded file into _images/user_uploads folder
                        move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
                        $testforimage=true;

                        // change file permission to 644
                        @chmod($sTempFileName, 0644);

                        if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                            $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        // check for image type
                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                            $sExt = '.jpg';

                            // create a new image from file 
                            $vImg = @imagecreatefromjpeg($sTempFileName);
                            break;
                            case IMAGETYPE_GIF:
                            $sExt = '.gif';

                            // create a new image from file 
                            $vImg = @imagecreatefromgif($sTempFileName);
                            break;
                            case IMAGETYPE_PNG:
                            $sExt = '.png';

                            // create a new image from file 
                            $vImg = @imagecreatefrompng($sTempFileName);
                            break;
                            default:
                            @unlink($sTempFileName);
                            return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

                        // copy and resize part of an image with resampling
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;
                        if($check==1){
                            $_SESSION['photo_loc'] = $sResultFileName;
                        }else if($check==2){
                            $_SESSION['sign_loc'] = $sResultFileName;
                        }

                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);

                        //*** inserting the information in the database [or atleast trying to;)...]
//                        $currentuserid = current_userid();
//                        if(($_SESSION['photo_loc'] && $_SESSION['sign_loc'])!=NULL){
//                            $insert_query = sprintf("INSERT INTO image_file_details (userID, photoFile, signFile) VALUES (%s, %s, %s)",
//                                            GetSQLValueString($currentuserid, "text"),
//                                            GetSQLValueString($_SESSION['photo_loc'], "text"),
//                                            GetSQLValueString($_SESSION['sign_loc'], "text"));
//                            global $db;
//                            mysqli_select_db($db, DB_NAME);
//                            $Result = mysqli_query($db, $insert_query) or die('Database insertion failed. Connect Error: ' .
//                                        "(".$db->connect_errno.")");
//                            $_SESSION['photo_loc'] = NULL;
//                            $_SESSION['sign_loc'] = NULL;
//                            unset($_SESSION['photo_loc']);
//                            unset($_SESSION['sign_loc']);
//                        }

                        return $sResultFileName;
                        }
                    }
                }
            }
        }
    }
    
   public function save_latlong(){
        $place = $_POST['place'];
        $description = $_POST['description'];
        $latitude = $_POST['lat'];
        $longitude = $_POST['lng'];
        //$curruserid = current_userid();
        //gobal $curruserid;
        $db->query("INSERT INTO map_places SET place='$place', description='$description', lat='$latitude', lng='$longitude', userid='$curruserid'");
        $place_id = $db->insert_id;
        echo $place_id;
    }
 }