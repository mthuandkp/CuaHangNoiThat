<?php
    //http://127.0.0.1/CuaHangNoiThat/Run
    class Run extends Controller{
        function display(){
            //model cần chạy
            $obj = $this->getModel('TrangThaiDB');


            /*$bill = array('HD02','NV01','KH01','2021-10-28','07:03:02',800000,'TT01');
            $detail = array(
                array('MAHD'=>'HD02','MASP'=>'SP01','SOLUONG'=>5,'GIA'=>12000),
                array('MAHD'=>'HD02','MASP'=>'SP02','SOLUONG'=>2,'GIA'=>2000)

            );*/
            //Hàm cần chạy 
            $data = $obj->getStatusNameById('TT01');
           echo '<pre>';
           print_r($data);
        }
    }
?>