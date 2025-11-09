<?php
function getValue($item, $key) {
    if (is_object($item)) {
        return $item->{$key} ?? '';
    }
    if (is_array($item)) {
        return $item[$key] ?? '';
    }
    return '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Catalog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
        .add-link { margin-bottom: 15px; display: inline-block; }
    </style>
</head>
<body>
    <h1>Movie Catalog</h1>
    <p class="add-link"><a href="index.php?action=create">Add New Movie</a></p>
    <table>
        <thead>
            <tr>
                <th>Movie ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Director</th>
                <th>Ticket Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($produks)): ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No movies available yet.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($produks as $movie): ?>
                    <tr>
                        <td><?php echo htmlspecialchars(getValue($movie, 'id')); ?></td>
                        <td><?php echo htmlspecialchars(getValue($movie, 'film')); ?></td>
                        <td><?php echo htmlspecialchars(getValue($movie, 'genre')); ?></td>
                        <td><?php echo htmlspecialchars(getValue($movie, 'sutradara')); ?></td>
                        <td><?php echo htmlspecialchars(getValue($movie, 'harga')); ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo urlencode(getValue($movie, 'id')); ?>">Edit</a> |
                            <a href="index.php?action=delete&id=<?php echo urlencode(getValue($movie, 'id')); ?>" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
