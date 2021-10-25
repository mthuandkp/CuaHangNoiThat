<?php
    //http://127.0.0.1/CuaHangNoiThat/Run
    class Run extends Controller{
        function display(){
            //model cần chạy
            $obj = $this->getModel('QuyenDB');
            //Hàm cần chạy 
            $data = $obj->getAllRight();

            print_r($data);
        }
    }
?>