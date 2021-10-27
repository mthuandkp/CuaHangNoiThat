<?php
    class KhachHangDB extends ConnectionDB{
        //Lay khachhang bang maKH
        function getCutomerById($customerId){
            return array('1','KH01');
        }
        //Lay tat ca khach hang
        function getAllCustomer($isDisable = false){

        }
        //Cap nhat thong tin khach hang
        function updateInformationCustomer($customer){

        }
        //Tao ma khach hang tiep theo
        function createNextCustomerId(){

        }
        //Them khach hang
        function addNewCustomer($customer){

        }
        //Sua trang thai khach hang
        function disableCutomer($customerId,$status=false){

        }
        //Cap nhat tendangnhap va matkhau
        function updateAccountCutomer($id,$username,$password){
            
        }
    }
?>