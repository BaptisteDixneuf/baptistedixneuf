<?php
$title_for_layout = $category->name_category;
?>
<div class="page-titre" >
    <h1><?php echo $category->name_category; ?></h1>
</div>

<div class="page-contenu" >
    <?php foreach ($liens as $k => $v): ?>
        <div class="liens"> 	
            <h2 class="liens-titre" itemprop="name" > 
                <a href="<?php echo $v->link; ?>" >
                    <?php echo $v->link; ?></a>
            </h2>
            <div class="liens-contenu">
                <p><?php echo $v->content; ?></p>
            </div>
            <ul class="pager">
                <li class="next">
                    <div>
                        <a  href="<?php echo $v->link; ?>"> Lien vers le site &rarr; </a>
                    </div>
                    <div>
                        <a  href="<?php echo Router::url("links/view/id:{$v->id}"); ?>"> Commenter &rarr; </a>
                    </div>
                </li>
            </ul>

        </div>

    <?php endforeach ?>
</div>