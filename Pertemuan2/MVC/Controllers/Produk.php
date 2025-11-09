<?php
require_once __DIR__ . '/../models/ModelProduk.php';

class ProdukController {
    private $model;

    public function __construct() {
        $this->model = new ModelProduk();
    }

    private function render($view, $data = []) {
        extract($data);
        require __DIR__ . '/../views/' . $view . '.php';
    }

    public function index() {
        $produks = $this->model->all();
        $this->render('list', ['produks' => $produks]);
    }

    public function create() {
        $this->render('form', ['action' => 'store', 'produk' => null]);
    }

    public function store() {
        $data = [
            'film' => $_POST['judul'] ?? '',
            'genre' => $_POST['penulis'] ?? '',
            'sutradara' => $_POST['penerbit'] ?? '',
            'harga' => (int)($_POST['harga'] ?? 0)
        ];
        $this->model->save($data);
        header('Location: index.php');
    }

    public function edit($id) {
        if ($id === null) { echo 'Missing id'; return; }
        $produk = $this->model->find($id);
        $this->render('form', ['action' => 'update', 'produk' => $produk]);
    }

    public function update() {
        $id = $_POST['id'] ?? null;
        if ($id === null) { echo 'Missing id'; return; }
        $data = [
            'film' => $_POST['judul'] ?? '',
            'genre' => $_POST['penulis'] ?? '',
            'sutradara' => $_POST['penerbit'] ?? '',
            'harga' => (int)($_POST['harga'] ?? 0)
        ];
        $this->model->update($id, $data);
        header('Location: index.php');
    }

    public function delete($id) {
        if ($id === null) { echo 'Missing id'; return; }
        $this->model->delete($id);
        header('Location: index.php');
    }
}
?>