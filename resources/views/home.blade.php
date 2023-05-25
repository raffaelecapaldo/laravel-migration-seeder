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
            <h2 class="yellow text-center">Oggi è il {{ $today }} <span id="time"></span></h2>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Azienda</th>
                        <th scope="col">S. Partenza</th>
                        <th scope="col">S. Destinazione</th>
                        <th scope="col">Data partenza</th>
                        <th scope="col">Orario partenza</th>
                        <th scope="col">Orario arrivo</th>
                        <th scope="col">N. Treno</th>
                        <th scope="col">N. Carrozze</th>
                        <th scope="col">In orario</th>
                        <th scope="col">Cancellato</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todayTrains as $train)

                        <tr
                            class="@if ($train->canceled) text-danger
                    @else
                        yellow @endif barred">
                            <th>{{ $train->agency }}</th>
                            <th>{{ $train->from_station }}</th>
                            <th>{{ $train->to_station }}</th>
                            <th>{{ date('d - m - Y', strtotime($train->date_of_departure)) }}</th>
                            <th>{{ date('H:i', strtotime($train->date_of_departure)) }}</th>
                            <th>{{ date('H:i', strtotime($train->date_of_arrival)) }}</th>
                            <th>{{ $train->train_code }}</th>
                            <th>{{ $train->train_cars }}</th>
                            @if ($train->canceled)
                                <th class=>---</th>
                                <th class="text-uppercase">soppresso</th>
                            @else
                                @if ($train->on_time)
                                    <th class="text-success text-uppercase">in orario</th>
                                    <th class="text-uppercase text-success">no</th>
                                @else
                                    <th class="text-danger text-uppercase">in ritardo</th>
                                    <th class="text-uppercase text-success">no</th>
                                @endif
                            @endif

                        </tr>
                    @empty
                        <h2 class="text-danger text-uppercase text-center">Arrangiati, nessun treno in partenza</h2>
                    @endforelse

                </tbody>
            </table>
        </div>

    </main>

</body>

</html>
