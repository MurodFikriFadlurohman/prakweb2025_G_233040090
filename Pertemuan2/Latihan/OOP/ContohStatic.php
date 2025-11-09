<?php
class ContohStatic
{
  public static $angka = 1;

  public static function hallo()
  {
    return " Haloo " . self::$angka;
  }
}

echo ContohStatic::$angka;

echo ContohStatic::hallo();