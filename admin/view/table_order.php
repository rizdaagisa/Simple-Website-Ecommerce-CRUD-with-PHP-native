<?php

require '../controller/function.php';
// $product = query("select product.id_product, user.id_user, product.nama, product.harga,product.gambar,user.nama as username,jumlah_barang, id_order,tanggal from product, user, orders where orders.id_product = product.id_product and orders.id_user = user.id_user");
$product = query("SELECT * FROM pelanggan");
?>
<main>
                    <div class="container-fluid">

                    	<div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                                <div class="card-header ">
                                	<h4>Table Order</h4>
                                    
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped text-center">
                                        <thead style="text-align: center;">
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">Nama</th>
                                                <th style="text-align: center;">alamat</th>
                                                <th style="text-align: center;">nomor</th>
                                                <th style="text-align: center;">tanggal</th>
                                                <th></th>
                                                <th></th>
                                        </thead>
                                        <tbody>

                                           <?php $i=1; foreach ($product as $data) : ?>
                                            <tr>
                                                
                                                <td><?= $i; ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['alamat'] ?></td>
                                                <td><?= $data['nomor'] ?></td>
                                                <td><?= $data['waktu'] ?></td>
                                                <!-- <td>
                                                	<h5 style="color: green;">active</h5>
                                                </td> -->
                                                <td style="text-align: center;">
                                                    <a href="index.php?page=view&id=<?= $data['id_pelanggan'] ?>" class="btn btn-primary " style="margin-right: 5px;"><i class="fas fa-eye"></i></a>
                                                    <a href="index.php?page=hapus&id=<?= $data['id_pelanggan'] ?>"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>