<div class="page-header">
    <h1>Source</h1>
</div>

<table  class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Type</th>
            <th>Contenu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($sources as $k => $v) : ?>
            <tr>
                <td><?php echo $v->id ?></td>
                <td><?php echo $v->date ?></td>
                <td><?php echo $v->type ?></td>
                <td><?php echo $v->content ?></td>
                <td>
                    <a href="<?php echo Router::url('admin/sources/edit/' . $v->id); ?>">Editer</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer ce lien');"
                       href="<?php echo Router::url('admin/sources/delete/' . $v->id); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach ?>



    </tbody>
</table>


<a href="<?php echo Router::url('admin/sources/edit'); ?>" class="primary btn">Ajouter une source</a>