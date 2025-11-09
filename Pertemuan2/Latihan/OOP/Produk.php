<?php

class produk
{
  public $judul,
    $penulis,
    $penerbit;

  private $harga;

  public function __construct($judul = "judul", $penulis = "penulis",  $penerbit = "penerbit", $harga = "harga")
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  public function setJudul($judulBaru)
  {
    return $this->judul = $judulBaru;
  }

  public function getJudul()
  {
    return $this->judul;
  }

  public function getHarga()
  {
    return $this->harga;
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk()
  {
    return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
  }
}