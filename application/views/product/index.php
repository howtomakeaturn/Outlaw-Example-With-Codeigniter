<a href='/product/add' class='btn btn-default'>新增產品</a>
<table class='table table-borderd table-hover'>
    <tr>
        <th>編號</th>
        <th>Year</th>
        <th>Month</th>
        <th>Title</th>
        <th>Content</th>
        <th>File</th>
        <th>Logo = =</th>
        <th>Photos</th>
        <th>Action</th>
    </tr>
    <?php foreach($products as $p): ?>
    <tr>
        <td><?php echo $p->id ?></td>
        <td><?php echo $p->year ?></td>
        <td><?php echo $p->month ?></td>
        <td><?php echo $p->title ?></td>
        <td><?php echo $p->content ?></td>    
        <td><img src='/upload/<?php echo $p->person ?>' width=200 /></td>    
        <td><img src='/upload/<?php echo $p->logo ?>' width=50 /></td>    
        <td>
            <?php foreach($p->ownPhotos as $pho): ?>
                <a href='/upload/<?php echo $pho->name ?>''><img src='/upload/<?php echo $pho->name ?>' width=50 /></a>
            <?php endforeach; ?>
        </td>
        <td><a class='btn btn-warning' href='/product/edit/<?php echo $p->id ?>' rel='nofollow'>Edit</a></td>
        <td><a class='btn btn-danger' href='/product/delete/<?php echo $p->id ?>' rel='nofollow'>Delete</a></td>
    </tr>    
    <?php endforeach; ?>

</table>
