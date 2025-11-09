<?php

function getValue($item, $key, $default = '') {
    if ($item === null) return $default;
    if (is_object($item)) return $item->{$key} ?? $default;
    if (is_array($item)) return $item[$key] ?? $default;
    return $default;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $action === 'store' ? 'Add Movie' : 'Edit Movie'; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        form { max-width: 400px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        a { text-decoration: none; color: #dc3545; margin-left: 10px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1><?php echo $action === 'store' ? 'Add Movie' : 'Edit Movie'; ?></h1>
    <form method="post" action="index.php?action=<?php echo $action; ?>">
        <?php if ($action === 'update'): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars(getValue($produk, 'id')); ?>">
        <?php endif; ?>
        <div>
            <label for="judul">Movie Title</label>
            <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars(getValue($produk, 'film', '')); ?>">
        </div>
        <div>
            <label for="penulis">Genre</label>
            <input type="text" id="penulis" name="penulis" value="<?php echo htmlspecialchars(getValue($produk, 'genre', '')); ?>">
        </div>
        <div>
            <label for="penerbit">Director</label>
            <input type="text" id="penerbit" name="penerbit" value="<?php echo htmlspecialchars(getValue($produk, 'sutradara', '')); ?>">
        </div>
        <div>
            <label for="harga">Ticket Price</label>
            <input type="number" id="harga" name="harga" value="<?php echo htmlspecialchars(getValue($produk, 'harga', 0)); ?>">
        </div>
        <div>
            <button type="submit"><?php echo $action === 'store' ? 'Save' : 'Update'; ?></button>
            <a href="index.php">Cancel</a>
        </div>
    </form>
</body>
</html>
