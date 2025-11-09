<?php
class ModelProduk {
    private $filePath;

    public function __construct() {
        $this->filePath = __DIR__ . '/../data/produk.json';
        if (!file_exists($this->filePath)) {
            if (!is_dir(dirname($this->filePath))) {
                mkdir(dirname($this->filePath), 0777, true);
            }
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    private function loadData() {
        $content = file_get_contents($this->filePath);
        $records = json_decode($content, true);
        return is_array($records) ? $records : [];
    }

    private function saveData($records) {
        file_put_contents($this->filePath, json_encode(array_values($records), JSON_PRETTY_PRINT));
    }

    public function all() {
        return $this->loadData();
    }

    public function find($id) {
        $items = $this->loadData();
        foreach ($items as $item) {
            if ((string)$item['id'] === (string)$id) {
                return $item;
            }
        }
        return null;
    }

    public function save($data) {
        $items = $this->loadData();
        $newId = 1;
        if (!empty($items)) {
            $lastItem = end($items);
            $newId = $lastItem['id'] + 1;
        }
        $data['id'] = $newId;
        $items[] = $data;
        $this->saveData($items);
    }

    public function update($id, $data) {
        $items = $this->loadData();
        foreach ($items as $index => $item) {
            if ((string)$item['id'] === (string)$id) {
                $data['id'] = $item['id'];
                $items[$index] = $data;
                $this->saveData($items);
                return true;
            }
        }
        return false;
    }

    public function delete($id) {
        $items = $this->loadData();
        foreach ($items as $index => $item) {
            if ((string)$item['id'] === (string)$id) {
                array_splice($items, $index, 1);
                $this->saveData($items);
                return true;
            }
        }
        return false;
    }
}
?>
