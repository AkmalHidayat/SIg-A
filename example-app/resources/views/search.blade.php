<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
        function initialize() {

            navigator.geolocation.getCurrentPosition(function(position) {
                var propertiPeta = {
                    center: new google.maps.LatLng(-0.02614424595863462, 109.34176217161615),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);


                //membuat Marker
                //Maker SMP

                @foreach ($dbKost as $items)
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng({{ $items->cordinat_x }},
                            {{ $items->cordinat_y }}),
                        map: peta
                    });
                @endforeach




                var currentPosition = new google.maps.Marker({
                    position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                    map: peta
                });

                //gugu
                var url = "https://api.tomtom.com/routing/1/calculateRoute/" + position.coords.latitude + "," +
                    position.coords.longitude +
                    ":-0.04303414854670919,109.29173352800422/json?key=SAfBqMnUwz2QldjopBAQHtrnQdXMTO7m";

                var xhr = new XMLHttpRequest();
                xhr.open("GET", url);



                xhr.onreadystatechange = function() {
                    var lineCoordinates = [];
                    if (xhr.readyState === 4) {
                        console.log(xhr.status);
                        //console.log(xhr.responseText);
                        var data = xhr.responseText;
                        var jsonResponse = JSON.parse(data);
                        var count = Object.keys(jsonResponse.routes[0].legs[0].points).length;
                        for (var i = 0; i < count; i++) {
                            lineCoordinates.push(new google.maps.LatLng(jsonResponse.routes[0].legs[0].points[i]
                                .latitude, jsonResponse.routes[0].legs[0].points[i].longitude));

                        }
                        var lineSymbol = {
                            path: 'M 0,-2 0,1',
                            strokeOpacity: 1,
                            scale: 4
                        };

                        var line = new google.maps.Polyline({
                            path: lineCoordinates,
                            strokeOpacity: 0,
                            icons: [{
                                icon: lineSymbol,
                                offset: '0',
                                repeat: '20px'
                            }],
                            map: peta
                        });
                    }
                };
                xhr.send();





            })
        }

        // event jendela di-load
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>



<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
                </ul>



                <div class="text-end">
                    <a href="/serch"><button type="button" class="btn btn-outline-light me-2">Cari</button></a>
                    <a href="/admin"> <button type="button" class="btn btn-warning">Login</button></a>

                </div>
            </div>
        </div>
    </header>

    <div class="container " style="padding-top:50px;">
        <div id="googleMap" style="width:70vw;height:500px;"></div>
    </div>

    <button onclick="getjarak()">Nya :3</button>




    <script>
        function getjarak() {
            navigator.geolocation.getCurrentPosition(function(position) {
                var x = document.getElementById("demo");
                var url = "https://api.tomtom.com/routing/1/calculateRoute/" + position.coords.latitude + "," +
                    position.coords.longitude +
                    ":-0.07175940254150072,109.37551033527046/json?key=SAfBqMnUwz2QldjopBAQHtrnQdXMTO7m";

                var xhr = new XMLHttpRequest();
                xhr.open("GET", url);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        console.log(xhr.status);
                        //console.log(xhr.responseText);
                        var data = xhr.responseText;
                        var jsonResponse = JSON.parse(data);
                        console.log(jsonResponse.routes[0].summary);
                        x.innerHTML = "Jarak " + jsonResponse.routes[0].summary.lengthInMeters;
                        var count = Object.keys(jsonResponse.routes[0].legs[0].points).length;
                        console.log(jsonResponse.routes[0].legs[0].points);
                        for (var i = 0; i < count; i++) {
                            x.innerHTML += "<br> Legs " + i + 1;
                            x.innerHTML += " lat " + jsonResponse.routes[0].legs[0].points[i].latitude;
                            x.innerHTML += " lat " + jsonResponse.routes[0].legs[0].points[i].longitude;

                        }

                    }
                };

                xhr.send();

            });
        }
    </script>

    <!-- Bootsrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
