<?php
//Model
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PhieuNhapDB extends ConnectionDB
{
    //Lay phieu nhap
    function getReceiptById($receiptId)
    {
        $query = "SELECT * FROM phieunhap WHERE MAPN = '" . $receiptId . "'";
        $rs = mysqli_query($this->conn, $query);
        $data[] = mysqli_fetch_assoc($rs);
        return $data;
    }
    //Lay chi tiet phieu nhap
    function getReceiptDetailById($receiptId)
    {
        $query = "SELECT * FROM ct_phieunhap WHERE MAPH = '" . $receiptId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Lay tat ca phieunhap
    function getAllReceipt()
    {
        $data = array();
        $query = "SELECT * FROM phieunhap";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Tao maphieunhap tiep theo
    function createNextReceiptId()
    {
        $data = $this->getAllReceipt();

        $lastItem = empty($data) ? array() : end($data);
        if (empty($lastItem)) {
            return 'PN01';
        } else {
            $lastId = $lastItem['MAPN'];
            $nextIdCount = (int)substr($lastId, 2) + 1;
            while (strlen($nextIdCount) < 2) {
                $nextIdCount = '0' . $nextIdCount;
            }
            return 'PN' . $nextIdCount;
        }
    }
    //Lay phieunhap theo nhanvien
    function getBilByStaffId($staffId)
    {
        $query = "SELECT * FROM phieunhap WHERE MANV = '" . $staffId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Lay phieunhap theo nhacungcap
    function getBilBySupplierId($supplierId)
    {
        $query = "SELECT * FROM phieunhap WHERE MANCC = '" . $supplierId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }
    //Tinh Tong tien trong chitietphieunhap
    function getPriceInReceiptDetail($detailId)
    {
        $query = "SELECT SUM(GIA) FROM `ct_phieunhap` WHERE MAPH = '" . $detailId . "'";
        $rs = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[0] = $row;
        }

        return $data[0];
    }
    //Them phieunhap
    function AddReceiptAndDetail($receipt, $detail)
    {
        $qry = "INSERT INTO `phieunhap`(`MAPN`, `MANV`, `MANCC`, `NGAYLAP`, `GIOLAP`, `TONG`) VALUES ('$receipt[MAPN]','$receipt[MANV]','$receipt[MANCC]','$receipt[NGAYLAP]','$receipt[GIOLAP]',$receipt[TONG]);";
        $rs = mysqli_query($this->conn, $qry);
        if (!$rs) {
            return false;
        }
        $subQry = "INSERT INTO `ct_phieunhap`(`MAPN`, `MASP`, `SOLUONG`, `GIA`) VALUES ";
        foreach ($detail as $value) {
            $subQry .= " ('$value[MAPN]','$value[MASP]',$value[SOLUONG],$value[GIA]),";
        }
        $subQry = substr($subQry, 0, strlen($subQry) - 1);
        if (mysqli_multi_query($this->conn, $subQry)) {
            return true;
        }
        return false;
    }
    function readFileAndConvertToArray($data)
    {
        $filename = date("dny_hsi") . $data['name'];
        move_uploaded_file($data['tmp_name'], './public/fileInput/' . $filename);

        $dataRs = array();
        $myfile = fopen('./public/fileInput/' . $filename, 'r');
        if (!$myfile) {
            return false;
        }
        $newItem = array();
        $count = 1;
        while ($line = fgets($myfile)) {
            $newItem[] = $line;
            $count++;
            if ($count == 7) {
                $count = 1;
                $dataRs[] = $newItem;
                $newItem = array();
            }
        }
        $dataRs[] = $newItem;

        fseek($myfile, 0);
        fclose($myfile);

        $result = array();
        //Chuyen du lieu ve dang theo csdl
        foreach ($dataRs as $key => $value) {
            $masp = isset($value[0]) ? $this->removeSpace($value[0]) : "";
            $tensp = isset($value[1]) ? $this->removeSpace($value[1]) : "";
            $maloai = isset($value[2]) ? $this->removeSpace($value[2]) : "";
            $gia = isset($value[3]) ? $this->removeSpace($value[3]) : "";
            $soluong = isset($value[4]) ? $this->removeSpace($value[4]) : "";
            $hinhanh = isset($value[5]) ? $this->removeSpace($value[5]) : "";

            $result[] = array(
                'MASP' => $masp,
                'TENSP' => $tensp,
                'MALOAI' => $maloai,
                'GIA' => $gia,
                'SOLUONG' => $soluong,
                'HINHANH' => $hinhanh,
            );
        }

        return $result;
    }

    function removeSpace($input)
    {
        return trim(preg_replace('/\s+/', ' ', $input));
    }

    function readExcel($data=array()){
        //Upload file to server
        $filename = date("dny_hsi") . $data['name'];
        move_uploaded_file($data['tmp_name'], './public/fileInput/' . $filename);

        //create directly an object instance of the IOFactory class, and load the xlsx file
        $fxls = './public/fileInput/'.$filename;
        $spreadsheet = IOFactory::load($fxls);
        //read excel data and store it into an array
        $xls_data = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        //Format to Receipt Array
        array_shift($xls_data);
        array_filter($xls_data);

        $data = array();
        foreach($xls_data as $value){
            $data[] = array(
                'MASP'=>$value['A'],
                'TENSP'=>$value['B'],
                'MALOAI'=>$value['C'],
                'GIA'=>$value['D'],
                'SOLUONG'=>$value['E'],
                'HINHANH'=>$value['F']
            );
        }

       return $data;
    }
}
