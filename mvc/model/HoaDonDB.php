<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Ho_Chi_Minh');
//Model
class HoaDonDB extends ConnectionDB
{
    //Lay hoa don
    function getBillById($billId)
    {
        $data = array();
        $query = "SELECT * FROM hoadon WHERE MaHD = '" . $billId . "'";
        $rs = mysqli_query($this->conn, $query);
        $data[] = mysqli_fetch_assoc($rs);
        return $data;
    }
    //Lay chi tiet hoa don
    function getBillDetailById($billId)
    {
        $data = array();
        $query = "SELECT * FROM ct_hoadon WHERE MAHD = '" . $billId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }

    //Lay tat ca chi tiet hoa don
    function getAllBillDetail()
    {
        $data = array();
        $query = "SELECT * FROM ct_hoadon;";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Lay tat ca hoa don
    function getAllBill()
    {
        $data = array();
        $query = "SELECT * FROM hoadon";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Tao ma hoa don tiep theo
    function createNextBillId()
    {
        $data = $this->getAllBill();
        $lastBillId = empty($data) ? 0 : end($data)['MAHD'];
        if ($lastBillId == 0) {
            return 'HD01';
        }
        $nextId = (int)substr($lastBillId, 2, 2) + 1;
        if (strlen($nextId) < 2) {
            $nextId = '0' . $nextId;
        }

        return substr($lastBillId, 0, 2) . $nextId;
    }
    //Lay hoadon theo khach hang
    function getBilByCustomerId($cusId)
    {
        $data = array();
        $query = "SELECT * FROM hoadon WHERE MaKH = '" . $cusId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Lay hoadon theo nhanvien
    function getBilByStaffId($cusId)
    {
        $data = array();
        $query = "SELECT * FROM hoadon WHERE MaNV = '" . $cusId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Tinh Tong tien trong chi tiet
    function getPriceInBillDetail($billId)
    {
        $data = 0;
        $query = "SELECT SUM(GIA) FROM `ct_hoadon` WHERE MAHD = '" . $billId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[0] = $row;
        }

        return $data[0];
    }
    //Them hoa don
    function addBillAndDetail($bill, $detail)
    {
        $query1 = "INSERT INTO `hoadon` (`MAHD`, `MANV`, `MAKH`, `NGAYLAP`, `GIOLAP`, `TONG`, `MATRANGTHAI`) 
        VALUES ('$bill[0]', '$bill[1]', '$bill[2]', '$bill[3]', '$bill[4]', '$bill[5]', '$bill[6]')";
        //$rs1 = mysqli_query($this->conn, $query1);

        $query2 = "INSERT INTO `ct_hoadon` (`MAHD`, `MASP`, `SOLUONG`, `GIA`) VALUES";
        foreach ($detail as $value) {
            $idBill = $value['MAHD'];
            $idProduct = $value['MASP'];
            $amount = $value['SOLUONG'];
            $price = $value['GIA'];
            $query2 .= "('$idBill','$idProduct',$amount,$price),";
        }
        $query2 = substr($query2, 0, strlen($query2) - 1) . ';';
        echo $query1 . '<br>';
        echo $query2;
        if (mysqli_query($this->conn, $query1) && mysqli_query($this->conn, $query2)) {
            return true;
        }
        return false;
    }

    function updateBillStatus($id)
    {
        $qry = "UPDATE `hoadon` SET `MATRANGTHAI`='TT02' WHERE `MAHD`='$id';";
        if (mysqli_query($this->conn, $qry)) {
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
            $bill = $this->getAllBill();
            $bilDetail = $this->getAllBillDetail();
            //First sheet
            $objPHPExcel = new PHPEXCEL();
            
             // Add new sheet
            $objWorkSheet = $objPHPExcel->createSheet(0); //Setting index when creating
            $objWorkSheet->setTitle("Hóa Đơn");
            $numRow = 1;

            $objWorkSheet
            ->setCellValue('A'.$numRow, 'Mã Hóa Đơn')
            ->setCellValue('B'.$numRow, 'Mã Nhân Viên')
            ->setCellValue('C'.$numRow, 'Mã Khách Hàng')
            ->setCellValue('D'.$numRow, 'Ngày Lập')
            ->setCellValue('E'.$numRow, 'Giờ Lập')
            ->setCellValue('F'.$numRow, 'Tổng Tiền')
            ->setCellValue('G'.$numRow, 'Mã Trạng Thái')
            ->setCellValue('H'.$numRow, 'Mã KM');

            foreach($bill as $value){
                ++$numRow;
                $objWorkSheet
                ->setCellValue('A'.$numRow, $value['MAHD'])
                ->setCellValue('B'.$numRow, $value['MANV'])
                ->setCellValue('C'.$numRow, $value['MAKH'])
                ->setCellValue('D'.$numRow, $value['NGAYLAP'])
                ->setCellValue('E'.$numRow, $value['GIOLAP'])
                ->setCellValue('F'.$numRow, $value['TONG'])
                ->setCellValue('G'.$numRow, $value['MATRANGTHAI'])
                ->setCellValue('H'.$numRow, $value['MAKM']);
            }

            // Add new sheet
             $objWorkSheet = $objPHPExcel->createSheet(1); //Setting index when creating
             $objWorkSheet->setTitle("CT Hóa Đơn");
             $numRow = 1;
            $objWorkSheet
            ->setCellValue('A'.$numRow, 'Mã Hóa Đơn')
            ->setCellValue('B'.$numRow, 'Mã Sản Phẩm')
            ->setCellValue('C'.$numRow, 'Số Lượng')
            ->setCellValue('D'.$numRow, 'Giá')
            ->setCellValue('E'.$numRow, 'Phần Trăm Giảm');

            foreach($bilDetail as $value){
                ++$numRow;
                $objWorkSheet
                ->setCellValue('A'.$numRow, $value['MAHD'])
                ->setCellValue('B'.$numRow, $value['MASP'])
                ->setCellValue('C'.$numRow, $value['SOLUONG'])
                ->setCellValue('D'.$numRow, $value['GIA'])
                ->setCellValue('E'.$numRow, $value['PHANTRAMGIAM']);
            }

            $objPHPExcel->setActiveSheetIndex(0);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $filename = 'Bill'.date("dmY_His").'.xlsx';
            $objWriter->save('./public/excel/'.$filename);
            $result['NAME'] = '/CuaHangNoiThat/public/excel/'.$filename;
        } catch (Exception $e) {
            $result['ERROR'] = $e->getMessage();
        }
        return $result;
    }
}
