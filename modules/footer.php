<?php
$stv->setTemplateDir(TEMPLATE);
$stv->assign($txt->getPage('footer'));
$stv->assign("templates",TEMPLATE);
$stv->assign("newfooter",getGroupNewfooter());
$stv->assign("groupNew",getGroupNew());

$stv->assign("new",getNewIngroup2(9,20));
$stv->assign("loadtime",number_format(microtime(true) - $start_time, 2)." s");
$stv->registerFilter("output", "minify_html");
$stv->assign("body",getconfig('body'));





$share['share']['link']=urlencode("http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]);
$share['share']['img']=urlencode("http://".$_SERVER['HTTP_HOST']."/images/fb.jpg");
$share['share']['title']=$seo['title'];
$topnew =topnew();


$stv->assign("tintuc",$topnew);


$stv->assign("bancanbiet",topnew('bancanbiet'));

$stv->assign($share);
$stv->assign($config);
$stv ->display("footer.htm");