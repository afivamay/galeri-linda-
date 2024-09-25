<?php 
// Menyertakan file koneksi ke database dan memulai sesi PHP
include 'koneksi.php'; 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <!-- Menyertakan file CSS Bootstrap untuk desain dan layout -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Menyertakan file CSS tambahan untuk styling custom -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Menyertakan font awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Styling untuk elemen navbar, warna dan efek hover */
        .navbar-brand {
            letter-spacing: 3px;
            color: #c24244;
        }

        .navbar-brand:hover {
            color: #c24244;
        }

        .navbar-scroll .nav-link,
        .navbar-scroll .fa-bars {
            color: #7f4722;
        }

        .navbar-scrolled {
            background-color: #ffede7;
        }

        /* Efek zoom saat hover pada link navbar */
        .navbar-scroll .nav-link:hover {
            color: #c24244;
            transform: scale(1.1); 
            transition: transform 0.3s ease;
        }

        /* Efek zoom untuk tombol bars pada navbar saat hover */
        .navbar-scroll .fa-bars:hover {
            color: #c24244;
            transform: scale(1.2); 
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>

<?php 
// Memeriksa apakah ada parameter 'url' di query string, jika tidak, $url diset ke string kosong
$url = isset($_GET["url"]) ? $_GET["url"] : '';

// Navbar hanya ditampilkan jika pengguna tidak berada di halaman login atau daftar.
if ($url !== 'login' && $url !== 'daftar'): 
?>
<!-- Navbar dengan Bootstrap -->
<nav class="navbar navbar-expand-lg fixed-top navbar-scroll shadow-0" style="background-color: #ffede7;">
  <div class="container">
    <a class="navbar-brand" href="?url=home">Galeri Foto</a>
    <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
      aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="d-flex justify-content-start align-items-center">
        <i class="fas fa-bars"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link px-3" href="?url=home">Home</a>
        </li>
        <?php 
        // Jika sesi user aktif, tampilkan menu untuk pengguna login
        if(isset($_SESSION['user_id'])): ?>
        <li class="nav-item">
          <a class="nav-link px-3" href="?url=foto">Foto</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link px-3" href="?url=album">Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="?url=profile"><?= ucwords($_SESSION['username']) ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="?url=logout">Logout</a>
        </li>
        <?php else: ?>
        <!-- Jika user belum login, tampilkan menu Login dan Daftar -->
        <li class="nav-item">
          <a class="nav-link px-3" href="?url=login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3" href="?url=daftar">Daftar</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Memberikan jarak di bawah navbar -->
<br><br><br>
<?php endif; // End of navbar check ?>

<?php 
    // Menentukan halaman mana yang akan disertakan berdasarkan nilai $url
    if($url == 'home'){
        include 'page/home.php';
    } elseif($url == 'profile'){
        include 'page/profil.php';
    } elseif($url == 'upload'){
        include 'page/upload.php';
    } elseif($url == 'foto'){
        include 'page/foto.php';
    } elseif($url == 'album'){
        include 'page/album.php';
    } elseif($url == 'tambah-album'){
        include 'page/tambah-album.php';
    } elseif($url == 'like'){
        include 'page/like.php';
    } elseif($url == 'komentar'){
        include 'page/komentar.php';
    } elseif($url == 'detail'){
        include 'page/detail.php';
    } elseif($url == 'kategori'){
        include 'page/kategori.php';
    } elseif($url == 'kategori1'){
        include 'page/kategori1.php';
    } elseif($url == 'login'){  
        include 'login.php'; 
    } elseif($url == 'daftar'){  
        include 'daftar.php'; 
    } elseif($url == 'logout'){
        // Logout: Menghancurkan sesi dan mengarahkan pengguna kembali ke home
        session_destroy();
        header("Location: ?url=home");
        exit; // Menghentikan eksekusi setelah redirect
    } else {
        // Default: Tampilkan halaman home jika $url tidak cocok
        include 'page/home.php';
    }
?>
<!-- Penutup halaman dengan footer -->
<br>
<footer>
    <div class="container text-center">
        <small>&copy; UKK XII RPL 1 | Afiva Maylinda</small>
    </div>
</footer>

<!-- Menyertakan file JavaScript Bootstrap untuk interaksi -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
