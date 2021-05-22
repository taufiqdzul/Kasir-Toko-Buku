<b>My Cart</b>

<?php echo form_open('CrudController/update_cart'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="1">

    <tr>
        <th>QTY</th>
        <th>Item Description</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
    </tr>

    <?php 

    $i = 1;

    foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
            <td><input type="number" name="<?php echo $i.'[qty]'; ?>" maxlength="10" size="5" value="<?php echo $items['qty']; ?>" /></td>
            <td><?php echo $items['name']; ?></td>
            <td style="text-align:right">$<?php echo $this->cart->format_number($items['price']); ?></td>
            <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

        <?php $i++; ?>

    <?php endforeach; ?>

    <tr>
        <td colspan="2"></td>
        <td class="right"><strong>Total</strong></td>
        <td class="right" align="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
    </tr>

</table>

<p><?php echo form_submit('update_cart', 'Update your Cart'); ?></p>