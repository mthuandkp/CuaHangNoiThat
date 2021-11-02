<?php
    class KhachHangDB extends ConnectionDB{
        //Lay khachhang bang maKH
        function getCutomerById($customerId){
            $data = array();
            $qry = "SELECT * FROM khachhang WHERE MAKH ='$customerId';";
            $rs = mysqli_query($this->conn,$qry);
            while($row =  mysqli_fetch_assoc($rs)){
                $data[] = $row;
            }
            return $data;
        }
        //Lay tat ca khach hang
        function getAllCustomer($isDisable = false) {
            $data = array();
            $query = "SELECT * FROM khachhang;";
            $rs = mysqli_query($this->conn, $query);
            while ($row = mysqli_fetch_assoc($rs)) {
                $data[] = $row;
            }
            return $data;
        }
        //Cap nhat thong tin khach hang
        function updateInformationCustomer($customer){
            
        }
        //Tao ma khach hang tiep theo
        function createNextCustomerId(){


        }
        //Them khach hang
        function addNewCustomer($customer){
            $cusId = $customer['MAKH'];
            $cusName = $customer['TENKH'];
            $cusNameLogin = $customer['TENDN'];
            $cusPass = $customer['MATKHAU'];
            $cusAddr = $customer['DIACHI'];
            $cusPhone = $customer['SDT'];
            $cusStatus = $customer['TRANGTHAI'];
            $cusPoints = $customer['DIEMTL'];
            $qry = "INSERT INTO khachhang (MAKH, TENKH, TENDN, MATKHAU, DIACHI, SDT, TRANGTHAI, DIEMTL)
                   VALUES ('$cusId', '$cusName', '$cusNameLogin', '$cusPass', '$cusAddr', '$cusPhone', $cusStatus, $cusPoints);";
            echo $qry;
            if(mysqli_query($this->conn,$qry) == false){
                return false;
            }
         }
        //Sua trang thai khach hang
        function disableCutomer($customerId,$status=false){

        }
        //Cap nhat tendangnhap va matkhau
        function updateAccountCutomer($id,$username,$password){
            
        }
    }
?>