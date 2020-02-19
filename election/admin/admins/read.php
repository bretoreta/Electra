<?php
session_start();
// If the user is not logged in redirect to the login page...
// Check existence of id parameter before processing further
if(isset($_GET["admin_id"]) && !empty(trim($_GET["admin_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM admins WHERE admin_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["admin_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $admin_id = $row["admin_id"];
                $admin_name = $row["admin_name"];
                $admin_role = $row["admin_role"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>ELECTRA | Transparent, Honest</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1000px;
            margin: 0 auto;

        }
    </style>
</head>
</head>
    <body class="loggedin">
        <nav class="navtop">
            <div>
                <h1>ELECTRA | Admin</h1>
                <a href="../home.php"><i class="fas fa-home"></i>Home</a>
                <a href="../profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </nav>
<body>
    <div class="content">
        <p>Dear <?=$_SESSION['name']?>, You are viewing details of <?php echo $row['admin_name']; ?>.</p> 
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h3>View Record</h3>
                    </div>
                    <div class="form-group">
                        <label>Admin Id</label>
                        <p class="form-control-static"><?php echo $row["admin_id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Admin Name</label>
                        <p class="form-control-static"><?php echo $row["admin_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Admin Role</label>
                        <p class="form-control-static"><?php echo $row["admin_role"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</div>
</body>
</html>