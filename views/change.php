
<tbody class="change">


<?php foreach( $articles as $item): ?>
    <?php if ($item['name'] == "admin") continue; ?>

    <tr>

        <td> <?php echo $item['id'];?></td>
        <td><?php echo $item['user_id'];?></td>
        <td><?php echo $item['name'];?></td>
        <td> <?php echo $item['text'];?></td>
        <td><?php echo $item['status'];?></td>

    </tr>


<?php  endforeach ?>

</tbody>