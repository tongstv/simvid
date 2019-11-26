<?php

class phannhom extends Smarty
{
    protected $lcs;

    function dk($dk)
    {

        $cache_key = "phanhom" . md5($dk);
        $cache_path = "page/";

        $row = cache($cache_key, null, "+ 1 hour", "cache/" . $cache_path);

        if (empty($row)) {

            $db = new db;
            $row = $db->getOne("select * FROM simnha_phannhom WHERE url='" . $dk . ".htm'");


            $row = serialize($row);
            cache($cache_key, $row, "+1 hour", "cache/" . $cache_path);

        }

        $row = unserialize($row);


        $array = json_decode($row['dk'], true);

        if (isset($array['daily'])) {
            $where = "where simdl IN(" . join(', ', $array['daily']) . ")";
        } else
            $where = "where sim2 IS NOT NULL";

        $this->assign("header", $row['ch']);
        $this->assign("footer", $row['cf']);


        if ((isset($array['gia1']) and isset($array['gia2'])) and $array['gia2'] > 0) {
            $gia1 = $array['gia1'] / 1000000;
            $gia2 = $array['gia2'] / 1000000;

            $where .= " AND (giaban >= " . $gia1 . " AND giaban <=" . $gia2 . ")";

        }
        if (isset($array['dauso']) and $array['dauso'] != null) {
            $dauso = $array['dauso'];

            $alldau = explode(',', $dauso);

            if (strstr($dauso, ",") !== false) {
                foreach ($alldau as $dau) {

                    $dau = trim($dau);

                    $lengdau = strlen($dau);

                    $list[] = "MID(sim2,1," . $lengdau . ") ='" . $dau . "'";

                }

                $where .= " AND (" . join(" || ", $list) . ")";

            } else {

                $dauso = trim($dauso);

                $lengdau = strlen($dauso);


                $where .= " AND (MID(sim2,1," . $lengdau . ") ='" . $dauso . "')";

            }


        }
        if (isset($array['duoiso']) and $array['duoiso'] != null) {
            $duoiso = $array['duoiso'];


            $duoiso = trim($duoiso);

            $allduoi = explode(",", $duoiso);

            if (stristr($duoiso, ",") !== false) {

                foreach ($allduoi as $duoi) {
                    $duoi = trim($duoi);

                    $lengduoi = strlen($duoi);


                    $list[] = "MID(sim2,-" . $lengduoi . "," . $lengduoi . ") ='" . $duoi . "'";
                   
                    
                }
                 $where .= " AND (" . join(" || ", $list) . ")";
            } else {
                $lengduoi = strlen($duoiso);

                $where .= " AND (MID(sim2,- " . $lengduoi . "," . $lengduoi . ") ='" . $duoiso .
                    "')";
            }


        }
        if (isset($array['mang']) and $array['mang'] != null) {
            $where .= " AND (mang=" . $array['mang'] . ")";
        }

        return $where;

    }
    /** view **/
    function index()
    {
        global $db, $mangpos, $kieu, $loai, $config;
        $this->setTemplateDir(TEMPLATE);
        $this->lcs = $this->lc();
        $this->assign($config);


        if (isset($_GET['url'])) {


            $where = $this->dk($_GET['url']);
            
   


        }
        if (isset($_SESSION['simtype']))
            $where .= $_SESSION['simtype'];

        if (isset($_GET['network']) and $_GET['network'] == 'Viettel')
            $_GET['network'] = 'VietTel';


        if (isset($_GET['network']))
            $where .= " AND mang=" . $mangpos[$_GET['network']];


        if (isset($_GET['type'])) {
            if (is_array($kieu[$_GET['type']]))
                $where .= " AND (" . join(" AND ", $kieu[$_GET['type']]) . ")";
            else
                $where .= " AND (" . $kieu[$_GET['type']] . ")";
        }

        $num_rows = $db->query_first("SELECT count(*) AS num_rows FROM " . TABLE_SIM . " {$where}");
        
        $num_rows=$num_rows['num_rows'];

        $pages = new Paginator($num_rows, 9, array(
            100,
            250,
            500));

        $paging = $pages->display_pages();
        //$paging .= $pages->display_jump_menu();
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
        if ($this->lcs)
            $this->assign("paging", $paging);


        if (isset($_GET['type']))
            $name[] = $GLOBALS['loai']['s'][$_GET['type']];

        if (isset($_GET['network']))
            $name[] = $_GET['network'];

        $this->assign("name", isset($name) ? @join(" > ", $name) : "");

        $this->assign("thisdomain", thisdomain);
        $print_url = "index.php?ajax=sodep&page=" . $pages->current_page . "&print=true";
        $this->assign("print_url", $print_url);
        $this->registerFilter("output", "minify_html");
        if (isset($_GET['print'])) {
            $this->assign("header", getPage('print_header'));


            $this->assign("footer", getPage('print_footer'));
            $this->display("print.htm");

        } else
            $this->display(temp_file);
    }

}
