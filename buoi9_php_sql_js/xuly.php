<?php
include('../config.php');

$soto=$_GET['soto'];
$sothua=$_GET['sothua'];

if($soto!='' and $sothua!=''){
        $truyvan="SELECT * FROM duynghia_quangnam WHERE soto = ".$soto." AND sothua = ".$sothua." LIMIT 50";
        // echo $truyvan;
}elseif($soto!=''){
        $truyvan="SELECT * FROM duynghia_quangnam WHERE soto = ".$soto." LIMIT 50";
        // echo $truyvan;
}elseif($sothua!=''){
        $truyvan="SELECT * FROM duynghia_quangnam WHERE sothua = ".$sothua." LIMIT 50";
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