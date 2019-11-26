<?php

/**
 * @author stv.vn
 * @copyright 2014
 */
class home extends Smarty
{

    /** view **/
   
    function index()
    {
        $this->setTemplateDir(TEMPLATE);

        $this->lc();
        global $db, $loai, $config;
        $this->assign($config);

        $where=sethome::index();
        if(isset($_SESSION['simtype']))$where.=$_SESSION['simtype'];
        $num_rows = num_rows_cache("SELECT count(*) AS num_rows FROM ".TABLE_SIM." {$where}");

        $pages = new Paginator($num_rows, 9, array(
            sethome::maxrow(),
            250,
            500));

        $paging = $pages->display_pages();
      //  $paging .= $pages->display_jump_menu();
        if(isset($_SESSION['toggleprice']))$orderby="ORDER BY giaban ".$_SESSION['toggleprice'];
        else
        $orderby=sethome::sort();

        
        $sql = "SELECT sim1, sim2, giaban, mang, tong FROM " . TABLE_SIM .
            " {$where} {$orderby} limit $pages->limit_start,$pages->limit_end";

        if ($pages->current_page == 1)
            $i = 0;
        else
            $i = $pages->limit_start;
        $this->assign("data", getSim2($i, $sql));

        $this->assign("paging", $paging);

        $this->assign("nav",navmenu());
       // $this->assign("menuloai",create_loai($loai['s'],$sloai));
        $this->assign("thisdomain", thisdomain);
        $this->registerFilter("output", "minify_html");
        
        $print_url="index.php?ajax=home&page=".$pages->current_page."&print=true";
        $this->assign("print_url",$print_url);
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
