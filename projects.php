<?php
include 'navbarpages.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Projects</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <style>/* Global Styles */

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: "Space Mono", monospace;
      line-height: 1.6;
      color: #333;
      background-color: #f7f7f7;
    }
    
    /* Values Section */
    
    .values {
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .values h2 {
  margin: 0;
  padding-top: 70px; /* Adjust this value to create space below the nav bar */
  text-align: center;
  position: relative;
  font-size: 2em;
  color: #333;
}
    .accordion {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .card {
      margin: 20px;
      width: calc(25% - 40px);
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
    }
    
    .card-header {
      padding: 10px;
      background-color: #333;
      color:#fff;
      display: flex;
      align-items: center;
    }
    
    .card-header i {
      font-size: 24px;
      margin-right: 10px;
    }
    
    .card-body {
      padding: 20px;
    }
    
    /* Gallery Section */
    
    .gallery {
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .gallery h2 {
        margin: 0;
  padding-top: 20px; /* Adjust this value to create space below the nav bar */
  padding-bottom: 20px;
  text-align: center;
  position: relative;
  font-size: 2em;
  color: #333;
    }
    
    .gallery-columns {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .gallery-column {
      margin: 20px;
      width: calc(33.33% - 40px);
    }
    
    .gallery-column img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      margin-bottom: 20px;
      border-radius: 10px;
    }
    
    /* Buttons */
    
    .buttons {
      padding: 20px;
      text-align: center;
    }
    
    .accordion-button {
      background-color: #333;
      color: #fff;
      font-size: 14px;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }
    
    .accordion-button:hover {
      background-color: #444;
    }
    .logo {
    display: inline-block;
    margin-right: auto;
  }
  
  .logo img {
    display: block;
    height: auto;
    width: 100px; /* Adjust width as per your logo image width */
  }
  
  nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 5px;
    background-color: #ffffff; /* Light gray background */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    z-index: 10;
    display: flex; /* Add display: flex to nav element */
    justify-content: space-between; /* Add justify-content: space-between to nav element */
    align-items: center; /* Add align-items: center to nav element */
  }
  
  nav ul {
    display: flex;
    justify-content: flex-end;
    gap: 20px;
    margin: 0; /* Add margin: 0 to remove default ul margin */
    padding: 0; /* Add padding: 0 to remove default ul padding */
  }
  
  nav ul li {
    list-style: none;
    font-size: 1.2em;
    cursor: pointer;
    transition: color 0.3s;
    color: #333; /* Dark gray text */
  }
  
  nav ul li:hover {
    color: #666; /* Darker gray text on hover */
  }
  
  .nav-btn {
    background: #333; /* Dark gray background */
    color: #fff; /* White text */
    font-size: 14px;
    padding: 10px 20px;
    border: none;
    border-radius: 10px; /* Slightly rounded corners */
    cursor: pointer;
    transition: background-color 0.3s;
  }
  
  .nav-btn:hover {
    background-color: #444; /* Darker gray background on hover */
  }

    
    </style>
</head>
<body>
  
    <!-- Cards Design -->
    <section class="values">
        <h2>Our Values</h2>
        <div class="accordion">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-shield" aria-hidden="true"></i>
                    <h3>Integrity</h3>
                </div>
                <div class="card-body">
                    <p>We adhere to the highest standards of ethical conduct in all that we do.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-certificate" aria-hidden="true"></i>
                    <h3>Quality</h3>
                </div>
                <div class="card-body">
                    <p>We deliver exceptional construction quality and strive for excellence.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                    <h3>Honesty</h3>
                </div>
                <div class="card-body">
                    <p>We are transparent and truthful in all our interactions.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <h3>Diversity</h3>
                </div>
                <div class="card-body">
                    <p>We embrace diversity and foster an inclusive environment.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section class="gallery">
        <h2>Our Projects</h2>
        <div class="gallery-columns">
            <div class="gallery-column">
                <img src="siteestablish.jpg">
                <img src="siteestablish2.jpg">
                <img src="siteestablish3.jpg">
                <img src="siteestablish4.jpg">
            </div>
            <div class="gallery-column">
                <img src="roofing.jpg">
                <img src="roofing2.jpg">
                <img src="roofing3.jpg">
                <img src="roofing4.jpg">
            </div>
            <div class="gallery-column">
                <img src="painting.jpg">
                <img src="painting2.jpg">
                <img src="painting3.jpg">
                <img src="painting4.jpg">
            </div>
        </div>
    </section>

    <!-- JavaScript for accordion functionality -->
  
</body>
</html>