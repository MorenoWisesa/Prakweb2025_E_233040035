<?php
class ModelProduk {
    private $storage;

    public function __construct() {
        $this->storage = __DIR__ . '/../data/produk.json';
        if (!file_exists($this->storage)) {
            if (!is_dir(dirname($this->storage))) {
                mkdir(dirname($this->storage), 0777, true);
            }
            file_put_contents($this->storage, json_encode([]));
        }
    }

    private function readAll() {
        $json = file_get_contents($this->storage);
        $data = json_decode($json, true);
        return is_array($data) ? $data : [];
    }

    private function writeAll($data) {
        file_put_contents($this->storage, json_encode(array_values($data), JSON_PRETTY_PRINT));
    }

    public function all() {
        return $this->readAll();
    }

    public function find($id) {
        $items = $this->readAll();
        foreach ($items as $it) {
            if ((string)$it['id'] === (string)$id) return $it;
        }
        return null;
    }

    public function save($data) {
        $items = $this->readAll();
        $id = 1;
        if (!empty($items)) {
            $last = end($items);
            $id = $last['id'] + 1;
        }
        $data['id'] = $id;
        $items[] = $data;
        $this->writeAll($items);
    }

    public function update($id, $data) {
        $items = $this->readAll();
        foreach ($items as $i => $it) {
            if ((string)$it['id'] === (string)$id) {
                $data['id'] = $it['id'];
                $items[$i] = $data;
                $this->writeAll($items);
                return true;
            }
        }
        return false;
    }

    public function delete($id) {
        $items = $this->readAll();
        foreach ($items as $i => $it) {
            if ((string)$it['id'] === (string)$id) {
                array_splice($items, $i, 1);
                $this->writeAll($items);
                return true;
            }
        }
        return false;
    }
}

?>