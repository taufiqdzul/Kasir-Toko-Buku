<b>Products</b>

<table width="100%" border="1">

    <tr>
        <td width="37%">ID</td>
        <td width="30%">Name</td>
        <td width="16%">Price</td>
        <td width="16%">&nbsp;</td>
    </tr>

    <?php foreach($products as $row):?>
    <tr>
        <?php echo form_open('CrudController/kasir_simpan_cart'); ?>
            <td><?php echo $row->id_buku; echo form_hidden('id', $row->id_buku); ?></td>
            <td><?php echo $row->judul; echo form_hidden('name', $row->judul); ?></td>
            <td>$<?php echo $row->harga_jual; echo form_hidden('price', $row->harga_jual); ?></td>
            <td><?php echo form_submit('submit', 'Add to Cart'); ?></td>
        <?php echo form_close(); ?>
    </tr>
    <?php endforeach;?>
</table>