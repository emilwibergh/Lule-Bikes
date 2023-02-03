<!DOCTYPE html>
<html>
    <head>
        <meta charset ="UTF-8">
    </head>
    <body>
        <form action = 'addBooking.php' method ="POST">

            <input type="text" name="startDate"  placeholder="Start Date"/> <br> <br>

            <input type="text" name="endDate" placeholder="End Date"/> <br> <br>

            <input type="text" name="pickupPoint"  placeholder="Pickup Point"/> <br> <br>

            <input type="text" name="returnPoint"  placeholder="Return Point"/> <br> <br>

            <input type="text" name="bookedBy"  placeholder="Booked By"/> <br> <br>

            <input type="text" name="bikeBooked"  placeholder="Bike Booked"/> <br> <br>

            <input type="text" name="returned"  placeholder="Returned"/> <br> <br>

            <button type="submit" name="submit">Book Bike</button>
        </form>
    </body>
</html>