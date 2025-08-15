<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <button onclick="getlocation()">onclick</button>
    <p id="demo"></p>
    <script>
        var x=document.getElementById('demo')
        function getlocation(){
            if (navigator.geolocation) {
                // Request current position
                navigator.geolocation.getCurrentPosition(showposition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }

        }
        function showposition(position){
            x.innerHTML='latitude'+position.coords.latitude+
            "<br> logitude:"+position.coords.longitude
        }
    </script>
</body>
</html>

