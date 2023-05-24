<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Train;




class HomeController extends Controller
{
    public function index() {
        $todayDate = Carbon::today();//Per fare il confronto nel db
        Carbon::setLocale('it'); //Per mostrare la data in pagina
        $data = [
            'today' => Carbon::today()->isoFormat('D MMMM YYYY'),
             'todayTrains' => Train::where('date_of_departure', '>', $todayDate)
             ->orderBy('date_of_departure')
             ->get()
        ];
        return view('home', $data);
    }
}
