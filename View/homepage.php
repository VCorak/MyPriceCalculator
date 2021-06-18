<?php require 'includes/header.php' ?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

    <form method="post">
        <label for="product">Choose a product:</label>

        <select name="product" id="product">

            <?php
            /** @var Product[] $products */
            foreach ($products as $product) {
                echo '<option value="' . $product->getId() . '">' . $product->getName() . ' ' . $product->getPrice() / 100 . ' cents' . '</option>';
            }
            ?>
        </select>

        <label for="customer">Choose a customer:</label>
        <select name="customer" id="customer">
            <?php
            /** @var Customer[] $customers */
            foreach ($customers as $customer) {
                echo '<option value="' . $customer->getId() . '">' . $customer->getFullName() . '</option>';
            }
            ?>
        </select>

        <input id="submit" type="submit" name="submit" value="Calculate the price" />

    </form>

</section>

<!--<section>
    <?php
/*    echo $calculate->getFinalPrice();
    */?>
</section>-->

<section>

    <table>
        <thead>
        <tr>
            <th class="empty"> </th>
            <th class="big" colspan="3"> For <?php echo $selectCustomerFullName ?></th>
        </tr>
        <tr class="headers">
            <th>Product name</th>
            <th>Final price</th>
            <th>Fixed discounts</th>
            <th>Variable discount</th>

        </tr>
        </thead>
        <tbody>
        <tr class="results">
            <td><?php echo ucfirst($selectProductName) ?></td>
            <td><?php echo $selectFinalPrice."€" ?></td>
            <td><?php echo $selectCustomerFixed."€" ?></td>
            <td><?php echo $selectBestVarDisc."%" ?></td>

        </tr>
        </tbody>
    </table>
</section>

<?php require 'includes/footer.php' ?>
