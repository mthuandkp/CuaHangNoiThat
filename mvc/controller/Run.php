<?php
    //http://127.0.0.1/CuaHangNoiThat/Run
    class Run extends Controller{
        function display(){
            //model cần chạy
            $obj = $this->getModel('HoaDonDB');
            $rs = $obj->createNextBillId();

            echo '<pre>';
            print_r($rs);
        }
    }
?>
