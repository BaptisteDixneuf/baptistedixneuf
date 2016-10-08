<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Markdown Editor</title>

  <!-- Bootstrap core CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://rawgit.com/Grafikart/JS-Markdown-Editor/master/dist/mdeditor.css">
  <!-- Custom styles for this template -->
  <style>
    .starter-template{
      margin-top: 100px;
    }
  </style>
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




</html>