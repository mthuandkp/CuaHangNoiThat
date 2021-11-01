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
            $qry = "SELECT * FROM `sanpham`;";
            $data = array();
            $rs = mysqli_query($this->conn,$qry);
            while($row = mysqli_fetch_assoc($rs)){$data[]=$row;}
            return $data;
        }
        //Tao ma sanpham tiep theo
        function createNextProductId(){

        }
        //Lay sanpham theo maloai
        function getProductByTypeId($typeId){

        }
        
        //Them san pham moi
        function addNewProduct($productArr){
            //('','','',,,'',true,0)
            $qry = "INSERT INTO `sanpham`(`MASP`, `TENSP`, `MALOAI`, `GIA`, `SOLUONG`, `HINHANH`, `TRANGTHAI`, `PHAMTRAMGIAM`) VALUES ";
            foreach($productArr as $value){
                $qry.="('$value[MASP]','$value[TENSP]','$value[MALOAI]',$value[GIA],$value[SOLUONG],'$value[HINHANH]',true,0),";
            }
            $qry = substr($qry,0,strlen($qry)-1);
            if(mysqli_multi_query($this->conn,$qry)){
                return true;
            }
            return false;
        }
        //Cap nhat thong tin san pham
        function updateInformationProduct($productArr){
            $qry = "";
            foreach ($productArr as $value) {
                $qry.="UPDATE `sanpham` SET `TENSP`='$value[TENSP]',`MALOAI`='$value[MALOAI]',`GIA`=$value[GIA],`SOLUONG`=$value[SOLUONG],`HINHANH`='$value[HINHANH]',`TRANGTHAI`=$value[TRANGTHAI],`PHAMTRAMGIAM`=$value[PHANTRAMGIAM] WHERE `MASP`='$value[MASP]';";
            }
            echo $qry;
            if(mysqli_multi_query($this->conn,$qry)){
                return true;
            }
            return false;
        }
        //Cap nhat so luong san pham
        function updateNumberListProduct($productArr){
            $qry = "";
            
            foreach ($productArr as $value) {
                $currentProduct = $this->getProductById($value['MASP']);
                $qry.="UPDATE `sanpham` SET `SOLUONG`=($value[SOLUONG]+$currentProduct[SOLUONG]) WHERE `MASP`='$value[MASP]';";
            }
            if(mysqli_multi_query($this->conn,$qry)){
                return true;
            }
            return false;
        }
        //Xoa san pham
        function disableProductStatus($idProduct,$status = false){
            
        }
        //Cap nhat so luong san pham
        function updateNumberOfProduct($productId,$number){
            
        }

        function uploadImage($data){
            
            $directory="./public/image/";
            //return $data;
            if(move_uploaded_file($data['tmp_name'],$directory.date("dmY_his").$data['name'])){
                return true;
            }
            return false;
        }
    }
?>