<?php 
session_start();

    include("connection.php");
    include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JUSTSOURCEIT</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#E0EAFC, #CFDEF3);
            height: 100vh;
            user-select: none;
        }

        .center,
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #click {
            display: none;
        }

        .click-me {
            display: block;
            width: 190px;
            height: 60px;
            background: #27ae60;
            border: 1px solid #26a65b;
            color: white;
            text-align: center;
            font-size: 22px;
            line-height: 50px;
            border-radius: 3px;
            cursor: pointer;
            transition: .5s;
        }

        .click-me:hover {
            background: #219150;
        }

        .content {
            opacity: 0;
            visibility: hidden;
            width: 400px;
            height: 350px;
            background: white;
            border-radius: 3px;
            transition: .3s ease-in;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .4);
        }

        #click:checked~.content {
            opacity: 1;
            visibility: visible;
        }

        .header {
            height: 85px;
            background: red; /* Updated color to red */
            overflow: hidden;
            border-radius: 3px 3px 0 0;
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .2);
        }

        .header h2 {
            color: white;
            padding-left: 32px;
            font-weight: normal;
            font-size: 24px; /* Increased font size */
        }

        .fa-times {
            position: absolute;
            right: 20px;
            top: 20px;
            color: #e8f7fc;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .fa-check::before {
            content: '\26A0'; /* Warning symbol */
            font-size: 80px;
            color: red; /* Updated color to red */
            font-weight: bold;
            display: inline-block;
            width: 100px;
            height: 100px;
            line-height: 100px;
            border: 2px solid red; /* Updated color to red */
            border-radius: 50%;
            margin-top: 30px;
        }

        p {
            padding-top: 10px;
            font-size: 19px;
            color: #1a1a1a;
            text-align: center;
        }

        .line {
            position: absolute;
            bottom: 60px;
            width: 100%;
            height: 1px;
            background: silver;
        }

        .close-btn {
            position: absolute;
            bottom: 12px;
            right: 25px;
            border: 1px solid #27ae60;
            border-radius: 3px;
            color: #27ae60;
            padding: 8px 10px;
            font-size: 18px;
            cursor: pointer;
            transition: .5s;
        }

        .close-btn:hover {
            background: #27ae60;
            color: white;
        }

input {
    width: 40%;
    height: 40px; /* Set the desired height */
    border: 1px;
    border-radius: 5px; /* Fix the typo, it should be 5px instead of 05px */
    padding: 8px 15px;
    margin: 10px 15px 15px 0px;
    box-shadow: 1px 1px 2px 1px grey;
}

    </style>
</head>

<body>
    <center>
        <h1>JUSTSOURCEIT</h1>
        <form action="" method="POST">
            <input type="text" name="brand" placeholder="Enter Brand to Search" />
            <p>If brand that you search do not display, it means that brand do not supporting Israel</p>
            <input type="submit" name="search" value="DISPLAY INFO" class="click-me">
        </form>
    <div class="button-container">
        <button onclick="window.location.href='index.php'" id="button">Go Back</button>
    </div>

        <?php
        $connection = mysqli_connect($servername, $dbuser, $dbpass, $dbname, $dbport);

        $displayInfoChecked = false; // Initialize the variable

        if (isset($_POST['search'])) {
            $brand = $_POST['brand'];

            $query = "SELECT * FROM brand WHERE brand = '$brand'"; // Select query based on product name
            $query_run = mysqli_query($connection, $query);

            if ($row = mysqli_fetch_array($query_run)) {
                $displayInfoChecked = true; // Set the variable to true if data exists
            }
        }
        ?>

        <input type="checkbox" id="click" <?php if ($displayInfoChecked) echo 'checked'; ?>>

        <?php
        if ($displayInfoChecked) {
            // Display the content only if data exists
            ?>
            <div class="content">
                <div class="header">
                    <?php if ($row['id']) { ?>
                        <h2>THIS PRODUCT IS SUPPORTING ISRAEL </h2>
                    <?php } else { ?>
                        <h2>THIS PRODUCT IS NOT SUPPORTING ISRAEL </h2>
                    <?php } ?>
                    <label for="click" class="fas fa-times"></label>
                </div>
                <label for="click" class="fas fa-check"></label>
                <p><?php echo $row['brand']; ?></p>
                <div class="line"></div>
                <label for="click" class="close-btn">Close</label>
            </div>
        <?php
        }
        ?>

    </center>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>