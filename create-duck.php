<!DOCTYPE html>
<html lang="en">
    <head>
        
        <?php include('./components/head.php'); ?>

    </head>

    <body>

        <?php include('./components/nav.php'); ?> 
        <div class="results">    
                <?php 
                
                
                    if(isset($_POST['submit'])) {
                        $errors = array(
                            "name" => "",
                            "message" => "",
                            "food"=> "",
                        );
                        $name = htmlspecialchars($_POST["name"]);
                        $food = htmlspecialchars($_POST["food"]);
                        $message = htmlspecialchars($_POST["message"]);
        
                        echo $name . $food . $message;
        
                        if(empty($name)) {
        
                            $errors['name'] = "A name is required.";
        
                        } else {
                            if(!preg_match('/^[a-z\s]+$/i', $name)) {
                                $errors["name"] = "The name has illegal characters";
                            } 
                        }
        
                        if(empty($food)) {
                            $errors['food'] = "A Favorite Food is required.";
        
                        } else {
                            if(!preg_match('/^[a-z,\s]+$/i', $food)) {
                                $errors["food"] = "The Favorite Food must be seperated by a comma";
                            } 
                        }
                            if(empty($message)) {
                            $errors["message"] = "A Bio is required.";
        
                        }
        
                        if(!array_filter($errors)) {
                            require('./config/db.php');

                            $sql = "INSERT INTO ducks (name, favorite_foods, bio) VALUES ('$name', '$food', '$message')";

                            mysqli_query($conn,$sql);
                            echo "Query is successful. Added " . $name . " to database.";

                            header("location:./index.php");
                        } else {
                            print_r($errors);
        
                        }
                    }
                
                ?>
        </div>

        <section>
            <h2>Create a Duck</h2>
            <form action="./create-duck.php" method="POST">
                <div class="flex-col">
                    <label for="name">Name</label>
                    <?php 
                    if (isset($errors['name'])) { 
                        echo "<div class='error'>" . $errors["name"] . "</div>";
                        } 
                        
                        ?>
                    <input id="name" for="name" type="text" name="name" value="<?php if(isset($name)) { echo $name; } ?>" required placeholder="John Doe">
                </div>

                <div class="flex-col">
                    <label for="food">Favorite Food (ex. Pasta, Beans, Pork)</label>
                    <?php if (isset($errors['food'])) { 
                        echo "<div class='error'>" . $errors["food"] . "</div>";
                        } 
                        
                        ?>
                    <input type="text" name="food" placeholder="beans, pasta, grapes" id="food" required>
                </div>

                <div class="flex-col">
                    <label for="profile">Profile Image</label>
                    <div>
                     <input type="file" name="file">
                    </div>
                </div>

                <div class="flex-col">
                    <label for="biography">Duck Biography</label>
                    <?php if (isset($errors['message'])) { 
                        echo "<div class='error'>" . $errors["message"] . "</div>";
                        } 
                        
                    ?>
                    <textarea name="message" id="message" cols="30" rows="10" required placeholder="Talk about your duck..."></textarea>
                </div>
                <button type="submit" name="submit" value="submit">Submit</button>
            </form>

        
            
        </section>

        <?php include('./components/footer.php'); ?>

    </body>
</html>