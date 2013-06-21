<?php
session_start();
set_time_limit(0);
require_once'../www_private/jsonRPCClient.php';
require_once'../www_private/configuration.php';
?>
<html>
<head>
   <title>Bitcoin Farm</title>
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
                     <a href="index.php" style="font-size: 22px; font-weight: bold;">Bitcoin Farm</a>
                  </td>
                  <td valign="top" align="center">
                     <div align="center" class="head-comment">
                     This is a private server.<br>
                     You need to leave right away.
                     </div>
                  </td>
                  <td align="right" style="width: 300px;">
                     <?php
                     if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {    /* check and show logout button if logged in */
                        echo '<form action="index.php" method="POST">
                              <input type="hidden" name="action" value="logout">
                              <input type="submit" name="submit" value="Logout">
                              </form>';
                     }
                     ?>
                  </td>
               </tr>
            </table>
         </td>
      </tr>
   </table>
   <?php
   echo '<center>
         <table class="content">
            <tr>
               <td valign="top" align="left" style="padding: 10px;">';
                  if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)!==true) {
                     require'../www_private/pages/login.php';
                  }
                  if(usery($_SESSION['user'],$_SESSION['pass'],$Master_User,$Master_Pass)===true) {
                     require'../www_private/sections/menu.php';
                     echo '<div class="inner-content">';
                     $Page_File = '../www_private/pages/'.$page.'.php';
                     if(file_exists($Page_File)) {
                        require"$Page_File";
                     } else {
                        echo 'The page you are trying to access does not exist!';
                     }
                     echo '</div>
                     </td>
                     <td valign="top" align="left" style="width: 240px; padding: 10px;">';
                     require'../www_private/sections/right_column.php';
                  }
         echo '</td>
            </tr>
         </table>
         </center>';
   ?>
</body>
</html>
<?php
set_time_limit(30);
?>