<?php
class ConnectionDB
{
    protected $dbhost = "localhost";
    protected $dbuser = "root";
    protected $dbpass = "123456";
    protected $db = "cuahangnoithat";
    protected $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->db) or die("Connect failed: %s\n" . $this->conn->error);
    }

    function getDataFromResultSet($rs)
    {
        if (mysqli_num_rows($rs) <= 0) {
            return array();
        } else {
            while ($row = mysqli_fetch_assoc($rs)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
?>