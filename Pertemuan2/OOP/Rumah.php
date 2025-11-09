<?php

// DEFINISI CLASS (DENAH)
class Rumah {

    // Properti
    public $warna;
    public $alamat;

    // Constructor (Otomatis jalan saat 'new')
    public function __construct( $warna, $alamat ) {
        $this->warna = $warna;
        $this->alamat = $alamat;
    }
}

// —— INTI MATERI: OBJECT TYPE ——

// membuat fungsi terpisah.

function pasangListrik( Rumah $dataRumah ) {
    return "Listrik sedang dipasang di rumah " . $dataRumah->warna .
           " yang beralamat di " . $dataRumah->alamat;
}

// —— BAGIAN OBJECT (CARA PAKAI) ——

$rumahSaya = new Rumah("Merah", "Jln. Alkateri 10");

echo pasangListrik($rumahSaya);
// Output: Listrik sedang dipasang di rumah Merah yang beralamat di Jln. Merdeka 10
echo "<br>";

$teksBiasa = "Ini cuma string";


?>
