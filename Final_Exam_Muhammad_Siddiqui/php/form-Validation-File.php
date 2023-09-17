<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['submit'])) {
        $nameVariable = $_POST["name"];
        $phoneNumberVariable = $_POST["phone"];
        $participantsVariable = $_POST["Participants"];
        $EmailSelectionVariable = $_POST["EmailSelection"];
        $eventNameVariable = $_POST["eventName"];
        $EmailCheck = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
        $nameError = '';
        $phoneError = '';
        $participantsVariableError = '';
        $eventNameVariableError = '';
        $emailSelectionError = '';

        $output = "Form is not submited.";
        $finalResult = "Receipt will not be generated.";

        $Host = "localhost";
        $User = "root";
        $Pass = "";
        $databaseName = "myformdb";

        $conn = mysqli_connect($Host, $User, $Pass, $databaseName);

        if ($conn) {
            echo "Connected successfully to myformdb database";
        }

        if (empty($nameVariable) || empty($phoneNumberVariable) || empty($participantsVariable) 
            || empty($EmailSelectionVariable) || empty($eventNameVariable)) {
            echo $output;
        } else {
            $insertIntoSQL = "INSERT INTO formsinserttable (FullName, ContactNumber, EmailAddress, EventName, NumberofParticipants)
                            VALUES ('$nameVariable', '$phoneNumberVariable', '$EmailSelectionVariable','$eventNameVariable','$participantsVariable')";
            
            if (mysqli_query($conn, $insertIntoSQL)) {
                echo "Data inserted successfully into formsinserttable.";
            } 
        }
    

   
    if (
        !empty($nameVariable) && !empty($phoneNumberVariable) &&
        !empty($participantsVariable) && !empty($EmailSelectionVariable) && preg_match($EmailCheck, $EmailSelectionVariable) &&
        !empty($eventNameVariable)
        ) {
            $finalResult = "Receipt:<br>";
            $finalResult .= "Name: $nameVariable<br>";
            $finalResult .= "Phone Number: $phoneNumberVariable<br>";
            $finalResult .= "Number of Participants: $participantsVariable<br>";
            $finalResult .= "Email: $EmailSelectionVariable<br>";
            $finalResult .= "Event Name: $eventNameVariable<br>";
        }
      
    
    if (empty($nameVariable)) {
       $nameError = "Name is required";
    }
    if (empty($phoneNumberVariable)){
        $phoneError = "Please enter valid phone number";
    } 

    if (empty($participantsVariable)){
        $participantsVariableError = "select a Participants";
          } 
    if (empty($eventNameVariable)){
        $eventNameVariableError = "select a Event Name";
        
    }
    if (empty($EmailSelectionVariable) || !preg_match($EmailCheck, $EmailSelectionVariable)){
        $emailSelectionError = "Email  is required";
       
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
                Registration-Form-Page
            </h1>
            <nav>
                <ul>
                    <li><a href="Registration-Form-Page.html">Home</a></li>
                    <li><a href="Admin.html">AdminPage</a></li>
                </ul>
            </nav>
        </header>

        <main id="forFormBox">
            <form action="php/form-Validation-File.php" method="post" id="forFormVertically">

                <label for="name">Full-Name:</label>
                <input type="text" id="name" name="name">
                <p class="colorChanged"><?php echo $nameError; ?></p><br>

                <label for="phone">Contact-Number:</label>
                <input type="text" id="phone" name="phone">
                 <p class="colorChanged"><?php echo $phoneError; ?></p><br>


                <label for="Participants"> Number of Participants<span>&#42;</span></label>
                <select id="Participants" name="Participants">
                    <option value="">Select Participants</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                 <p class="colorChanged"><?php echo $participantsVariableError; ?></p><br>

                <label for="Email">Email<span>&#42;</span></label>
                <input type="Email" id="emailSelection" name="EmailSelection" placeholder="eg: test@test.com" />
                 <p class="colorChanged"><?php echo $emailSelectionError; ?></p><br>

                <label for="Event Name">Event-Name<span>&#42;</span></label>
                <select id="event-Name" name="eventName">
                    <option value="">Select Event Name</option>
                    <option value="Ball-Party">Ball Party</option>
                    <option value="Birthday-Party">Birthday Party</option>
                </select>
                 <p class="colorChanged"><?php echo $eventNameVariableError; ?></p><br>
                <div id="forReceipt">
                     <?php 
                   if(empty($nameVariable) || empty($phoneNumberVariable)  
                    || empty($participantsVariable)  || empty($productPriceVariable)
                    || empty($CreditCardVariable)   || empty($EmailSelectionVariable) || !preg_match($EmailCheck, $EmailSelectionVariable)){
                    echo $finalResult;
                    }else{
                        echo $output;
                    }
                    ?><br>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </main>
    </div>


    <footer>
        <p class="fontControl"><span>&copy;</span>Copyright - Conestoga College</p>
    </footer>


</body>

</html>