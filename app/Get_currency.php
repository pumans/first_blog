<?php


namespace App;


class Get_currency
{
public function get_currency(){
    $currency = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5', true);
    $currency = json_decode($currency, true);
    foreach ($currency as $current){
        echo '<p>'. $current['ccy'] . ' - ' . $current['buy'] . ' - ' . $current['sale'] .'</p>';
    }
}
}
