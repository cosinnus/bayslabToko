<?php
//untuk proteksi halaman admin jadi harus login dulu
$this->simple_login->cek_login();
//untuk menggabungkan layout jadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');