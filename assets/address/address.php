<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        .form-container {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            right: 49%;
        }
        .form-container img {
            max-width: 200px;
            margin-right: 20px;
            border-radius: 5px;
        }
        .form-container .form-box {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 20px;
            background: white;
        }
        .center-text {
            text-align: center;
        }
        .form-control {
            background-color: transparent !important;
        }
        .form-group {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s, transform 0.5s;
        }
        .form-group.show {
            opacity: 1;
            transform: translateY(0);
        }
        .dog img {
            position: absolute;
            width: 500px;
            height: auto; 
            border-radius: 5px;
            top: 15%;
            right: 5%;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="https://i.gifer.com/MZZO.gif" alt="Animated GIF">
        <div class="form-box">
            <h2 class="center-text">Enter Your Address</h2>
            <form id="addressForm" action="process_address.php" method="POST">
                <input type="hidden" name="user_id" value="1">
                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="dog">
    <img src="https://static.wikia.nocookie.net/30fad5ff-da3e-4e82-8b52-01e93f0f72b8/scale-to-width/755" alt="Animated GIF">
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                setTimeout(() => {
                    group.classList.add('show');
                }, index * 500); // Delay each group by 500ms
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
