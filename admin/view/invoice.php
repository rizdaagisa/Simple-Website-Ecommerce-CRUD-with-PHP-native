<?php 

require '../controller/function.php';
$id = $_GET['id'];
$pelanggan = query("SELECT * FROM pelanggan where id_pelanggan = $id")[0];
// $data = "SELECT * FROM orders where id_pelanggan = $id"
$datas = query("SELECT * FROM (SELECT
    id_order,
    product.id_product, 
    pelanggan.id_pelanggan,
    product.gambar,
    product.nama_product, 
    product.harga,
    jumlah_order
    -- pelanggan.nama,
    -- pelanggan.alamat,
    -- pelanggan.nomor,
    -- pelanggan.email,
    -- pelanggan.waktu
    FROM product, pelanggan, orders 
    where orders.id_product = product.id_product and orders.id_pelanggan = pelanggan.id_pelanggan) as new_table where new_table.id_pelanggan = $id;");
// $data= query($query)[0];

// print_r($data);
// print_r($pelanggan);
?>

<main>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <main>
                <div class="row contacts">
                    <div class="col-md-6 invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?= $pelanggan['nama']?></h2>
                        <div class="address"><?= $pelanggan['alamat']?></div>
                        <div class="email"><a href="mailto:<?= $pelanggan['email']?>"><?= $pelanggan['email']?></a></div>
                    </div>
                    <div class="col-md-6 invoice-details">
                        <h1 class="invoice-id">INVOICE</h1>
                        <div class="date">Date of Invoice: <?= $pelanggan['waktu']?></div>
                        <!-- <div class="date">Due Date: <?= $pelanggan['waktu']?></div> -->
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-left">Product</th>
                            <th class="text-right">Jumlah</th>
                            <th class="text-right">Harga</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $harga_total = 0; ?>
				
				    <?php foreach($datas as $data):?>
                        <?php $total = $data['jumlah_order']*$data['harga']?>
                        <tr>
                            <td><img src="../images/<?= $data['gambar'] ?>" height="50px" width="50px"></td>
                            <td class=""><h3>
                                <?= $data['nama_product'] ?>
                                </h3>
                            </td>
                            <td class="unit"><?= $data['jumlah_order'] ?></td>
                            <td class="qty"><?= number_format($data['harga']) ?></td>
                            <td class="total"><?= number_format($total) ?></td>
                        </tr>
                    <?php  $harga_total += $total ?>
              	    <?php endforeach;  ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>Rp.<?= number_format($harga_total)?></td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                        <!-- <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>$6,500.00</td>
                        </tr> -->
                    </tfoot>
                </table>
                <!-- <div class="thanks">Thank you!</div> -->
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</main>