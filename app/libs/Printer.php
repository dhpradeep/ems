<?php
class Printer {
    public static function print_to_excel($data){
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $data;
    }
}
?>