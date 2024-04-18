<?php
require_once "../db/config.php";
$id = $link = $name = $description = $price = $added = $updated = "";
$id_err = $link_err = $name_err = $description_err = $price_err = $added_err = $updated_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    $input_id = trim($_POST["id"]);
    if (empty($input_id)) {
        $id_err = "Please enter the id";
    } elseif (!ctype_digit($input_id)) {
        $id_err = "Please enter a positive integer value.";
    } else {
        $id = $input_id;
    }
} else {
    $id_err = "ID is required";
}

if (isset($_POST["link"])) {
    $input_link = trim($_POST["link"]);
    if (empty($input_link)) {
        $link_err = "Please enter a link.";
    } elseif (!filter_var($input_link, FILTER_VALIDATE_URL)) {
        $link_err = "Please enter a valid URL.";
    } else {
        $link = $input_link;
    }
} else {
    $link_err = "Link is required";
}

if (isset($_POST["name"])) {
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $input_name)) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }
} else {
    $name_err = "Name is required";
}

if (isset($_POST["description"])) {
    $input_description = trim($_POST["description"]);
    if (empty($input_description)) {
        $description_err = "Please enter a description.";
    } else {
        $description = $input_description;
    }
} else {
    $description_err = "Description is required";
}

if (isset($_POST["price"])) {
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter a price.";
    } elseif (!preg_match("/^\d+(\.\d+)?$/", $input_price)) {
        $price_err = "Please enter a valid price.";
    } else {
        $price = $input_price;
    }
} else {
    $price_err = "Price is required";
}

if (isset($_POST["added"])) {
    $input_added = trim($_POST["added"]);
    if (empty($input_added)) {
        $added_err = "Please enter a date-added.";
    } else {
        $added = $input_added;
    }
} else {
    $added_err = "Date added is required";
}

if (isset($_POST["updated"])) {
    $input_updated = trim($_POST["updated"]);
    if (empty($input_updated)) {
        $updated_err = "Please enter an updated date.";
    } else {
        $updated = $input_updated;
    }
} else {
    $updated_err = "Updated date is required";
}

    // Check input errors before inserting in database
    if (empty($id_err) && empty($link_err) && empty($name_err) && empty($description_err) && empty($price_err) && empty($added_err) && empty($updated_err)) {
        // Prepare an update statement
        $sql = "UPDATE products SET id= :id, link= :link, name= :name, description= :description, price= :price, added= :updated, updated= :added, WHERE id=:id";
 
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":link", $link);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":added", $added);
            $stmt->bindParam(":updated", $updated);
                
            if ($stmt->execute()) {
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                print_r($stmt->errorInfo());
            }
        } else {
            echo "Failed to prepare the SQL statement.";
        }

        unset($stmt);
    }

    unset($pdo);
}
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    $name = $row["name"];
                    $address = $row["address"];
                    $salary = $row["salary"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>