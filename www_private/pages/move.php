<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   if($Take_Action==="move") {
      $move_from = $_POST['from'];
      $move_to = $_POST['to'];
      if(isset($_POST['amount'])) {
         $move_amount = floatval($_POST['amount']);
         $move = $bitcoind->move($move_from,$move_to,$move_amount);
         if($move==="1") { $move_message = "You made a move."; } else { $move_message = "Your move failed."; }
         echo '<center>'.$move_message.'</center>
               <div class="spacer"></div>';
      }
   }
   echo '<center>
         <form method="POST" action="index.php">
         <input type="hidden" name="action" value="move">
         <input type="hidden" name="page" value="move">
         <table class="table-cellar">
            <tr>
               <td align="left" colspan="2" class="table-cell-head">Move Bitcoins Between Accounts</td>
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
               <td align="right" valign="top" class="table-cell-formr">
                  <select name="to" style="width: 300px;">';
                     $listaccounts = $bitcoind->listaccounts();
                     foreach($listaccounts as $key => $value) {
                        echo '<option value="'.$key.'">'.$key.' ('.$value.' &#3647;)</option>';
                     }
            echo '</select>
               </td>
            </tr><tr>
               <td align="right" valign="top" class="table-cell-forml"><b>Amount</b></td>
               <td align="right" valign="top" class="table-cell-formr"><input type="text" name="amount" style="width: 300px;"></td>
            </tr><tr>
               <td colspan="2" align="right" valign="top" class="table-cell-formr"><input type="submit" name="submit" value="Move"></td>
            </tr><tr>
               <td colspan="2" class="table-cell-spacer"></td>
            </tr>
         </table>
         </form>
         </center>';
}
?>