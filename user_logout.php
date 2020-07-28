<?php
    session_start();
    session_destroy();
    echo "<script>alert(\"已登出!即將回到小遊戲首頁!\"); parent.location.href='homepage.php';</script>";
?>