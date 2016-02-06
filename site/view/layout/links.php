<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Dixneuf Baptiste'; ?></title>

        <!-- style -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href='<?php echo BASE_URL . '/css/design.css' ?>'>
        <link rel="icon" type="image/png" href="<?php echo BASE_URL . '/img/favicon.ico' ?>" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->
    </head>
    <body>


        <div class="site-container">
            <div class="site-pusher">
                <header class="header">
                    <a href="#" class="header__icon" id="header__icon"></a>
                    <a href="<?php echo Router::url(''); ?>" class="header__logo">Dixneuf Baptiste</a>
                    <nav class="menu">
                        <a href="<?php echo Router::url('posts/index'); ?>">Blog Perso</a>
                        <?php $pagesMemu = $this->request('Pages', 'getMenu'); ?>
                        <?php foreach ($pagesMemu as $p): ?>
                            <a 
                                href="<?php echo Router::url("pages/view/id:{$p->id}/slug:$p->slug"); ?>" 
                                title="<?php echo $p->name; ?>">
                                    <?php echo $p->name; ?>
                            </a>
                        <?php endforeach; ?> 
                        <a href="<?php echo Router::url('links/index'); ?>">Veille Technologique</a>
                        
                    </nav>
                </header>

                <div class="site-content">
                    <div class="site-content-container">
                        <div class="jumbotron">
                            <div class="container">
                                <h1>DIXNEUF Baptiste</h1>
                                <p>Etudiant en BTS SIO, développeur HTML/CSS3 & PHP/MYSQL & JAVA</p>
                                <p><a class="btn btn-primary btn-lg"  href="<?php echo Router::url('pages/cv-dixneuf-baptiste-1'); ?>" target="_blank" role="button">En savoir plus &raquo;</a></p>
                            </div>
                        </div>
                        <div class="container">
                            <p><?php echo $this->Session->flash(); ?></p>
                            <div class="col-md-8">
                                <?php echo $content_for_layout; ?>
                            </div>
                            <div class="col-md-4">
                                <div class="cards-title">
                                    <h3 style="margin-top: 20px;">Présentation</h3>
                                </div>
                                <div class="cards">
                                    <p>Ce blog est dédié à mes deux années de BTS SIO (Services Informatiques aux Organisations) au Lycée Saint-Pierre La Joliverie à Saint-Sébastien.<p>
                                </div>

                                <div class="cards-title">
                                    <h3>Version Full JS</h3>
                                </div>
                                <div class="cards">
                                    <p><a href="http://baptistedixneuf.fr/site/veille">Go Go !</a><p>
                                </div>


                                <div class="cards-title">
                                    <h3>Top Catégories</h3>
                                </div>

                                <div class="cards">
                                <?php $topCategories = $this->request('Categories', 'getTopCategories'); ?>
                                    <?php foreach ($topCategories as $p): 
                                       
                                    ?>
                                        <div>
                                        <a 

                                            href="<?php echo Router::url("categories/view/id:{$p->id}/slug:$p->slug"); ?>" 
                                            title="<?php echo $p->name_category; ?>">
                                                <?php echo $p->name_category; ?>
                                        </a>
                                        <?php echo $p->count; ?>
                                        </div>
                                    <?php endforeach; ?> 
                                     
                                       
                                  
                                    
                                   </div>
                            </div>
                            
                        </div>
                    </div><!-- site-content-container -->
                </div><!-- site-content -->

                <div class="site-cache" id="site-cache"></div>
            </div><!-- site-pusher -->
        </div><!-- site site-container -->



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src='<?php echo BASE_URL . '/js/app.js' ?>'></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-49345916-1', 'auto');
          ga('require', 'displayfeatures');
          ga('send', 'pageview');

        </script>
    </body>
</html>