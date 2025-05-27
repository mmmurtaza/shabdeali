<?php
include '../masakin/config.php';
$login_link = $google_client->createAuthUrl();



?>
<script>
    window.location.href='<?php echo $login_link;?>';

</script>

