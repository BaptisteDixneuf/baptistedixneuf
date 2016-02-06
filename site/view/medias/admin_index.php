<table  class="table table-striped">
    <thead>
        <tr>
            <th>Images</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($images as $k => $v) : ?>
            <tr>
                <td>
                    <a href="#" onclick="top.tinymce.activeEditor.windowManager.getParams().oninsert('<?php echo Router::webroot('img/') . $v->file; ?>');">
                        <img src="<?php echo Router::webroot('img/' . $v->file); ?>" height="60"></a>
                </td>
                <td>
                    <?php echo $v->name; ?>
                </td>
                <td>		

                    <a onclick="return confirm('Voulez vous vraiment supprimer cette image');"
                       href="<?php echo Router::url('admin/medias/delete/' . $v->id); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<div class="page-header">
    <h1>Ajouter une image</h1>
</div>

<form class="form-horizontal" action ="<?php echo Router::url('admin/medias/index/' . $post_id); ?>" 
      method="post" enctype="multipart/form-data">
          <?php echo $this->Form->input('file', 'Image : ', array('type' => 'file')); ?>
          <?php echo $this->Form->input('name', ' Titre : '); ?>

    <div class="action">
        <input type="submit" class="btn primary" value="Envoyer">

    </div>
</form>


