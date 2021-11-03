<?php
    class NhanVienDB extends ConnectionDB{
        //Lay nhan vien
        function getStaffById($staffId){
            $qry = "SELECT * FROM `nhanvien` WHERE `MANV`='$staffId';";
            return mysqli_fetch_assoc(mysqli_query($this->conn,$qry));
        }
        //Lay tat ca nhan vien
        function getAllStaff($isDisable = false){
            $data = array();
            $qry = "SELECT * FROM `nhanvien`";
            $rs = mysqli_query($this->conn,$qry);
            while($row = mysqli_fetch_assoc($rs)){
                $data[]=$row;
            }
            return $data;
        }
        //Cap nhat thong tin nhanvien
        function updateInformationStaff($staff){

        }
        //Tao ma nhanvien tiep theo
        function createNextStaffId(){

        }
        //Them nhan vien
        function addNewSupplier($supplier){

        }
    }
?>
