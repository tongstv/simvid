<?php
$stv->setTemplateDir(TEMPLATE);
if(isset($_GET['desktop']) AND $_GET['desktop']==1)
$_SESSION['desktop']=1;
else if(isset($_GET['desktop']) AND $_GET['desktop']==2)
{
    unset($_SESSION['desktop']);
    
}

$stv->assign('desktop',isset($_SESSION['desktop']) ? $_SESSION['desktop'] :0);

$stv->assign("cartcount",isset($_SESSION['mycart']) ? count($_SESSION['mycart']) : 0);
$stv->assign("menu",menu(1));
$stv->assign("top_menu",menu(18));
$stv->assign("theme.menu",menu(1));
$stv->assign("thisdomain",thisdomain);


$stv->assign("menuloai",create_loai($loai['s'],$sloai));

include 'app/share/seo.php';




$seo=seo($_SERVER['REQUEST_URI'],$array1,$array2);
$stv->assign($txt->getPage('header'));
$stv->assign($seo);

$stv->assign("header",getconfig('header'));

$stv->assign($config);
$stv->registerFilter("output", "minify_html");

$stvconfig['date']=date('d/m/Y');

$stv->assign($stvconfig);
    $txtsim = $_GET['sim'];

                $txtsim = str_replace(array('.', ' '), array('', ''), $txtsim);

                if ($txtsim == "")
                {
                	$url_path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);



        $url_path = str_replace(['.html', '.htm'], '', $url_path);


     $path = explode("/", trim($url_path, "/"));
                

                 	if(isset($path[1]) && !isset($path[2])) $txtsim=$path[1];
                }

                	



$stv->assign("thiskey", $txtsim);
$stv->display("header.htm");
?>