<?php



class search extends smarty

{



    protected $path;

    protected $count;



    function __construct()

    {

        global $mangpos;

        parent::__construct();

        $url_path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);



        $url_path = str_replace(['.html', '.htm'], '', $url_path);



        $path = explode("/", trim($url_path, "/"));



        $this->path = $path;



        if (isset($path[2]))

            $path[2] = ucfirst($path[2]);

        $this->count = count($this->path) - 1;



        if ($path[0] == 'tim-sim'):





            if ($this->count == 1) {





                $_GET['sim'] = "" . str_replace('.html', '', $path[1]);

            }

            if ($this->count == 2) {



                $_GET['sim'] = "" . str_replace('.html', '', $path[1]);

                $_GET['network'] = (int)$mangpos[$path[2]];





            }

            if ($this->count == 4) {

                $_GET['sim'] = "" . str_replace('.html', '', $path[1]);

                $_GET['network'] = (int)$mangpos[$path[2]];



                $_GET['giatu'] = stringtonumber($path[3]);

                $_GET['den'] = stringtonumber($path[3]);



            }



            if ($this->count == 5) {

                $_GET['sim'] = "" . str_replace('.html', '', $path[1]);

                $_GET['network'] = $mangpos[$path[2]];



                $_GET['giatu'] = stringtonumber($path[3]);

                $_GET['den'] = stringtonumber($path[4]);



                if ($path[5] == '10-so')

                    $type = 0;

                else

                    $type = 1;



                $_GET['type'] = $type;





            }



            if ($this->count == 6) {

                $_GET['sim'] = "" . str_replace('.html', '', $path[1]);

                $_GET['network'] = $mangpos[$path[2]];



                $_GET['giatu'] = stringtonumber($path[3]);

                $_GET['den'] = stringtonumber($path[4]);



                if ($path[5] == '10-so')

                    $type = 0;

                else

                    $type = 1;



                $_GET['type'] = $type;



                $n = $path[6];





                $n = str_replace('day-so-khong-co', '', $n);



                $n = explode('-', $n);

                if (count($n) > 1)

                    $_GET['n'] = $n;



            }





            if ($this->count == 7 and $path[7]) {

                $_GET['sim'] = "" . str_replace('.html', '', $path[1]);

                $_GET['network'] = $mangpos[$path[2]];



                $_GET['giatu'] = stringtonumber($path[3]);

                $_GET['den'] = stringtonumber($path[4]);



                if ($path[5] == '10-so')

                    $type = 0;

                else

                    $type = 1;



                $_GET['type'] = $type;





                $_GET['type'] = $type;



                $n = $path[6];





                $n = str_replace('day-so-khong-co', '', $n);



                $n = explode('-', $n);



                $_GET['n'] = $n;





                $_GET['tongdiem'] = stringtonumber($path[7]);



            }



            if ($this->count == 8 and $path[8]) {

                $_GET['sim'] = "" . str_replace('.html', '', $path[1]);

                $_GET['network'] = $mangpos[$path[2]];



                $_GET['giatu'] = stringtonumber($path[3]);

                $_GET['den'] = stringtonumber($path[4]);



                if ($path[5] == '10-so')

                    $type = 0;

                else

                    $type = 1;



                $_GET['type'] = $type;





                $_GET['type'] = $type;



                $n = $path[6];





                $n = str_replace('day-so-khong-co', '', $n);



                $n = explode('-', $n);



                if (count($n) > 1)

                    $_GET['n'] = $n;



                $_GET['tongdiem'] = stringtonumber($path[7]);



                $_GET['tongnut'] = stringtonumber($path[8]);

            }





        endif;



    }

    function namsinh($d, $m, $y, $x)

    {

        $where = " AND (";

        $where .= "RIGHT(sim2,8)='" . $d . $m . $y . "'"; //1 DK 1 01.09.1990

        $where .= " || RIGHT(sim2,7)='" . substr($d, -1, 1) . $m . $y . "'"; //DK 2 1.09.1990

        if ($m < 10)

            $where .= " || RIGHT(sim2,7)='" . $d . substr($m, -1, 1) . $y . "'"; //DK 3 01.9.1990

        if ($m < 10 && $d < 10) {

            $where .= " || RIGHT(sim2,6)='" . substr($d, -1, 1) . substr($m, -1, 1) . $y .

                "'"; //DK4 1.9.1990

            $where .= " || RIGHT(sim2,6)='" . $d . $m . substr($y, -2, 2) . "'"; //DK5 01.09.90

        }

        if ($d < 10)

            $where .= " || RIGHT(sim2,5)='" . substr($d, -1, 1) . $m . substr($y, -2, 2) .

                "'"; //DK6 1.09.90

        if ($m < 10)

            $where .= " || RIGHT(sim2,5)='" . $d . substr($m, -1, 1) . substr($y, -2, 2) .

                "'"; //DK7 01.9.90

        if ($m < 10 && $d < 10)

            $where .= " || RIGHT(sim2,4)='" . substr($d, -1, 1) . substr($m, -1, 1) . substr($y,

                -2, 2) . "'"; //DK8 1.9.90

        $where .= " || RIGHT(sim2,4)='" . $y . "'"; //DK 9 VD: 1990

        $where .= ")";



        if ($x == 2) {

            $where = " AND (";



            if ($m < 10)

                $where .= "RIGHT(sim2,7)='" . $d . substr($m, -1, 1) . $y . "'"; //DK 3 01.9.1990

            if ($m < 10 && $d < 10) {

                $where .= " || RIGHT(sim2,6)='" . substr($d, -1, 1) . substr($m, -1, 1) . $y .

                    "'"; //DK4 1.9.1990

                $where .= " || RIGHT(sim2,6)='" . $d . $m . substr($y, -2, 2) . "'"; //DK5 01.09.90

            }



            if ($d < 10)

                $where .= " || RIGHT(sim2,5)='" . substr($d, -1, 1) . $m . substr($y, -2, 2) .

                    "'"; //DK6 1.09.90

            if ($m < 10)

                $where .= " || RIGHT(sim2,5)='" . $d . substr($m, -1, 1) . substr($y, -2, 2) .

                    "'"; //DK7 01.9.90

            if ($m < 10 && $d < 10)

                $where .= " || RIGHT(sim2,4)='" . substr($d, -1, 1) . substr($m, -1, 1) . substr($y,

                    -2, 2) . "'"; //DK8 1.9.90

            if ($where != ' AND (')

                $where .= " || RIGHT(sim2,4)='" . $y . "'"; //DK 9 VD: 1990

            else

                $where .= " RIGHT(sim2,4)='" . $y . "'"; //DK 9 VD: 1990

            $where .= ")";

        } else

            if ($x == 1) {

                $where = " AND (";

                $where .= "RIGHT(sim2,8)='" . $d . $m . $y . "'"; //1 DK 1 01.09.1990

                $where .= " || RIGHT(sim2,7)='" . substr($d, -1, 1) . $m . $y . "'"; //DK 2 1.09.1990

                if ($m < 10)

                    $where .= " || RIGHT(sim2,7)='" . $d . substr($m, -1, 1) . $y . "'"; //DK 3 01.9.1990



                $where .= " || RIGHT(sim2,4)='" . $y . "'"; //DK 9 VD: 1990



                $where .= ")";



            }

        return $where;

    }

    function duoisim($sosim)

    {



        if (strstr($sosim, "*") == true) {

            $split = explode("*", $sosim);



            if (strpos($sosim, "*") == strlen($sosim) - 1) {

                $sosim = $split[0];





                for ($i = 1; $i < 10; $i++) {



                    $sosim2 = $sosim . $i;

                    $str .= "<li><a href=\"/tim-sim/" . $sosim2 . "*.html\">Sim đầu " .

                        $sosim2 . ", tìm sim số đẹp đầu " . $sosim2 . "*</a></li>";



                }



            } else {

                $sosim = $split[1];



                $sosim2 = $i . $sosim;

                

                

                  for ($i = 1; $i < 10; $i++) {



                    $sosim2 = $i.$sosim ;

                    $str .= "<li><a href=\"/tim-sim/*" . $sosim2 . ".html\">Sim đuôi " .

                        $sosim2 . ", tìm sim số đẹp đuôi *" . $sosim2 . "</a></li>";



                }

                

            }



        } else {

            $sosim3 = substr($sosim, -4, 4);

            

            for ($i = 1; $i < 10; $i++) {



                    $sosim2 = $i.$sosim3 ;

                    $str .= "<li><a href=\"/tim-sim/*" . $sosim2 . ".html\">Sim đuôi " .

                        $sosim2 . ", tìm sim số đẹp đuôi *" . $sosim2 . "</a></li>";



                }

        }





        $str = "<ul class=\"duoilienquan\">" . $str . "</ul>";

        return $str;



    }

    function index()

    {

        global $db, $loai, $config, $seo;

        $this->setTemplateDir(TEMPLATE);

        $lc = $this->lc();

        $this->assign($seo);



        $search_h=getPage("search_h");

        $search_f=getPage("search_f");

        

        $fixget=$_GET;

        

        



        $array1="#".implode('#,#',array_keys($fixget))."#";

        

        $array1=explode(',',$array1);

        

        

        if($fixget['network']==1)$fixget['network']=' Viettel ';

         if($fixget['network']==2)$fixget['network']=' Mobifone ';

         if($fixget['network']==3)$fixget['network']=' Vinaphone ';         

         if($fixget['network']==4)$fixget['network']=' Vietnamobile ';

         if($fixget['network']==5)$fixget['network']=' Gmobile ';

           

           

           if(isset($_GET['type'])):

           if($fixget['type']==0)$fixget['type']=' sim 10 số ';

             if($fixget['type']==1)$fixget['type']=' sim 11 số ';

           

           endif;

           

           if($fixget['giatu'])$fixget['giatu']=" giá từ ".number_format($fixget['giatu']);

           

           if($fixget['den'])$fixget['den']=" đến ".number_format($fixget['den']);

           

           if($fixget['tongdiem'])$fixget['tongdiem']=" tổng điểm ".$fixget['tongdiem'];

           if($fixget['tongnut'])$fixget['tongnut']=" tổng nút ".$fixget['tongnut'];

           

          





        $array2=array_values($fixget);

        

     

        $search_h=str_replace($array1,$array2, $search_h['search_h']['detail']);

        $search_f=str_replace($array1,$array2,$search_f['search_f']['detail']);

      

        if(count($fixget['n']) > 1)

           {

            

                $khonggom=" dãy số không gồm: ".join(", ",$fixget['n']);

                

                $search_h=str_replace("#daysokhongco#",$khonggom,$search_h);

                 $search_f=str_replace("#daysokhongco#",$khonggom,$search_f);

            

           }







        $search_h=preg_replace('/#(.*)#/','',$search_h);

         $search_f=preg_replace('/#(.*)#/','',$search_f);

       

        $out=array('search_h' =>$search_h,'search_f' => $search_f);

        

        $this->assign($out);

        

        

      

        

        

            

        $this->assign($config);

        if ($lc):





            // TODO:





            $seobai = getpagebylink();





            $this->assign("seobai", $seobai);

            if (isset($_GET['sim'])) {



                $txtsim = $_GET['sim'];



                $txtsim = str_replace(array('.', ' '), array('', ''), $txtsim);

                if ($txtsim != "")

                    $this->assign("thiskey", $txtsim);

                $spot = strpos($txtsim, "*");

                $slen = strlen($txtsim);

                if (stristr($txtsim, "*") === false) {

                    $txtsim = str_replace(array(

                        'x',

                        'X',

                        '*'), array(

                        '[0-9]',

                        '[0-9]',

                        '.*'), $txtsim);

                    $where = "WHERE sim2 rlike '" . $txtsim . "$'";
                    
                       

                } else {

                    $txtsim = str_replace(array(

                        'x',

                        'X',

                        '*'), array(

                        '[0-9]',

                        '[0-9]',

                        '.*'), $txtsim);

                    if ($spot == 0)

                        $where = "WHERE sim2 rlike '" . $txtsim . "$'";

                    elseif ($spot == ($slen - 1))

                        $where = "WHERE sim2 rlike '^" . $txtsim . "'";

                    else

                        $where = "WHERE sim2 rlike '^" . $txtsim . "$'";
                        
                        
                     
                        
                        
                    

                }

            } else {

                $where = "where sim2 IS NOT NULL";

            }



            // TODO:



            if (isset($_GET['n']) and is_array($_GET['n'])) {

                $vv = "";

                foreach ($_GET['n'] as &$v) {

                    $vv .= $v;

                }

                $where .= " AND sim2 NOT rlike'[" . $vv . "]'";

            }





            // TODO: Mạng



            if (isset($_GET['date'])) {

                $date = urldecode($_GET['date']);

                $date = explode("/", $date);



                $where .= $this->namsinh($date[0], $date[1], $date[2], $_GET['dtp']);

            }

            if (isset($_GET['network']) and $_GET['network'] > 0) {



                if (is_numeric($_GET['network']))

                    $where .= " AND mang=" . (int)$_GET['network'];

                else {

                    global $mangpos;

                    $where .= " AND mang=" . (int)$mangpos[$_GET['network']];

                }



            }

            // TODO:  Theeo giá





            if (isset($_GET['dang'])) {

                global $kieu;

                if (is_array($kieu[$_GET['dang']]))

                    $where .= " AND (" . join(" AND ", $kieu[$_GET['dang']]) . ")";

                else

                    $where .= " AND (" . $kieu[$_GET['dang']] . ")";

            }





            if (isset($_GET['giatu']) && isset($_GET['den'])) {

                $giatu = stringtonumber($_GET['giatu']);

                $den = stringtonumber($_GET['den']);



                if ($den > $giatu)

                    $where .= " AND (giaban >= " . ($giatu / 1000000) . " AND giaban <= " . ($den /

                        1000000) . ")";





            }





            if (isset($_GET['type']))

                $where .= " AND stype=" . $_GET['type'];





            include_once 'app/share/loc.php';



            unset($_POST['loctheomang']);

            unset($_POST['loctheogia']);




  $num_rows = 1000;
            
            
            
                        $qstring = $_SERVER["REQUEST_URI"];


            $ck = @preg_match('/\?page=([0-9]*)/', $qstring, $cuspage);


            if ($ck) {
                $cuspage = $cuspage[1];
            } else {
                $cuspage = 0;
            }

            if ($cuspage) {
                $offset = $cuspage * 2 * 100;
            } else {
                $offset = 0;
            }

            if ($cuspage == 0) {
                $this->assign("linkx", "" . $qstring . "?page=2");

            } else {
                $this->assign("linkx", "" . preg_replace('/\?page=([0-9]+)/', '', $qstring) .
                    "?page=" . ($cuspage + 1));


                $this->assign("link2", "" . preg_replace('/\?page=([0-9]+)/', '', $qstring) .
                    "?page=" . ($cuspage - 1));


                //$cuspage = 20;

                $pstart = $cuspage - 9;



                    if($cuspage > 1):
                for ($i = $pstart; $i <= $cuspage; $i++) {

                    if($i >= 1)
                    {

                    if ($cuspage == $i) {
                        $ps .= '<li class="active"><a class="paginate" title="Go to page 7 of 418" href="#">' .
                            $i . '</a></li>';
                    } else {
                        $ps .= '<li><a class="paginate" title="Go to page 7 of 418" href="'."?" . preg_replace('/\?page=([0-9]+)/', '', $qstring) .
                    "?page=" . ($i).'">' .
                            $i . '</a></li>';
                    }
                }

                }
                
                $this->assign("ps",$ps);
                endif;
                


            }

            $this->assign("ps",$ps);
            
          
            $this->assign("p", $cuspage);





         

            $this->assign("count", $num_rows);
            





            if (isset($_GET['tongdiem']) || isset($_GET['tongnut'])) {



                if ((int)$_GET['tongdiem'] > 0)

                    $where .= " AND tong=" . (int)$_GET['tongdiem'];

                else

                    if ((int)$_GET['tongnut'] > 0) {

                        if ((int)$_GET['tongnut'] == 10)

                            $_GET['tongnut'] = 0;

                        $where .= " AND right(tong,1)=" . (int)$_GET['tongnut'];

                    }

            }





            $pages = new Paginator($num_rows, 9, array(

                50,

                100,

                250,

                500));



            $paging = $pages->display_pages();

            // $paging .= $pages->display_jump_menu();

            if (isset($_SESSION['toggleprice']))

                $orderby = "ORDER BY giaban " . $_SESSION['toggleprice'];

            else

                $orderby = "";





            $sql = "SELECT sim1, sim2, giaban, mang, tong FROM " . TABLE_SIM . " {$where} {$orderby} limit $pages->limit_start,$pages->limit_end";





            if ($pages->current_page == 1)

                $i = 0;

            else

                $i = $pages->limit_start;

            $this->assign("data", getSim2($i, $sql));



            $this->assign("paging", $paging);



            if (isset($_GET['sim']))

                $name[] = "Tìm sim: " . $_GET['sim'];



            if (isset($_GET['network'])) {

                if (is_numeric($_GET['network']) and $_GET['network'] != 0) {

                    foreach ($GLOBALS['mangpos'] as $k => $v) {

                        if ($v == $_GET['network']) {

                            if ($_GET['network'])

                                $name[] = "Mạng " . $k;

                        }

                    }

                } else {

                    if (isset($_GET['network']) and $_GET['network'])

                        $name[] = "Mạng " . $_GET['network'];

                }

            }

            if (isset($_GET['giatu']) and isset($_GET['den'])) {

                $gtu = stringtonumber($_GET['giatu']);

                $gden = stringtonumber($_GET['den']);



                if ($gden > $gtu)

                    $name[] = "Giá từ " . number_format($gtu) . " đến " . number_format($gden);

            }



            $this->assign("name", isset($name) ? @join(" ", $name) : "");



            $this->assign("thisdomain", thisdomain);

            $this->assign("nav", navmenu());

            $this->assign("menuloai", create_loai($loai['s'], $sloai));

            $this->registerFilter("output", "minify_html");





            $this->assign("duoisim", $this->duoisim($_GET['sim']));



            if (isset($_GET['print'])) {

                $this->assign("header", getPage('print_header'));





                $this->assign("footer", getPage('print_footer'));

                $this->display("print.htm");



            } else

                $this->display('search.htm');



        endif;

    }

}

