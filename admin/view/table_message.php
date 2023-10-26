<?php

require '../controller/function.php';
$product = query("SELECT * FROM messages");

?>
<main>
                    <div class="container-fluid">

                    	<div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                                <div class="card-header ">
                                	<h4>Table Messages</h4>
                                    
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped text-center">
                                        <thead>
                                            <th>No</th>
                                                <th  style="text-align: center;">Email</th>
                                                <th  style="text-align: center;">Pesan</th>
                                                <th  style="text-align: center;">tanggal</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                        </thead>
                                        <tbody>

                                           <?php $i=1; foreach ($product as $data) : ?>
                                            <tr>
                                                
                                                <td><?= $i; ?></td>
                                                <td><?= $data['email'] ?></td>
                                                <td><?= $data['pesan'] ?></td>
                                                <td><?= $data['waktu'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align: center;">
                                                    <!-- <a href="index.php?page=hapus&id=<?= $data['id_product'] ?>"  class="btn btn-danger "><i class="fas fa-trash-alt"></i></a> -->
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