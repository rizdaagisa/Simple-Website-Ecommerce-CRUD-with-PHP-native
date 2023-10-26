<?php 

include '../function.php';

$id = $_GET["id"];
$table = $_GET["table"];


if ($table == "decoration") {
  $product = query("SELECT * FROM $table WHERE id_$table = $id")[0];
} elseif ($table == "cathring") {
  $product = query("SELECT * FROM $table WHERE id_$table = $id")[0]; 
} elseif ($table == "dress") {
  $product = query("SELECT * FROM $table WHERE id_$table = $id")[0];
}

if ( !isset( $_SESSION['login']) ) {
    echo (" <script>
                    alert('Anda Harus login terlebih dahulu');
                    document.location.href = 'login.php';
                </script>");
    
}

if (isset($_POST["submit"])) {
        // print_r($_FILES);die;
        if ($table == "cathring") {
          if (ubah_cathring($_POST,$table) > 0) {
            echo (" <script>
                    alert('data berhasil diubah');
                    document.location.href = 'dashboard.php?page=table-$table';
                </script>");
          } else {
              echo (" <script>
                      alert('data gagal diubah, silakan masukan data ulang');
                  </script>");
              echo($conn -> error);
          }
        } else {
            if (ubah_data($_POST,$table) > 0) {
            
              echo (" <script>
                      alert('data berhasil diubah');
                      document.location.href = 'dashboard.php?page=table-$table';
                  </script>");
            } else {
                echo (" <script>
                        alert('data gagal diubah, silakan masukan data ulang');
                    </script>");
                echo($conn -> error);
            }
        }

    }


// if (isset($_POST["submit"])) {
    
//         if (ubah($_POST,$table) > 0) {
//             echo (" <script>
//                     alert('data berhasil diubah');
//                     document.location.href = 'dashboard.php?page=table-$table';
//                 </script>");
//         } else {
//             echo (" <script>
//                     alert('data gagal diubah, silakan masukan data ulang');
//                 </script>");
//             echo($conn -> error);
//         }

//     }
 ?>

 <main>
    
                    <div class="container-fluid">
                        <h4>Update Product</h4>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                                        <div class="card-header ">
                                            
                                        </div>
                                        <div class="card-body table-full-width table-responsive">
                                              <!-- Grid row -->
                                              <?php if ($table == "cathring") { ?>
                                                <div class="form-row">

                                                  <div class="form-group col-md-5">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?= $product['nama'] ?>">
                                                  </div>

                                                  <div class="form-group col-md-4">
                                                    <label for="harga">harga</label>
                                                    <input type="text" class="form-control" name="harga" value="<?= $product['harga'] ?>">
                                                  </div>

                                                  <div class="form-group col-md-3">
                                                    <label for="tamu">Tamu</label>
                                                    <input type="text" class="form-control" name="tamu" value="<?= $product['tamu'] ?>">
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="description">Description</label>
                                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:160px "><?= $product['description'] ?></textarea>
                                                </div>
                                              <?php }else { ?>
                                                <div class="form-row">
                                                <!-- Default input -->
                                                <div class="form-group col-md-6">
                                                  <label for="nama">Nama</label>
                                                  <input type="text" class="form-control" name="nama" value="<?= $product['nama'] ?>">
                                                </div>
                                                <!-- Default input -->
                                                <div class="form-group col-md-6">
                                                    <label for="harga">harga</label>
                                                    <input type="text" class="form-control" name="harga" value="<?= $product['harga'] ?>">
                                                </div>


                                              </div>
                                              <div class="form-group">
                                                <label for="description">Description</label>
                                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:160px "><?= $product['description'] ?></textarea>
                                              </div>
                                              <?php } ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                                        <div class="card-header ">
                                            
                                        </div>
                                        <?php if ($table== "cathring") { ?>
                                          <div class="card-body table-full-width table-responsive">
                                              <div class="form-group ">
                                                    <label for="gambar">Gambar</label><br>
                                                    <input type="file" name="gambar" class="form-control" >
                                                </div>

                                                

                                              <input type="hidden" name="id" class="form-control" value="<?= $id ?>">
                                              <input type="hidden" name="gambarLama" class="form-control"  value="<?= $product['gambar'] ?>">

                                              <div class="form-row col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-md form-control">Ubah</button>
                                                </div>
                                              </div>
                                              
                                        </div>
                                        <?php } else { ?>
                                        <div class="card-body table-full-width table-responsive">
                                                <div class="form-group ">
                                                    <label for="gambar">Gambar Utama</label><br>
                                                    <input type="file" name="gambar" class="form-control">
                                                </div>

                                                <div class="form-group ">
                                                    <label for="gambar2">Gambar 2</label><br>
                                                    <input type="file" name="gambar2" class="form-control" >
                                                </div>

                                                <div class="form-group ">
                                                    <label for="gambar3">Gambar 3</label><br>
                                                    <input type="file" name="gambar3" class="form-control" >
                                                </div>

                                              <input type="hidden" name="id" class="form-control" value="<?= $id ?>">

                                              <input type="hidden" name="gambarLama1" class="form-control"  value="<?= $product['gambar'] ?>">
                                              <input type="hidden" name="gambarLama2" class="form-control"  value="<?= $product['gambar2'] ?>">
                                              <input type="hidden" name="gambarLama3" class="form-control"  value="<?= $product['gambar3'] ?>">
                                              <div class="form-row col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-md form-control">Ubah</button>
                                                </div>
                                              </div>
                                              
                                        </div>
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
