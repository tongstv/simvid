<?php
    function compress( $minify ) 
    {
	/* remove comments */
    	$minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );

        /* remove tabs, spaces, newlines, etc. */
    	$minify = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $minify );
    		
        return $minify;
    }
class css extends db
{
    function index()
    {
     header('Content-type: text/css');
        ob_start("compress");

        $cache_key="mystyle";
        
        $css=cache($cache_key,NULL,"+1 year","cache/css/");
        
        if(empty($css))
        {
        $resul=$this->query("SELECT * FROM webdesign");
        while($row=$resul->fetch_array(MYSQLI_ASSOC))
        {
            $css.= $row['_key']."{\n";
            $css.=$row['_val']."\n";
            $css.="}\n";
        }
        
         cache($cache_key,$css,"+1 year","cache/css/");
        }
        echo $css;
        
ob_end_flush();
    }
}