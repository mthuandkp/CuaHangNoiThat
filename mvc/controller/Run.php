<?php
    class Run extends Controller{
        function display(){
            $obj = $this->getModel('HoaDon');
            $data = $obj->getBillById('1');

            print_r($data);
        }
    }
?>