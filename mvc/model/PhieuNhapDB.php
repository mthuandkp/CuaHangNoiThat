<?php
    //Model
    class PhieuNhapDB extends ConnectionDB{
        //Lay phieu nhap
        function getReceiptById($receiptId){
            $query = "SELECT * FROM phieunhap WHERE MAPN = '".$receiptId."'";
            $rs=mysqli_query($this->conn,$query);
            $data[]=mysqli_fetch_array($rs);
            return $data;
        }
        //Lay chi tiet phieu nhap
        function getReceiptDetailById($receiptId){
            $query="SELECT * FROM ct_phieunhap WHERE MAPH = '".$receiptId."'";
            $rs=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_array($rs))
            {
                $data[]=$row;
            }
            return $data;

        }
        //Lay tat ca phieunhap
        function getAllReceipt(){
            $query = "SELECT * FROM phieunhap";
            $rs=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_array($rs))
            {
                $data[]=$row;
            }
            return $data;
        }
        //Tao maphieunhap tiep theo
        function createNextReceiptId($receipt){
            $query1="INSERT INTO `phieunhap` (`MAPN`, `MANV`, `MANCC`, `NGAYLAP`, `GIOLAP`, `TONG`) VALUES
             ('$receipt[0]', '$receipt[1]', '$receipt[2]', '$receipt[3]', '$receipt[4]', '$receipt[5]')";
          $rs1=mysqli_query($this->conn,$query1);
          return $rs1;

        }
        //Lay phieunhap theo nhanvien
        function getBilByStaffId($staffId){
            $query="SELECT * FROM phieunhap WHERE MANV = '".$staffId."'";
            $rs=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_array($rs))
            {
                $data[]=$row;
            }
            return $data;

        }
        //Lay phieunhap theo nhacungcap
        function getBilBySupplierId($supplierId){
            $query="SELECT * FROM phieunhap WHERE MANCC = '".$supplierId."'";
            $rs=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_array($rs))
            {
                $data[]=$row;
            }
            return $data;
        }
        //Tinh Tong tien trong chitietphieunhap
        function getPriceInReceiptDetail($detailId){
            $query="SELECT SUM(GIA) FROM `ct_phieunhap` WHERE MAPH = '".$detailId."'";
            $rs=mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_array($rs))
            {
                $data[0]=$row;
            }
            
            return $data[0];
        }
        //Them phieunhap
        function AddReceiptAndDetail($receipt,$detail){
            $query1="INSERT INTO `phieunhap` (`MAPN`, `MANV`, `MANCC`, `NGAYLAP`, `GIOLAP`, `TONG`) VALUES
            ('$receipt[0]', '$receipt[1]', '$receipt[2]', '$receipt[3]', '$receipt[4]', '$receipt[5]')";
          $rs1=mysqli_query($this->conn,$query1);

          $n=sizeof($detail);
          $k=$n/4;
          for($i=0 ; $i<$k;$i++)
                {
      
                  if($i==0){
                      $m=0;
                  
                      $query2="INSERT INTO `ct_phieunhap` (`MAPH`, `MASP`, `SOLUONG`, `GIA`) 
                      VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                      $rs2=mysqli_query($this->conn,$query2);
                   }
                   if($i==1)
                  {
                      $m=4;                  
                      $query2="INSERT INTO `ct_phieunhap` (`MAPH`, `MASP`, `SOLUONG`, `GIA`) 
                      VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                      $rs2=mysqli_query($this->conn,$query2);
                  }
                  if($i==2)
                  {
                      $m=8;
                      $query2="INSERT INTO `ct_phieunhap` (`MAPH`, `MASP`, `SOLUONG`, `GIA`) 
                      VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                  $rs2=mysqli_query($this->conn,$query2);
                  }
                  if($i==3)
                  {
                      $m=12;
                      $query2="INSERT INTO `ct_phieunhap` (`MAPH`, `MASP`, `SOLUONG`, `GIA`) 
                      VALUES ('".$detail[$m]."', '".$detail[$m + 1]."', '".$detail[$m+2]."', '".$detail[$m+3]."')";
                      $rs2=mysqli_query($this->conn,$query2);
                  }
                    
                }	

           $kq1 = ($rs1) ? "Thêm hóa đơn thành công!!" : "Thêm hóa đơn thất bại";
           $kq2= ($rs2) ? "Thêm chi tiết hóa đơn thành công với mã hóa đơn là $receipt[0]" : "Thêm chi tiết hóa đơn thất bại";
           return $kq1 ." & ". $kq2;
        }
    }
?>