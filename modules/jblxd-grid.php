<?php 
$today = date("dmy");
$servers = lxd2_servers();
	echo "<div class=\"row\">";
 
  foreach( $servers->metadata as $server ){
    $start = microtime(true);
    $s = lxd2_command( $server) ;
    $stop = microtime(true);
	echo "<div class=\"col-md-3\">";
	echo "<div class=\"panel panel-default col-md-12 panel-lxd\">";
    echo "<div class=\"panel-heading\">" . $s->metadata->name . "</div>";
    echo "<img class=\"panel-img\" src=\"resources/img/os-banners/ub-place.png\"></img>";
	echo "<div class=\"panel-body\">";
    if(  $s->metadata->status  == "Running"){
      echo "<p>Status: <i class=\"fa fa-lg fa-power-off text-success\" aria-hidden=\"true\"></i></br>";
    }
    if(  $s->metadata->status  == "Stopped"){
      echo "<p>Status: <i class=\"fa fa-lg fa-power-off text-danger\" aria-hidden=\"true\"></i></br>";
    }
	echo "Address: 192.168.0.242</br>";
	echo "Created: 23.05.2016</p>";
    if(  $s->metadata->status  == "Running"){
      echo "<a href='?a=stop&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-power-off\" aria-hidden=\"true\"></i></button></a> 
	  <button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#lxd-settings\"><i class=\"fa fa-lg fa-cog\" aria-hidden=\"true\"></i></button> 
	  <a href='?a=snapshot&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-copy\" aria-hidden=\"true\"></i></button></a> 
	  <button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#lxd-delete\"><i class=\"fa fa-lg fa-trash\" aria-hidden=\"true\"></i></button></a>";
    }
    if(  $s->metadata->status  == "Stopped"){
      echo "<a href='?a=start&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-power-off\" aria-hidden=\"true\"></i></button></a> 
	  <button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#lxd-settings\"><i class=\"fa fa-lg fa-cog\" aria-hidden=\"true\"></i></button></a> 
	  <a href='?a=snapshot&server={$s->metadata->name}&name=$today'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-copy\" aria-hidden=\"true\"></i></button></a> 
	  <button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#lxd-delete\"><i class=\"fa fa-lg fa-trash\" aria-hidden=\"true\"></i></button>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
	
  }  
?></div>
<!-- Settings Modal -->
<div class="modal fade" id="lxd-settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="lxd-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete container?</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you wish to permanently delete this container? This action is <strong>irreversible</strong>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php echo "<a href='?a=delete&server={$s->metadata->name}'><button type=\"button\" class=\"btn btn-danger\">Confirm</button></a>" ?>
      </div>
    </div>
  </div>
</div>
