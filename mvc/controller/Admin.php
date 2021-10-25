<?php
    class Admin extends Controller{
        function __construct()
        {
            include_once('./menuadmin.php');
        }
        function display(){
            $this->View('AdminTrangChu','Trang Chủ');
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
            $this->View('AdminSanPham','Admin San Pham');
        }
        function ThemSanPham(){
            $this->View('AdminThemSanPham','Admin Thêm Sản Phẩm');
        }
        function TimKiemSanPham(){
            $this->View('AdminTimKiemSanPham','Admin Tìm Kiếm Sản Phẩm');
        }
        function SuaSanPham(){
            $this->View('AdminSuaSanPham','Admin Sửa Sản Phẩm');
        }

        function ThongKe(){
            $this->View('AdminThongKe');
        }
        function DangNhap(){
            $this->View('DangNhap');
        }
    }

?>