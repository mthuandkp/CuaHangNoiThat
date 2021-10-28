<?php

   //Model
   require_once("../core/ConnectionDB.php");
   class HoaDonDB extends ConnectionDB{
       //Lay hoa don
       function getBillById($billId){
           $query = "SELECT * FROM hoadon WHERE MaHD = '".$billId."'";
           $rs=mysqli_query($this->conn,$query);
           $data[]=mysqli_fetch_array($rs);
           return $data;
       }
       //Lay chi tiet hoa don
       function getBillDetailById($billId){
           $query="SELECT * FROM ct_hoadon WHERE MAHD = '".$billId."'";
           $rs=mysqli_query($this->conn,$query);
           while($row=mysqli_fetch_array($rs))
           {
               $data[]=$row;
           }
           return $data;

       }
       //Lay tat ca hoa don
       function getAllBill(){
           $query = "SELECT * FROM hoadon";
           $rs=mysqli_query($this->conn,$query);
           while($row=mysqli_fetch_array($rs))
           {
               $data[]=$row;
           }
           return $data;
       }
       //Tao ma hoa don tiep theo
       function createNextBillId($bill){
           $query1="INSERT INTO `hoadon` (`MAHD`, `MANV`, `MAKH`, `NGAYLAP`, `GIOLAP`, `TONG`, `MATRANGTHAI`) 
           VALUES ('$bill[0]', '$bill[1]', '$bill[2]', '$bill[3]', '$bill[4]', '$bill[5]', '$bill[6]')";
         $rs1=mysqli_query($this->conn,$query1);
         return $rs1;

       }
       //Lay hoadon theo khach hang
       function getBilByCustomerId($cusId){
           $query="SELECT * FROM hoadon WHERE MaKH = '".$cusId."'";
           $rs=mysqli_query($this->conn,$query);
           while($row=mysqli_fetch_array($rs))
           {
               $data[]=$row;
           }
           return $data;

       }
       //Lay hoadon theo nhanvien
       function getBilByStaffId($cusId){
           $query="SELECT * FROM hoadon WHERE MaNV = '".$cusId."'";
           $rs=mysqli_query($this->conn,$query);
           while($row=mysqli_fetch_array($rs))
           {
               $data[]=$row;
           }
           return $data;

       }
       //Tinh Tong tien trong chi tiet
       function getPriceInBillDetail($billId){
         $query="SELECT SUM(GIA) FROM `ct_hoadon` WHERE MAHD = '".$billId."'";
         $rs=mysqli_query($this->conn,$query);
         while($row=mysqli_fetch_array($rs))
         {
             $data[0]=$row;
         }
         
         return $data[0];

       }
       //Them hoa don
       function AddBillAndDetail($bill,$detail){
       
           $query1="INSERT INTO `hoadon` (`MAHD`, `MANV`, `MAKH`, `NGAYLAP`, `GIOLAP`, `TONG`, `MATRANGTHAI`) 
           VALUES ('$bill[0]', '$bill[1]', '$bill[2]', '$bill[3]', '$bill[4]', '$bill[5]', '$bill[6]')";
         $rs1=mysqli_query($this->conn,$query1);

         $n=sizeof($detail);
         $k=$n/4;
         for($i=0 ; $i<$k;$i++)
               {
     
                 if($i==0){
                     $m=0;
                 
                     $query2="INSERT INTO `ct_hoadon` (`MAHD`, `MASP`, `SOLUONG`, `GIA`) 
                     VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                     $rs2=mysqli_query($this->conn,$query2);
                  }
                  if($i==1)
                 {
                     $m=4;                  
                    
                     $query2="INSERT INTO `ct_hoadon` (`MAHD`, `MASP`, `SOLUONG`, `GIA`) 
                     VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                     $rs2=mysqli_query($this->conn,$query2);
                 }
                 if($i==2)
                 {
                     $m=8;
               
                     $query2="INSERT INTO `ct_hoadon` (`MAHD`, `MASP`, `SOLUONG`, `GIA`) 
                     VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                 $rs2=mysqli_query($this->conn,$query2);
                 }
                 if($i==3)
                 {
                     $m=12;
                   
                     $query2="INSERT INTO `ct_hoadon` (`MAHD`, `MASP`, `SOLUONG`, `GIA`) 
                     VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                     $rs2=mysqli_query($this->conn,$query2);
                 }
                   
               }   
  
               $kq1 = ($rs1) ? "Thêm hóa đơn thành công!!" : "Thêm hóa đơn thất bại";
               $kq2= ($rs2) ? "Thêm chi tiết hóa đơn thành công với mã hóa đơn là $bill[0]" : "Thêm chi tiết hóa đơn thất bại";
               return $kq1 ." & ". $kq2;          
       
       }
   }
?>
?>