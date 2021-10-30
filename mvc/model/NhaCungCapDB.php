<?php
    include('../core/ConnectionDB.php');
    class NhaCungCap extends ConnectionDB{
        //Lay nha cung cap
        function getSupplierById($supplierId){
            $sql="SELECT * FROM `nhacungcap` WHERE MANCC = '$supplierId'";
            $query=mysqli_query($this->conn,$sql);
            $row=mysqli_fetch_array($query);            
            return $row;
        }
        //Lay tat ca loai san pham
        function getAllSupplier(){
            $sql="SELECT * FROM `nhacungcap`";
            $query=mysqli_query($this->conn,$sql);
            $arr = array();
            while ($row=mysqli_fetch_array($query))
                array_push($arr, $row);           
            return $arr;
        }
        //Cap nhat thong tin loai nha cung cap
        function updateInformationSupplier($supplier){
            $sql="UPDATE `nhacungcap` 
            SET `TENNCC` = '$supplier[1]', `DIACHI` = '$supplier[2]',
            `SDT` = '$supplier[3]',`TRANGTHAI` = '$supplier[4]' 
            WHERE `MANCC` = '$supplier[0]' LIMIT 1 ";
            $kq = mysqli_query($this->conn, $sql);
        }
        //Tao ma nhacungcap tiep theo
        function createNextSupplierId(){
            $s=1;
            $ma='ncc'.$s;
            $sql="SELECT * FROM `nhacungcap` WHERE MANCC = '$ma'";
            $query=mysqli_query($this->conn,$sql);
            $i=mysqli_num_rows($query);
            while($i > 0){
                $s++;
                $ma='ncc'.$s;
                $sql="SELECT * FROM `nhacungcap` WHERE MANCC = '$ma'";
                $query=mysqli_query($this->conn,$sql);
                $i=mysqli_num_rows($query);             
            }            
            return $ma;     
        }
        //Them nha cung cap
        function addNewSupplier($supplier){
            $sql = "INSERT INTO `nhacungcap` (`MANCC` , `TENNCC` ,`DIACHI` ,`SDT` ,`TRANGTHAI`)
            VALUES ('$supplier[0]', '$supplier[1]', '$supplier[2]',
            '$supplier[3]', '$supplier[4]')";
            $kq = mysqli_query($this->conn, $sql);

        }
        //Xoa nha cung cap
        function disableSupplier($supplierId,$status=false){
            $sql = "DELETE FROM `nhacungcap` WHERE MANCC = '$supplierId'";
            $kq = mysqli_query($this->conn, $sql);
            if($kq>0){
                $status=true;
            }
            return $status;
        }
    }
       
    
?>
