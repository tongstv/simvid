<?php
class city extends db
{
    
    function getdistrict()
    {
        $id=$_GET['id'];
        $query=$this->query("SELECT * FROM district WHERE provinceid='".$id."' ORDER BY districtid ASC");
        echo '<div class="form-group form-group-sm se1 ">
   <label class="control-label col-md-4">Quận /Huyện: <span class="red">(*)</span></label>
   <div class="col-md-7">
   <select class="form-control district">
   <option value="0">Chọn Quận / Huyện</option>';
        while($row=$query->fetch_array(MYSQLI_ASSOC))
        {
            ?>
            
    
    <option value="<?php echo $row['districtid']?>"><?php echo $row['type']?> <?php echo $row['name']?></option>

            <?php

            
        }
    echo '</select>
   </div>
   </div>';
    }
    function getward()
    {
               $id=$_GET['id'];
        $query=$this->query("SELECT * FROM ward WHERE districtid='".$id."' ORDER BY wardid ASC");
        echo '<div class="form-group form-group-sm se2">
   <label class="control-label col-md-4">Phường /Xã: <span class="red">(*)</span></label>
   <div class="col-md-7">
   <select class="form-control ward">
   <option value="0">Chọn Phường / Xã</option>';
        while($row=$query->fetch_array(MYSQLI_ASSOC))
        {
            ?>
            
    
    <option value="<?php echo $row['type']?> <?php echo $row['name']?>"><?php echo $row['type']?> <?php echo $row['name']?></option>

            <?php

            
        }
    echo '</select>
   </div>
   </div>'; 
    }
}