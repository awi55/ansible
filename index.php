
<html>
<head>
<title> Bob's Auto Parts</title>
</head>

<body>
<form  action="" method="post">
FisrtName: <input type="text" name="firstname" value="<?php echo $fname;?>"><br/><br/>
LastName:  <input type="text" name="lastname" value="<?php echo $lname;?>"><br/><br/>
Number of Tyres: <input type="number" name="tyres" value="<?php echo $tyre;?>"><br/><br/>
<input type="submit" name="Calculate"><br/>
    
    <?php
    $servername = "localhost";
    $user="bobauto";
    $password="bobauto";
    $dbname="Assignmentdb";

    //Checker whether the the REQUEST_METHOD variable is present
    if(isset($_SERVER['REQUEST_METHOD']))
        $method = $_SERVER['REQUEST_METHOD'];
        //Checking whether the REQUEST_METHOD is POST Else return HTTP_RESPONSE (400)
    if(isset($method) && ($method!=="POST")) {
        http_response_code(400);
        exit;
    }
    
    
    // Create connection
    $conn = new mysqli($servername,$user, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    if($method==="POST")
    {
        $unsafe_firstname = $_POST['firstname'];
        $unsafe_lastname = $_POST['lastname'];
        $unsafe_nooftyres = $_POST['tyres'];
        $unsafe_amount=$unsafe_nooftyres * 110;

        //$stmt = $conn->prepare("INSERT INTO Orders (firstname, lastname, noOfTyres, Amount) VALUES (?,?,?,?)");
        if(!($stmt = $conn->prepare("INSERT INTO Orders (firstname, lastname, noOfTyres, Amount) VALUES (?,?,?,?)")))
        {
            echo "Prepare Failed: (" .$conn->errno. ") ". $conn->error;
        }
        else
        {
            echo "Preparation Succeeded!!";
        }
        // TODO check that $stmt creation succeeded

        // "s" means the database expects a string "i" means integer
        //$stmt->bind_param("ssii", $unsafe_firstname,$unsafe_lasstname,$unsafe_nooftyres,$unsafe_amount);
        if(!$stmt->bind_param("ssii", $unsafe_firstname,$unsafe_lastname,$unsafe_nooftyres,$unsafe_amount))
        {
            echo "Binding parameters Failed: (" .$stmt->errno. ") ". $stmt->error;
        }
        else
        {
            echo "Binding Succeeded!!";
        }

        //$stmt->execute();
        if(!$stmt->execute())
        {
            echo "Execution Failed: (" .$stmt->errno. ") ". $stmt->error;
        }
        else
        {
            echo "Execution Succeeded!!!<br/>";
            echo '<h4>'.$unsafe_firstname." ".$unsafe_lastname.'</h4>';
            echo "<h4>total amount due is: ".$unsafe_amount.'</h4>';
        }
        $stmt->close();

        $mysqli->close();

         $conn->close();
    }
    ?>
    </form>
</body>
</html>
