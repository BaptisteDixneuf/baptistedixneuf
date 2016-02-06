<ul>
    <?php foreach ($posts as $k => $v): ?>

        <li>
            <a href="#" onclick="top.tinymce.activeEditor.windowManager.getParams().oninsert('<?php echo Router::url($v->type . 's/view/id:' . $v->id . '/slug:' . $v->slug); ?>');">

                <?php echo ucfirst($v->type); ?> : <?php echo $v->name; ?></a></li>

    <?php endforeach; ?>
</ul>