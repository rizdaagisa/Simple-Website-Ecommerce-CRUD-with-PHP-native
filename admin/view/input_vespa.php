<?php 
	include '../controller/function.php';

	if (isset($_POST['submit'])) {

		if (add_product($_POST) > 0) {
            echo (" <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php?page=data_vespa';
                </script>");
        } else {
            echo (" <script>
                    alert('data gagal ditambahkan silakan masukan data ulang');
                </script>");
            echo($conn -> error);
        }
	}

	// if ( !isset( $_SESSION['login']) ) {
    // echo (" <script>
    //                 alert('Anda Harus login terlebih dahulu');
    //                 document.location.href = 'login.php';
    //             </script>");
    
    // } 

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
											      <input type="text" class="form-control" name="nama">
											    </div>
											    <!-- Default input -->
											    <div class="form-group col-md-6">
											      <label for="harga">harga</label>
											      <input type="text" class="form-control" name="harga">
											    </div>
											    
											  </div>
											  <!-- Grid row -->

											  <!-- Default input -->
											  <div class="form-group col-md-12">
											    <label for="description">Description</label>
	                                    			<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:160px "></textarea>
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
											      <input type="text" class="form-control" name="stock">
											    </div>
											</div><br>
											<div class="form-row">
											    <div class="form-group col-md-12">
				                                    <label for="gambar">Gambar</label><br>
				                                    <input type="file" name="gambar" class="form-control" required="">
				                                </div>
											</div>
											  

											  <div class="form-row col-md-6">
											    <div class="form-group">
				                                    <button type="submit" name="submit" class="btn btn-primary btn-md form-control">Tambah</button>
				                                </div>
											  </div>
											  
		                                </div>
		                            </div>
		                    	</div>
	                    	</div>
                    	</form>
                    </div>
</main>