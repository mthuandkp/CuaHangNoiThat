<?php
    class LoaiSanPhamDB extends ConnectionDB{
        //Lay loai san pham
        function getProductTypeById($typeId){
            $sql="SELECT * FROM `loaisanpham` WHERE MALOAI = '$typeId'";
            $query=mysqli_query($this->conn,$sql);
            $row = array();
            $row=mysqli_fetch_assoc($query);            
            return $row;
        }
        //Lay tat ca loai san pham
        function getAllProductType(){
            $sql="SELECT * FROM `loaisanpham`";
            $query=mysqli_query($this->conn,$sql);       
            $arr = array();
            while ($row=mysqli_fetch_assoc($query))
                array_push($arr, $row);           
            return $arr;
        }
        //Cap nhat thong tin loai san pham
        function updateInformationProductType($productType){
            $sql="UPDATE `loaisanpham` 
            SET `TENLOAI` = '$productType[1]', `MOTA` = '$productType[2]'
            WHERE `MALOAI` = '$productType[0]' LIMIT 1 ";
            $kq = mysqli_query($this->conn, $sql);
        }
        //Tao ma loai san pham tiep theo
        function createNextProductTypeId(){
            $s=1;
            $ma='lsp'.$s;
            $sql="SELECT * FROM `loaisanpham` WHERE MALOAI = '$ma'";
            $query=mysqli_query($this->conn,$sql);
            $i=mysqli_num_rows($query);
            while($i > 0){
                $s++;
                $ma='lsp'.$s;
                $sql="SELECT * FROM `loaisanpham` WHERE MALOAI = '$ma'";
                $query=mysqli_query($this->conn,$sql);
                $i=mysqli_num_rows($query);      
            }
            return $ma; 
        }
        //Them loai san pham
        function addNewProductType($productType){
            $sql = "INSERT INTO `loaisanpham` (`MALOAI` , `TENLOAI` ,`MOTA`)
            VALUES ('$productType[0]', '$productType[1]', '$productType[2]')";
            $kq = mysqli_query($this->conn, $sql);
        }
        //Xoa
        function disableProductType($typeId,$status=false){
            $sql = "DELETE FROM `loaisanpham` WHERE MALOAI = '$typeId'";
            $kq = mysqli_query($this->conn, $sql);
            if($kq>0){
                $status=true;
            }
            return $status;
        }
    }
?>
