<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('./components/head.php'); ?>

    </head>

    <body>
        <?php include('./components/nav.php'); ?>

        <?php

$conn = mysqli_connect("db", "db", "db", "db");

if (mysqli_connect_errno()) {
    echo "Connection error: " . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM ducks";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "Error executing query: " . mysqli_error($conn);
    exit();
}

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (empty($data)) {
    echo "No ducks found.";
    $data = [];
} else {
    print_r($data);
}

mysqli_free_result($result);

mysqli_close($conn);

?>

<?php include('components/head.php'); ?>
<?php include('components/nav.php'); ?>
<div id="hero">
    <div class="container">
        <div class="info">
            <h1>Welcome to the Duck Directory</h1>
        </div>
    </div>
</div>

<main>
    <section>
        <div class="grid">
            <?php foreach ($data as $duck) { ?>

                <div class="duck-item">

                    <img src="<?php echo htmlspecialchars($duck["img_src"]); ?>" alt="<?php echo htmlspecialchars($duck["name"]); ?>">

                    <h2><?php echo htmlspecialchars($duck["name"]); ?></h2>

                    <ul>
                        <li><?php echo htmlspecialchars($duck["favorite_foods"]); ?></li>
                    </ul>

                </div>
            <?php } ?>
        </div>
    </section>
</main>

<?php include('components/footer.php'); ?>

    </body>
</html>