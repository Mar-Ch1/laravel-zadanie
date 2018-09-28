<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact()
    {
        $header = 'To jest nagłówek';
        $date = '20/02/2018';
        $visited = 3450;
        return view('pages.contact', compact('header','date', 'visited'));
    }
    public function about()
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://api.openweathermap.org/data/2.5/weather?q=warsaw&appid=948b7f592d453b664be5fee32eb18ac4');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER,0);
        $weather= curl_exec($curl);
        if($weather ===false){
            echo "curlerror:" . curl_error($curl);
        }
        curl_close($curl);
        $header = 'To jest nagłówek';        
        $date = '20/02/2018';
        return view('pages.about', compact('date','header','weather'));
    }    
}



