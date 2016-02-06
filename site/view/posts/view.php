<?php
$title_for_layout = $post->name;
?>

<div class="page-header">
    <h1><?php echo $post->name; ?></h1>
</div>

<div class="article" itemscope itemtype="http://schema.org/Article">
    <h2 class="cards-title article-titre" itemprop="name" >
        <?php echo $post->name; ?>
    </h2>
    <p class="article-informations" >
        <span class="glyphicon glyphicon-calendar"> 
        </span > 
        <span itemprop="datePublished"><?php echo $post->created; ?>
        </span >  
        - 
        <span class="glyphicon glyphicon-folder-open"> 
        </span>
        <span  itemprop="articleSection">
            <?php echo $post->name_category; ?>
        </span > 
        - 
        <span class="glyphicon glyphicon-user">
        </span>
        <span itemprop="author" itemscope itemtype="http://schema.org/Person">
            <span itemprop="name">Dixneuf Baptiste</span>
        </span > 

    </p>
    <div class="cards article-contenu" itemprop="articleBody" >
        <?php echo $post->content; ?>


        <div class="article-like">
            <p><i>Vous avez aimé cet article ? Alors partagez-le avec vos amis en cliquant sur les boutons ci-dessous :</i></p>
            <p>
                <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php echo 'http://' . HOST . Router::url("posts/view/id:{$post->id}/slug:$post->slug"); ?>&text=<?php echo $post->name; ?>&via=Xhelty19" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');
                        return false;"><img src="<?php echo BASE_URL . '/img/twitter_icon.png' ?>" alt="Twitter" /></a>
                <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo HOST . Router::url("posts/view/id:{$post->id}/slug:$post->slug"); ?>&t=<?php echo $post->name; ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');
                        return false;"><img src="<?php echo BASE_URL . '/img/facebook_icon.png' ?>" alt="Facebook" /></a>
                <a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php echo HOST . Router::url("posts/view/id:{$post->id}/slug:$post->slug"); ?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');
                        return false;"><img src="<?php echo BASE_URL . '/img/gplus_icon.png' ?>" alt="Google Plus" /></a>
            </p>
        </div>

        <div class="article-commentaires">
            <h3>Commentaire(s)</h3>
            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'baptistedixneuf'; // required: replace example with your forum shortname

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script');
                    dsq.type = 'text/javascript';
                    dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        </div>
    </div>

</div>   

