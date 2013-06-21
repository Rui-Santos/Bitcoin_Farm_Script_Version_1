<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   $EclipseMC_API_URL = "https://eclipsemc.com/api.php?key=".$EclipseMC_API."&action=poolstats";
   $json_eclipsemc = file_get_contents($EclipseMC_API_URL);
   $decode_eclipsemc_poolstats = json_decode($json_eclipsemc, true);
   echo '<center>
         <table class="table-cellar" style="width: 100%;">
            <tr>
               <td align="left" class="table-eclipsecell-head">Worker Name</td>
               <td align="left" class="table-eclipsecell-head">Hash Rate</td>
               <td align="left" class="table-eclipsecell-head">Round Shares</td>
               <td align="left" class="table-eclipsecell-head">Total Shares</td>
               <td align="left" class="table-eclipsecell-head">Last Activity</td>
            </tr>';
   foreach($decode_eclipsemc['workers'] as $worker) {
      echo '<tr>
               <td align="left" class="table-eclipsecell">'.$worker['worker_name'].'</td>
               <td align="right" class="table-eclipsecell">'.$worker['hash_rate'].'</td>
               <td align="right" class="table-eclipsecell">'.number_format((int)$worker['round_shares']).'</td>
               <td align="right" class="table-eclipsecell">'.number_format((int)$worker['total_shares']).'</td>
               <td align="right" class="table-eclipsecell">'.$worker['last_activity'].'</td>
            </tr>';
   }
   echo '</table>
         </center>
         <div class="spacer"></div>
         <table class="table-cellar">
            <tr>
               <td align="left" colspan="2" class="table-cell-head">Eclipse Mining Consortium</td>
            </tr><tr>
               <td align="left" class="table-cell"><b>Hash Rate</b></td>
               <td align="right" class="table-cell">'.$decode_eclipsemc_poolstats['hashrate'].'</td>
            </tr><tr>
               <td align="left" class="table-cell"><b>Active Workers</b></td>
               <td align="right" class="table-cell">'.number_format((int)$decode_eclipsemc_poolstats['active_workers']).'</td>
            </tr><tr>
               <td align="left" class="table-cell"><b>Round Shares</b></td>
               <td align="right" class="table-cell">'.number_format((int)$decode_eclipsemc_poolstats['round_shares']).'</td>
            </tr><tr>
               <td align="left" class="table-cell"><b>Round Duration</b></td>
               <td align="right" class="table-cell">'.number_format((int)$decode_eclipsemc_poolstats['round_duration']).'</td>
            </tr><tr>
               <td align="left" class="table-cell"><b>Avg Shares Block</b></td>
               <td align="right" class="table-cell">'.number_format((int)$decode_eclipsemc_poolstats['avg_shares_block']).'</td>
            </tr>
         </table>';
}
?>