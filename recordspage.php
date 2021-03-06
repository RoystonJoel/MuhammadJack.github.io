<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Records Page</title>
    <link rel="stylesheet" href="style/styles.css" />
</head>
<body>
    <?php
        if(!isset($_SESSION["user_name"]))
        {
            echo "<div class='page'>
                <div class='container'>
                    <div class='left'>
                        <img src='/images/medicine.png' alt='logo' />
                        <div class='login'>PHP-SRePS</div>
                    </div>
                    
                    <div class='right'>
                        <div class='msg'>Not Logged In Yet</div>
                        <div class='button-row'><button type=\"button\" onclick=\"location.href='index.php'\" class='button'>Log In</button></div>
                    </div>
                </div>
            </div>";
            exit;
        }
    ?>
    
    <div class="side-bar">
        <img src="/images/medicine.png" alt="logo" />
        <div class="side-title">PHP-SRePS</div>
        <?php
           $username = $_SESSION['user_name'];

           if($_SESSION['admin_check'] == "true")
            {
                echo "<div class='side-msg'>Login as: $username</div>";
                
                echo "<div><button type=\"button\" onclick=\"location.href='adminpage.php'\" class='side-btn side-adminbtn'>Admin Page</button></div>";
            }
            else
            {
                echo "<div class='side-msg'>Guest Login</div>";
            }
        ?>
        <div><button type="button" onclick="location.href='logout.php'" class="side-btn">Log Out</button></div>
    </div>
    
    <div class="main">
        <div>
            <div style="text-align: center; margin-bottom: 30px;" >
                <button type="button" onclick="location.href='addrecord.php'" class="top-btn">Add Record</button>
                <button type="button" onclick="location.href='sort_month_record.php'" class="top-btn">Monthly Records</button> 
            </div>
            
            <div style="text-align: center; margin-bottom: 30px;" >
                <form action="search_record_process.php" methord="get">
                    <label>Enter Record ID</label>
                    <input type="text" name="Record_ID" class="searchbar" required/>
            
                    <button type="submit" name="search" class="top-btn">Search Record</button>
                    
                    <button type="submit" name="delete" formaction="delete_record_process.php" class="top-btn">Delete Record</button>
                    
                   <button type="submit" name="update" formaction="update_record.php" class="top-btn">Update Record</button>
                </form>
            </div>
        </div>
    
        <table>
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Transaction Number</th>
                    <th>Date</th>
                    <th>Product ID</th>
                    <th>Description</th>
                    <th>Customer Number</th>
                    <th>Sale Amount</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once 'salesRecordDTO.php';
                    $recorddto = new recordDTO(null,null,null,null,null,null,null);
                    $info_holder = $recorddto->displayall();
            
                    $ID_array = $info_holder[0];
                    $transnum_array = $info_holder[1];
                    $date_array = $info_holder[2];
                    $productnumber_array = $info_holder[3];
                    $description_array = $info_holder[4];
                    $customernumber_array = $info_holder[5];
                    $saleamount_array = $info_holder[6];
                    $email_array = $info_holder[7];
            
                    $x = 0;
                    foreach($ID_array as $value)
                    {
                        echo "<tr>
                            <td>{$ID_array[$x]}</td>
                            <td>{$transnum_array[$x]}</td>
                            <td>{$date_array[$x]}</td>
                            <td>{$productnumber_array[$x]}</td>
                            <td>{$description_array[$x]}</td>
                            <td>{$customernumber_array[$x]}</td>
                            <td>{$saleamount_array[$x]}</td>
                            <td>{$email_array[$x]}</td>
                        </tr>";
            
                        $x++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>