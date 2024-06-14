<?php
include 'navbarpages.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Space Mono", monospace;
        }

        /* Body and general styling */
        body {
            background: url('cubkg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            text-align: left;
            z-index: 0;
        }


        /* Contact details styling */
        .contact-details {
            padding: 20px;
            color: #333;
            position: relative;
            z-index: 1;
        }

        .contact-item {
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }

        .contact-item i {
            margin-right: 15px;
            font-size: 2.8em;
        }

        .contact-item span {
            font-size: 2em;
        }

        /* Image positions */
        .conicons {
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 1;
        }

        .conicons img
        {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .groupcons {
            position: absolute;
            bottom: 0;
            left: 0;
            transform: rotate(90deg);
            z-index: 1;
        }

        .table {
            position: absolute;
            bottom: 0;
            z-index: 1;
        }
    </style>
</head>
<body>
   
    <div class="contact-details">
        <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>5 Kornalyn Ave, Mayfield Park<br>Johannesburg 2091</span>
        </div>
        <div class="contact-item">
            <i class="fas fa-phone"></i>
            <span>061 425 1608</span>
        </div>
        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <span>Elevateprojects1@outlook.com</span>
        </div>
    </div>
    <div class="conicons">
        <img src="constructionpic.png" alt="construction company">    
    </div>
   
</body>
</html>
