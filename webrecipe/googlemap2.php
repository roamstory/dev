
<?php
$img = '../upload/photo/2320.JPG';
$exif = exif_read_data($img, 'IFD0');

$exif = exif_read_data($img, 0, true);
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
    }
}
alert("aaa");
if ($exif) {
    $gps_lat = null;
    $gps_lon = null;
    $gps_ele = null;
    if ($exif["GPS"]) { //GPS 정보가 있다면
        if ($exif["GPS"]["GPSLatitude"] && $exif["GPS"]["GPSLongitude"]) { //위경도 좌표가 있다면
            list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][0], "%d/%d"); //문자->숫자로 계산
            $gps_lat_d = $temp_d1/$temp_d2;
            list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][1], "%d/%d");
            $gps_lat_m = $temp_d1/$temp_d2;
            list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLatitude"][2], "%d/%d");
            $gps_lat_s = $temp_d1/$temp_d2;

            list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][0], "%d/%d"); //문자->숫자로 계산
            $gps_lon_d = $temp_d1/$temp_d2;
            list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][1], "%d/%d");
            $gps_lon_m = $temp_d1/$temp_d2;
            list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSLongitude"][2], "%d/%d");
            $gps_lon_s = $temp_d1/$temp_d2;

            $gps_lat = $gps_lat_d+$gps_lat_m/60+$gps_lat_s/3600; //도분초를 도로 변환
            $gps_lon = $gps_lon_d+$gps_lon_m/60+$gps_lon_s/3600;

            list($temp_d1, $temp_d2) = sscanf($exif["GPS"]["GPSAltitude"], "%d/%d"); //문자->숫자로 계산
            $gps_ele = $temp_d1/$temp_d2;

        }
    }
}
?>
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<body>

<div id="map" style="width:100%;height:500px"></div>

<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(<?=$gps_lat?>,<?=$gps_lon?>);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 16};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);

        // Zoom to 9 when clicking on marker
        google.maps.event.addListener(marker,'click',function() {
            map.setZoom(9);
            map.setCenter(marker.getPosition());
        });
    }

    $( document ).ready(function() {
        console.log( "ready!" );
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'https://maps.googleapis.com/maps/api/geocode/json',
            data: {latlng:'49.077044444444,2.1925833333333', key:'AIzaSyBHdQCz8Ua7kIu3pLOp_31SzRIoCn94D-U'},
            success: function (data) {
                console.log(data('formatted_address'));

            },
            error: function (request, status, error) {
                console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
            }
        });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyC-YYC_h4IKPd76Ixrc19G4xO1r61mCtw4"></script>

</body>
</html>
