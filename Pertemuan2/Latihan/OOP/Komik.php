<?php
require_once 'Produk.php';
class Komik extends produk
{
  public $jmlHalaman;

  public function __construct($judul, $penulis,  $penerbit, $harga, $jmlHalaman)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jmlHalaman = $jmlHalaman;
  }


  public function getInfoProduk()
  {
    $str = "Komik : " . parent::getInfoProduk() . " | Rp. {$this->getHarga()} - {$this->jmlHalaman} Halaman.";
    return $str;
  }
}