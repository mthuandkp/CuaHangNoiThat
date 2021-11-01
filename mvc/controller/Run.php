<?php
//http://127.0.0.1/CuaHangNoiThat/Run
class Run extends Controller
{
    function display()
    {
        //model cần chạy
        $obj = $this->getModel('PhieuNhapDB');

        $data = array(
            array('MASP' => 'SP01', 'TENSP' => 'Sản Phẩm 1', 'MALOAI' => 'LSP01', 'GIA' => 25000, 'SOLUONG' => 100, 'HINHANH' => 'Empty.jpg', 'TRANGTHAI' => true, 'PHANTRAMGIAM' => 9),
            array('MASP' => 'SP02', 'TENSP' => 'Sản Phẩm 2', 'MALOAI' => 'LSP01', 'GIA' => 55000, 'SOLUONG' => 10, 'HINHANH' => 'Empty.jpg', 'TRANGTHAI' => true, 'PHANTRAMGIAM' => 20)
        );
        echo '<pre>';
        print_r($obj->readExcel());
    }
}
?>
