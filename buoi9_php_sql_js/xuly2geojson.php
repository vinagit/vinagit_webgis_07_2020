<?php
include('../config.php');

$soto=$_GET['soto'];
$sothua=$_GET['sothua'];

if($soto!='' and $sothua!=''){
        $truyvan="SELECT diachi,soto,sothua,dientich,tenchusdd,mdsd, ST_AsGeoJSON( ST_Transform(geom,4326))::json as json from duynghia_quangnam WHERE soto = ".$soto." AND sothua = ".$sothua." LIMIT 50";
        // echo $truyvan;
}elseif($soto!=''){
        $truyvan="SELECT diachi,soto,sothua,dientich,tenchusdd,mdsd, ST_AsGeoJSON( ST_Transform(geom,4326))::json as json from duynghia_quangnam WHERE soto = ".$soto." LIMIT 50";
        // echo $truyvan;
}elseif($sothua!=''){
        $truyvan="SELECT diachi,soto,sothua,dientich,tenchusdd,mdsd, ST_AsGeoJSON( ST_Transform(geom,4326))::json as json from duynghia_quangnam WHERE sothua = ".$sothua." LIMIT 50";
        // echo $truyvan;
}else{
        $truyvan='';
        echo 'Bạn chưa nhập điều kiện!';
}

if($truyvan!=''){
        $thucthi=pg_query($dbcon,$truyvan);
        while($kq=pg_fetch_assoc($thucthi)){
                echo '<b>Tên:</b> '.$kq['tenchusdd'].', <b>địa chỉ:</b> '.$kq['diachi'];
                echo '<br>';
        }
}

?>