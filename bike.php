<!DOCTYPE html>
<html>
    <head>
        <meta charset ="UTF-8">
    </head>
    <body>
        <form action = 'addBike.php' method ="POST">

            <input type="text" name="status" placeholder="Status" value="<?php $_POST['prefilled']?>"/> <br> <br>

            <input type="text" name="price"  placeholder="Price" value="COWBOY"/> <br> <br>

            <input type="text" name="rim" placeholder="Rim"/> <br> <br>

            <input type="text" name="gears"  placeholder="Gears"/> <br> <br>

            <input type="text" name="brake"  placeholder="Brake"/> <br> <br>

            <button type="submit" name="submit">Add Bike</button>
        </form>
    </body>
</html>