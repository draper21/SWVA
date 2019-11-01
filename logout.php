<body style="background-color:#262533;">
<?php
session_start();
session_destroy();
echo "Session Destroyed";
?>
</body>
<script type="text/javascript">location.href = 'login.php';</script>