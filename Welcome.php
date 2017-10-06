
<html>
<head>
<title> Bob's Auto Parts: Order result</title>
</head>
<body>
    <?php

    echo $_POST["firstname"]." ".$_POST["lastname"].'<br/>';
    echo "total amount due is: ".($_POST["tyres"]* 110).'<br/>';

    ?>
</body>
</html>