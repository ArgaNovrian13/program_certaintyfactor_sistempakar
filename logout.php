<?php
session_start(); // Memulai sesi

// Hapus semua variabel sesi
$_SESSION = array();

// Jika ingin menghapus sesi yang digunakan cookie, hapus cookie sesi juga
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Akhiri sesi
session_destroy();

// Arahkan kembali ke halaman login
header("Location: login.php");
exit;
?>
