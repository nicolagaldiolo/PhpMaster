<?php include('basic_auth.php'); ?>
<?php if(server_basic_auth()) : ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Secret Page</title>
    </head>
    <body>
    <?php echo '<h1>PAGE TWO Here it is!</h1> <p>I bet you are glad you can see this secret page.</p>'; ?>
    <a href="index.php">Page1</a>
    <a href="?logout">Logout</a>
    </body>
    </html>
<?php endif; ?>