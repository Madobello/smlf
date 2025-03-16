<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="test/style.css">
    <script src="js/sweetalert.js"></script>

    <title>Appointment & Booking List</title>
    <style>
        *{
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }
        form, .booking-list {
            max-width: 400px;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label{
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .booking-item {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .booking-row {
            display: flex;
            margin-bottom: 8px;
        }
        .booking-row span {
            font-weight: bold;
            width: 100px;
        }
        .booking-row div {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center; margin:40px 0">Appointment Form <a href="logout.php" style="" class="btn btn-danger">Logout</a></h2>
    <form id="appointmentForm">
        <label for="name">Car Name:</label>
        <input type="text" class="form-control" id="name" name="name" required><br>
    
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="date" name="date" required><br>
        
        <label for="time">Time:</label>
        <input type="time" class="form-control" id="time" name="time" required><br>
        
        <a href="moreaboutgaragepage.php" ><button type="submit">Book Appointment</button></a>
    </form>
    
    <h2 style="text-align: center">Booking List</h2>
    <div class="booking-list" id="bookingList">
        <p id="noBookingsMessage">No bookings yet.</p><br>
    </div>

    <script>
        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];
        
        // Set the min attribute of the date input to today's date
        document.getElementById('date').setAttribute('min', today);

        // Handle form submission
        document.getElementById('appointmentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            
            const bookingList = document.getElementById('bookingList');
            
            // Remove the "No bookings yet" message if it exists
            const noBookingsMessage = document.getElementById('noBookingsMessage');
            if (noBookingsMessage) {
                noBookingsMessage.remove();
            }
            
            // Create a new div element to display the booking information
            const bookingEntry = document.createElement('div');
            bookingEntry.classList.add('booking-item');
            
            // Add booking details in rows
            bookingEntry.innerHTML = `
                <div class="booking-row">
                    <span>Name:</span> <div>${name}</div>
                </div>
                
                <div class="booking-row">
                    <span>Date:</span> <div>${date}</div>
                </div>
                <div class="booking-row">
                    <span>Time:</span> <div>${time}</div>
                </div>
            `;
            
            // Append the new booking to the list
            bookingList.appendChild(bookingEntry);
        });
    </script>
</body>
</html>
