<div class="page-header">
    <h1>Editer un lien</h1>
</div>


<form class="form-horizontal" action ="<?php echo Router::url('admin/links/edit/' . $id); ?>" method="post">
    <?php echo $this->Form->input('link', 'Lien : '); ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>
    <div id="test">
        
    </div>
    <?php echo $this->Form->input('content', 'Contenu : ', array('type' => 'textarea', 'class' => 'wysiwyg', 'cols' => '100', 'rows' => '20')); ?>
    <?php echo $this->Form->input('description', 'Description : ', array('type' => 'textarea', 'class' => 'wysiwyg', 'cols' => '100', 'rows' => '20')); ?>
    <?php echo $this->Form->input('online', 'En ligne : ', array('type' => 'checkbox')); ?>
    <p>
        Cochez les tags associés à ce lien : ( à réactualiser à chaque éditions)<br />
        <?php foreach ($categorys as $k => $v) : ?>
            <?php echo $this->Form->input($v->id, $v->name_category, array('type' => 'checkbox')); ?>
        <?php endforeach ?>

    <div class="action">
        <input type="submit" class="btn primary" value="Envoyer">

    </div>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>        
<script type="text/javascript" src="<?php echo Router::webroot('js/Trumbowyg/trumbowyg/trumbowyg.js'); ?>"></script>
<script type="text/javascript" src="<?php echo Router::webroot('js/Trumbowyg/trumbowyg/plugins/upload/trumbowyg.upload.js'); ?>"></script>
<script type="text/javascript" src="<?php echo Router::webroot('js/Trumbowyg/trumbowyg/plugins/base64/trumbowyg.base64.js'); ?>"></script>
<script>




    $('.wysiwyg').trumbowyg({
        lang: 'fr',
        closable: true,
        fixedBtnPane: true,
        btnsDef: {
            // Customizables dropdowns
            align: {
                dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ico: 'justifyLeft'
            },
            image: {
                dropdown: ['insertImage', 'upload', 'base64'],
                ico: 'insertImage'
            }

        },
        btns: ['viewHTML',
            '|', 'formatting',
            '|', 'bold', 'italic', 'underline', 'strikethrough',
            '|', 'link',
            '|', 'btnGrp-test',
            '|', 'align',
            '|', 'btnGrp-lists',
            '|', 'image']
    });




</script>

</script>