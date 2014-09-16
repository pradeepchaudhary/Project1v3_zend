<?php
namespace Ims\Model;

use Zend\Db\Adapter\Adapter;
use Ims\Model\TestEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class TestMapper{
    
    protected $tableName = 'test_table';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);

    }
    public function saveinfo(TestEntity $testentity){
        echo "<br/> saveinfo line 1";
        var_dump($testentity);
        $hydrator = new ClassMethods();
        $data2 = $hydrator->extract($testentity);
        if ($testentity->getuserID()) {
            echo "<br/> saveinfo line 5";
            // update action
            $action = $this->sql->update();
            $action->set($data2);
            $action->where(array('user_id' => $testentity->getuserID()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data2['user_id']);
            $action->values($data2);
        }

        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();

        if (!$testentity->getuserID()) {
            $testentity->setuserID($result->getGeneratedValue());
        }
        print_r($result);
        return $result;
   }
}