<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "conf2.php";
define('DB_SERVER', "localhost");
define('DB_USER', $admin_db_user);
define('DB_PASS', $admin_db_pass);
define('DB_DATABASE', $admin_db_db);

define('HOME_DB_USER', $home_db_user);
define('HOME_DB_PASS', $home_db_pass);
define('HOME_DB_DATABASE', $home_db_db);
define('TABLE_SIM', "sim");

define('thisdomain','http://'.$_SERVER["HTTP_HOST"]);
$mang['VietTel']="AND (LEFT(`sim2`,3) IN ('097','098','096') || LEFT(`sim2`,4) IN ('0162', '0163','0164', '0165', '0166', '0167', '0168', '0169'))";
$mang['MobiFone']="AND (LEFT(`sim2`,3) IN ('090','093') || LEFT(`sim2`,4) IN ('0120', '0121', '0122', '0126', '0128'))";
$mang['VinaPhone']="AND (LEFT(`sim2`,3) IN ('091','094') || LEFT(`sim2`,4) IN ( '0123', '0124', '0125', '0127', '0129'))";
$mang['VietNamobile']="AND (LEFT(`sim2`,3) IN ('092') || LEFT(`sim2`,4) IN ('0186','0188'))";
$mang['Gmobile']="AND (LEFT(`sim2`,3) IN ('099') || LEFT(`sim2`,4) IN ('0199',''))";

$mangpos['VietTel']=1;
$mangpos['MobiFone']=2;
$mangpos['VinaPhone']=3;
$mangpos['VietNamobile']=4;
$mangpos['Gmobile']=5;


define("S1","MID(sim2,-1,1)");
define("S2","MID(sim2,-2,1)");
define("S3","MID(sim2,-3,1)");
define("S4","MID(sim2,-4,1)");
define("S5","MID(sim2,-5,1)");
define("S6","MID(sim2,-6,1)");
define("S7","MID(sim2,-7,1)");
define("S8","MID(sim2,-8,1)");
define("S9","MID(sim2,-9,1)");

define("S22","MID(sim2,-2,2)");
define("S32","MID(sim2,-3,2)");
define("S42","MID(sim2,-4,2)");
define("S52","MID(sim2,-5,2)");
define("S62","MID(sim2,-6,2)");
define("S72","MID(sim2,-7,2)");
define("S82","MID(sim2,-8,2)");
define("S92","MID(sim2,-9,2)");

define("S33","MID(sim2,-3,3)");
define("S43","MID(sim2,-4,3)");
define("S53","MID(sim2,-5,3)");
define("S63","MID(sim2,-6,3)");
define("S73","MID(sim2,-7,3)");
define("S83","MID(sim2,-8,3)");
define("S93","MID(sim2,-9,3)");

define("S44","MID(sim2,-4,4)");
define("S54","MID(sim2,-5,4)");
define("S64","MID(sim2,-6,4)");
define("S74","MID(sim2,-7,4)");
define("S84","MID(sim2,-8,4)");
define("S94","MID(sim2,-9,4)");

define("R1","RIGHT(sim2,1)");
define("R2","RIGHT(sim2,2)");
define("R3","RIGHT(sim2,3)");
define("R4","RIGHT(sim2,4)");
define("R5","RIGHT(sim2,5)");
define("R6","RIGHT(sim2,6)");
define("R7","RIGHT(sim2,7)");
define("R8","RIGHT(sim2,8)");
define("R9","RIGHT(sim2,9)");
define("R10","RIGHT(sim2,10)");
define("L1","LEFT(sim2,1)");
define("L2","LEFT(sim2,2)");
define("L3","LEFT(sim2,3)");
define("L4","LEFT(sim2,4)");
define("L5","LEFT(sim2,5)");
define("L6","LEFT(sim2,6)");
define("L7","LEFT(sim2,7)");
define("L8","LEFT(sim2,8)");
define("L9","LEFT(sim2,9)");
define("month","01,02,03,04,05,06,07,08,09,10,11,12");
define("day","01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,31,22,23,24,25,26,27,28,29,30,31");


$sub="MID(sim2";
//------------------------------------------------------------//

$sloai=array();

$loai['s']['sim-tu-quy']="Sim Tứ Quý";
$loai['s']['sim-luc-quy']="Sim Lục Quý";
$loai['s']['sim-ngu-quy']="Sim Ngũ Quý";

 $loai['s']['sim-loc-phat']="Sim Lộc Phát";
 $loai['s']['sim-than-tai']="Sim Thần Tài";
  $loai['s']['sim-ong-dia']="Sim ông địa"; //
   $loai['s']['sim-tien-don']="Sim tiến đơn";
    $loai['s']['sim-tien-doi']="Sim Tiến đôi";
    $loai['s']['sim-taxi-hai']="Sim Taxi 2"; 
     $loai['s']['sim-taxi-ba']="Sim Taxi 3"; //
    $loai['s']['sim-taxi-bon']="Sim Taxi 4"; //
     $loai['s']['sim-lap']="Sim Lặp";
     $loai['s']['sim-kep']="Sim kép";
     
      $loai['s']['sim-doi']="Sim đối";
      
      $loai['s']['sim-dao']="Sim Đảo";  //
       $loai['s']['sim-ganh']="Sim gánh";  //
       
        $loai['s']['sim-dac-biet']="Sim Đặc Biệt";
         $loai['s']['sim-nam-sinh']="Sim Năm Sinh";
          $loai['s']['dau-so-co']="Sim đầu số cổ";
          
      
$loai['s']['tam-hoa-don']="Sim tam Hoa Đơn";  //
$loai['s']['tam-hoa-kep']="Sim tam Hoa Kép"; //


$loai['s']['sim-ngay-thang-nam-sinh']="Năm sinh dd/mm/YY";  //













 
$kieu['sim-dac-biet']=R4." IN('1102','1368','4078','8910','8386','8683') || ".R6." IN('049053','151618')";
    $sloai['sim-dac-biet']['vip1']="Sim Vip";
        $kieu['vip1']="giaban >= 500";
    $sloai['sim-dac-biet']['1102']="1102-Nhất nhất không nhì";
        $kieu['1102']=array($sub.",-4,4)=1102");
    $sloai['sim-dac-biet']['1368']="1368-Sinh tài lộc phát";
        $kieu['1368']=array($sub.",-4,4)=1368");
   // $sloai['so-dac-biet']['1357']="1357";
     //   $kieu['1357']=array($sub.",-4,4)=1357");
    $sloai['sim-dac-biet']['4078']="4078-Bốn mùa không thất bát";
        $kieu['4078']=array($sub.",-4,4)=4078");
   // $sloai['so-dac-biet']['3579']="3579";
     //   $kieu['3579']=array($sub.",-4,4)=3579");
    //$sloai['so-dac-biet']['0246']="0246";
    $sloai['sim-dac-biet']['8386']="8386-Phát tài, phát lộc";
         $kieu['8386']=R4."=8386";
    $sloai['sim-dac-biet']['8683']="8683-Phát lộc, phát tài";
         $kieu['8683']=R4."=8683";

        $kieu['0246']=array($sub.",-4,4)=0246");
    $sloai['sim-dac-biet']['8910']="8910-Cao hơn người";
        $kieu['8910']=array($sub.",-4,4)=8910");
    $sloai['sim-dac-biet']['151618']="151618-Mỗi năm, mỗi lộc, mỗi phát";
        $kieu['151618']=R6."=151618";
    $sloai['sim-dac-biet']['049053']="049053-Không gặp hạn";
        $kieu['049053']=$sub.",-6,6)=049053";
// 2. Lục Quý

$kieu['sim-luc-quy']=array($sub.",-1,1) = ".$sub.",-2,1)", $sub.",-3,1) =".$sub.",-4,1)", $sub.",-2,1) = ".$sub.",-3,1)", $sub.",-4,1) = ".$sub.",-5,1)", $sub.",-5,1) = ".$sub.",-6,1)");
$dot['sim-luc-quy']="3";
/*
    $sloai["sim-luc-quy"]["000000"]="000000";
        $kieu["000000"]=R6."='000000' AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["111111"]="111111";
        $kieu["111111"]="right(sim2,6)=111111 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["222222"]="222222";
        $kieu["222222"]="right(sim2,6)=222222 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["333333"]="333333";
        $kieu["333333"]="right(sim2,6)=333333 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["444444"]="444444";
        $kieu["444444"]="right(sim2,6)=444444 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["555555"]="555555";
        $kieu["555555"]="right(sim2,6)=555555 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["666666"]="666666";
        $kieu["666666"]="right(sim2,6)=666666 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["777777"]="777777";
        $kieu["777777"]="right(sim2,6)=777777 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["888888"]="888888";
        $kieu["888888"]="right(sim2,6)=888888 AND ".S6." !=".S7."";
    $sloai["sim-luc-quy"]["999999"]="999999";
        $kieu["999999"]="right(sim2,6)=999999 AND ".S6." !=".S7."";

*/

// 3. Ngũ Quý

$kieu['sim-ngu-quy']=array($sub.",-1,1) = ".$sub.",-2,1)", $sub.",-3,1) =".$sub.",-4,1)", $sub.",-2,1) = ".$sub.",-3,1)", $sub.",-4,1) = ".$sub.",-5,1)", $sub.",-5,1) != ".$sub.",-6,1)");
$dot['sim-ngu-quy']="4,2";
/*
    $sloai["sim-ngu-quy"]["00000"]="00000";
        $kieu["00000"]="right(sim2,5)='00000' AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["11111"]="11111";
        $kieu["11111"]="right(sim2,5)=11111 AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["22222"]="22222";
        $kieu["22222"]="right(sim2,5)=22222 AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["33333"]="33333";
        $kieu["33333"]="right(sim2,5)=33333 AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["44444"]="44444";
        $kieu["44444"]="right(sim2,5)=44444 AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["55555"]="55555";
        $kieu["55555"]="right(sim2,5)=55555  AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["66666"]="66666";
        $kieu["66666"]="right(sim2,5)=66666 AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["77777"]="77777";
        $kieu["77777"]="right(sim2,5)=77777 AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["88888"]="88888";
        $kieu["88888"]="right(sim2,5)=88888 AND ".R6."!=".R5;
    $sloai["sim-ngu-quy"]["99999"]="99999";
        $kieu["99999"]="right(sim2,5)=99999 AND ".R6."!=".R5;
*/

// 4. Tứ Quý

$kieu['sim-tu-quy']=array($sub.",-1,1) = ".$sub.",-2,1)", $sub.",-3,1) =".$sub.",-4,1)", $sub.",-2,1) = ".$sub.",-3,1)", $sub.",-4,1) != ".$sub.",-5,1)");
$dot['sim-tu-quy']="5,3";

    $sloai["sim-tu-quy"]["0000"]="Tứ Quý: 0000";
        $kieu["0000"]="right(sim2,4)='0000' AND ".S4."!=".S5;
$dot["0000"]="5,3";
    $sloai["sim-tu-quy"]["1111"]="Tứ Quý: 1111";
        $kieu["1111"]="right(sim2,4)=1111 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["2222"]="Tứ Quý: 2222";
        $kieu["2222"]="right(sim2,4)=2222 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["3333"]="Tứ Quý: 3333";
        $kieu["3333"]="right(sim2,4)=3333 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["4444"]="Tứ Quý: 4444";
        $kieu["4444"]="right(sim2,4)=4444 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["5555"]="Tứ Quý: 5555";
        $kieu["5555"]="right(sim2,4)=5555 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["6666"]="Tứ Quý: 6666";
        $kieu["6666"]="right(sim2,4)=6666 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["7777"]="Tứ Quý: 7777";
        $kieu["7777"]="right(sim2,4)=7777 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["8888"]="Tứ Quý: 8888";
        $kieu["8888"]="right(sim2,4)=8888 AND ".S4."!=".S5;
    $sloai["sim-tu-quy"]["9999"]="Tứ Quý: 9999";
        $kieu["9999"]="right(sim2,4)=9999 AND ".S4."!=".S5;


// 5. Tam Hoa Đơn

$kieu['tam-hoa-don']=S1."=".S2." and ".S2."=".S3." AND ".S3."!=".S4." AND (".S6."!=".S5." || ".S6."!=".S4.")";
$dot['tam-hoa-don']="6,3";
    $sloai["tam-hoa-don"]["000"]="Tam Hoa: 000";
        $kieu["000"]="right(sim2,3)=000 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["111"]="Tam Hoa: 111";
        $kieu["111"]="right(sim2,3)=111 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["222"]="Tam Hoa: 222";
        $kieu["222"]="right(sim2,3)=222 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["333"]="Tam Hoa: 333";
        $kieu["333"]="right(sim2,3)=333 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["444"]="Tam Hoa: 444";
        $kieu["444"]="right(sim2,3)=444 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["555"]="Tam Hoa: 555";
        $kieu["555"]="right(sim2,3)=555 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["666"]="Tam Hoa: 666";
        $kieu["666"]="right(sim2,3)=666 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["777"]="Tam Hoa: 777";
        $kieu["777"]="right(sim2,3)=777 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["888"]="Tam Hoa: 888";
        $kieu["888"]="right(sim2,3)=888 AND ".S4."!=".S3;
    $sloai["tam-hoa-don"]["999"]="Tam Hoa: 999";
        $kieu["999"]="right(sim2,3)=999 AND ".S4."!=".S3;

// 6. Tam Hoa kép


$kieu['tam-hoa-kep']=array($sub.",-4,1)!=".$sub.",-3,1)",$sub.",-6,2)=".$sub.",-5,2)",$sub.",-3,2)=".$sub.",-2,2)");
$dot['tam-hoa-kep']="6,3";



// 7. Taxi lặp 2

$kieu['sim-taxi-hai']=S62."=".S42." AND ".S62."=".S22." AND ".S6."!=".S5;
$dot['sim-taxi-hai']="7,5,3";
// 8. Taxi lap 3 No Sup


$kieu['sim-taxi-ba']="(".S6."!=".S5." || ".S6."!=".S4.") AND ".S63."=".S33;
//ABC ABC
    $sloai['sim-taxi-ba']['Taxi-ABC-ABC']="Taxi dạng: ABC.ABC";
        $kieu['Taxi-ABC-ABC']=S6."!=".S5." AND ".S6."!=".S4." AND ".S5."!=".S4." AND ".S63."=".S33;
$dot['Taxi-ABC-ABC']="6,3";
//ABA ABA
    $sloai['sim-taxi-ba']['Taxi-ABA-ABA']="Taxi dạng: ABA.ABA";
        $kieu['Taxi-ABA-ABA']=S6."!=".S5." AND ".S6."=".S4." AND ".S63." = ".S33;
$dot['Taxi-ABA-ABA']="6,3";
    $sloai['sim-taxi-ba']['Taxi-AAB-AAB']="Taxi dạng: AAB.AAB";
        $kieu['Taxi-AAB-AAB']=S3." = ".S2." AND ".S2." != ".S1." AND ".S63."=".S33;
$dot['Taxi-AAB-AAB']="6,3";

//BAA BAA
    $sloai['sim-taxi-ba']['Taxi-BAA-BAA']="Taxi dạng: BAA.BAA";
        $kieu['Taxi-BAA-BAA']=S6."!=".S5." AND ".S5." = ".S4." AND ".S63." = ".S33;
$dot['Taxi-BAA-BAA']="6,3";

//AABC AABC
/*
    $sloai['sim-taxi-ba']['Taxi-AABC-AABC']="Dạng AABC.AABC";
        $kieu['Taxi-AABC-AABC']=S8."!=".S6." AND ".S8."!=".S5." AND ".S6."!=".S5." AND ".S8."=".S7." AND ".S84."=".S44;
//ABBC ABBC
    $sloai['sim-taxi-ba']['Taxi-ABBC-ABBC']="Dạng ABBC.ABBC";
        $kieu['Taxi-ABBC-ABBC']=S8."!=".S7." AND ".S8."!=".S5." AND ".S7."=".S6." AND ".S84."=".S44;
//ABCC ABCC
    $sloai['sim-taxi-ba']['Taxi-ABCC-ABCC']="Dạng ABCC.ABCC";
        $kieu['Taxi-ABCC-ABCC']=S8."!=".S7." AND ".S8."!=".S6." AND ".S6."=".S5." AND ".S84."=".S44;
//AABB AABB
    $sloai['sim-taxi-ba']['Taxi-AABB-AABB']="Dạng AABB.AABB";
        $kieu['Taxi-AABB-AABB']=S8."=".S7." AND ".S7."!=".S6." AND ".S6."=".S5." AND ".S84."=".S44;
//ABCD ABCD
    $sloai['sim-taxi-ba']['Taxi-ABCD-ABCD']="Dạng ABCD.ABCD";
        $kieu['Taxi-ABCD-ABCD']=S8."!=".S7." AND ".S8."!=".S6." AND ".S8."!=".S5." AND ".S7."!=".S6." AND ".S7."!=".S8." AND ".S5."!=".S4." AND ".S84."=".S44;
        */




// 9. Taxi lap 4 No Sup

$kieu['sim-taxi-bon']=array($sub.",-4,4)=".$sub.",-8,4)","(".$sub.",-1,1)!=".$sub.",-2,1) || ".$sub.",-1,1)!=".$sub.",-3,1) || ".$sub.",-1,1)!=".$sub.",-4,1))",$sub.",-2,2)!=".$sub.",-4,2)");
$dot['sim-taxi-bon']="1,5";
// 10. Số kép


$kieu['sim-kep']=S4."=".S3." AND ".S4."!=".S2." AND ".S2."=".S1;
$dot['sim-kep']="3,5,7";
    $sloai['sim-kep']['AA-BB']="Kép 2, dạng:    AA.BB";
        $kieu['AA-BB']=S4."=".S3." AND ".S4."!=".S2." AND ".S2."=".S1." AND ".S6."!=".S5;
$dot['AA-BB']="3,5,7";
    $sloai['sim-kep']['AA-BB-CC']="Kép 3, dạng:  AA.BB.CC";
        $kieu['AA-BB-CC']=S6."!=".S4." AND ".S6."!=".S2." AND ".S4."!=".S2." AND ".S6."=".S5." AND ".S4."=".S3." AND ".S2."=".S1;
$dot['AA-BB-CC']="3,5,7";
    $sloai['sim-kep']['AA-BB-AA']="Kép 3, dạng:  AA.BB.AA";
        $kieu['AA-BB-AA']=S6."!=".S4." AND ".S6."=".S2." AND ".S6."=".S5." AND ".S4."=".S3." AND ".S2."=".S1;
$dot['AA-BB-AA']="3,5,7";
   /* $sloai['so-kep']['AA-BB-CC-DD']="AA.BB.CC.DD";
        $kieu['AA-BB-CC-DD']=S8."!=".S6." AND ".S8."!=".S4." AND ".S8."!=".S2." AND ".S6."!=".S4." AND ".S6."!=".S2." AND ".S4."!=".S2." AND ".S8."=".S7." AND ".S6."=".S5." AND ".S4."=".S3." AND ".S2."=".S1;
    /*$sloai['so-kep']['AA-BB-AA-CC']="AA.BB.AA.CC";
        $kieu['AA-BB-AA-CC']=S82."!=".S62." AND ".S82."=".S42." AND ".S82."!=".S22." AND ".S62."!=".S22." AND ".S8."=".S7." AND ".S6."=".S5." AND ".S2."=".S1;
    /*$sloai['so-kep']['AA-BB-CC-BB']="AA.BB.CC.BB";
        $kieu['AA-BB-CC-BB']=S82."!=".S62." AND ".S82."!=".S42." AND ".S62."=".S22." AND ".S62."!=".S42." AND ".S8."=".S7." AND ".S6."=".S5." AND ".S4."=".S3;
*/

// 11. Số kép khác
/*
$loai['s']['so-kep-khac']="Số kép khác";
$kieu['so-kep-khac']="(".S1."!=".S4." AND ".S2."!=".S3.") AND (".S1."!=".S2." AND ".S42."!=".S22.") AND (".S1."-1!=".S2." AND ".S2."-1!=".S3.") AND ((".S1."=".S2." AND ".S2."!=".S3." AND ".S2."=".S4." AND ".S2."=".S5." AND ".S3."!=".S6.") || (".S1."!=".S2." AND ".S1."!=".S4." AND ".S2."!=".S4." AND ".S2."=".S3." AND ".S2."=".S5." AND ".S2."=".S6.") || (".S1."!=".S3." AND ".S3."!=".S4." AND ".S1."=".S2." AND ".S1."=".S5." AND ".S1."=".S6.") || (".S1."!=".S2." AND ".S2."=".S3." AND ".S3."!=".S5." AND ".S5."=".S6." AND ".S4."!=".S5." AND ".S3."!=".S4.") || (".S1."=".S2." AND ".S2."!=".S3." AND ".S3."!=".S4." AND ".S1."!=".S5." AND ".S5."=".S6." AND ".S4."!=".S5.") || (".S1."=".S2." AND ".S4."=".S5." AND ".S1."!=".S4." AND ".S1."!=".S3." AND ".S3."!=".S4.") || (".S1."!=".S2." AND ".S2."=".S3." AND ".S3."!=".S4." AND ".S4."=".S5.") || (".S2."!=".S3." AND ".S3."=".S4." AND ".S4."!=".S5." AND ".S5."=".S6." AND ".S1."!=".S2.") || (".S1."!=".S3." AND ".S4."=".S5." AND ".S6."=".S7." AND ".S5."!=".S6."))";
    $sloai['so-kep-khac']['kep-AAB-AAC']="Dạng kép: AAx.AAy";
        $kieu['kep-AAB-AAC']=S6."!=".S4." AND ".S6."!=".S1." AND ".S4."!=".S1." AND ".S6."=".S5." AND ".S62."=".S32;
$dot['kep-AAB-AAC']="6,3";
    $sloai['so-kep-khac']['kep-bAA-cAA']="Dạng kép: xAA.yAA";

        $kieu['kep-bAA-cAA']="MID(sim2 ,-6,1) !=MID(sim2,-5,1) and MID(sim2 ,-6,1) !=MID(sim2,-4,1) and MID(sim2 ,-6,1) !=MID(sim2,-3,1) and MID(sim2 ,-6,1) !=MID(sim2,-2,1) and MID(sim2 ,-6,1) !=MID(sim2,-1,1) and MID(sim2 ,-5,1) =MID(sim2,-4,1) and MID(sim2 ,-5,1) !=MID(sim2,-3,1) and MID(sim2 ,-5,1) =MID(sim2,-2,1) and MID(sim2 ,-5,1) =MID(sim2,-1,1) and MID(sim2 ,-4,1) !=MID(sim2,-3,1) and MID(sim2 ,-4,1) =MID(sim2,-2,1) and MID(sim2 ,-4,1) =MID(sim2,-1,1) and MID(sim2 ,-3,1) !=MID(sim2,-2,1) and MID(sim2 ,-3,1) !=MID(sim2,-1,1) and MID(sim2 ,-2,1) =MID(sim2,-1,1)";
$dot['kep-bAA-cAA']="6,3";
    $sloai['so-kep-khac']['kep-AAb-cAA']="Dạng kép: AA.xy.AA";
        $kieu['kep-AAb-cAA']=S6."!=".S4." AND ".S6."!=".S3." AND ".S4."!=".S3." AND ".S6."=".S5." AND ".S62."=".S22." AND ".S73."!=".S33;
$dot['kep-AAb-cAA']="3,5,7";
    $sloai['so-kep-khac']['kep-AAx-BBy']="Dạng kép: AAx.BBy";
        $kieu['kep-AAx-BBy']=S6."!=".S4." AND ".S6."!=".S3." AND ".S6."!=".S1." AND ".S4."!=".S3." AND ".S4."!=".S1." AND ".S3."!=".S1." AND ".S6."=".S5." AND ".S3."=".S2;
$dot['kep-AAx-BBy']="6,3";
    $sloai['so-kep-khac']['kep-xAA-yBB']="Dạng kép: xAA.yBB";
        $kieu['kep-xAA-yBB']=S6."!=".S5." AND ".S6."!=".S4." AND ".S6."!=".S3." AND ".S5."!=".S3." AND ".S5."!=".S2." AND ".S3."!=".S2." AND ".S5."=".S4." AND ".S2."=".S1;
$dot['kep-xAA-yBB']="6,3";
    $sloai['so-kep-khac']['kep--AA-BB--']="Dạng kép: *AA.BB*";
       $kieu['kep--AA-BB--']="(".S1."=".S3." AND ".S42."!=".S22.") AND (".S1."-1!=".S2." AND ".S2."-1!=".S3.") AND ((".S5."!=".S3." AND ".S5."!=".S1." AND ".S3."!=".S1." AND ".S5."=".S4." AND ".S3."=".S2.") || (".S6."!=".S4." AND ".S6."!=".S2." AND ".S4."!=".S2." AND ".S6."=".S5." AND ".S4."=".S3." AND ".S2."!=".S1.") || (".S7."!=".S5." AND ".S7."!=".S3." AND ".S5."!=".S3." AND ".S7."=".S6." AND ".S5."=".S4." AND ".S3."!=".S2."))";
*/

// 12. Số lặp



$kieu['sim-lap']=array($sub.",-1,1) = ".$sub.",-3,1)",$sub.",-2,1) = ".$sub.",-4,1)",$sub.",-1,1)!=".$sub.",-2,1)",$sub.",-4,2) != ".$sub.",-6,2)");
$dot['sim-lap']="3,5,7";
// 13. Số lặp khác
/*
$loai['s']['so-lap-khac']="Số lặp khác";
$kieu['so-lap-khac']="(".S1."=".S3." AND ".S42."!=".S22.") AND ((".S52."=".S22." AND ".S1."!=".S2." AND ".S6."!=".S3.") || (".S2."!=".S3." AND ".S32."=".S62." AND ".S1."!=".S4.") || (".S73."=".S33." AND ".S4."!=".S8." AND ".S1."!=".S2."))";

    $sloai['so-lap-khac']['cAB-dAB']="Dạng lặp: xAB.yAB";
        $kieu['cAB-dAB']="(".S1."=".S3." AND ".S42."!=".S22.") AND ((".S52."=".S22." AND ".S1."!=".S2." AND ".S6."!=".S3."))";
$dot['cAB-dAB']="3,6";
     $sloai['so-lap-khac']['ABc-ABd']="Dạng lặp: ABx.ABy";
       $kieu['ABc-ABd']="((".S1."=".S3." AND ".S42."!=".S22.") || (".S1."=".S2." AND ".S4."!=".S3.") || (".S1."!=".S2." AND ".S4."=".S3.") || (".S1."!=".S2.")) AND (".S2."!=".S3." AND ".S32."=".S62." AND ".S1."!=".S4.")";
$dot['ABc-ABd']="3,6";

     $sloai['so-lap-khac']['AcB-AdB']="Dạng lặp: AxB.AyB";
     $kieu['AcB-AdB']=S1."!=".S3." AND ".S2."!=".S5." AND ".S1."=".S4." AND ".S3."=".S6." AND ".S72."!=".S32." AND ".S2."!=".S3;
$dot['AcB-AdB']="3,6";

     $sloai['so-lap-khac']['AB-cd-AB']="Dạng lặp: AB.xy.AB";
     $kieu['AB-cd-AB']="(".S1."!=".S2." AND ".S62."=".S22." AND ".S73."!=".S33." AND ".S42."!=".S22.") AND (".S1."!=".S4." AND ".S2."!=".S3.")";
$dot['AB-cd-AB']="3,5,7";
    $sloai['so-lap-khac']['-AB-AB-']="Dạng lặp: *AB.AB*";

$kieu['-AB-AB-']="(".S42."!=".S22.") AND (".S63."!=".S33.") AND ((".S2."!=".S3." AND ".S1."!=".S4.") || (".S1."=".S2." AND ".S3."!=".S4.") || (".S1."!=".S2." AND ".S3."=".S4.") || (".S1."!=".S2." AND ".S2."!=".S3.")) AND ((".S5."!=".S4." AND ".S5."=".S3." AND ".S4."=".S2.") || (".S6."=".S4." AND ".S6."!=".S5." AND ".S5."=".S3.")) AND ((".S1."=".S2." AND ".S3."!=".S2.") || (".S1."!=".S2."))";
    $sloai['so-lap-khac']['dABC-eABC']="Dạng lặp: xABC.yABC";
        $kieu['dABC-eABC']="(".S73."=".S33." AND ".S4."!=".S8.") AND (".S1."!=".S2." AND ".S42."!=".S22.")";
$dot['dABC-eABC']="1,5";
*/
// 14.Sim dao


$kieu['sim-dao']=array($sub.",-1,1)!=".$sub.",-2,1)",$sub.",-4,1)=".$sub.",-1,1)",$sub.",-2,1)=".$sub.",-3,1)");
    $sloai['sim-dao']['sim-dao-don']="Sim đảo đơn";
        $kieu['sim-dao-don']="(".S1."=".S4." AND ".S2."=".S3." AND ".S1."!=".S2.") AND (".S8."!=".S5.") AND (".S63."!=".S33.")";
$dot['sim-dao-don']="3,5";
    $sloai['sim-dao']['sim-dao-kep']="Sim đảo kép";
        $kieu['sim-dao-kep']=S1."=".S4." AND ".S5."=".S8." AND ".S2."=".S3." AND ".S6."=".S7." AND ".S1."!=".S2." AND ".S5."!=".S6;
$dot['sim-dao-kep']="1,5";



 //15. Sim doi


 $kieu['sim-doi']="(".S6."!=".S5." AND ".S6."!=".S4." AND ".S5."!=".S4." AND ".S6."=".S1." AND ".S5."=".S2." AND ".S4."=".S3.")";
$dot['sim-doi']="6,3";
/*
 || (".S8."=".S1." AND ".S7."=".S2." AND ".S6."=".S3." AND ".S5."=".S4." AND ".S84."!=".S44.")";
*/
 // 16 .sim tien don

$kieu['sim-tien-don']="(".S1."-1 =".S2." AND ".S2." -1 =".S3." AND ".S3." -1 != ".S4.") || (".S1." -1 =".S2." AND ".S2." -1 =".S3." AND ".S3." -1 =".S4." AND ".S4." -1 !=".S5.") || (".S1." -1 =".S2." AND ".S2." -1 =".S3." AND ".S3." -1 =".S4." AND ".S4." -1 =".S5.")";
/*
$kieu['sim-tien-don']=S1." > ".S2." AND ".S2." > ".S3;
*/
  $sloai['sim-tien-don']['tien-dac-biet']="Số tiến đặc biệt";
        $kieu['tien-dac-biet']=R4." IN(1357,3579,0246,2468) || ".R5." IN(46810)";
$dot['tien-dac-biet']="3,5";

    $sloai['sim-tien-don']['3-so-cuoi']="Tiến đều 3 số cuối";
        $kieu['3-so-cuoi']=S1."-1 =".S2." AND ".S2." -1 =".S3." AND ".S3." -1 != ".S4;
$dot['3-so-cuoi']="6,3";
    $sloai['sim-tien-don']['4-so-cuoi']="Tiến đều 4 số cuối";
        $kieu['4-so-cuoi']=S1." -1 =".S2." AND ".S2." -1 =".S3." AND ".S3." -1 =".S4." AND ".S4." -1 !=".S5;
$dot['4-so-cuoi']="3,5";
     $sloai['sim-tien-don']['5-so-cuoi']="Tiến đều 5 số cuối";
        $kieu['5-so-cuoi']=S1." -1 =".S2." AND ".S2." -1 =".S3." AND ".S3." -1 =".S4." AND ".S4." -1 =".S5." AND ".S5."-1!=".S6;
$dot['5-so-cuoi']="2,4";
  $sloai['sim-tien-don']['6-so-cuoi']="Tiến đều 6 số cuối";
        $kieu['6-so-cuoi']=S1." -1 =".S2." AND ".S2." -1 =".S3." AND ".S3." -1 =".S4." AND ".S4." -1 =".S5." AND ".S5."-1=".S6;
$dot['6-so-cuoi']="3";
    $sloai['sim-tien-don']['khac']="Số tiến đơn khác";

        $kieu['khac']="(".S1." > ".S2." AND ".S2." > ".S3." AND ".S3." > ".S4.") AND ((".S1." -1!=".S2.") || (".S2." -1!=".S3.")) AND (right(sim2,4)!=1357) AND (right(sim2,4)!=3579) AND (right(sim2,4)!=0246) AND (right(sim2,4)!=2468) AND (right(sim2,4)!=1368) AND (".S73."!=".S33.")";
$dot['khac']="3,5";
// 17 .Tien doi


$kieu['sim-tien-doi']="((".S5."=".S3." AND ".S3."=".S1.") || (".S6."=".S4." AND ".S4."=".S2.")) AND (".S22." > ".S42." AND ".S42." > ".S62." AND ".S1."!=".S2.")";
$dot['sim-tien-doi']="7,5,3";

    $sloai['sim-tien-doi']['tien-deu-2-so-cuoi']="Tiến đều 2 đuôi cuối";
        $kieu['tien-deu-2-so-cuoi']="((".S4."!=".S3." AND ".S4."=".S2." AND ".S1." -1 =".S3." AND ".S3." -1!=".S5." AND ".S42."-".S62."!=1) || (".S4."!=".S3." AND ".S4."=".S2." AND ".S1." -1 =".S3." AND ".S3." -1!=".S5." AND ".S42."-".S62."!=1)) AND (".S63."!=".S33." AND ".S73."!=".S33.") AND (left(sim2,2)=09)";
$dot['tien-deu-2-so-cuoi']="3,5";

    $sloai['sim-tien-doi']['tien-deu-3-so-cuoi']="Tiến đều 3 đuôi cuối";
        $kieu['tien-deu-3-so-cuoi']=S6."!=".S5." AND (".S1." -1 =".S3." AND ".S3."-1 =".S5." AND ".S6."=".S4." AND ".S6."=".S2.") || (".S22." -1=".S42." AND ".S42."-1=".S62.") || (".S22." -10=".S42." AND ".S42."-10=".S62.")";
$dot['tien-deu-3-so-cuoi']="7,5,3";
    //$sloai['sim-tien-doi']['tien-doi-dac-biet']="Sim tiến đặc biệt";
        $kieu['tien-doi-dac-biet']="(".S22." -2 =".S42." AND ".S42." -2 =".S62.") || (".S22." -3 =".S42." AND ".S42." -3 =".S62.") || (".S22." -4 =".S42." AND ".S42." -4 =".S62.") || (".S22." -5 =".S42." AND ".S42." -5 =".S62.")";
    $sloai['sim-tien-doi']['tien-doi-khac']="Tiến đôi khác";
        $kieu['tien-doi-khac']="((".S2."=".S4." AND ".S2."=".S6." AND ".S1."-1!=".S3." AND ".S5."!=".S6.") || (".S1."=".S3." AND ".S1."=".S5." AND ".S2."-1!=".S4." AND ".S1."!=".S2.")) AND (".S22."!=".S42." AND ".S4."!=".S3." AND ".S62."!=".S22.")";
$dot['tien-doi-khac']="7,5,3";


// 18. Sim lộc phát


$kieu['sim-loc-phat']=array($sub.",-2,2) = 68 OR ".$sub.",-2,2 = 86)");

/*
$loai['s']['sim-tinh-nhan']="Sim Tình Nhân";
$kieu['sim-tinh-nhan']="simid IN(".$cache_join_id.")";
*/
// 19. Sim Thần tài


$kieu['sim-than-tai']=array($sub.",-2,2) = 39 OR ".$sub.",-2,2) = 79");

// 20 Sim ông địa


$kieu['sim-ong-dia']=$sub.",-2,2) IN('78','38')";

// 21. Số gánh



 $kieu['sim-ganh']="(".S1."=".S3." AND ".S1."!=".S2." AND ".S33."!=".S63." AND ".S73."!=".S33." AND ".S22."!=".S42." AND ".S5."!=".S3.")";
$dot['sim-ganh']="6,3";

// 22. Sim tứ quý giữa
/*
$loai['s']['tu-quy-giua']="Sim tứ quý giữa";
$kieu['tu-quy-giua']="(".S1."!=".S2.") AND ((".S2."=".S3." AND ".S2."=".S4." AND ".S2."=".S5.") || (".S3."=".S4." AND ".S3."=".S5." AND ".S3."=".S6.") || (".S4."=".S5." AND ".S4."=".S6." AND ".S4."=".S7.") || (".S5."=".S6." AND ".S5."=".S7." AND ".S5."=".S8.") )";

// 23. Sim tam hoa giữa
/*
$loai['s']['tam-hoa-giua']="Sim Tam hoa giữa";
$kieu['tam-hoa-giua']="(((".S2."=".S3." AND ".S2."=".S4." AND ".S2."!=".S1." AND ".S2."!=".S5.") || (".S1."!=".S2." AND ".S3."=".S4." AND ".S3."=".S5." AND ".S3."!=".S2." AND ".S3."!=".S6.") || ((".S4."=".S5." AND ".S4."=".S6." AND ".S4."!=".S3." AND ".S4."!=".S7."))) AND (((".S3."!=".S2.") || (".S1."!=".S2.")) AND ((".S42."!=".S22." AND ".S73."!=".S33."))))";
*/
/*
$sloai['tam-hoa-giua']['tam-hoa-giua-chon-loc']="Tam hoa giữa chọn lọc";
$kieu['tam-hoa-giua-chon-loc']="(".S6."=".S5." AND ".S5."=".S4." AND ".S4."!=".S3." AND ".S6."!=".S7.") AND ((".S3."=".S2." AND ".S1."!=".S2.") || (".S3."!=".S2." AND ".S1."=".S2.") || (".S3."!=".S2." AND ".S1."=".S3."))";
$dot['tam-hoa-giua-chon-loc']="6,3";
*/
// 24. Số tiến giữa
/*
$loai['s']['sim-tien-giua']="Sim tiến giữa";
$kieu['sim-tien-giua']="((".S73."!=".S33.") AND (".S63."!=".S33.")) AND ((".S1." -1 !=".S2." AND ".S2." -1 =".S3." AND ".S3." -1 =".S4." AND ".S4."-1=".S5.") || (".S2." -1 !=".S3." AND ".S3." -1 =".S4." AND ".S4." -1=".S5.") || ((".S1."=".S2." AND ".S3."!=".S2.") || (".S2."=".S3." AND ".S1."!=".S2.") || (".S1."!=".S2." AND ".S2."!=".S3." AND ".S1."=".S3.") || (".S1."!=".S2." AND ".S2."!=".S3." AND ".S1."!=".S3.")) AND (".S3." -1 !=".S4." AND ".S4." -1 =".S5." AND ".S5." -1=".S6."))";
        $sloai['sim-tien-giua']['tien-giua-chon-loc']="Tiến giữa chọn lọc";
          $kieu['tien-giua-chon-loc']=S1." -1 !=".S2." AND ".S2." -1 =".S3." AND ".S3." -1 =".S4." AND ".S4."-1=".S5." AND ".S5."-1=".S6;
*/		  
		  
	
$kieu['sim-ngay-thang-nam-sinh']=array($sub.",-6,2) < 31",$sub.",-6,2) !=00",$sub.",-4,2) < 12",$sub.",-4,2) !=00",$sub.",-2,2) > 60");
$dot['sim-ngay-thang-nam-sinh']="7,5,3";


$kieu['sim-nam-sinh']=array($sub.",-4,4) > ".(date('Y')-50),$sub.",-4,4) < ".date('Y'));	  
          
          

$kieu['dau-so-co']="(left(sim2,3) IN(091,090))";
/*
$loai['s']['sim-gia-re']="Sim gía rẻ";
$kieu['sim-gia-re']="(giaban < 0.5)";
$loai['s']['sim-de-nho']="Sim dễ nhớ";
$kieu['sim-de-nho']="(left(sim2,2)=01)";

/*
$loai['s']['ngu-quy-giua']="Sim ngũ quý giữa";
$kieu['ngu-quy-giua']="(".S1."!=".S2.") AND ((".S2."=".S3." AND ".S2."=".S4." AND ".S2."=".S5." AND ".S2."=".S6.") || (".S3."=".S4." AND ".S3."=".S5." AND ".S3."=".S6." AND ".S3."=".S7.") || (".S4."=".S5." AND ".S4."=".S6." AND ".S4."=".S7." AND ".S4."=".S8.") || (".S5."=".S6." AND ".S5."=".S7." AND ".S5."=".S8." AND ".S5."=".S9.") )";
*/
/*
$loai['s']['luc-quy-giua']="Sim lục quý giữa";
$kieu['luc-quy-giua']="(".S1."!=".S2.") AND ((".S2."=".S3." AND ".S2."=".S4." AND ".S2."=".S5." AND ".S2."=".S6." AND ".S2."=".S7.") || (".S3."=".S4." AND ".S3."=".S5." AND ".S3."=".S6." AND ".S3."=".S7." AND ".S3."=".S8." AND ".S3."=".S9."))";
*/


