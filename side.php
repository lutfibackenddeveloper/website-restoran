<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Kasir App</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="index.php">Dashboard</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" onclick="toggleDropdown()">Transaksi <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="dropdownMenu">
                        <li><a href="pesanan.php">Pesanan</a></li>
                        <li><a href="history_pembayaran.php">Pembayaran</a></li>
                    </ul>
                </li>
                <script>
                    function toggleDropdown() {
                        var dropdownMenu = document.getElementById("dropdownMenu");
                        if (dropdownMenu.style.display === "none") {
                            dropdownMenu.style.display = "block";
                        } else {
                            dropdownMenu.style.display = "none";
                        }
                    }
                </script>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="login.php">Logout</a></li>
                
            </ul>
        </aside>
</div>
</body>
</html>