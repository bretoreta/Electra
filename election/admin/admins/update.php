<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$admin_name = $admin_role = "";
$admin_name_err = $admin_role_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["admin_id"]) && !empty($_POST["admin_id"])){
    // Get hidden input value
    $admin_id = $_POST["admin_id"];
    
    // Validate name
    $input_name = trim($_POST["admin_name"]);
    if(empty($input_name)){
        $admin_name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $admin_name_err = "Please enter a valid name.";
    } else{
        $admin_name = $input_name;
    }
    
    // Validate admin role
    $input_role = trim($_POST["admin_role"]);
    if(empty($input_role)){
        $admin_role_err = "Please enter a role.";     
    } else{
        $admin_role= $input_role;
    }
    
    // Check input errors before inserting in database
    if(empty($admin_name_err) && empty($admin_role_err)){
        // Prepare an update statement
        $sql = "UPDATE admins SET admin_name=?, admin_role=? WHERE admin_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_address, $param_salary, $param_id);
            
            // Set parameters
            $param_name = $admin_name;
            $param_address = $admn_role;
            $param_id = $admin_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["admin_id"]) && !empty(trim($_GET["admin_id"]))){
        // Get URL parameter
        $admin_id =  trim($_GET["admin_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM admins WHERE admin_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $admin_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $admin_name = $row["admin_name"];
                    $address = $row["admin_role"];
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
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
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
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>ELECTRA | Transparent, Honest</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1000px;
            margin: 0 auto;
            align-self: center;
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
    <div class=content>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h3>Update Record</h3>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($admin_name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="admin_name" class="form-control" value="<?php echo $admin_name; ?>">
                            <span class="help-block"><?php echo $admin_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($admin_role_err)) ? 'has-error' : ''; ?>">
                            <label>Role</label>
                            <input type="text" name="admin_role" class="form-control" value="<?php echo $admin_role; ?>">
                            <span class="help-block"><?php echo $admin_role_err;?></span>
                        </div>-
                        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>
</body>
</html>