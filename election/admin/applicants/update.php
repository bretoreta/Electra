<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$appcandname = $apppost = $appbio = "";
$appcandname_err = $apppost_err = $appbio_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["appcandid"]) && !empty($_POST["appcandid"])){
    // Get hidden input value
    $appcandid = $_POST["appcandid"];
    
    // Validate name
    $input_name = trim($_POST["appcandname"]);
    if(empty($input_name)){
        $appcandname_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $appcandname_err = "Please enter a valid name.";
    } else{
        $appcandname = $input_name;
    }
    
    // Validate address address
    $input_post = trim($_POST["apppost"]);
    if(empty($input_appost)){
        $apppost_err = "Please enter a post.";     
    } else{
        $apppost = $input_post;
    }
    
    // Validate salary
    $input_bio = trim($_POST["appbio"]);
    if(empty($input_bio)){
        $salary_err = "Please enter the biography.";     
    } else{
        $appbio = $input_bio;
    }
    
    // Check input errors before inserting in database
    if(empty($appcandname_err) && empty($apppost_err) && empty($appbio_err)){
        // Prepare an update statement
        $sql = "UPDATE appcandidates SET appcandname=?, apppost=?, appbio=? WHERE appcandid=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_post, $param_bio, $param_id);
            
            // Set parameters
            $param_name = $appcandname;
            $param_address = $apppost;
            $param_salary = $appbio;
            $param_id = $appcandid;
            
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
    if(isset($_GET["appcandid"]) && !empty(trim($_GET["appcandid"]))){
        // Get URL parameter
        $appcandid =  trim($_GET["appcandid"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM appcandidates WHERE appcandid = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $appcandid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $appcandname = $row["appcandname"];
                    $apppost = $row["apppost"];
                    $appbio = $row["appbio"];
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

        }
    </style>

</head>
<body>
    <body class="loggedin">
        <nav class="navtop">
            <div>
                <h1>ELECTRA | Admin</h1>
                <a href="../home.php"><i class="fas fa-home"></i>Home</a>
                <a href="../profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </nav>
        <div class="content">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h3>Update Record</h3>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($appcandname_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="appcandname" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $appcandname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($apppost_err)) ? 'has-error' : ''; ?>">
                            <label>Post</label>
                            <input type="text" name="apppost" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $apppost_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($appbio_err)) ? 'has-error' : ''; ?>">
                             <label>Biography</label>
                            <textarea name="appbio" class="form-control"><?php echo $appbio; ?></textarea>
                            <span class="help-block"><?php echo $appbio_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>