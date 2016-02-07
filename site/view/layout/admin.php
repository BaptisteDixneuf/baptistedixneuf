<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Administration'; ?></title>
        <link rel="stylesheet" href='//getbootstrap.com/2.3.2/assets/css/bootstrap.css'>
        <link rel="stylesheet" href='<?php echo BASE_URL . '/js/Trumbowyg/trumbowyg/design/css/trumbowyg.css' ?>'>
        <link rel="stylesheet" href='<?php echo BASE_URL . '/css/style.css' ?>'>
    </head>
    <body>

        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo Router::url('admin/posts/index') ?>">Administration</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="<?php echo Router::url('admin/posts/index') ?>" title="">Articles</a></li>

                            <li><a href="<?php echo Router::url('admin/categories/index') ?>" title="">Categories</a></li>

                            <li><a href="<?php echo Router::url('admin/pages/index') ?>" title="">Pages</a></li>

                            <li><a href="<?php echo Router::url('admin/links/index') ?>" title="">Liens</a></li>

                            <li><a href="<?php echo Router::url('admin/sources/index') ?>" title="">Sources</a></li>

                            <li><a href="<?php echo Router::url() ?>" title="">Voir le site</a></li>

                            <li><a href="<?php echo Router::url('users/logout') ?>" title=""> Se déconnecter</a></li>


                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
    </div>
</body>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>



</html>