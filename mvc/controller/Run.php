<?php
    //http://127.0.0.1/CuaHangNoiThat/Run
    class Run extends Controller{
        function display(){
            //model cần chạy
            $obj = $this->getModel('HoaDonDB');
            $objSale = $this->getModel("KhuyenMaiDB");
            
            $rs = $obj->getBillByCusId("KH01");
            foreach($rs as $key=>$value){
                $sumBill = 0;
                foreach($obj->getBillDetailById($value['MAHD']) as $subvalue){
                    $sumBill += $subvalue['GIA']*$subvalue['SOLUONG']*(1-$subvalue['PHANTRAMGIAM']/100);
                }

                $saleId = $value['MAKM'];
                
                $sale = $objSale->getSaleById($saleId);
                $rs[$key]['LAST_PRICE'] = (1-$sale['PHANTRAMGIAM']/100)*$sumBill;
                
            }
            echo '<pre>';
            print_r($rs);
        }
    }
?>
