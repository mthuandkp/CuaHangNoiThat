<?php
    //http://127.0.0.1/CuaHangNoiThat/Run
    class Run extends Controller{
        function display(){
            //model cần chạy
            $obj = $this->getModel('KhachHangDB');
            //Hàm cần chạy 
            $data = $obj->getCutomerById(1);
            print_r($data);
        }
    }
?>