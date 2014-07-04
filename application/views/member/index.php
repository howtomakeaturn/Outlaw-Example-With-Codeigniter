<a href='/member/add' class='btn btn-default'>新增會員</a>
<table class='table table-borderd table-hover'>
    <tr>
        <th>編號</th>
        <th>建檔店別</th>
        <th>會員姓名</th>
        <th>性別</th>
        <th>生日</th>
        <th>電話</th>
        <th>。。。</th>
    </tr>
    <?php foreach($members as $member): ?>
    <tr>
        <td><?php echo $member->id ?></td>
        <td><?php echo $member->name ?></td>
        <td><?php echo $member->name ?></td>
        <td><?php echo $member->gender ?></td>
        <td><?php echo $member->birthday ?></td>    
        <td><?php echo $member->phone ?></td>    
        <td>
            <a class="btn btn-warning" href='/store/edit?ol_table=stores&ol_id=<?php echo $store->id ?>'><i class="fa fa-pencil fa-fw"></i></a>

        </td>
    </tr>    
    <?php endforeach; ?>

</table>
