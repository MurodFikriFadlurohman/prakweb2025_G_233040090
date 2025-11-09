<?php
interface BisaDimakan
{
  public function makan();
}

class Apel implements BisaDimakan
{
  public function makan()
  {
    return "Apel dimakan : Langsung kunyah";
  }
}

class jeruk implements BisaDimakan
{
  public function makan()
  {
    return "Jeruk dimakan : Kupas dulu, baru kunyah";
  }
}
$apel = new Apel();
$jeruk = new jeruk();

echo $apel->makan();
echo "<br>";
echo $jeruk->makan();
