<a href='/store/add' class='btn btn-default'>新增分店</a>
<table class='table table-borderd table-hover'>
    <tr>
        <th>編號</th>
        <th>店名</th>
        <th>負責人</th>
        <th>電話</th>
        <th>地址</th>
        <th>後台帳號</th>
        <th>動作</th>
    </tr>
    <?php foreach($stores as $store): ?>
    <tr>
        <td><?php echo $store->id ?></td>
        <td><?php echo $store->name ?></td>
        <td><?php echo $store->boss ?></td>
        <td><?php echo $store->phone ?></td>
        <td><?php echo $store->address ?></td>    
        <td><?php echo $store->account ?></td>    
        <td>
            <a class="btn btn-warning" href='/store/edit?ol_table=stores&ol_id=<?php echo $store->id ?>'><i class="fa fa-pencil fa-fw"></i></a>

        </td>
    </tr>    
    <?php endforeach; ?>

</table>
