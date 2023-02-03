<!DOCTYPE html>
<html>
    <head>
        <meta charset ="UTF-8">
    </head>
    <body>
        <form action = 'addBooking.php' method ="POST">

            <input type="text" name="id" placeholder="Bike ID"/> <br> <br>

            <input type="text" name="startDate"  placeholder="Start Date"/> <br> <br>

            <input type="text" name="endDate" placeholder="Rim"/> <br> <br>

            <input type="text" name="pickupPoint"  placeholder="Gears"/> <br> <br>

            <input type="text" name="returnPoint"  placeholder="Brake"/> <br> <br>

            <input type="text" name="bookedBy"  placeholder="Name"/> <br> <br>

            <button type="submit" name="submit">Book Bike</button>
        </form>
    </body>
</html>