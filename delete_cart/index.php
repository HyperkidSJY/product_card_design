<?php function createCard(array $row)
{   $product_id = $row["product_id"];
    ?>
    <div class="wrapper">
        <div class="top">
            <div class="product-img">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['product_image']);?>">
            </div>
        </div>
        <div class="bottom">
            <div class="left">
                <div class="details">
                    <h1><?= $row["product_name"] ?></h1>
                    <p>Rs <?= $row["product price"] ?></p>
                </div>
                <div class="buy">
                    <a class="delete" href="">
                        <i class="material-icons">delete</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <link rel="stylesheet" href="/card.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            require 'config.php';
            $sql  = "SELECT * FROM products";
            $stmt = mysqli_stmt_init($link);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "error";
            } else {
                mysqli_stmt_execute($stmt);
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        createCard($row);
                    }
                }
            }
            $link->close();
            ?>
        </div>
    </div>
</body>

</html>