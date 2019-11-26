<?php
class toggle
{
    function price()
    {
        if(!isset($_SESSION['toggleprice']))
        {
            $_SESSION['toggleprice']="ASC";
        }
        else if($_SESSION['toggleprice']=="ASC")
        {
            $_SESSION['toggleprice']="DESC";
        }
        else
        {
            $_SESSION['toggleprice']="ASC";
        }
        
    }
    function simtype()
    {
        if(isset($_POST['simtype']))
        {
            $_SESSION['simtypex']=$_POST['simtype'];
            if($_POST['simtype']=='09')$stype=0;
            else 
            $stype=1;
            $_SESSION['simtype']=" AND stype=".$stype;
        }
    }
}