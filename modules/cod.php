<?php
class cod extends Smarty
{
      function index()
      {
        global $settings;
        $this->setTemplateDir(TEMPLATE);
        
        $this->assign($settings);
        
        if(isset($_POST['simcard']) AND !empty($_POST['simcard']))
        {
          $db=new db;
          $simcard=preg_replace('/[^0-9]/','',$_POST['simcard']);
          
          $row=$db->getOne("SELECT * FROM cod WHERE simcard='".$simcard."'");
          
          if(empty($row['simcard']))
          {
            $this->assign("error","Không tìm thấy số sim quý khách nhập vào");
          }
        }
        
        $this->assign(isset($row) ? $row :"");
        
        $this->display(temp_file);
      }
}