<?php
namespace Phppot;
 
 
class DataSource
{

    const HOST = '192.168.108.29';

    const USERNAME = 'umshinidba';

    const PASSWORD = '112358:112358';

    const DATABASENAME = 'umshini_bo';//cati_lebanon

    public $conn;


    function __construct()
    {
        $this->conn = $this->getConnection();
    }
 

    public function getConnection()
    {
        $conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);
        
        if (mysqli_connect_errno()) {
            trigger_error("Problem with connecting to database.");
        }
        
        $conn->set_charset("utf8");
        return $conn;
    }

    /**
     * To get database results
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function select($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);
        
        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if (! empty($resultset)) {
            return $resultset;
        }
    }
    
    
    function runQuery($query) {
         
        $result = mysqli_query($this->conn,$query);
       /* while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;*/
    }
    
    /**
     * To insert
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return int
     */
    public function insert($query)
    {
        $paramType = null;
        $paramArray = null;
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt,$paramType, $paramArray);
        $stmt->execute();
        $insertId = $stmt->insert_id;
 
        return $insertId;
    }
    
    /**
     * To execute query
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     */
    public function execute($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);
        
        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType="", $paramArray=array());
        }
        $stmt->execute();
    }
    
    /**
     * 1. Prepares parameter binding
     * 2. Bind prameters to the sql statement
     * @param string $stmt
     * @param string $paramType
     * @param array $paramArray
     */
    public function bindQueryParams($stmt, $paramType, $paramArray=array())
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }
    
    /**
     * To get database results
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function numRows($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);
        
        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        
        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows;
        return $recordCount;
    }
}