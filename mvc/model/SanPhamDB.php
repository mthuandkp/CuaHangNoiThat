<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
//Model
class SanPhamDB extends ConnectionDB
{
    //Lay sanpham
    function getProductById($productId)
    {
        $qry = "SELECT * FROM `noithat` WHERE `MASP`='$productId';";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $qry));
    }
    //Lay tat ca sanpham
    function getAllProduct($isDisable = false)
    {
        $qry = "SELECT * FROM `noithat`;";
        $data = array();
        $rs = mysqli_query($this->conn, $qry);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Tao ma sanpham tiep theo
    function createNextProductId()
    {
    }
    //Lay sanpham theo maloai
    function getProductByTypeId($typeId)
    {
    }

    //Them san pham moi
    function addNewProduct($productArr)
    {
        //('','','',,,'',true,0)
        $qry = "INSERT INTO `noithat`(`MASP`, `TENSP`, `MALOAI`, `GIA`, `SOLUONG`, `HINHANH`, `TRANGTHAI`, `PHAMTRAMGIAM`) VALUES ";
        foreach ($productArr as $value) {
            $qry .= "('$value[MASP]','$value[TENSP]','$value[MALOAI]',$value[GIA],$value[SOLUONG],'$value[HINHANH]',true,0),";
        }
        $qry = substr($qry, 0, strlen($qry) - 1);
        if (mysqli_multi_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Cap nhat thong tin san pham
    function updateInformationProduct($product)
    {
        $qry = "UPDATE `noithat` SET `TENSP`='$product[TENSP]',`MALOAI`='$product[MALOAI]',`GIA`=$product[GIA],`SOLUONG`=$product[SOLUONG],`HINHANH`='$product[HINHANH]',`PHANTRAMGIAM`=$product[PHANTRAMGIAM] WHERE `MASP`='$product[MASP]';";

        if (mysqli_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Cap nhat so luong san pham
    function updateNumberListProduct($productArr)
    {
        $qry = "";

        foreach ($productArr as $value) {
            $currentProduct = $this->getProductById($value['MASP']);
            $qry .= "UPDATE `noithat` SET `SOLUONG`=($value[SOLUONG]+$currentProduct[SOLUONG]) WHERE `MASP`='$value[MASP]';";
        }
        if (mysqli_multi_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Xoa san pham
    function disableProductStatus($idProduct)
    {
        $qry = "UPDATE `noithat` SET `TRANGTHAI`=false WHERE `MASP` = '$idProduct';";
        if (mysqli_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Cap nhat so luong san pham
    function updateNumberOfProduct($productId, $number)
    {
    }

    function uploadImage($data, $time)
    {
        $directory = "./public/image/";
        //return $data;
        if (move_uploaded_file($data['tmp_name'], $directory . $time . $data['name'])) {
            return true;
        }
        return false;
    }

    function exportExcel()
    {
        $result = array();
        $result['NAME'] = '';
        $result['ERROR'] = 0;

        try {
            //Data
            $data = $this->getAllProduct();
            //First sheet
            $objPHPExcel = new Spreadsheet();
            $drawing = new Drawing();

            // Add new sheet
            $objWorkSheet = $objPHPExcel->createSheet(0); //Setting index when creating
            $objWorkSheet->setTitle("Sản Phẩm");
            $numRow = 1;


            // $drawing->setPath('images/Yashika.jpg'); /* put your path and image here */
            // $drawing->setCoordinates('A1');
            // $drawing->setOffsetX(110);
            // $drawing->setRotation(25);
            // $drawing->getShadow()->setVisible(true);
            // $drawing->getShadow()->setDirection(45);
            // $drawing->setWorksheet($spreadsheet->getActiveSheet());

            $objWorkSheet
                ->setCellValue('A' . $numRow, 'Mã Sản Phẩm')
                ->setCellValue('B' . $numRow, 'Tên Sản Phẩm')
                ->setCellValue('C' . $numRow, 'Mã Loại')
                ->setCellValue('D' . $numRow, 'Giá')
                ->setCellValue('E' . $numRow, 'Số Lượng')
                ->setCellValue('F' . $numRow, 'Trạng Thái')
                ->setCellValue('G' . $numRow, '% Giảm');

            foreach ($data as $value) {
                ++$numRow;
                $objWorkSheet
                    ->setCellValue('A' . $numRow, $value['MASP'])
                    ->setCellValue('B' . $numRow, $value['TENSP'])
                    ->setCellValue('C' . $numRow, $value['MALOAI'])
                    ->setCellValue('D' . $numRow, $value['GIA'])
                    ->setCellValue('E' . $numRow, $value['SOLUONG'])
                    ->setCellValue('F' . $numRow, ($value['TRANGTHAI'] == 1 ? " Còn Bán" : "Đã Xóa"))
                    ->setCellValue('G' . $numRow, $value['PHANTRAMGIAM']." %");  
            }
            
            $objPHPExcel->setActiveSheetIndex(0);
            $objWriter = new Xlsx($objPHPExcel);
            $filename = 'Product' . date("dmY_His") . '.xlsx';
            $objWriter->save('./public/excel/' . $filename);
            $result['NAME'] = '/CuaHangNoiThat/public/excel/' . $filename;
        } catch (Exception $e) {
            $result['ERROR'] = $e->getMessage();
        }
        return $result;
    }
}
