<?php
    //http://127.0.0.1/CuaHangNoiThat/Run
    class Run extends Controller{
        function display(){
            $obj = $this->getModel('HoaDon');
            $data = $obj->getBillById('1');

            print_r($data);
        }
    }
?>