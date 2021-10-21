<?php
    class ConnectionDB{
        protected $dbhost = "localhost";
        protected $dbuser = "root";
        protected $dbpass = "123456";
        protected $db = "";
        protected $conn;

        function __construct()
        {
            $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->db) or die("Connect failed: %s\n" . $this->conn->error);
        }
    }

?>