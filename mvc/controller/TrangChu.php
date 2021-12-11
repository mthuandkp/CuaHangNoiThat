<?php
    class TrangChu extends Controller{
        function display(){
            $this->View('TrangChu');
        }

        function Logout(){
            unset($_SESSION['account']);
            echo '<script>window.location.href="../";alert("Đăng xuất thành công");</script>';
        }
    }

?>