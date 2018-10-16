<?php
	// session initialization
	session_start();

  // verifying if message session exists
  if (isset($_SESSION['message'])) { ?>
    <script>
      window.onload = function() {
        M.toast({html: '<?php echo $_SESSION['message'] ?>' });
      };
    </script>
    <?php
      $_SESSION['message'] = '';
  }
?>

