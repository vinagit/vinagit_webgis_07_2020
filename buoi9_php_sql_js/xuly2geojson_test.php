<?php
include('../config.php');

$truyvan='SELECT ST_AsGeoJSON(geom) as json from duynghia_quangnam limit 1;';


if($truyvan!=''){
        $thucthi=pg_query($dbcon,$truyvan);
        while($kq=pg_fetch_assoc($thucthi)){
                echo $kq['json'];
        }
}






// Lệnh select
/* $truyvan='SELECT shbando as soto,shthua as sothua,tenchusdd as ten, diachi
FROM "duynghia_quangnam"
LIMIT 10'; */

// $truyvan='SELECT * FROM duynghia_quangnam WHERE shbando = 11 AND shthua = 2 LIMIT 50';

/* $truyvan="SELECT * FROM duynghia_quangnam WHERE diachi ILIKE '%sơn viên%' AND shthua = 2 LIMIT 50";

$thucthi=pg_query($dbcon,$truyvan);

while($kq=pg_fetch_assoc($thucthi)){
        echo '<b>Tên:</b> '.$kq['tenchusdd'].', <b>địa chỉ:</b> '.$kq['diachi'];
        echo '<br>';
} */

?>