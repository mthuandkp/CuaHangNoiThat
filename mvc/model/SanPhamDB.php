<?php
    //Model
    class SanPhamDB extends ConnectionDB{
        //Lay sanpham
        function getProductById($productId){
            
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