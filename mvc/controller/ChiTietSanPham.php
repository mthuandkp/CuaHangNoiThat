<?php
    class ChiTietSanPham extends Controller{
        function display(){
            $this->View('ChiTietSanPham');
        }

        function getProductById($productId){
            $productId = 0;
            if(isset($_POST['productId'])){
                $productId = $_GET['productId'];
            }
            $objProduct = $this->getModel('SanPham');
            return $objProduct->getProductById($productId);
        }
    }

?>