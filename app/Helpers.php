<?php

namespace App;

class Helpers
{
    public static function invertDate ($date) 
    {
        return date('d-m-Y', strtotime($date));
    }

    public static function money ($number) 
    {
        $number = (string)$number;
        $points = floor((strlen($number)-1)/3);
        $tmp = "";
        $pos = 1;
        for($i=strlen($number)-1; $i>=0; $i--){
        $tmp = $tmp.substr($number, $i, 1);
        if($pos%3==0 && $pos!=strlen($number))
        $tmp = $tmp.".";
        $pos = $pos + 1;
        }
        $formated = "$ ".strrev($tmp);
        return $formated;
    }

    public static function classStatusColor ($code_status) {
        switch ($code_status) {
            case 'ACCREDITED_APPROVE'  : return 'ACCREDITED_APPROVE_COLOR'; break;
            case 'ACCREDITED_REJECTED' : return 'ACCREDITED_REJECTED_COLOR'; break;
            case 'ACCREDITED_REOPEN'   : return 'ACCREDITED_REOPEN_COLOR'; break;
            case 'ACCREDITED_REJECTED' : return 'ACCREDITED_REJECTED_COLOR'; break;
            case 'REQUEST_ACCREDITED'  : return 'REQUEST_ACCREDITED_COLOR'; break;
            case 'MANAGEMENT_REJECTED' : return 'MANAGEMENT_REJECTED_COLOR'; break;
            case 'MANAGEMENT_APPROVE'  : return 'MANAGEMENT_APPROVE_COLOR'; break;
            case 'REQUEST_MANAGED'     : return 'REQUEST_MANAGED_COLOR'; break;
            case 'REQUEST_REJECTED'    : return 'REQUEST_REJECTED_COLOR'; break;
            case 'REQUEST_APPROVED'    : return 'REQUEST_APPROVED_COLOR'; break;
            case 'PENDING_APPROVAL'    : return 'PENDING_APPROVAL_COLOR'; break;
        }
    }

    
}
