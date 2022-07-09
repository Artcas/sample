<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function calculateTotals($installments)
    {
        $totalUSD = 0;
        $totalCAD = 0;
        $totalAUD = 0;
        $totalEUR = 0;

        $currency = [
            'USD',
            'CAD',
            'AUD',
            'EUR'
        ];

        switch ($currency) {
            case 'USD':
                $totalPrice = DB::select( DB::raw("SELECT COUNT(id) as id,SUM(price) as price FROM installments WHERE currency = 'USD'"));
                $totalUSD = $totalPrice->price;
            break;
            case 'CAD' :
                $totalPrice = DB::select( DB::raw("SELECT COUNT(id) ![](C:/Users/artyp/AppData/Local/Temp/vue.png)as id,SUM(price) as price FROM installments WHERE currency = 'CAD'"));
                $totalUSD = $totalPrice->price;
            break;
            case 'AUD' :
                $totalPrice = DB::select( DB::raw("SELECT COUNT(id) as id,SUM(price) as price FROM installments WHERE currency = 'AUD'"));
                $totalUSD = $totalPrice->price;
            break;
            case 'EUR' :
                $totalPrice = DB::select( DB::raw("SELECT COUNT(id) as id,SUM(price) as price FROM installments WHERE currency = 'EUR'"));
                $totalUSD = $totalPrice->price;
            break;

        }
        return [
            $totalUSD,
            $totalCAD,
            $totalAUD,
            $totalEUR,
        ];
    }
}
