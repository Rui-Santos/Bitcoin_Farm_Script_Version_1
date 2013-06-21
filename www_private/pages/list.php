<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   if(isset($_GET['account'])) {
      $list_account = $_GET['account'];
   } else {
      $list_account = '';
   }
   echo '<center>
         <table class="table-cellar" style="width: 100%;">
            <tr>
               <td align="left" class="table-cell-head">Addresses Associated with '.$list_account.'</td>
            </tr>';
               $account_list = $bitcoind->getaddressesbyaccount($list_account);
               foreach($account_list as $key => $value) {
                  echo '<tr>
                           <td align="left" class="table-cell">'.$value.'</td>
                        </tr>';
               }
   echo '</table>
         </center>';
}
?>