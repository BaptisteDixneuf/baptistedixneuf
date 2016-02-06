<div class="page-header">
    <h1>Mon blog</h1>
</div>



<?php foreach ($posts as $k => $v): ?>
    <div class="article" itemscope itemtype="http://schema.org/Article">
        <h2 class="cards-title article-titre" itemprop="name" ><?php echo $v->name; ?></h2>
        <div class="article-informations" >
            <span class="glyphicon glyphicon-calendar"> 
            </span > 
            <span itemprop="datePublished"><?php echo $v->created; ?>
            </span >  
            - 
            <span class="glyphicon glyphicon-folder-open"> 
            </span>
            <span  itemprop="articleSection">
                <?php echo $v->name_category; ?>
            </span > 
            - 
            <span class="glyphicon glyphicon-user">
            </span>
            <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                <span itemprop="name">Dixneuf Baptiste</span>
            </span > 

        </div>
        <div class="cards article-contenu" itemprop="articleBody" >
            <?php echo $v->content; ?>

            <ul class="pager">
                <li class="next">
                    <a  itemprop="url" href="<?php echo Router::url("posts/view/id:{$v->id}/slug:$v->slug"); ?>"> Lire la suite &rarr;</a>
                </li>
            </ul>

        </div>

    </div>
<?php endforeach ?>


<div class="paginate wrapper">
<ul>
    <?php for ($i = 1; $i <= $page; $i++): ?>
        <li>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $this->request->page) echo 'class="active"' ?> >
                <?php echo $i; ?>
            </a>
        </li>
    <?php endfor; ?>  
</ul>
</div>
