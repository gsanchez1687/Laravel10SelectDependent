<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Select Dependientes</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #2d3748;
            color: #edf2f7;
        }
        .select2-container{
          color:#2d3748;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <fieldset>
                    <legend>Paises</legend>

                    <div class="mb-3 row">
                        <label for="countries" class="col-sm-2 col-form-label">Paises</label>
                        <div class="col-sm-10">
                            <select onchange="loadCities(this)" class="form-control js-example-basic-single js-example-responsive" name="countries" id="countries">
                                <option value="">Selecione un pais..</option>
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="cities" class="col-sm-2 col-form-label">Ciudades</label>
                        <div class="col-sm-10">
                            <select onchange="loadmunicipalities(this)" class="form-control js-example-basic-single" name="cities" id="cities">
                                <option value="">Selecione una ciudad..</option>
                                @foreach ($cities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="municipalities" class="col-sm-2 col-form-label">Municipios</label>
                        <div class="col-sm-10">
                            <select class="form-control js-example-basic-single" name="municipalities" id="municipalities">
                                <option value="">Selecione un municipio..</option>
                                @foreach ($municipalities as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col">
                Column
            </div>
            <div class="col">
                Column
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        function loadCities(selectCountries) {
            let countryId = selectCountries.value;
            fetch('/api/country/city/' + countryId).then(function(response) {
                return response.json();
            }).then(function(data) {
                let cities = document.getElementById('cities');
                cities.innerHTML = '';
                buildCitiesSelect(data);
            })
        }

        function buildCitiesSelect(data) {
            let cities = document.getElementById('cities');
            data.forEach(function(city) {
                let option = document.createElement('option');
                option.value = city.id;
                option.innerHTML = city.name;
                cities.append(option);
                loadmunicipalities(cities)

            })
        }

        function loadmunicipalities(selectCities) {
            let cityId = selectCities.value;
            fetch('/api/city/municipality/' + cityId).then(function(response) {
                return response.json();
            }).then(function(data) {
                let municipalities = document.getElementById('municipalities');
                municipalities.innerHTML = '';
                buildmunicipalitiesSelect(data);
            })
        }

        function buildmunicipalitiesSelect(data) {
            let municipalities = document.getElementById('municipalities');
            data.forEach(function(municipality) {
                let option = document.createElement('option');
                option.value = municipality.id;
                option.innerHTML = municipality.name;
                municipalities.append(option);

            })
        }
    </script>
</body>

</html>
