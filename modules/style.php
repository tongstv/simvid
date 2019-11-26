<?php
class style
{
    
    function index()
    {
        
        if(isset($_GET['id']))
        {
            $_SESSION['style']=$_GET['id'];
        }
    }
}