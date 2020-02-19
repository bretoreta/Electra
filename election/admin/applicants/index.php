<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../style.css" rel="stylesheet" type="text/css">
        <link rel='icon' href='../../favicon.ico' type='image/x-icon'/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style>
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
            <h2>Dashboard</h2>
            <a href="../home.php"><button type="button" class="btn btn-success"><-Go Back</button></a>
            <p>Dear <?=$_SESSION['name']?>, Here is a list of all Applicants currently in the database</p> 
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
  <!--   <div class="content"> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h3 class="pull-left">Applicants details</h3>
                        <!-- <a href="create.php" class="btn btn-success pull-right">Add New User</a> -->
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM appcandidates";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        // echo "<th>#</th>";
                                        echo "<th>Candidate Id</th>";
                                        echo "<th>Username</th>";
                                        echo "<th>Post Applied</th>";
                                        echo "<th>Bio</th>";
                                        echo "<th></th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['appcandid'] . "</td>";
                                        echo "<td>" . $row['appcandname'] . "</td>";
                                        echo "<td>" . $row['apppost'] . "</td>";
                                        echo "<td>" . $row['appbio'] . "</td>";
                                        echo "<td></td>";
                                        echo "<td>";
                                             echo "<a href='read.php?appcandid=". $row['appcandid'] ."' title='View Applicant' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='approve.php?appcandid=". $row['appcandid'] ."' title='Approve Applicant' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?appcandid=". $row['appcandid'] ."' title='Deny Applicant' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>