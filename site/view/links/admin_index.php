<div class="page-header">
    <h1>Liens</h1>
</div>

<table  class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($links as $k => $v) : ?>
            <tr>
                <td><?php echo $v->id ?></td>
                <td><?php echo $v->date ?></td>
                <td><?php echo $v->link ?></td>
                <td>
                    <a href="<?php echo Router::url('admin/links/edit/' . $v->id); ?>">Editer</a>
                    <a onclick="return confirm('Voulez vous vraiment supprimer ce lien');"
                       href="<?php echo Router::url('admin/links/delete/' . $v->id); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach ?>



    </tbody>
</table>


<a href="<?php echo Router::url('admin/links/edit'); ?>" class="primary btn">Ajouter un lien</a>