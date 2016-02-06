<div class="page-header">
    <h1>Editer Un  Article</h1>
</div>


<form class="form-horizontal" action ="<?php echo Router::url('admin/posts/edit/' . $id); ?>" method="post">
    <?php echo $this->Form->input('name', 'Titre : '); ?>
    <?php echo $this->Form->input('slug', ' Slug : '); ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>
    <?php echo $this->Form->input('content', 'Contenu : ', array('type' => 'textarea', 'class' => 'wysiwyg', 'cols' => '100', 'rows' => '20')); ?>
    <?php echo $this->Form->input('online', 'En ligne : ', array('type' => 'checkbox')); ?>
    <div class="control-group ">
        <label class="control-label" for="inputid_category"> Id catégorie: </label>
        <div class="controls">
            <select name="id_category">
                <?php foreach ($categorys as $k => $v) : ?>
                    <option value="<?php echo $v->id; ?>"> <?php echo $v->name_category; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>

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