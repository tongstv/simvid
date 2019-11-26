<?php
class editable
{
     function __construct()
    {
        auth();
    }
	function index()
	{
	global $db;
    
    if(isset($_POST['name']) && $_POST['value'] && $_POST['pk'])
	{
    extract($_POST);
    $split=explode("|",$name);
    $table=trim($split[0]);
    $col=trim($split[1]);
    $id=trim($split[2]);

    $row[$col]=$value;
    $db->query_update($table,$row,$id."=".$_POST['pk']);

    }
	
	}
	
}