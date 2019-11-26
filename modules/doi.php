<?php
ini_set("display_errors",1);
class doi
{
    function index()
    {
     	$db=new db;
        
    	
    		/* Code here */
    	
    	
    	
        $result=$db->query("SELECT * FROM congno");
        
        while($row=$result->fetch_array(MYSQLI_ASSOC))
        {
            $timestamp = strtotime(str_replace('/', '-', $row['ngay'])); 
            if(!is_numeric($row['ngay']))
        $db->query("UPDATE congno set ngay=".$timestamp." WHERE id=".$row['id']);
                          
         }
         }
}