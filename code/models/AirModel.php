<?php


namespace models;

use base\DataBase;
use base\Inquiries;

class AirModel extends DataBase
{
    public function registPassenger($params) {

        $regist = [];

        foreach($params as $key => $param) {
            $regist['id'] = 'NULL';
            $regist['firstName'] = $params['firstName'];
            $regist['lastName'] = $params['lastName'];
            $regist['middleName'] = $params['middleName'];
            $regist['fullName'] = $params['firstName'] . ' ' . $params['lastName'] . ' ' . $params['middleName'];
            $regist['phone'] = $params['phone'];
            $regist['mail'] = $params['mail'];

        }

        if(!empty($regist)) {
            $this->add($regist, 'passenger');
        }


    }

    public function bookedTicket($params) {

        $booked = [];

        foreach($params as $param) {
            $booked['id'] = 'NULL';
            $booked['passenger'] = $param['passenger'];
            $booked['place'] = $param['place'];
            $booked['flight'] = $param['flight'];
            $booked['dateBooked'] = $param['dateBooked'];
            $booked['status'] = 1;
        }

        if(!empty($booked)) {
            $this->add($booked, 'ticket');
        }

    }

    public static function getPlaces()
    {
        $table = '';
        $rows = 6;
        $cols = 28;
        $i = 0;
        $table .= '<table border="1" class="places">';
        for ($tr = 1; $tr <= $rows; $tr++ ) {
            $table .= '<tr>';
            for ($td = 1; $td <= $cols; $td++ ) {
                $i++;
                $place =  $tr < 4 ? 'R-' : 'L-';
                if (($tr == 3 || $tr == 4) && $td < 9) {
                    $place = '';
                } else {
                    $place .=  $i;
                    $place .= $td < 9 ? '-B' : '-E';
                }
                $table .= '<td><span title="" data-placement="top" data-toggle="tooltip" class="plc-itm" id="' . $place .'">'. $place . '</span></td>';
            }
            $table .= '</tr>';
        }
        $table .= '</table>';
        return $table;
    }
}