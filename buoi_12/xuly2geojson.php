<?php
include('config.php');

$soto=$_GET['soto1'];
$sothua=$_GET['sothua1'];

if($soto!='' and $sothua!=''){
        $truyvan="SELECT diachi,shbando,shthua,dientich,tenchusdd,mdsd, ST_AsGeoJSON( ST_Transform(geom,4326))::json as json from duynghia_quangnam WHERE shbando = ".$soto." AND shthua = ".$sothua." LIMIT 50";
        // echo $truyvan;
}elseif($soto!=''){
        $truyvan="SELECT diachi,shbando,shthua,dientich,tenchusdd,mdsd, ST_AsGeoJSON( ST_Transform(geom,4326))::json as json from duynghia_quangnam WHERE shbando = ".$soto." LIMIT 50";
        // echo $truyvan;
}elseif($sothua!=''){
        $truyvan="SELECT diachi,shbando,shthua,dientich,tenchusdd,mdsd, ST_AsGeoJSON( ST_Transform(geom,4326))::json as json from duynghia_quangnam WHERE shthua = ".$sothua." LIMIT 50";
        // echo $truyvan;
}else{
        $truyvan='';
        echo 'Bạn chưa nhập điều kiện!';
}

if($truyvan!=''){
	
		//Thực thi câu truy vấn trả về HTML
		
        /* $thucthi=pg_query($dbcon,$truyvan);
        while($kq=pg_fetch_assoc($thucthi)){
                echo '<b>Tên:</b> '.$kq['tenchusdd'].', <b>địa chỉ:</b> '.$kq['diachi'];
                echo '<br>';
        } */
		
		
		//Thực thi câu truy vấn trả về JSON
		
		$thucthi=pg_query($dbcon,$truyvan);
		/* $i=pg_num_rows($thucthi)-1; */
		$array=array();
		//Lay du lieu
		while($kq=pg_fetch_assoc($thucthi)){
			array_push($array,$kq); 
			/* array_push :php */ 
		}

		$myJSON = json_encode($array);
		echo $myJSON;
}

?>