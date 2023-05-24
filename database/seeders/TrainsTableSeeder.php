<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trains = [
            [
                'agency' => 'Italo',
                'from_station' => 'Roma Termini',
                'to_station' => 'Milano Centrale',
                'date_of_departure' => '2023-05-24 19:00:00',
                'date_of_arrival' => '2023-05-24 21:00:00',
                'on_time' => 1,
                'canceled' => 0,
            ],
            [
                'agency' => 'Italo',
                'from_station' => 'Roma Termini',
                'to_station' => 'Ostia',
                'date_of_departure' => '2023-05-24 14:00:00',
                'date_of_arrival' => '2023-05-24 16:00:00',
                'on_time' => 0,
                'canceled' => 0,
            ],
            [
                'agency' => 'Trenitalia',
                'from_station' => 'Palermo',
                'to_station' => 'Milano Centrale',
                'date_of_departure' => '2023-05-24 17:10:00',
                'date_of_arrival' => '2023-05-24 19:15:00',
                'on_time' => 1,
                'canceled' => 1,
            ],
            [
                'agency' => 'Italo',
                'from_station' => 'Milano Centrale',
                'to_station' => 'Roma Termini',
                'date_of_departure' => '2023-05-24 15:40:00',
                'date_of_arrival' => '2023-05-24 17:20:00',
                'on_time' => 1,
                'canceled' => 1,
            ],
            [
                'agency' => 'Trenitalia',
                'from_station' => 'Pisa',
                'to_station' => 'Firenze',
                'date_of_departure' => '2023-05-24 22:00:00',
                'date_of_arrival' => '2023-05-24 23:35:00',
                'on_time' => 1,
                'canceled' => 0,
            ],
            [
                'agency' => 'Trenitalia',
                'from_station' => 'Taranto',
                'to_station' => 'Bari',
                'date_of_departure' => '2023-05-27 19:00:00',
                'date_of_arrival' => '2023-05-24 21:12:00',
                'on_time' => 1,
                'canceled' => 1,
            ],
            [
                'agency' => 'Italo',
                'from_station' => 'San Giuliano Terme',
                'to_station' => 'Lucca',
                'date_of_departure' => '2023-05-30 07:00:00',
                'date_of_arrival' => '2023-05-30 07:51:00',
                'on_time' => 1,
                'canceled' => 0,
            ],
        ];


        foreach ($trains as $train) {
            $train['train_code'] = rand(6000, 9999);
            $train['train_cars'] = rand(1, 9);
            $newTrain = new Train();
            $newTrain->agency = $train['agency'];
            $newTrain->from_station = $train['from_station'];
            $newTrain->to_station = $train['to_station'];
            $newTrain->date_of_departure = $train['date_of_departure'];
            $newTrain->date_of_arrival = $train['date_of_arrival'];
            $newTrain->train_code = $train['train_code'];
            $newTrain->train_cars = $train['train_cars'];
            $newTrain->on_time = $train['on_time'];
            $newTrain->canceled = $train['canceled'];
            $newTrain->save();
        }
    }
}
