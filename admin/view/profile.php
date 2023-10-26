<?php

require '../controller/function.php';
$admin = query("SELECT * FROM admin")[0];

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
	$alamat = $_POST['alamat'];
    $nomor = $_POST['nomor'];
    $description = $_POST['description'];
	$query = "UPDATE admin SET 
                nama_toko = '$nama',
                email = '$email',
                alamat = '$alamat',
                nomor_hp = '$nomor',
                description = '$description'
            WHERE id_admin = 1
            ";
	mysqli_query($conn, $query);
    echo ("<script>
            alert('Profile Berhasil Diupdate');
            document.location.href = 'index.php?page=profile';
            </script>");
}

?>

<main>    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            <h2>Edit Profile</h2>
                <div class="card strpied-tabled-with-hover" style="margin-top: 15px;">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <form action="" method="post">
                        <!-- Grid row -->
                        <div class="form-row">
                            <!-- Default input -->
                            <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="<?= $admin['nama_toko']?>" value="<?= $admin['nama_toko']?>">
                            </div>
                            <!-- Default input -->
                            <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="<?= $admin['alamat']?>" value="<?= $admin['alamat']?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Default input -->
                            <div class="form-group col-md-6">
                            <label for="nomor">No HP</label>
                            <input type="text" class="form-control" name="nomor" placeholder="<?= $admin['nomor_hp']?>" value="<?= $admin['nomor_hp']?>">
                            </div>
                            <!-- Default input -->
                            <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="<?= $admin['email']?>" value="<?= $admin['email']?>">
                            </div>
                        </div>
                        <!-- Grid row -->

                        <!-- Default input -->
                        <div class="form-group col-md-20" style="margin-left: 5px;">
                            <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height:200px "> <?= $admin['description']?></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-4">	                    		
                    <div class="card card-user strpied-tabled-with-hover" style="margin-top: 15px;">
                        <div class="card-image">
                            <img src="../assets/img/banner.jpg">
                        </div>
                        <div class="card-body">
                            <div class="author">
                                    <img class="avatar border-gray" src="../assets/img/logo.jpg" alt="...">
                                    <h5 class="title" style="color:red;"><b><?= $data['nama'] ?></b></h5>
                                <p class="description" style="margin-top: 2px;">
                                    <i class="fas fa-map-marker-alt"></i> <?= $data['alamat'] ?>
                                </p>
                            </div>
                            
                            <hr>
                            <div class="rows">
                                <div class="col-xs-1" style="font-size: 13px;">
                                    <i class="fas fa-phone-alt"></i> <?= $data['nomor'] ?>
                                </div>
                                <div class="col-xs-1" style="font-size: 13px;">
                                    <i class="fas fa-envelope"></i> <?= $data['email'] ?>
                                </div>
                                <div class="col-xs-1" style="font-size: 15px;">
                                    <i class="fab fa-instagram-square"></i> @bebek_kaleyo
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div> -->
        </div>
    </div>
</main>