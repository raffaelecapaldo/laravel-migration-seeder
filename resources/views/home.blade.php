<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tabellone ferroviario</title>

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body class="bg-dark">

    <main>
        <div class="container-fluid">
            <h1 class="yellow text-center">Tabellone ferroviario</h1>
            <h2 class="yellow text-center">{{$today}}</h2>
            <table class="table table-dark">
                <thead>
                    <tr>
                      <th scope="col">Azienda</th>
                      <th scope="col">S. Partenza</th>
                      <th scope="col">S. Destinazione</th>
                      <th scope="col">Orario partenza</th>
                      <th scope="col">Orario arrivo</th>
                      <th scope="col">N. Treno</th>
                      <th scope="col">N. Carrozze</th>
                      <th scope="col">In orario</th>
                      <th scope="col">Cancellato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todayTrains as $train)
                    <tr class="yellow">
                        <th>{{$train->agency}}</th>
                        <th>{{$train->from_station}}</th>
                        <th>{{$train->to_station}}</th>
                        <th>{{date('H:i', strtotime($train->date_of_departure))}}</th>
                        <th>{{date('H:i', strtotime($train->date_of_arrival))}}</th>
                        <th>{{$train->train_code}}</th>
                        <th>{{$train->train_cars}}</th>
                        <th>{{$train->on_time}}</th>
                        <th>{{$train->canceled}}</th>

                    </tr>
                    @endforeach

                </tbody>
              </table>
        </div>

    </main>

</body>

</html>
