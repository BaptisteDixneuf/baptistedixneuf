<div class="page-header">
    <h1>Editer Une Page</h1>
</div>


<form class="form-horizontal" action ="<?php echo Router::url('admin/pages/edit/' . $id); ?>" method="post">
    <?php echo $this->Form->input('name', 'Titre : '); ?>
    <?php echo $this->Form->input('slug', ' Slug : '); ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>
    <?php echo $this->Form->input('content', 'Contenu : ', array('type' => 'textarea', 'class' => 'mdeditor', 'cols' => '100', 'rows' => '20')); ?>
    <?php echo $this->Form->input('online', 'En ligne : ', array('type' => 'checkbox')); ?>
    <?php echo $this->Form->input('menu', 'Dans le menu : ', array('type' => 'checkbox')); ?>
    <?php echo $this->Form->input('is_markdown', 'Markdown : ', array('type' => 'checkbox')); ?>
    <div class="action">
        <input type="submit" class="btn primary" value="Envoyer">

    </div>
</form>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://rawgit.com/Grafikart/JS-Markdown-Editor/master/dist/mdeditor.min.js"></script>

<script>
  var md = new MdEditor('.mdeditor', {
    uploader: 'http://local.dev/Lab/MdEditor/app/upload.php',
    preview: true,
    images: [
      {id: '1.jpg', url: 'http://lorempicsum.com/futurama/200/200/1'},
      {id: '1.jpg', url: 'http://lorempicsum.com/futurama/200/200/2'},
      {id: '1.jpg', url: 'http://lorempicsum.com/futurama/200/200/3'},
      {id: '1.jpg', url: 'http://lorempicsum.com/futurama/200/200/4'}
    ]
  });
  
</script>

