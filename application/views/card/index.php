<a href='/card/add' class='btn btn-default'>新增卡片</a>
<table class='table table-borderd table-hover'>
    <tr>
        <th>編號</th>
        <th>卡片號碼</th>
        <th>產生日期</th>
        <th>變更日期</th>
        <th>綁定店家</th>
        <th>綁定會員</th>
    </tr>
    <?php foreach($cards as $card): ?>
    <tr>
        <td><?php echo $card->id ?></td>
        <td><?php echo $card->number ?></td>
        <td><?php echo $card->created_at ?></td>
        <td><?php echo $card->updated_at ?></td>
        <td><?php echo $card->stores->name ?></td>    
        <td><?php echo $card->members->name ?></td>    
    </tr>    
    <?php endforeach; ?>

</table>
