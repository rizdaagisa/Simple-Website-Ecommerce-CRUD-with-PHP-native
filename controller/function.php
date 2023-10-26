<?php 

$conn = mysqli_connect("localhost","root","","vespa");
// $conn = mysqli_connect("sql213.epizy.com","epiz_27679545","Bh7KFBNfmV6STcY","epiz_27679545_kaleyo");
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
	    $rows[]= $row;
	}

	// if (!$result) {
    // 	die('Could not query:' . mysql_error());
	// }
	return $rows;

}


function add_pelanggan($data){
	global $conn;
 	$nama = $data['nama'];
	$alamat = $data['alamat'];
	$nomor = $data['nomor'];
	$email = $data['email'];
	$date = date("d-m-Y");
	// print_r($date);die;

	// $query = "INSERT INTO pelanggan VALUES
	// 	('','$nama', '$nomor', '$email', '$alamat','$status','$date')";
	// mysqli_query($conn, $query);
	// return mysqli_affected_rows($conn);

	$query = "INSERT INTO pelanggan VALUES
		('','$nama', '$alamat','$nomor','$email','$date')";
	$query2 = "SELECT LAST_INSERT_ID() as newid";
	mysqli_query($conn, $query);

	$id = query($query2)[0];
	// $result = mysqli_query($conn, $query2);
	// $rows =[];
	// while ( $row = mysqli_fetch_assoc($result) ) {
	//     $rows[]= $row;
	// }
	// if (!$result) {
    // 	die('Could not query:' . mysql_error());
	// }
	return $id;
	// $id = query($query);
	// return $id;
}

function add_order($id_product,$id_pelanggan,$jumlah){
	global $conn;
	$query = "INSERT INTO orders VALUES('','$id_product','$id_pelanggan','$jumlah')";
	mysqli_query($conn, $query);
	// return mysqli_affected_rows($conn);
}

function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmp = $_FILES['gambar']['tmp_name'];

	if( $error === 4 ) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu')
			</script>";
		return false;	
	}

	$ekstensiFile = ['jpg','png','jpeg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = end($ekstensiGambar);
	$ekstensiGambar = strtolower($ekstensiGambar);

	if ( !in_array($ekstensiGambar, $ekstensiFile)) {
		echo "<script>
				alert('yang anda upload bukan gambar')
			</script>";
		return false;
	}

	// cek ukuran gambar terlalu besar dari data yang ditetapkan
	if ($ukuranFile > 10000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar maks 1MB')
			</script>";
		return false;
	}
	$namaFile = str_replace(' ', '', $namaFile);
	// $namaFileBaru = uniqid(); //membuat string random agar nama gambar tidak sama dan menimpa file gambar yg lain
	$namaFileBaru = uniqid();
	$namaFileBaru .= '_'.$namaFile;
	//jika lolos semua pengecekan data gambar siap di kembalikan dan di simpan kedalam folder img
	move_uploaded_file($tmp, '../images/'.$namaFileBaru);
	return $namaFileBaru;
}

function upload_gambar(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmp = $_FILES['gambar']['tmp_name'];

	if( $error === 4 ) {
		echo "<script>
				alert('Pilih gambar terlebih dahulu')
			</script>";
		return false;	
	}

	$ekstensiFile = ['jpg','png','jpeg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = end($ekstensiGambar);
	$ekstensiGambar = strtolower($ekstensiGambar);

	if ( !in_array($ekstensiGambar, $ekstensiFile)) {
		echo "<script>
				alert('yang anda upload bukan gambar')
			</script>";
		return false;
	}

	// cek ukuran gambar terlalu besar dari data yang ditetapkan
	if ($ukuranFile > 100000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar maks 1MB')
			</script>";
		return false;
	}
	$namaFile = $string = str_replace(' ', '', $namaFile);
	// $namaFileBaru = uniqid(); //membuat string random agar nama gambar tidak sama dan menimpa file gambar yg lain
	$namaFileBaru = uniqid();
	$namaFileBaru .= '_'.$namaFile;

	//jika lolos semua pengecekan data gambar siap di kembalikan dan di simpan kedalam folder img
	move_uploaded_file($tmp, '../images/'.$namaFileBaru);
	return $namaFileBaru;
}

function add_product($data){
	global $conn;

	$nama = $data['nama']; //htmlspecialchars($data['nama'])
	$harga = $data['harga'];
	$description = $data['description'];
	$kategori = $data['warna'];
	$stock = $data['stock'];
	$gambar = upload();
	if (!$gambar) {
		return false;			
	}

	$query = "INSERT INTO product VALUES
		('','$nama', '$gambar','$harga', '$stock','$description')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function tambah($data,$table){
	global $conn;

	$nama = $data['nama']; //htmlspecialchars($data['nama'])
	$harga = $data['harga'];
	$description = $data['description'];
	$gambar = upload_decor($table);
	$gambar1 = $gambar[0];
	$gambar2 = $gambar[1];
	$gambar3 = $gambar[2];
	if ( !$gambar) {
		return false;			
	}
	$query = "INSERT INTO $table VALUES
		('','$nama','$harga', '$description', '$gambar1', '$gambar2', '$gambar3')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

		

function hapus($id){
	global $conn;
	$query = "DELETE FROM product WHERE id_product = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus_pelanggan($id){
	global $conn;
	$query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
	mysqli_query($conn, $query);

	$query = "DELETE FROM booking WHERE id_pelanggan = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function transaksi($id){
	global $conn;
	$pelanggan = query("SELECT * FROM pelanggan WHERE id_pelanggan = $id")[0];
	$id_pelanggan = $pelanggan['id_pelanggan'];
	$nama = $pelanggan['nama'];
	$alamat = $pelanggan['alamat'];
	$nomor = $pelanggan['nomor'];
	$email = $pelanggan['email'];
	$waktu = $pelanggan['waktu'];
	
	$query = "INSERT INTO orders VALUES('','$id_pelanggan','$nama','$alamat','$nomor','$email','$kecamatan','$kelurahan','$kota','$kodepos','$ongkir','$waktu')";
	mysqli_query($conn, $query);
	$query = "DELETE FROM pelanggan WHERE id_pelanggan = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubah($data,$id_product){
	global $conn;

	$gambarLama = $data['gambarLama'];
	// $id_product = $data['id_product'];
	$nama_product = $data['nama'];
	$harga = $data['harga'];
	$stock = $data['stock'];
	$description = $data['description'];

	if( $_FILES['gambar']['error'] === 4){ // === 4 artinya tidak ada gambar yang di upload
		$gambar = $gambarLama;
	} else {
		$gambar = upload($nama_product);
	}

	$query = "UPDATE product SET 
				nama_product = '$nama_product',
				gambar = '$gambar',
				harga = $harga,
				stock = '$stock',
				description = '$description'
			  WHERE id_product = $id_product
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}



function ubah_data($data,$table){
	global $conn;
	// $gambar = $data['gambarBaru'];
	$gambarLama = $data['gambarLama1'];
	$gambarLama2 = $data['gambarLama2'];
	$gambarLama3 = $data['gambarLama3'];
	$id_product = $data['id'];
	$nama_product = $data['nama'];
	$harga = $data['harga'];
	$description = $data['description'];

	if( $_FILES['gambar3']['error'] === 4){ // === 4 artinya tidak ada gambar yang di upload
		$gambar3 = $gambarLama;
	} 

	if ($_FILES['gambar2']['error'] === 4) {
		$gambar2 = $gambarLama2;
	} 

	if ($_FILES['gambar']['error'] === 4) {
		$gambar1 = $gambarLama;

	} else {
		$gambar = upload_decor($table);
		$gambar1 = $gambar[0];

		
	}

	//cek apakah user ganti gambar baru atau tidak
	$query = "UPDATE $table SET 
				nama = '$nama_product',
				harga = '$harga',
				description = '$description',
				gambar  ='$gambar1',
				gambar2 = '$gambar2',
				gambar3 = '$gambar3'
			  WHERE id_$table = $id_product
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword){
	global $conn;

	$query = "SELECT * FROM product WHERE
				nama_mobil LIKE '%$keyword%' OR 
				harga LIKE '%$keyword%' OR
				merek LIKE '%$keyword%' ";
	return query($query);
}


?>