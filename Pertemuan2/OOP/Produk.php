<?php

class Game Extends Produk {
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga, $waktuMain);
        $this->waktuMain = $waktuMain;
    }

    // cara untuk mengakses harga dari Child Class
    public function getHarga()
    {
        return $this ->harga;
    }

    public function getInfoProduk()
    {
        $infoParent = parent::getInfoProduk()
        return "Game : {$infoParent} ~ {$this ->waktuMain} Jam."
    }
}


$produk1 = new Komik('Naruto', "Attack On Titan", "Jujutsu Kaisen", 35000, 80);
$produk2 = new Game("Gta 5", "Resident Evil", "Gran Turismo", 20000, 55);
echo $produk1->getInfoProduk();
echo "<br/>";
echo $produk2->getInfoProduk();
echo "<br/>";


// sudah tidak bisa akses dan mengubah harga karena sudah di protect
$produk1->harga = 15000;
echo $produk1->harga;