<?php

class user extends Smarty
{
    	function addfund()
    	{
     		global $db;
    	
    		/* Code here */
    	
    	   $this->assign($_COOKIE);
    		$this->display(temp_file);
    	}
    function facebook()
    {
        
      
                $facebook = new Facebook(array(
                            'appId' => '770236876379247',
                            'secret' => 'b91bf7f1009d4a4e9a9b62ad467afbba',
                            ));
                
                $fuser = $facebook->getUser();
                if($fuser)
                {
                    $fb=new facebookcheck();
                    
                    $test=$fb->checkuser($fuser);
                    
                    if($test==true)
                    {
                         location("index.php");
                
                    } 
                    else
                    {
                    $user_profile = $facebook->api('/me');
                    $fb->user($fuser,$user_profile['name'],$user_profile['email'],$user_profile['gender']);
                    location("index.php");
                    }
                
                  } 
                  else
                  {
               	    $login_url = $facebook->getLoginUrl(array( 'scope' => 'email'));
                    header("Location: " . $login_url);
                  }
                
    }
    function reg()
    {

        $this->display(temp_file);

    }
    function login()
    {
        global $db;
        if (isset($_POST['username']))
        {

            extract($_POST);

          
            $pass=md5(md5($username.$password));
            $row=$db->query_first("SELECT * FROM member WHERE email='".$username."' AND password='".$pass."'");
            
            if($db->affected_rows)
            {
        
            
            setcookie("email",$email,time()+24*60*60);
            setcookie("uid",$row['id'],time()+24*60*60);
            setcookie("fullname",$row['fullname'],time()+24*60*60);
            setcookie("money",$row['money'],time()+24*60*60);
            setcookie("perm",$row['perm'],time()+24*60*60);
               location("index.php");
            }
            else
            {
                $this->assign("error","Sai mật khẩu hoặc tên đăng nhập");
            }

        }

        $this->display(temp_file);
    }
    function resetpass()
    {
        $this->display(temp_file);
    }
    function changeinfo()
    {
        
        global $db;
        if(isset($_REQUEST['submit']))
        {
        $_POST['password']=md5(md5($_POST['submit'].$_POST['password']));
        unset($_POST['submit']);
        
        
        
        
        
        $db->query_update("member",$_POST,"id=".$_COOKIE['uid']);
        $json['ok']="Thông tin đã được cập nhật!";
        
        
        echo json_encode($json);
        
        exit();    
        }
        
        $row=$db->query_first("SELECT * FROM member WHERE id=".$_COOKIE['uid']);
        $this->assign($row);
     
        $option_name=array('Nam','Nữ','Khác');
        $this->assign("option_name",$option_name);
        

     
        
        $this->display(temp_file);
    }
    function logout()
    {
        session_destroy();
    
        
        setcookie("email","",time());
        setcookie("uid","",time());
        setcookie("fullname","",time());
        setcookie("money","",time());
        setcookie("perm","",time());
        location("index.php?do=user.login");
        exit();
    }
}

?>