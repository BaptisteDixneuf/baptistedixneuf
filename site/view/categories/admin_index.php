<div class="page-header">
    <h1> Catégories</h1>
</div>


<table  class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($categorys as $k => $v) : ?>
            <tr>
                <td><?php echo $v->id ?></td>
                <td>
                    <?php echo $v->name_category ?>
                </td>
                <td>
                    <a href="<?php echo Router::url('admin/categories/edit/' . $v->id); ?>">Editer</a>
                            <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu');"
                               href="<?php echo Router::url('admin/categories/delete/' . $v->id); ?>">Supprimer</a>
                        </td>
                    </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <a href="<?php echo Router::url ('admin/categories/edit'); ?>" class="primary btn">Ajouter une catégorie</a>