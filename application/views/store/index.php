<a href='/store/add' class='btn btn-default'>新增分店</a>
<table class='table table-borderd table-hover'>
    <tr>
        <th>編號</th>
        <th>店名</th>
        <th>負責人</th>
        <th>電話</th>
        <th>地址</th>
    </tr>
    <?php foreach($stores as $store): ?>
    <tr>
        <td><?php echo $store->id ?></td>
        <td><?php echo $store->name ?></td>
        <td><?php echo $store->boss ?></td>
        <td><?php echo $store->phone ?></td>
        <td><?php echo $store->address ?></td>    
    </tr>    
    <?php endforeach; ?>

</table>
