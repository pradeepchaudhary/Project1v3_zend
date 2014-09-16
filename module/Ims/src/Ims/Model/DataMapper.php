<?php
namespace Ims\Model;

 use Zend\Db\Adapter\Adapter;
 use Ims\Model\DataEntity;
 use Zend\Stdlib\Hydrator\ClassMethods;
 use Zend\Db\Sql\Sql;
 use Zend\Db\Sql\Select;
 use Zend\Db\ResultSet\HydratingResultSet;

 class DataMapper
 {
     protected $tableName = 'exam_details';
     protected $dbAdapter;
     protected $sql;

     public function __construct(Adapter $dbAdapter)
     {
         $this->dbAdapter = $dbAdapter;
         $this->sql = new Sql($dbAdapter);
         $this->sql->setTable($this->tableName);

     }

     public function fetchAll()
     {
         //Custom code for this application for joining two tables
            $select = $this->sql->select();
//            ->from(array('sl' => 'secure_login'))
//            ->join('user_details', 'sl.userid = user_details.userid');
         
         $select->order(array('exam_id ASC', 'examname ASC'));

         $statement = $this->sql->prepareStatementForSqlObject($select);
         $results = $statement->execute();

         $entityPrototype = new DataEntity();
         $hydrator = new ClassMethods();
         $resultset = new HydratingResultSet($hydrator, $entityPrototype);
         $resultset->initialize($results);
         return $resultset;
     }
     
    public function saveData(DataEntity $data)
     {
         $hydrator = new ClassMethods();
         $data2 = $hydrator->extract($data);
//         var_dump($data);
//         var_dump($data2);
         if ($data->getexamID()) {
             // update action
             $action = $this->sql->update();
             $action->set($data2);
             $action->where(array('exam_id' => $data->getexamID()));
         } else {
             // insert action
             $action = $this->sql->insert();
             unset($data2['exam_id']);
             $action->values($data2);
         }
         
         $statement = $this->sql->prepareStatementForSqlObject($action);
         $result = $statement->execute();

         if (!$data->getexamID()) {
             $data->setexamID($result->getGeneratedValue());
         }
         return $result;
     }
     
    public function getData($id)
    {
        $select = $this->sql->select();
        $select->where(array('exam_id' => $id));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
//            echo "no result";
        }
        
        $hydrator = new ClassMethods();
        $data = new DataEntity();
        $hydrator->hydrate($result, $data);

        return $data;
    }
     
 }