<div class="row">
	<div class="col-md-6">
		<?php
		  $servers = lxd2_servers();

		  echo "<table class=\"table table-striped\">";
		  echo "<thead><tr><th>Container</th><th>IP address</th><th>Status</th><th>Start/Stop</th></tr></thead>";
		  foreach( $servers->metadata as $server ){
			$start = microtime(true);
			$s = lxd2_command( $server) ;
			$stop = microtime(true);
			echo "<tr>";
			echo "<td class=\"col-md-3\">" . $s->metadata->name . "</td>";
			echo "<td class=\"col-md-3\"></td>";
			
			if(  $s->metadata->status  == "Running"){
			  echo "<td class=\"col-md-2\"><i class=\"fa fa-lg fa-power-off text-success\" aria-hidden=\"true\"></i></td>";
			}
			if(  $s->metadata->status  == "Stopped"){
			  echo "<td class=\"col-md-2\"><i class=\"fa fa-lg fa-power-off text-danger\" aria-hidden=\"true\"></i></td>";
			}
			
			if(  $s->metadata->status  == "Running"){
			  echo "<td class=\"col-md-4\"><a href='?a=stop&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-power-off\" aria-hidden=\"true\"></i></button></a> <a href='?a=stop&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-cog\" aria-hidden=\"true\"></i></button></a> <a href='?a=stop&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-trash\" aria-hidden=\"true\"></i></button></a></td>";
			}
			if(  $s->metadata->status  == "Stopped"){
			  echo "<td class=\"col-md-4\"><a href='?a=start&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-power-off\" aria-hidden=\"true\"></i></button></a> <a href='?a=start&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-cog\" aria-hidden=\"true\"></i></button></a> <a href='?a=start&server={$s->metadata->name}'><button class=\"btn btn-default\"><i class=\"fa fa-lg fa-trash\" aria-hidden=\"true\"></i></button></a></td>";
			}
			echo "</tr>";
		  }
		  echo "</table>";
		?>
	</div>
	<div class="col-md-6">

	</div>
</div>
