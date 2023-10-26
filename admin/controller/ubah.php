<?php 


include '../controller/function.php';

$id_product = $_GET["id"];

$product = query("SELECT * FROM product WHERE id_product = $id_product")[0];

if (isset($_POST["submit"])) {
        if (ubah($_POST,$id_product) > 0) {
            echo (" <script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php?page=data_vespa';
                </script>");
        } else {
            echo (" <script>
                    alert('data gagal diubah, silakan masukan data ulang');
                </script>");
            echo($conn -> error);
        }

    }
 ?>

<main>
                    <div class="container-fluid">
                    	<form action="" method="post" enctype="multipart/form-data">
	                    	<div class="row">
		                    	<div class="col-md-7">
								<h2>Input Data Vespa</h2>
		                    		<div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
		                                <div class="card-header ">
		                                    
		                                </div>
		                                <div class="card-body table-full-width table-responsive">
											  <!-- Grid row -->
											  <div class="form-row">
											    <!-- Default input -->
											    <div class="form-group col-md-6">
											      <label for="nama">Nama</label>
											      <input type="text" class="form-control" name="nama" placeholder="<?=$product['nama_product']?>" value="<?=$product['nama_product']?>">
											    </div>
											    <!-- Default input -->
											    <div class="form-group col-md-6">
											      <label for="harga">harga</label>
											      <input type="text" class="form-control" name="harga" placeholder="<?=$product['harga']?>" value="<?=$product['harga']?>">
											    </div>
											    
											  </div>
											  <!-- Grid row -->

											  <!-- Default input -->
											  <div class="form-group col-md-12">
											    <label for="description">Description</label>
	                                    			<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:160px "><?=$product['description']?></textarea>
											  </div>
		                                </div>
		                            </div>
		                    	</div>

		                    	<div class="col-md-5" style="margin-top: 50px;">
		                    		<div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
		                                <div class="card-header ">
		                                    
		                                </div>
		                                <div class="card-body table-full-width table-responsive">
											<div class="form-row">
											<div class="form-group col-md-12">
											      <label for="stock">stock</label>
											      <input type="text" class="form-control" name="stock" placeholder="<?=$product['stock']?>" value="<?=$product['stock']?>">
											    </div>
											</div><br>
											<div class="form-row">
											    <div class="form-group col-md-12">
				                                    <label for="gambar">Gambar</label><br>
				                                    <input type="file" name="gambar" class="form-control">
				                                </div>
											</div>
											  <div class="form-row col-md-6">
											    <div class="form-group">
				                                    <button type="submit" name="submit" class="btn btn-primary btn-md form-control">Ubah</button>
				                                </div>
											  </div>
											  
		                                </div>
		                            </div>
		                    	</div>
	                    	</div>
                            <input type="hidden" name="gambarLama" value="<?= $product['gambar'] ?>">
                    	</form>
                    </div>
</main>