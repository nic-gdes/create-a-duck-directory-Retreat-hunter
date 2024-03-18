<?php

if (isset($_GET['ID'])) {
    $id = htmlspecialchars($_GET['id']);

        require('./config/db.php'); 

        $sql = "SELECT id, name, favorite_foods, bio, img_src FROM ducks WHERE id=$id";
        $result = mysqli_query($conn,$sql);

        $duck = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
}

?>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('./components/head.php'); ?>

    </head>

    <body>
        <?php include('./components/nav.php'); ?>

        <section>
        <div class="image">
            <img src="<?php echo $duck['img_src'];?>" alt="duck.">
            </div>
                <h2 class="duck-name">Your Duckies Name</h2>
                <p><span>It's Favorite Foods:</span>example:Cheese, Yeti water bottle, Tv Remote</p>
            
                <p>
                A brief description about said ducky
                </p>
            
        </section>


        <section class="duck-container2">
            <img src="./assets/images/Ugly_duck_2.png" alt="">
            <div>
                <h2 class="duck-name">Your Duckies Name</h2>
                <p><span>It's Favorite Foods:</span>example: Cheese, Yeti water bottle, Tv Remote</p>
                <p>
                    A brief description about said ducky
                </p>
            </div>
        </section>


        <?php include('./components/footer.php'); ?>

    </body>
</html>