<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>ADD Records Page</title>

</head>
<body>
<?php
    
        
    if(isset($_SESSION["user_name"]))
    {
       $username = $_SESSION['user_name'];

        echo "<h1> Welcome $username </h1>";
    }
    else
    {
        echo "You are not logged in";
        exit;
    }
?>

    <h1>ADD record</h1>
    <form action="add_record_process.php" methord="get">
    <lable>Transaction Number:</lable>
    <input type="text" name="transactionnum" required/>
    <br>
    <lable>Date :</lable>
    <input type="text" name="date" required/>
    <br>
    <lable>productnumber :</lable>
    <input type="text" name="productnumber" required/>
    <br>
    <lable>description :</lable>
    <input type="text" name="description" required/>
    <br>
    <lable>customernumber :</lable>
    <input type="text" name="customernumber" required/>
    <br>
    <lable>saleamount :</lable>
    <input type="text" name="saleamount" required/>
    <br>



    <button type="submit" name="submit">Add Record!</button>
    </form>

</body>
</html>