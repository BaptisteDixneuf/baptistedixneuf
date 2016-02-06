<?php
$title_for_layout = "Lien - " .$link->link;
?>



<div class="page-header">
    <h1> Lien - <?php echo $link->link; ?></h1>
</div>

    <div class="liens">     
        <h2 class="liens-titre" itemprop="name" > 
            <a href="<?php echo $link->link; ?>" >
                <?php echo $link->link; ?></a>
        </h2>
        <div class="liens-informations" >
            <?php if (isset($category)) { ?>
                <?php foreach ($category as $key => $category): ?>

                    <a href="<?php echo Router::url("categories/view/id:{$category->category_id}/slug:$category->slug"); ?>"> <?php echo "#" . $category->name_category; ?></a>
                <?php endforeach ?> 
                <?php
            }else {
                echo "Aucune Catégorie";
            }
            ?>
        </div>
        <div class="liens-contenu">
            <p><?php echo $link->content; ?></p>
        </div>

        <div class="liens-description">
            <h3> Description : </h3>
            <p><?php echo $link->description; ?></p>
        </div>
        

   


        <div class="article-like">
            <p><i>Vous avez aimé ce lien ? Alors partagez-le avec vos amis en cliquant sur les boutons ci-dessous :</i></p>
            <p>
                <a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php echo 'http://' . HOST . Router::url("links/view/id:{$link->id}"); ?>&text=<?php echo "Lien - ".$link->link; ?>&via=Xhelty19" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');
                        return false;"><img src="<?php echo BASE_URL . '/img/twitter_icon.png' ?>" alt="Twitter" /></a>
                <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo HOST . Router::url("links/view/id:{$link->id}"); ?>&t=<?php echo "Lien - ".$link->link; ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');
                        return false;"><img src="<?php echo BASE_URL . '/img/facebook_icon.png' ?>" alt="Facebook" /></a>
                <a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php echo HOST . Router::url("links/view/id:{$link->id}"); ?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');
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


