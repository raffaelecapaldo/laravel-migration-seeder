<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Train;




class HomeController extends Controller
{
    public function index() {
        $todayDate = Carbon::today()->format('Y-m-d');//Per fare il confronto nel db
        Carbon::setLocale('it'); //Per mostrare la data in pagina
        $data = [
            'today' => Carbon::today()->isoFormat('D MMMM YYYY'),
             'todayTrains' => Train::where('date_of_departure', 'Like', $todayDate.'%')->get()
        ];
        dd($data['todayTrains']);
        return view('home', $data);
    }
}
