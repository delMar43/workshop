<?php
session_start();
session_destroy();
$_SESSION = array();
?>
<script type="text/javascript">
    $('#authInfo').load('authStatus.php');
</script>