<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   if($Take_Action==="send") {
      $send_from = $_POST['from'];
      $send_to = $_POST['to'];
      if(isset($_POST['amount'])) {
         $send_amount = floatval($_POST['amount']);
         $txid = $bitcoind->sendfrom($send_from,$send_to,$send_amount);
         if($txid) { $send_message = "Txid: $txid"; } else { $send_message = "Your send failed."; }
         echo '<center>'.$send_message.'</center>
               <div class="spacer"></div>';
      }
   }
   echo '<center>
         <form method="POST" action="index.php">
         <input type="hidden" name="action" value="send">
         <input type="hidden" name="page" value="send">
         <table class="table-cellar">
            <tr>
               <td align="left" colspan="2" class="table-cell-head">Send Bitcoins</td>
            </tr><tr>
               <td colspan="2" class="table-cell-spacer"></td>
            </tr><tr>
               <td align="right" valign="top" class="table-cell-forml"><b>From</b></td>
               <td align="right" valign="top" class="table-cell-formr">
                  <select name="from" style="width: 300px;">';
                     $listaccounts = $bitcoind->listaccounts();
                     foreach($listaccounts as $key => $value) {
                        echo '<option value="'.$key.'">'.$key.' ('.$value.' &#3647;)</option>';
                     }
            echo '</select>
               </td>
            </tr><tr>
               <td align="right" valign="top" class="table-cell-forml"><b>To</b></td>
               <td align="right" valign="top" class="table-cell-formr"><input type="text" name="to" style="width: 300px;"></td>
            </tr><tr>
               <td align="right" valign="top" class="table-cell-forml"><b>Amount</b></td>
               <td align="right" valign="top" class="table-cell-formr"><input type="text" name="amount" style="width: 300px;"></td>
            </tr><tr>
               <td colspan="2" align="right" valign="top" class="table-cell-formr"><input type="submit" name="submit" value="Send"></td>
            </tr><tr>
               <td colspan="2" class="table-cell-spacer"></td>
            </tr>
         </table>
         </form>
         </center>';
}
?>