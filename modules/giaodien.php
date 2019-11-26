<?php
/**
 * @author stv.vn
 * @copyright 2014
 */
class giaodien extends Smarty
{

	/** view **/
	function index()
	{
	 $style="cerulean
cosmo
cyborg
darkly
flatly
journal
lumen
paper
readable
sandstone
simplex
slate
spacelab
superhero
united
yeti";
$style=explode("\n",$style);
    $this->setTemplateDir(TEMPLATE);
    
    
    
  foreach($style AS $file)
  {
    if(file_exists("style/".$file."/.jpg"))
    {
        $s[]=$file;
    }
  }
 
    $this->assign("style",$s);
   

	$this->display(temp_file);
	}
	

}