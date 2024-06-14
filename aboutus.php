<?php
include 'navbarpages.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Information</title>
    <link rel="stylesheet" href="style.css">
    <script src="myscripts.js" defer></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bruno+Ace&display=swap');

        body {
            font-family: 'Bruno Ace', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }


        /*About us*/
        .about-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            flex: 1;
            padding-top: 100px; /* to prevent content from hiding behind the navbar */
        }

        .content-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            width: 80%;
            max-width: 1200px;
            z-index: 1; /* Ensure content is above the video */
        }

        .AboutUs, .ourmission {
            background-color: #fff;
            box-shadow: 0 9px 9px rgba(0, 0, 0, 0.5);
            padding: 15px;
            width: 100%;
            max-width: 580px;
            border-radius: 8px;
            height: 300px;
            overflow-y: auto;
            flex: 1;
        }

        h3 {
            text-align: center;
        }

        p {
            margin: 10px 0;
        }

        .background-clip {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .background-clip .video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
        }

        @media (max-width: 768px) {
            .AboutUs, .ourmission {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body class="about-body">
   
  
    <div class="background-clip">
        <video autoplay loop muted playsinline class="video">
            <source src="aubvideo.mp4" type="video/mp4">
        </video>
    </div>

    <div class="content-container">
        <section class="AboutUs">
            <h3>ABOUT US</h3>
            <p class="p1">Elevate Construction Company Pty Ltd, is a professional construction company that was founded in 2020.</p>
            <p class="p2">We specialise in all your building, renovations, solar, and electrical needs.</p>
            <p class="p3">Elevate pledges to consistently provide a solid commitment to quality, a robust work ethic, punctuality, and a pure dedication to stellar craftsmanship.</p>
        </section>
        <section class="ourmission">
            <h3>OUR MISSION</h3>
            <p class="p1">To bring our client's visions to life and to provide excellent quality services and innovative solutions.</p>
            <p class="p2">To conduct business with the highest level of professionalism, integrity, honesty, and fairness.</p>
            <p class="p3">To be the most sought-after construction and solar/energy company globally.</p>
            <p class="p4">To build long-lasting and sustainable relationships with our clients, subcontractors, suppliers, and all stakeholders.</p>
        </section>
    </div>
   
</body>
</html>
