<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   echo '<center>
         <table class="table-cellar" style="width: 100%;">
            <tr>
               <td align="left" class="table-cell-head">Account</td>
               <td align="left" class="table-cell-head">Address</td>
               <td align="left" class="table-cell-head">Balance</td>
            </tr>';
   $listaccounts = $bitcoind->listaccounts();
   foreach($listaccounts as $key => $value) {
      $responce = $bitcoind->getaccountaddress($key);
      echo '<tr>
               <td align="left" class="table-cell"><a href="index.php?account='.$key.'">'.$key.'</a></td>
               <td align="left" class="table-cell">'.$responce.'</td>
               <td align="right" class="table-cell">'.satoshisize($value).' &#3647;</td>
            </tr>';
   }
   echo '</table>
         </center>';
}
?>