<?php
    class Admin extends Controller{
        function display(){
            $this->View('AdminTrangChu');
        }
        function HoaDon(){
            $this->View('AdminHoaDon');
        }
        function KhachHang(){
            $this->View('AdminKhachHang');
        }
        function KhuyenMai(){
            $this->View('AdminKhuyenMai');
        }
        function LoaiSanPham(){
            $this->View('AdminLoaiSanPham');
        }
        function NhaCungCap(){
            $this->View('AdminNhaCungCap');
        }
        function NhanVien(){
            $this->View('AdminNhanVien');
        }
        function PhieuNhap(){
            $this->View('AdminPhieuNhap');
        }
        function SanPham(){
            $this->View('AdminSanPham');
        }
    }

?>