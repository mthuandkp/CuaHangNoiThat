<?php
    class KhuyenMaiDB extends ConnectionDB{
        //Lay khuyen mai
        function getSaleById($saleId){
            $qry = "SELECT * FROM `khuyenmai` WHERE `MAKM` = '$saleId';";
            return mysqli_fetch_assoc(mysqli_query($this->conn,$qry));
        }
        //Lay tat ca khuyen mai
        function getAllSales(){

        }
        //Cap nhat thong tin khuyenmai
        function updateInformationSale($sale){

        }
        //Tao ma khuyen mai tiep theo
        function createNextSaleId(){

        }
        //Them khuyen mai
        function addNewSale($sale){

        }
    }
?>