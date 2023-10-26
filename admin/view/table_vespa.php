<?php

require '../controller/function.php';
$product = query("SELECT * FROM product");

?>
<main>
                    <div class="container-fluid">

                    	<div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                                <div class="card-header ">
                                	<h4>Table Product</h4>
                                    
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped text-center">
                                        <thead>
                                            <th>No</th>
                                                <th  style="text-align: center;">Gambar</th>
                                                <th  style="text-align: center;">Nama</th>
                                                <th  style="text-align: center;">warna</th>
                                                <th  style="text-align: center;">Harga</th>
                                                <th></th>
                                                <th></th>
                                        </thead>
                                        <tbody>

                                           <?php $i=1; foreach ($product as $data) : ?>
                                            <tr>
                                                
                                                <td><?= $i; ?></td>
                                                <td><img src="../images/<?= $data['gambar'] ?>" height="50px" width="50px"></td>
                                                <td><?= $data['nama_product'] ?></td>
                                                <td>merah</td>
                                                <td>Rp. <?= number_format($data['harga']) ?></td>
                                                <td></td>
                                                <td style="text-align: center;">
                                                    <a href="index.php?page=ubah&id=<?= $data['id_product'] ?>" class="btn btn-primary " style="margin-right: 5px;"><i class="fas fa-edit"></i></a>
                                                
                                                    <a href="index.php?page=hapus&id=<?= $data['id_product'] ?>"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></a>
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