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

        $cities = [
            'Roma Centrale',
            'Milano Centrale',
            'Napoli Centrale',
            'Ostia',
            'Palermo',
            'Parma',
            'Taranto',
            'Firenze',
            'Genova'
        ];

        $agency = [
            'Italo',
            'Trenitalia'
        ];

        $faker = \Faker\Factory::create();//Gestione migliore delle date con Faker
        for ($i = 0; $i < 100; $i++) {
            $fakedate = $faker->dateTimeBetween('-10 days', '+15 days')->format('Y-m-d H:i:s');
            $randIndAgency = array_rand($agency);
            $randIndCitiesA = array_rand($cities);
            $randIndCitiesB = array_rand($cities);
            while ($randIndCitiesA === $randIndCitiesB) {//Evita partenza uguale alla destinazione
                $randIndCitiesB = array_rand($cities);
            }
            $train['agency'] = $agency[$randIndAgency];
            $train['from_station'] = $cities[$randIndCitiesA];
            $train['to_station'] = $cities[$randIndCitiesB];
            $train['date_of_departure'] = $fakedate;
            $train['date_of_arrival'] = $faker->dateTimeInInterval($fakedate,"+2 hours");
            $train['on_time'] = rand(0,1);
            $train['canceled'] = rand(0,1);
            $trains[] = $train;
            }




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

    }}
