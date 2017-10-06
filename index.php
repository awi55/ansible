
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
    $password="abc ";
    $dbname="Assignmentdb";


    // Create connection
    $conn = new mysqli($servername,$user, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $unsafe_firstname = $_POST['$firstname'];
    $unsafe_lasstname = $_POST['$lastname'];
    $unsafe_nooftyres = $_POST['$tyres'];
    $unsafe_amount=$_post['&tyres'* 110];

    $stmt = $mysqli->prepare("INSERT INTO Orders (firstname, lastname, noOftyres, Amount)
    VALUES (?, ?, ?,?)");

    // TODO check that $stmt creation succeeded

    // "s" means the database expects a string "i" means integer
    $stmt->bind_param("ssii", $unsafe_firstname,$unsafe_lasstname,$unsafe_nooftyres,$unsafe_amount);

    $stmt->execute();

    $stmt->close();

    $mysqli->close();

     $conn->close();
    ?>
    </form>
</body>
</html>
