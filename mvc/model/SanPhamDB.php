<?php
    //Model
    class SanPhamDB extends ConnectionDB{
        //Lay sanpham
        function getProductById($productId){
            $qry = "SELECT * FROM `sanpham` WHERE `MASP`='$productId';";
            return mysqli_fetch_assoc(mysqli_query($this->conn,$qry));
        }
        //Lay tat ca sanpham
        function getAllProduct($isDisable = false){

        }
        //Tao ma sanpham tiep theo
        function createNextProductId(){

        }
        //Lay sanpham theo maloai
        function getProductByTypeId($typeId){

        }
        
        //Them san pham moi
        function AddNewProduct($product){
            
        }
        //Cap nhat thong tin san pham
        function updateInformationProduct($product){
            
        }
        //Xoa san pham
        function disableProductStatus($idProduct,$status = false){
            
        }
        //Cap nhat so luong san pham
        function updateNumberOfProduct($productId,$number){
            
        }
    }
?>