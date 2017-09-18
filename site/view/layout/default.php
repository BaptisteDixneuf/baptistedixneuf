<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Dixneuf Baptiste'; ?></title>

        <!-- style -->
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
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
						<a href="https://www.linkedin.com/in/baptistedixneuf/">CV</a>
                        <a href="<?php echo Router::url('posts/index'); ?>">Blog Perso</a>
                        <?php $pagesMemu = $this->request('Pages', 'getMenu'); ?>
                        <?php foreach ($pagesMemu as $p): ?>
                            <a 
                                href="<?php echo Router::url("pages/view/id:{$p->id}/slug:$p->slug"); ?>" 
                                title="<?php echo $p->name; ?>">
                                    <?php echo $p->name; ?>
                            </a>
                        <?php endforeach; ?> 
                        
                    </nav>
                </header>

                <div class="site-content">
                    <div class="site-content-container">
                        <div class="jumbotron">
                            <div class="container">
                                <h1>DIXNEUF Baptiste</h1>
                                <p><a class="btn btn-primary btn-lg"  href="https://www.linkedin.com/in/baptistedixneuf/" target="_blank" role="button">En savoir plus &raquo;</a></p>
                            </div>
                        </div>
                        <div class="container">
                            <p><?php echo $this->Session->flash(); ?></p>
                            <div class="col-md-8">
                                <?php echo $content_for_layout; ?>
                            </div>

                            <div class="col-md-4">
                                <div class="cards-title">
                                    <h3>Me suivre </h3>
                                </div>
                                <div class="cards">
                                    <a class=" Twitter" href="https://twitter.com/Xhelty19" target="_blank"> <img src="<?php echo BASE_URL . '/img/twitter.png' ?>" alt="Twitter" /></a>
                                    <a class=" Google Plus" href="https://plus.google.com/+BaptisteDixneuf19/posts" target="_blank"> <img src="<?php echo BASE_URL . '/img/google+.png' ?>" alt="Google Plus" /> </a>
                                    <a class=" Viadeo" href="http://www.viadeo.com/profile/0021qnknoznjacy3/" target="_blank"> <img src="<?php echo BASE_URL . '/img/viadeo.png' ?>" alt="Viadeo" /></a>
                                    <a class=" Linkedin" href="http://www.linkedin.com/pub/baptiste-dixneuf/81/a11/79/" target="_blank"> <img src="<?php echo BASE_URL . '/img/linkedin.png' ?>" alt="Linkedin" /></a>
                                    <a class=" Github" href="https://github.com/BaptisteDixneuf" target="_blank"> <img src="<?php echo BASE_URL . '/img/github.png' ?>" alt="Github" /></a>
                                </div>
                                <div class="cards-title">
                                    <h3>Mes derniers Tweets</h3>
                                </div>
                                <div class="cards">
                                    <?php
                                    $cache = 'cache/tweets.tmp';

                                    if (time() - filemtime($cache) > 60) {
                                        require('class/twitteroauth.php');
                                        $connection = new TwitterOAuth('WABDKoMljvuWaRNxr2q5bQ', 'LdX8qimrkPy1SRvxxeitVmZRvT8tCkUztYvcNcnl92E', '191146457-RGs4lavR8eDp23hZl8pwOSSW2mZhhfIhbESnb2qS', '0B6CEE9n3n6cA6aJm3pRzmmkEc5ua2kBzqIS42RpRGWE9');
                                        $tweets = $connection->get('statuses/user_timeline', array('count' => 5));
                                        file_put_contents($cache, serialize($tweets));
                                    } else {

                                        $tweets = unserialize(file_get_contents($cache));
                                    }
                                    ?>

                                    <ul>
                                        <?php foreach ($tweets as $k => $tweet): ?>
                                            <li><?php echo $tweet->text; ?> </li>
                                            <?php
                                        endforeach
                                        ?>
                                    </ul>
                                </div>
                                <div class="cards-title">
                                    <h3>Mentions Légales</h3>
                                </div>
                                <div class="cards">
                                    <a href="<?php echo Router::url('pages/mentions-legales-3'); ?>">Mentions Légales</a>
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