<?php 

require '../controller/function.php';
session_start();

$id = $_GET["id"];
if (hapus($id) > 0 ) {
    echo (" <script>
                alert('data berhasil dihapus');
                document.location.href = 'index.php?page=data_vespa';
            </script>");
} else {
    echo (" <script>
            alert('data gagal dihapus');
            document.location.href = 'dashboard.php?page=menu';
        </script>");
}



?>