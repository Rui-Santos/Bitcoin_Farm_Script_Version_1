<?php
if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)!==true) {
   echo '<center>
         <form action="index.php" method="POST">
         <input type="hidden" name="action" value="login">
         <table class="table-cellar">
            <tr>
               <td align="left" colspan="2" class="table-cell-head">Bitcoin Farm Login</td>
            </tr><tr>
               <td colspan="2" class="table-cell-spacer"></td>
            </tr><tr>
               <td align="right" class="table-cell-forml"><b>Username: </b></td>
               <td align="right" class="table-cell-formr"><input type="text" name="user" style="width: 200px;"></td>
            </tr><tr>
               <td align="right" class="table-cell-forml"><b>Password: </b></td>
               <td align="right" class="table-cell-formr"><input type="password" name="pass" style="width: 200px;"></td>
            </tr><tr>
               <td colspan="2" align="right" class="table-cell-formr"><input type="submit" name="submit" value="Login"></td>
            </tr><tr>
               <td colspan="2" class="table-cell-spacer"></td>
            </tr>
         </table>
         </form>
         </center>';
}
?>