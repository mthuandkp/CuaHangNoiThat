<?php
<<<<<<< HEAD
    //http://127.0.0.1/CuaHangNoiThat/Run
    class Run extends Controller{
        function display(){
            //model cần chạy
            $obj = $this->getModel('KhachHangDB');


            /*$bill = array('HD02','NV01','KH01','2021-10-28','07:03:02',800000,'TT01');
            $detail = array(
                array('MAHD'=>'HD02','MASP'=>'SP01','SOLUONG'=>5,'GIA'=>12000),
                array('MAHD'=>'HD02','MASP'=>'SP02','SOLUONG'=>2,'GIA'=>2000)

            );*/

            $customer = array ('KH03','Thuy', 'Thuy', '123', 'LongAn', '1234567890',1,2);
            //Hàm cần chạy 
            $data = $obj->addNewCustomer($customer);
           echo '<pre>';
           print_r($data);
        }
=======
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
        print_r($obj->getReceiptDetailById('PN01'));
>>>>>>> 1eced851db028dd743d82e39bb583ee4a409d7e9
    }
}
?>
