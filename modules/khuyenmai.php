<?php

/**
 * @author stv.vn
 * @copyright 2014
 */
class khuyenmai extends Smarty
{
    protected $lcs;

    /** view **/
    function index()
    {
        global $db, $mangpos, $kieu, $txt;
       $this->setTemplateDir(TEMPLATE);
        $this->lcs=$this->lc();
        $this->assign($txt->getPage('center'));
        $where="where sim2 IS NOT NULL AND simdl=250";
        if(isset($_SESSION['simtype']))$where.=$_SESSION['simtype'];
        
        
        
        
        if(isset($_GET['network']))$where .=" AND mang=".$mangpos[$_GET['network']];
        
        
        
        if(isset($_GET['type']))
        {
        if (is_array($kieu[$_GET['type']]))
        $where.=" AND (".join(" AND ",$kieu[$_GET['type']]).")";
        else
        $where.=" AND (".$kieu[$_GET['type']].")";
        }
        
        $num_rows = num_rows_cache("SELECT count(*) AS num_rows FROM ".TABLE_SIM." {$where}");

        $pages = new Paginator($num_rows, 9, array(
            100,
            250,
            500));

        $paging = $pages->display_pages();
        //$paging .= $pages->display_jump_menu();
        if(isset($_SESSION['toggleprice']))$orderby="ORDER BY giaban ".$_SESSION['toggleprice'];
        else
        $orderby="";

        
        $sql = "SELECT sim1, sim2, giaban, mang, tong FROM " . TABLE_SIM .
            " {$where} {$orderby} limit $pages->limit_start,$pages->limit_end";

        if ($pages->current_page == 1)
            $i = 0;
        else
            $i = $pages->limit_start;
        $this->assign("data", getSim($i, $sql));
        if($this->lcs)
        $this->assign("paging", $paging);


        
        if(isset($_GET['type']))
        $name[]=$GLOBALS['loai']['s'][$_GET['type']];
        
        if(isset($_GET['network']))$name[]=$_GET['network'];
        
        $this->assign("name",isset($name) ? @join(" > ",$name) : "");
        $this->assign("nav",navmenu());
        $this->assign("thisdomain", thisdomain);
               $print_url="index.php?ajax=sodep&page=".$pages->current_page."&print=true";
        $this->assign("print_url",$print_url);
        $this->registerFilter("output", "minify_html");
        if(isset($_GET['print']))
        {
        $this->assign("header",getPage('print_header'));
        
      
        $this->assign("footer",getPage('print_footer'));
        $this->display("print.htm");
        
        }
        else
        $this->display(temp_file);
    }

}
