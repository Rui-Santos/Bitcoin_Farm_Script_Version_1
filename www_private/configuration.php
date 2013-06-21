<?php
require_once'../www_private/config.php';
require_once'../www_private/functions.php';
$bitcoind_RPC_URL = "http://".$bitcoind_rpc_user.":".$bitcoind_rpc_password."@".$bitcoind_server_ip.":".$bitcoind_rpc_port."/";
if(isset($_POST['action'])) { $Take_Action = addslashes(strip_tags($_POST['action'])); } else { $Take_Action = "none"; }
if(isset($_GET['page'])) { $page = addslashes(strip_tags($_GET['page'])); } else { $page = "home"; }
if(isset($_POST['page'])) { $page = addslashes(strip_tags($_POST['page'])); }
if(isset($_GET['account'])) { $page = "list"; }
if(!isset($_SESSION['user'])) { $_SESSION['user'] = "none"; }
if(!isset($_SESSION['pass'])) { $_SESSION['pass'] = "none"; }
if($Take_Action==="logout") {
   if(isset($_SESSION['user'])) { unset($_SESSION['user']); }
   if(isset($_SESSION['pass'])) { unset($_SESSION['pass']); }
   session_destroy();
   header("Location: index.php");
}
if($Take_Action==="login") {
   if(isset($_POST['user'])) {
      if(isset($_POST['pass'])) {
         $user = encrypy($_POST['user']);
         $pass = encrypy($_POST['pass']);
         loginy($user,$pass,$Master_User,$Master_Pass);
      }
   }
}
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   $bitcoind = new jsonRPCClient($bitcoind_RPC_URL);
   $Global_Balance = $bitcoind->getbalance();
   
   $EclipseMC_API_URL = "https://eclipsemc.com/api.php?key=".$EclipseMC_API."&action=userstats";
   $json_eclipsemc = file_get_contents($EclipseMC_API_URL);
   $decode_eclipsemc = json_decode($json_eclipsemc, true);
}
?>