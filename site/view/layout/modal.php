<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Administration'; ?></title>
        <link rel="stylesheet" href='https://getbootstrap.com/2.3.2/assets/css/bootstrap.css'>
        <link rel="stylesheet" href='<?php echo BASE_URL . '/css/style.css' ?>'>
    </head>
    <body>



        <div >
            <?php echo $this->Session->flash(); ?>
            <?php echo $content_for_layout; ?>
        </div>
    </body>




</html>