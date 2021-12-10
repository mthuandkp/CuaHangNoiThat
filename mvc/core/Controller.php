<?php
    class Controller{
        public function getModel($model){
            require_once('./mvc/model/'.$model.'.php');
            return new $model;
        }

        public function View($view,$title = 'title',$data=array()){
            //require_once('./menuadmin.php');
            require_once('./mvc/view/'.$view.'.php');
        }
    }
?>