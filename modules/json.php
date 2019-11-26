<?php
class json
{
    function index()
    {
        header('Content-type: application/json');
        $db=new db;
        
        $data=$db->getAll("SELECT id AS xid, fullname, email, last_update, mobile FROM daily");
    
    
        foreach($data AS $row)
        {
            $email=strtolower(trim($row['email']));
            
            $d[$row['email']]=$row;
        }
        echo json_encode($d);
        
    }
    
    
}