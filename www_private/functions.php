<?php
function encrypy($word) {
   $salt = sha1(md5('SAlT'.$word));
   $encrypy_word = md5(sha1(md5($word.$salt)).$salt);
   return $encrypy_word;
}
function satoshisize($satoshitize) {
   return rtrim(rtrim(sprintf("%.8f", $satoshitize), "0"), ".");
}
function loginy($user,$pass,$MasterUser,$MasterPass) {
   if($user===$MasterUser) {
      if($pass===$MasterPass) {
         $_SESSION['user'] = $MasterUser;
         $_SESSION['pass'] = $MasterPass;
      }
   }
   header("Location: index.php");
}
function usery($user,$pass,$MasterUser,$MasterPass) {
   if($user===$MasterUser) {
      if($pass===$MasterPass) {
         return true;
      } else {
         return false;
      }
   } else {
      return false;
   }
}
?>