<?php
    //Model
    class HoaDon extends ConnectionDB{
        //Lay hoa don
        function getBillById($billId){
            return array('1','Hello');
        }
        //Lay chi tiet hoa don
        function getBillDetailById($billId){

        }
        //Lay tat ca hoa don
        function getAllBill($billId){

        }
        //Tao ma hoa don tiep theo
        function createNextBillId(){

        }
        //Lay hoadon theo khach hang
        function getBilByCustomerId($cusId){

        }
        //Lay hoadon theo nhanvien
        function getBilByStaffId($cusId){

        }
        //Tinh Tong tien trong chi tiet
        function getPriceInBillDetail($detail){

        }
        //Them hoa don
        function AddBillAndDetail($bill,$detail){
            
        }
        //Thong ke so luong san pham da ban trong thang 
        function statisticalBill($month){
            
            
            
            
            
            /*return aray(
                array(
                    'IdProduct' => ?,
                    'Number' => ?
                )
                .....
                array(
                    'IdProduct' => ?,
                    'Number' => ?
                )
            );*/
        }
    }
?>