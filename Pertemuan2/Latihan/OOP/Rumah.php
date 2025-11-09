<?php

class Rumah
{
  public $warna;

  public $alamat;



  public function __construct($warna, $alamat)
  {
    $this->warna = $warna;

    $this->alamat = $alamat;
  }
}


function pasangListrik(Rumah $dataRumah)
{
  return "Listrik sedang dipasang di rumah " . $dataRumah->warna . " yang beralamat di " . $dataRumah->alamat;
}

$rumahSaya = new Rumah("Merah", "Jln. Merdeka 10");

echo pasangListrik($rumahSaya);
echo "<br>";

$teksBiasa = "Ini cuman String";