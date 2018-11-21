<?php
    
    session_start();
	session_destroy();
	unset($_SESSION['username']);
	
?>
 
  <script type="text/javascript">
  alert("logout successfully ");
   document.location.href="index.php";
 </script>
 <?php
 
?>