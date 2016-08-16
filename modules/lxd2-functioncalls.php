<?php
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
                                prp( lxd2_server_snapshot( $_GET['server'] ) );
                          }
                          break;

                        case "delete":
                        if( $_GET['server'] != ""){
                                prp( lxd2_server_delete( $_GET['server'] ) );
                          }
                          break;
                  }
                ?>
