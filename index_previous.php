
<html>
<head>
<title> Bob's Auto Parts</title>
</head>

<body>
<form  action="welcome.php" method="post">
FisrtName: <input type="text" name="firstname" value="<?php echo $fname;?>"><br/><br/>
LastName:  <input type="text" name="lastname" value="<?php echo $lname;?>"><br/><br/>
Number of Tyres: <input type="number" name="tyres" value="<?php echo $tyre;?>"><br/><br/>
<input type="submit" name="Calculate"><br/>
    
    <?php
    $servername = "localhost";
    $user="abc";
    $password="abc";
    $dbname="Assignmentdb";

    // Create connection
    $conn = new mysqli($servername,$user,$password,$dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "INSERT INTO Orders (firstname, lastname, noOftyres)
    VALUES ('$firstname', '$lastname', '$tyres')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>
    </form>
</body>
</html>
