<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   echo '<table>
            <tr>
               <td class="box-header"><b>Balances: </b></td>
            </tr><tr>
               <td class="box-content">
                  <table style="width: 100%;">
                     <tr>
                        <td align="left" style="font-size: 10px;"><b>Total Balance: </b></td>
                        <td align="right" style="font-size: 10px;">'.satoshisize($Global_Balance).' &#3647;</td>
                     </tr>';
         $listaccounts = $bitcoind->listaccounts();
         foreach($listaccounts as $key => $value) {
            if($value!=0) {
               echo '<tr>
                        <td align="left" style="font-size: 10px;"><b>'.$key.': </b></td>
                        <td align="right" style="font-size: 10px;">'.satoshisize($value).' &#3647;</td>
                     </tr>';
            }
         }
            echo '</table>
               </td>
            </tr>
         </table>';

   echo '<div class="spacer"></div>';

   echo '<table>
            <tr>
               <td class="box-header"><b>Mining Statistics: </b></td>
            </tr><tr>
               <td class="box-content">
                  <table style="width: 100%; height: 60px;">
                     <tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Hash Rate: </b></td>
                        <td align="right" style="font-size: 10px;">'.$decode_eclipsemc['workers'][0]['hash_rate'].'</td>
                     </tr><tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Confirmed: </b></td>
                        <td align="right" style="font-size: 10px;">'.satoshisize($decode_eclipsemc['data']['user']['confirmed_rewards']).' &#3647;</td>
                     </tr>';
            if($EclipseMC_PPS!==true) {
               echo '<tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Unconfirmed: </b></td>
                        <td align="right" style="font-size: 10px;">'.satoshisize($decode_eclipsemc['data']['user']['unconfirmed_rewards']).' &#3647;</td>
                     </tr><tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Estimated: </b></td>
                        <td align="right" style="font-size: 10px;">'.satoshisize($decode_eclipsemc['data']['user']['estimated_rewards']).' &#3647;</td>
                     </tr>';
            }
               echo '<tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Round Shares: </b></td>
                        <td align="right" style="font-size: 10px;">'.number_format((int)$decode_eclipsemc['workers'][0]['round_shares']).'</td>
                     </tr><tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Total Shares: </b></td>
                        <td align="right" style="font-size: 10px;">'.number_format((int)$decode_eclipsemc['workers'][0]['total_shares']).'</td>
                     </tr><tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Total Earned: </b></td>
                        <td align="right" style="font-size: 10px;">'.satoshisize($decode_eclipsemc['data']['user']['total_payout']).' &#3647;</td>
                     </tr><tr>
                        <td align="left" style="font-size: 10px;" nowrap><b>Blocks Found: </b></td>
                        <td align="right" style="font-size: 10px;">'.$decode_eclipsemc['data']['user']['blocks_found'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Last Activity: </b></td>
                        <td align="right" style="font-size: 10px;">'.$decode_eclipsemc['workers'][0]['last_activity'].'</td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>';

   echo '<div class="spacer"></div>';

   $getinfo = $bitcoind->getinfo();
   if(!$getinfo['version']) { $getinfo['version'] = "Unknown"; }
   if(!$getinfo['protocolversion']) { $getinfo['protocolversion'] = "Unknown"; }
   if(!$getinfo['walletversion']) { $getinfo['walletversion'] = "Unknown"; }
   if(!$getinfo['blocks']) { $getinfo['blocks'] = "Unknown"; }
   if(!$getinfo['connections']) { $getinfo['connections'] = "0"; }
   if(!$getinfo['proxy']) { $getinfo['proxy'] = "(none)"; }
   if(!$getinfo['difficulty']) { $getinfo['difficulty'] = "Unknown"; }
   if(!$getinfo['testnet']) { $getinfo['testnet'] = "(none)"; }
   if(!$getinfo['keypoololdest']) { $getinfo['keypoololdest'] = "Unknown"; }
   if(!$getinfo['keypoolsize']) { $getinfo['keypoolsize'] = "Unknown"; }
   if(!$getinfo['paytxfee']) { $getinfo['paytxfee'] = "0"; }
   if(!$getinfo['errors']) { $getinfo['errors'] = "(none)"; }
   echo '<table>
            <tr>
               <td class="box-header"><b>Network Statistics: </b></td>
            </tr><tr>
               <td class="box-content">
                  <table style="width: 100%; height: 60px;">
                     <tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Bitcoind Vesion:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['version'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Protocol Vesion:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['protocolversion'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Wallet Vesion:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['walletversion'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Blocks:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['blocks'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Connections:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['connections'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Proxy:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['proxy'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Difficulty:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['difficulty'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Testnet:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['testnet'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Keypoololdest:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['keypoololdest'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Keypoolsize:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['keypoolsize'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Fee Set:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['paytxfee'].'</td>
                     </tr><tr>
                        <td valign="top" style="font-size: 10px;" align="left" nowrap><b>Errors:</b></td>
                        <td align="right" style="font-size: 10px;">'.$getinfo['errors'].'</td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         </center>';
   }
?>