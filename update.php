<?php



function cache_array($array,$time)
{
    
    $key=md5(json_encode($array));
    
    
    $data = cache($key);
    
    if($data == null)
    {
        
        
        cache($key,$data = json_encode($array),$time);
    }
    
    
    return json_decode($data,true);
    
    
    
    
}

function getpagebylink()
{
    if (isset($_GET['do']) and $_GET['do'] == 'search')
        return '';
    if ($_SERVER['HTTPS'] == "on") {
        $link = "https://" . str_replace("www.", "", $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    } else {
        $link = "http://" . str_replace("www.", "", $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    }


    $link = preg_replace('/\?page=([0-9]*)/', '', $link);


    $cache_key = md5($link) . "11";
    $cache_path = "seo/";

    $data = cache($cache_key, null, "+7 day", "cache/" . $cache_path);

    if (empty($data)) {

        $db = new db;

        $data = $db->getOne("select page_title, page_des, page_detail FROM page where replace(page_code,'www.','') = '" .
            $link . "' limit 1");

        // echo "NO CACHE";


        $data = serialize($data);
        cache($cache_key, $data, "+7 day", "cache/" . $cache_path);

    } else {
        // "CAHE CACHE";
    }

    return unserialize($data);
}
function checkloaisim($sosim)
{


    $r1 = substr($sosim, -1, 1);
    $r2 = substr($sosim, -2, 1);
    $r3 = substr($sosim, -3, 1);
    $r4 = substr($sosim, -4, 1);
    $r5 = substr($sosim, -5, 1);
    $r6 = substr($sosim, -6, 1);
    $r7 = substr($sosim, -7, 1);

    $r8 = substr($sosim, -8, 1);

    $r22 = substr($sosim, -2, 2);

    $r33 = substr($sosim, -3, 3);
    $r63 = substr($sosimm, -6, 3);


    $r22 = substr($sosim, -2, 2);
    $r42 = substr($sosim, -4, 2);
    $r62 = substr($sosim, -6, 2);

    if ($r1 == $r2 and $r2 == $r3 and $r3 == $r4 and $r4 == $r5 and $r5 == $r6 and $r6 ==
        $r7 and $r7 == $r8) {


        return "Sim bát quý";


    }

    if ($r1 == $r2 and $r2 == $r3 and $r3 == $r4 and $r4 == $r5 and $r5 == $r6 and $r6 ==
        $r7) {


        return "Sim thất quý";


    }


    if ($r1 == $r2 and $r2 == $r3 and $r3 == $r4 and $r4 == $r5 and $r5 == $r6) {


        return "Sim lục quý";


    }


    if ($r1 == $r2 and $r2 == $r3 and $r3 == $r4) {


        return "Sim tứ quý";


    }

    if ($r1 == $r2 and $r2 == $r3) {


        return "Sim tam hoa";


    }

    if ($r22 == 86 || $r22 == 68) {

        return "Sim lộc phát";
    }

    if ($r22 == 39 || $r22 == 79) {
        return "Sim thần tài";
    }


    if ($r22 == 38 || $r22 == 78) {
        return "Sim ông địa";
    }

    if ($r33 == $r63 and $r3 != $r4) {
        return "Sim taxi";
    }

    if ($r22 == $r42 and $r42 == $r63 and $r1 != $r2) {
        return "Sim taxi";
    }


    if (in_array(substr($sosim, 0, 3), array(
        '091',
        '090',
        '098',
        '097'))) {

        if (!in_array(substr($sosim, 0, 4), array(
            '0911',
            '0901',
            '0981',
            '0971'))) {
            return "Sim đầu cổ";
        }

    }


    if ($r1 == $r2 and $r3 == $r4) {

        return "Sim kép";
    }

    if ($r22 > 61) {
        return "Sim năm sinh";
    }

    if (substr($sosim, -4, 4) > 2000 and substr($sosim, -4, 4) < date('Y')) {
        return "Sim năm sinh";
    }


    if ($r1 == $r6 and $r2 == $r5 and $r3 == $r4) {
        return "Sim đối";
    }


    if ($r1 == $r3 and $r2 == $r3) {
        return "Sim đảo";
    }


    if ($r1 == $r3) {
        return "Sim gánh";
    }

    if ($r42 == $r22 and $r1 != $r2) {
        return "Sim lặp";
    }


    if ($r1 > $r2 and $r2 > $r3) {
        return "Sim tiến đơn";
    }


    if (in_array(substr($sosim, -4, 4), ['1102', '4078', '8683', '8910', '1368'])) {

        return "Sim đặt biệt";
    }

    return "Sim đẹp tự nhiên";

}


function topnew($code = 'tintuc', $limit = 10)
{


    $cache_key = md5($code) . $limit;
    $cache_path = "seo/";

    $data = cache($cache_key, null, "+7 day", "cache/" . $cache_path);


    if ($data == null):


        $db = new db;

        $data2 = $db->getAll("select * from page WHERE page_group = (select id from pagegroup WHERE groupcode='" .
            $code . "') order by id desc limit " . $limit);


        foreach ($data2 as $row) {
            preg_match_all('@src="([^"]+)"@', $row['page_detail'], $match);


            //  print_r($match);

            $row['img'] = isset($match[1][0]) ? $match[1][0] : '';


            if ($row['img'] != '') {


                $row['img'] = str_replace(array('https://simvidan.vn', 'http://simvidan.vn'), '',
                    $row['img']);


            }


            $data[] = $row;

            cache($cache_key, json_encode($data), "+7 day", "cache/" . $cache_path);
        }


    endif;

    return json_decode($data, true);


}






?>
