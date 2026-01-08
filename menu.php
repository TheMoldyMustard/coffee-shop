<?php
include 'dbConnect.php';

$createTable = "CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_file_name VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (! $conn->query($createTable)) {
    error_log('Failed to create product table: ' . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jake's Coffee Shop</title>
    <link rel="stylesheet" href="table.css" />
    <script src="script.js" defer></script>
</head>
<body>
    <div class="box-container">
        <div id="header">
            <h1>Jake's Cofee Shop</h1>
            <div class="hamburger" id="hamburger-menu">☰</div>

        </div>
        <div id="container">
            <div id="nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="music.php">Music</a></li>
                    <li><a href="#">Jobs</a></li>
                </ul>
            </div>

            <div id="main-content">
                <div class="products-wrapper">
                    <table id="products-table">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM product WHERE archived=0 ORDER BY product_id";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $imgFile = htmlspecialchars($row['image_file_name']);
                                    $name = htmlspecialchars($row['product_name']);
                                    $price = number_format((float)$row['product_price'], 2);

                                    echo "<tr>";
                                    echo "<td><img src='images/{$imgFile}' alt='{" . $name . "}' style='width:100px;height:100px;object-fit:cover;'></td>";
                                    echo "<td>{$name}</td>";
                                    echo "<td>₱ {$price}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No products found.</td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="footer">
            <p>Copyright &copy; 2025 Jake's Coffee Shop<br>
            <a href="#">jake@jcoffee.com</a>
            </p>
        </div>
    </div>
</body>
</html>
