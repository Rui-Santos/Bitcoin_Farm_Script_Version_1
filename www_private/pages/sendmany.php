<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   if(isset($_POST['to'])) { $WRITE_NEW_SHARES_ARRAY = $_POST['to']; } else { $WRITE_NEW_SHARES_ARRAY = '"12MogvPCM2fn2Sct8Wzo9TzRxTnXZPsT5g"=>0.01,"1MArjtxknExePEq8FeVFZYayvd4B7PMBhb"=>0.00012348'; }
   $myFile = '../www_private/static_sections/sendmany.php';
   $fh = fopen($myFile, 'w') or die("can't open file");
   $stringData = '<?php';
   $stringData .= ' $SHARES_DYPLAD = '."'".$WRITE_NEW_SHARES_ARRAY."';";
   $stringData .= ' $SHARES_DYSPLAY = array('.$WRITE_NEW_SHARES_ARRAY.');';
   $stringData .= ' ?>';
   fwrite($fh, $stringData);
   fclose($fh);
   require'../www_private/static_sections/sendmany.php';
   if($Take_Action==="sendmany") {
      $sendmany_from = $_POST['from'];
      $txid = $bitcoind->sendmany($sendmany_from, $SHARES_DYSPLAY);
      $Mining_Account_Balance = $bitcoind->getbalance($sendmany_from);
      if($txid) { $send_message = "Txid: $txid"; } else { $send_message = "Your send failed."; }
      echo '<center>'.$send_message.'</center>
            <div class="spacer"></div>';
   }
   echo '<center>
         <form action="index.php" method="POST">
         <input type="hidden" name="action" value="sendmany">
         <input type="hidden" name="page" value="sendmany">
         <table style="width: 100%;">
            <tr>
               <td class="box-header"><b>Send Many</b></td>
            </tr><tr>
               <td align="center" class="box-content">
                  <table style="width: 100%;">
                     <tr>
                        <td align="left" valign="top" class="table-cell-forml"><b>Account: </b></td>
                        <td align="right" valign="top" class="table-cell-formr">
                           <select name="from" style="width: 300px;">';
                              $listaccounts = $bitcoind->listaccounts();
                              foreach($listaccounts as $key => $value) {
                                 echo '<option value="'.$key.'">'.$key.' ('.$value.' &#3647;)</option>';
                              }
                     echo '</select>
                        </td>
                     </tr><tr>
                        <td align="left" valign="top" class="table-cell-forml"><b>To: </b></td>
                        <td align="right" valign="top" class="table-cell-formr"><textarea name="to" style="width: 100%; height: 80px;">'.$SHARES_DYPLAD.'</textarea></td>
                     </tr><tr>
                        <td colspan="2" align="right" valign="top" class="table-cell-formr"><input type="submit" name="submit" value="Send"></td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         </form>
         </center>';
}
?>