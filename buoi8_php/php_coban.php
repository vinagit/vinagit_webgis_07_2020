<?php
    /* echo 'Xin chào, đây là PHP';
    echo '<br>';
    echo 1234;
    echo '<script>alert("hahahaah");</script>'; */

    $num1=3;

    // Cấu trúc điều khiển
    if(3<$num1){
        echo '3<'.$num1;
    }elseif($num1==3){
        echo '3='.$num1;
    }else{
        echo $num1.'<3';
    }

    echo '<hr>';
    // Vòng lặp
    $i=0;
    for($i;$i<=10;$i++){
        echo $i.'<br>';
        // echo '<br>';
    }

    $arr=['Cam','Xoài','Mít','Ổi',1,2,3];
    echo $arr[2];
    echo count($arr);

    for($j=0;$j<count($arr);$j++){
        echo $arr[$j].'<br>';
    }

    // Hàm - function
    function tinh_tong($num1,$num2){
        echo $num1+$num2;
    }

    function tinh_tong_v2($num1,$num2){
        return $num1+$num2;
    }

    function tinh_chuvi($dai,$rong){
        // $chuvi=($dai+$rong)*2;
        $chuvi=tinh_tong_v2($dai,$rong)*2;
        echo $chuvi;
    }

    // tinh_chuvi(4,6);

    echo tinh_tong_v2(2,3)-4;



?>