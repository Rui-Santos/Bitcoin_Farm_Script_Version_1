<?php
require_once'../www_private/functions.php';
if(isset($_POST['action'])) { $do_action = $_POST['action']; } else { $do_action = "start"; }
if($do_action=="step1") {
   $useuser = encrypy($_POST['useuser']);
   $usepass = encrypy($_POST['usepass']);
}
if($do_action=="step2") {
   $setuser = $_POST['setuser'];
   $setpass = $_POST['setpass'];
   $setserver = $_POST['setserver'];
   $setport = $_POST['setport'];
   $setrpcuser = $_POST['setrpcuser'];
   $setrpcpass = $_POST['setrpcpass'];
   $settype = $_POST['settype'];
   $setapi = $_POST['setapi'];
   $myFile = '../www_private/config.php';
   $fh = fopen($myFile, 'w') or die("can't open file");
   $stringData = '<?php';
   $stringData .= ' $Master_User = "'.$setuser.'";';
   $stringData .= ' $Master_Pass = "'.$setpass.'";';
   $stringData .= ' $bitcoind_server_ip = "'.$setserver.'";';
   $stringData .= ' $bitcoind_rpc_user = "'.$setrpcuser.'";';
   $stringData .= ' $bitcoind_rpc_password = "'.$setrpcpass.'";';
   $stringData .= ' $bitcoind_rpc_port = "'.$setport.'";';
   $stringData .= ' $EclipseMC_API = "'.$setapi.'";';
   if($settype==1) {
      $stringData .= ' $EclipseMC_PPS = true;';
   } else {
      $stringData .= ' $EclipseMC_PPS = false;';
   }
   $stringData .= ' ?>';
   fwrite($fh, $stringData);
   fclose($fh);
}
?>
<html>
<head>
   <title>Bitcoin Farm Installer</title>
   <link rel="stylesheet" type="text/css" href="style_default.css">
   <link rel="icon" type="image/ico" href="logo.ico">
</head>
<body>
   <table class="head-bar">
      <tr>
         <td align="center">
            <table class="head-bar-table">
               <tr>
                  <td align="left" style="width: 300px;">
                     <a href="index.php" style="font-size: 22px; font-weight: bold;">Bitcoin Farm Installer</a>
                  </td>
                  <td valign="top" align="center">
                     <div align="center" class="head-comment">
                     This is a private server.<br>
                     You need to leave right away.
                     </div>
                  </td>
                  <td align="right" style="width: 300px;">

                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table>
   <center>
   <table class="content">
      <tr>
         <td valign="top" align="center" style="padding: 10px;">
            <?php
            if($do_action=="step2") {
               echo '<b>That is it! You should be able to use the scirpt now as long as you enetred your crednetials correctly.</b>';
            } else {
               if($do_action=="step1") {
                  echo '<form action="install.php" method="POST">
                        <input type="hidden" name="action" value="step2">
                        <table style="width: 100%;">
                           <tr>
                              <td class="box-header"><b>Finish Installing</b></td>
                           </tr><tr>
                              <td align="center" class="box-content">
                                 <table style="width: 100%;">
                                    <tr>
                                       <td align="left" valign="top" class="table-cell-forml"><b>Bitcoin Farm Login</b></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">Username</td>
                                       <td align="left" valign="top" class="table-cell-formr">'.$_POST['useuser'].'<input type="hidden" name="setuser" value="'.$useuser.'"></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">Password</td>
                                       <td align="left" valign="top" class="table-cell-formr">'.$_POST['usepass'].'<input type="hidden" name="setpass" value="'.$usepass.'"></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml"><b>Bitcoin.conf Settings</b></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">Server Ip</td>
                                       <td align="left" valign="top" class="table-cell-formr"><input type="text" name="setserver" value="127.0.0.1" style="width: 300px;"></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">RPC Port</td>
                                       <td align="left" valign="top" class="table-cell-formr"><input type="text" name="setport" value="8888" style="width: 300px;"></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">RPC User</td>
                                       <td align="left" valign="top" class="table-cell-formr"><input type="text" name="setrpcuser" value="username" style="width: 300px;"></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">RPC Password</td>
                                       <td align="left" valign="top" class="table-cell-formr"><input type="text" name="setrpcpass" value="password" style="width: 300px;"></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml"><b>EclipseMC.com Settings</b></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">PPS or DGM</td>
                                       <td align="left" valign="top" class="table-cell-formr">
                                          <select name="settype" style="width: 300px;">
                                             <option value="2">DGM</option>
                                             <option value="1">PPS</option>
                                          </select>
                                       </td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">EclipseMC API</td>
                                       <td align="left" valign="top" class="table-cell-formr"><input type="text" name="setapi" value="ABC123EFG456" style="width: 300px;"></td>
                                    </tr><tr>
                                       <td colspan="2" align="right" valign="top" class="table-cell-formr"><input type="submit" name="submit" value="Create Config"></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                        </form>';
               } else {
                  echo '<form action="install.php" method="POST">
                        <input type="hidden" name="action" value="step1">
                        <table style="width: 100%;">
                           <tr>
                              <td class="box-header"><b>Create New Username & Password</b></td>
                           </tr><tr>
                              <td align="center" class="box-content">
                                 <table style="width: 100%;">
                                    <tr>
                                       <td align="left" valign="top" class="table-cell-forml"><b>Bitcoin Farm Login</b></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">New Username</td>
                                       <td align="left" valign="top" class="table-cell-formr"><input type="text" name="useuser" value="username" style="width: 300px;"></td>
                                    </tr><tr>
                                       <td align="left" valign="top" class="table-cell-forml">New Password</td>
                                       <td align="left" valign="top" class="table-cell-formr"><input type="text" name="usepass" value="password" style="width: 300px;"></td>
                                    </tr><tr>
                                       <td colspan="2" align="right" valign="top" class="table-cell-formr"><input type="submit" name="submit" value="Next Step"></td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                        </form>';
               }
            }
            ?>
         </td>
      </tr>
         <?php
         if($do_action!="step2") {
            echo '<tr>
                     <td valign="top" align="left" style="padding: 10px;">
                        <p>Enter the following in your bitcoin.conf file.</p>
                        <p>Edit your username, password, port, and IPs allowed.</p>
                        <ul>
                           <li>server=1</li>
                           <li>rpcuser=USERNAME</li>
                           <li>rpcpassword=PASSWORD</li>
                           <li>rpctimeout=30</li>
                           <li>rpcallowip=127.0.0.1</li>
                           <li>rpcport=8333</li>
                        </ul>
                     </td>
                  </tr>';
         }
         ?>
   </table>
   </center>
</body>
</html>
<?php
set_time_limit(30);
?>