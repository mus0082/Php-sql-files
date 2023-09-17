<?php

$Host = "localhost";
        $User = "root";
        $Pass = "";
        $databaseName = "myformdb";

        $conn = mysqli_connect($Host, $User, $Pass, $databaseName);

        if ($conn) {
            echo "Connected successfully to myformdb database";
        }
        
    $Registrations = "SELECT * FROM formsinserttable";
    $fetchTable = mysqli_query($conn, $Registrations);

    $authenticity = false;   
    
    

        

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['submit'])) {


    $nameVariable = $_POST["username"];
    $PasswordVariable = $_POST["Password"];

    $nameError = '';
    $passwordError = '';
    
    $output = "Cant show you registered details until you filled username and password field.";
 
    $finalResult = " Cannot display of registrations.";

    if (empty($nameVariable) || empty($PasswordVariable)) {
            echo $output;
        } else {
            $insertIntoSQL = "INSERT INTO adminuser (username, password)
                            VALUES ('$nameVariable', '$PasswordVariable')";
            
            if (mysqli_query($conn, $insertIntoSQL) > 0) {
                $authenticity = true;
                echo "Data inserted successfully into formsinserttable.";
            } 
            else {
                echo "Unauthorized access.";
            }
        }

       
  
    if (empty($nameVariable)) {
       $nameError = "Name is required";
    }
    if (empty($PasswordVariable)){
        $passwordError = "Password is required";
        
    } 
    
    
}
}   
?> 

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Electric-Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <title>Registration-Form-Page</title>
</head>

<body>
    <div class="containerForForm">
        <header>
            <h1>
                Admin
            </h1>
            <nav>
                <ul>
                    <li><a href="Registration-Form-Page.html">Home</a></li>
                    <li><a href="AdminPage.html">Admin</a></li>
                    <li><a href="logout.html">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main id="forFormBox">
            <form action="php/Admin.php" method="post" id="forFormVertically">

                <label for="name">User-Name:</label>
                <input type="text" id="name" name="username">
                <p class="colorChanged"><?php echo $nameError; ?></p><br>

                <label for="Password">Password<span>&#42;</span></label>
                <input type="password" id="Password" name="Password" />
                <p class="colorChanged"><?php echo $passwordError; ?></p><br>


                <div id="forReceipt">
                     <?php
                            if ($authenticity) {
                                echo "<h2>Registered Users:</h2>";
                                if (mysqli_num_rows($fetchTable) > 0) {
                                    while ($row = mysqli_fetch_assoc($fetchTable)) {
                                        echo "<p><strong>Username:</strong> " . $row["FullName"] . "</p>";
                                        echo "<p><strong>Event Name:</strong> " . $row["EventName"] . "</p>";
                                        echo "<p><strong>Number of Participants:</strong> " . $row["NumberofParticipants"] . "</p>";
                                        echo "<p><strong>Email:</strong> " . $row["EmailAddress"] . "</p>";
                                        echo "<hr>";
                                    }
                                } else {
                                    echo "<p>No registrations found.</p>";
                                }
                            }
                        ?>
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </main>
    </div>


    <footer>
        <p class="fontControl"><span>&copy;</span>Copyright - Conestoga College</p>
    </footer>


</body>

</html>