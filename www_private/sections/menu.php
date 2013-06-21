<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
   echo '<table class="tabs" cellpadding="0" cellspacing="0">
            <tr>
               <td class="tab0"></td>';

   if($page==="home") { echo '<td class="tab1" nowrap><a href="index.php?page=home">Home</a></td>'; }
   else { echo '<td class="tab2" nowrap><a href="index.php?page=home">Home</a></td>'; }

   echo '<td class="tab"></td>';

   if($page==="send") { echo '<td class="tab1" nowrap><a href="index.php?page=send">Send</a></td>'; }
   else { echo '<td class="tab2" nowrap><a href="index.php?page=send">Send</a></td>'; }

   echo '<td class="tab"></td>';

   if($page==="move") { echo '<td class="tab1" nowrap><a href="index.php?page=move">Move</a></td>'; }
   else { echo '<td class="tab2" nowrap><a href="index.php?page=move">Move</a></td>'; }

   echo '<td class="tab"></td>';

   if($page==="sendmany") { echo '<td class="tab1" nowrap><a href="index.php?page=sendmany">Send Many</a></td>'; }
   else { echo '<td class="tab2" nowrap><a href="index.php?page=sendmany">Send Many</a></td>'; }

   echo '<td class="tab"></td>';

   if($page==="eclipsemc") { echo '<td class="tab1" nowrap><a href="index.php?page=eclipsemc">EclipseMC</a></td>'; }
   else { echo '<td class="tab2" nowrap><a href="index.php?page=eclipsemc">EclipseMC</a></td>'; }

   echo '<td class="tab3"></td>
      </tr>
   </table>';
}
?>