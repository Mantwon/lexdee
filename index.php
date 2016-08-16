<?php
  require( "helpers/init.php" );
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  require( "connectors/lxd2.php");

  if(isset($_GET['a']))
  switch( $_GET['a'] ){
    case "stop":
      if( $_GET['server'] != ""){
        prp( lxd2_server_stop( $_GET['server'] ) );
      }
      break;

    case "start":
      if( $_GET['server'] != ""){
        prp( lxd2_server_start( $_GET['server'] ) );
      }
      break;

    case "snapshot":
      if( $_GET['server'] != ""){
        prp( lxd2_server_snapshot( $_GET['server'], $_GET['name'] ) );
      }
      break;
  }


  $servers = lxd2_servers();

  echo "<table>";
  foreach( $servers->metadata as $server ){
    $start = microtime(true);
    $s = lxd2_command( $server) ;
    $stop = microtime(true);
    echo "<tr>";
    echo "<td>" . $s->metadata->name . "</td>";
    echo "<td>" . $s->metadata->status . "</td>";
    if(  $s->metadata->status  == "Running"){
      echo "<td><a href='?a=stop&server={$s->metadata->name}'>stop</a></td>";
    }
    if(  $s->metadata->status  == "Stopped"){
      echo "<td><a href='?a=start&server={$s->metadata->name}'>start</a></td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  prp( $s );
?>
