<?php
    class QuyenDB extends ConnectionDB{
        function getAllRight(){
            $sql = 'SELECT * FROM `quyen`';
            $rs = mysqli_query($this->conn,$sql);

            return $this->getDataFromResultSet($rs);
        }
    }
?>