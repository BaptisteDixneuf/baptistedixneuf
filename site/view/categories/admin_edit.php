<div class="page-header">
    <h1>Editer une catégorie</h1>
</div>


<form class="form-horizontal" action ="<?php echo Router::url('admin/categories/edit/' . $id); ?>" method="post">
    <?php echo $this->Form->input('name_category', 'Titre : '); ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>
    <?php echo $this->Form->input('slug', ' Slug : '); ?>
    <?php echo $this->Form->input('online', 'En ligne : ', array('type' => 'checkbox')); ?>
    <div class="action">
        <input type="submit" class="btn primary" value="Envoyer">

    </div>
</form>

