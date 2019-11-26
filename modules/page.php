<?php
/**
 * @author stv.vn
 * @copyright 2014
 */

class page extends Smarty
{

        function morepage($gid)
        {
        
        
            $cache_key="dem1".$gid;
            $cache_path="page";
            
            $count=cache($cache_key,null,"+ 1 hour","cache/".$cache_path);
            
            if(empty($count))
            {
                    
                /***
                 
                code
                **/
              $db=new db;
              
              $row=$db->getOne("select count(*) AS count FROM page WHERE page_group=".$gid);
              
              $count=$row['count'];
              
                
                    
                
                
               cache($cache_key,$count,"+1 hour", "cache/".$cache_path);
               
            }
            
      
            if($count > 200)
            {
                $limit=ceil(round($count/100));
                
              
                $bg=rand(0,$limit);
                $cache_key="1more".$gid.$bg;
            }
            else
            $cache_key="1more".$gid;
            
            $data = cache($cache_key, NULL, "+1 year", "cache/page/");
            
            if(empty($data))
            {
                $db=new db;
                
                if($count > 200)
                
                {
                            $data=$db->getAll("SELECT page_title, page_url, page_pos FROM page WHERE page_group=".$gid." ORDER BY page_pos ASC limit ".$bg.", 200");
                
               
                }
           
                else
                $data=$db->getAll("SELECT page_title, page_url, page_pos FROM page WHERE page_group=".$gid." ORDER BY page_pos ASC");
                
                
                $data=serialize($data);
                cache($cache_key, $data, "+1 year", "cache/page/");
            }
            
            return @unserialize($data);
            
        }
    	function view()
    	{
   		
        $this->setTemplateDir(TEMPLATE);

         global $config;
        
        $this->assign($config);
        $db= new db;
    	
    	$query=$db->query("SELECT * FROM page WHERE page_url='".trim($_GET['page_url'])."' limit 1");
        $row=$query->fetch_array(MYSQLI_ASSOC);
        $this->assign($row);
        $query->free();
    	
    
        $this->assign("more",$this->morepage($row['page_group']));
                $this->registerFilter("output", "minify_html");
    	if($this->lc())$this->display(temp_file);
    	}
	/** view **/
	function index()
	{
	global $db;
	$this->setTemplateDir(TEMPLATE);
/**

	$where="";
    $num_rows=$db->num_rows("select COUNT(*) AS num_rows FROM ".__CLASS__." $where");
       
       
       
    $pages = new Paginator($num_rows,9,array(25,50,100,250,'All'));
       
       
	$data=$db->fetch_all_array("SELECT * FROM ".__CLASS__." $where LIMIT $pages->limit_start,$pages->limit_end");
       
    $this->assign("data",$data);
        
    $this->assign("paging",$pages->display_pages());
	
**/
$this->registerFilter("output", "minify_html");
	$this->display(temp_file);
	}
	
	function code()
	{
	global $db;
	
	/** Code here ***/
	
	
	$this->display(temp_file);
	}
	
	function yeucau()
	{
	global $db;
	
	/** Code here ***/
	
	
	$this->display(temp_file);
	}
	
	function del()
	{
	global $db;
	// $db->query("DELETE FROM ".__CLASS__." WHERE id=".(int) $_GET['id']);
	/** Code here ***/
	
	}
}