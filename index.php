<?php
include('db.php');
// include('sms-api.php');

// session_start();

// if (!isset($_SESSION['login_user'])) {
//     header("location: login.php");
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ph = $_POST['phone'];

    // $phone_number = $_POST['phone'];
    // $order_type = isset($_POST['order_type']) ? $_POST['order_type'] : [];
    // $order_details = "";

    // if (in_array("Food", $order_type)) {
    //     $order_details .= "Breakfast: " . $_POST['breakfast'] . ", ";
    //     $order_details .= "Lunch: " . $_POST['lunch'] . ", ";
    //     $order_details .= "Dinner: " . $_POST['dinner'] . ", ";
    // }

    // $order_number = uniqid();
    
    // // SMS API Call
    // send_sms($phone_number, "Order Number: $order_number, Details: $order_details");

    // echo "Order Number: $order_number has been placed!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin/admin.css">
    <style>
        .hidden {
            display: none;
        }
        .food-options, .hidden {
            display: none;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body style="background-image: url('./top-view-bowls-with-indian-food.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat;
    background-attachment: fixed;">
    <img class="logo" src="./Logo_Temp_-removebg-preview.png" alt="Logo_Temp_-removebg-preview">    
    <div class="container">
        <div class="home-form">
            <h2>Place an Order</h2>
            <form action="process-order.php" method="post" enctype="multipart/form-data">
                <label for="phone">Phone Number:</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" id="phone" name="phone" placeholder="Phone Number" value="+91" required style="margin-left: 10px;">
                </div>
                
                <fieldset>
                    <legend>Order Type:</legend>
                    <label>
                        <input type="checkbox" name="order_type[]" value="Medicine" id="medicine-checkbox"> Medicines
                    </label>
                    <label>
                        <input type="checkbox" name="order_type[]" value="Groceries" id="groceries-checkbox"> Groceries
                    </label>
                    <label>
                        <input type="checkbox" name="order_type[]" value="Food" id="food-checkbox"> Food
                    </label>
                </fieldset>
                
                <div id="medicine-options" class="hidden">
                    <label for="attachment">Attachment for Medicines:</label>
                    <input type="file" id="attachment" name="attachment"><br>
                </div>

                <div id="groceries-options" class="hidden">
                    <label for="grocery-details">Details:</label>
                    <input type="text" id="grocery-details" name="grocery_details" placeholder="Enter details"><br>
                    
                    <label for="grocery-attachment">Attachment for Groceries:</label>
                    <input type="file" id="grocery-attachment" name="grocery_attachment"><br>
                </div>

                <div id="food-options" class="food-options">
                    <!-- Updated Breakfast Checkboxes -->
                    <label><input type="checkbox" name="breakfast[]" value="Breakfast"> Breakfast</label><br>
                    
                    <!-- Updated Lunch Checkboxes -->
                    <label><input type="checkbox" name="lunch[]" value="Lunch"> Lunch</label><br>
                    
                    <!-- Updated Dinner Checkboxes -->
                    <label><input type="checkbox" name="dinner[]" value="Dinner">Dinner</label><br>

                    <!-- Updated Section for Days of the Week -->
                    <label>Select Day(s):</label><br>
                    <label><input type="checkbox" name="days[]" value="Monday"> Monday</label><br>
                    <label><input type="checkbox" name="days[]" value="Tuesday"> Tuesday</label><br>
                    <label><input type="checkbox" name="days[]" value="Wednesday"> Wednesday</label><br>
                    <label><input type="checkbox" name="days[]" value="Thursday"> Thursday</label><br>
                    <label><input type="checkbox" name="days[]" value="Friday"> Friday</label><br>
                    <label><input type="checkbox" name="days[]" value="Saturday"> Saturday</label><br>
                    <label><input type="checkbox" name="days[]" value="Sunday"> Sunday</label><br>
                </div>

                <!-- Date Picker for Order Date -->
                <div>
                    <label for="order-date">Select Order Date:</label><br>
                    <input type="date" id="order-date" name="order_date" required><br><br>
                </div>

                <button type="submit">Submit Order</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('food-checkbox').addEventListener('change', function() {
            var foodOptions = document.getElementById('food-options');
            foodOptions.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('medicine-checkbox').addEventListener('change', function() {
            var medicineOptions = document.getElementById('medicine-options');
            medicineOptions.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('groceries-checkbox').addEventListener('change', function() {
            var groceriesOptions = document.getElementById('groceries-options');
            groceriesOptions.style.display = this.checked ? 'block' : 'none';
        });
    </script>
</body>
</html>