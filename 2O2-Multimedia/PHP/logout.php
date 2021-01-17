<?php
    // Start the session
    //The session_start() function must be the very first thing in your document. Before any HTML tags.
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
    <head>
        <meta http-equiv="refresh" content="0; url=account.php">
    </head>
    <body>
    You are sucessfully logged out !!

    
    </body>
</html>