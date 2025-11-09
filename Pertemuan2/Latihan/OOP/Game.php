<?php
require_once 'Produk.php';
require_once 'Komik.php';
class Game extends produk
{
  public $waktuMain;

  public function __construct($judul, $penulis,  $penerbit, $harga, $waktuMain)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->waktuMain = $waktuMain;
  }

  public function getInfoProduk()
  {
    $infoParents = parent::getInfoProduk();
    return "Game : {$infoParents} ~ {$this->waktuMain} Jam.";
  }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

$produk1->setJudul("Goku");
echo $produk1->getInfoProduk();

echo $produk1->getJudul();