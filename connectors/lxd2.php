<?php
  function lxd2_environmentInfo(){
    return lxd2_command("/1.0");
  }

  function lxd2_servers(){
    return lxd2_command("/1.0/containers");
  }

  function lxd2_server_stop( $server ){
    return lxd2_command( "/1.0/containers/$server/state", array( "action" => "stop" ));
  }

  function lxd2_server_start( $server ){
    return lxd2_command( "/1.0/containers/$server/state", array( "action" => "start" ));
  }

  function lxd2_server_snapshot( $server ){
    return lxd2_command( "/1.0/containers/$server/snapshots");
  }

  function lxd2_server_delete( $server ){
    return lxd2_command( "/1.0/containers/$server", false, true );
  }

  function lxd2_command( $command = "", $actions = false, $delete = false, $snapshot = false ){
        $req = curl_init();

    curl_setopt($req, CURLOPT_URL,  "https://lexdee.bayton.org:8443" . $command );
    curl_setopt($req, CURLOPT_SSLKEY, "../client.key");
    curl_setopt($req, CURLOPT_SSLCERT, "../client.crt");
    curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false );
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);

    if( $actions ){
      curl_setopt($req, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($req, CURLOPT_POSTFIELDS, json_encode($actions) );
    }

    if( $delete ){
       curl_setopt($req, CURLOPT_CUSTOMREQUEST, "DELETE");
    }

    if( $snapshot ){
       curl_setopt($req, CURLOPT_CUSTOMREQUEST, "POST");
    }

    $data = curl_exec($req);
    $error = curl_error( $req );
    curl_close($req);

    if( $error != ""){
      return $error;
    } else {
      return json_decode( $data );
    }
  }
?>
