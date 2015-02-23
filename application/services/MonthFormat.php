<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 23/02/2015
 * Time: 08:48 AM
 */

class Application_Service_MonthFormat {

    public function changeMonthFormat($month)
    {
        switch ($month) {
            case "Enero":
                $month = "1";
                break;
            case "Febrero":
                $month = "2";
                break;
            case "Marzo":
                $month = "3";
                break;
            case 'Abril':
                $month = "4";
                break;
            case 'Mayo':
                $month = "5";
                break;
            case 'Junio':
                $month = "6";
                break;
            case 'Julio':
                $month = "7";
                break;
            case 'Agosto':
                $month = "8";
                break;
            case 'Septiembre':
                $month = "9";
                break;
            case 'Octubre':
                $month = "10";
                break;
            case 'Noviembre':
                $month = "11";
                break;
            case 'Diciembre':
                $month = "12";
                break;
        }
        return $month;
    }

}