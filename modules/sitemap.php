<?php
/**
 * @author stv.vn
 * @copyright 2014
 */
class sitemap extends Smarty
{
    function index()
    {
        global $thisdomain;
        $db=new db;
            $domain=thisdomain;
        $data=$db->getAll("select * FROM menu WHERE group_id=1 order by position ASC");
        
       foreach($data AS $row)
       {
        if($row['url'])
        $sitemmap1 .= '<url>
  <loc>'.$domain.'/'.$row['url'].'</loc>
    <changefreq>daily</changefreq>
<priority>0.85</priority>
</url>';
       }
        
        
        $data2=$db->getAll("SELECT page_title, page_url  FROM page WHERE page_group IN(8, 9,12, 13,14,15, 16,17) order by page_pos ASC");
        
     foreach($data2 AS $r2)
     {
         if($r2['page_url'])
        $sitemmap2 .= '<url>
  <loc>'.$domain.'/p/'.$r2['page_url'].'</loc>
    <changefreq>daily</changefreq>
<priority>0.80</priority>
</url>';
     }

    
    $sitemap='<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc>'.$domain.'</loc>
  <changefreq>daily</changefreq>
<priority>1.00</priority>
</url>';


$sitemap .= $sitemmap1;

$sitemap .= $sitemmap2;
$sitemap .='
</urlset>';

ob_start();
echo $sitemap;
$ob=ob_get_contents();
ob_clean();
ob_end_flush();
header('Content-Type: application/xml; charset=utf-8');
echo $ob;
}
}