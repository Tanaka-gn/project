<?php
include 'navbarpages.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <title>Our Services</title>

    <style>
   body {
    font-family: "Space Mono", monospace;  margin: 0;
  padding: 0;
  background-color: #f7f7f7;
  color: #333; 
  overflow-x: hidden;
}

.container {
  max-width: 800px;
  margin: 40px auto;
  padding: 30px; 
  background-color: #fff; 
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 

h1, h2, h3 {
  font-weight: 500; 
  color: #333;
  margin-bottom: 10px; 
}

h3 {
  background-color: transparent;
  padding: 0;
  border-radius: 0;
}

.section {
  margin-bottom: 40px; 
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
}

.service {
  margin-bottom: 20px; 
}

.service p {
  margin: 0;
  border-top: 1px solid black;}

.dropdown {
  width: 100%; 
  text-align: center; 
}

.dropdown select {
  padding: 12px 20px; 
  font-size: 16px; 
  border: none; 
  border-radius: 5px;
  background-color: #fff;
  color: #333; 
  cursor: pointer; 
}

.blurred-block {
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 10px; 
  backdrop-filter: blur(5px);
  padding: 20px; 
  margin-bottom: 30px; 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
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

<body>

    
    <div class="container">
        <h1>Our Services</h1>

        <div class="dropdown">
            <select id="serviceSelect">
                <option value="">Select a service...</option>
                <option value="building">Building</option>
                <option value="landscape">Landscape</option>
                <option value="solar-electronic">Solar and Electronics</option>
            </select>
        </div>

        <div class="section" id="building">
            <div class="blurred-block">
                <h2>Building</h2>

                <div class="service">
                    <h3>Development of Building Plans</h3>
                    <p>Our expert team can assist you in creating detailed and customized building plans tailored to your specific needs and requirements.</p>
                </div>

                <div class="service">
                    <h3>Building Construction</h3>
                    <p>From laying tiles and flooring to roofing, painting, carpentry, and more, our construction services cover every aspect of building your dream structure with precision and quality craftsmanship.</p>
                </div>

                <div class="service">
                    <h3>Refurbishments</h3>
                    <p>Whether it's updating the layout, renovating interiors, or revamping exteriors, we specialize in breathing new life into existing spaces through thoughtful refurbishment projects.</p>
                </div>

                <div class="service">
                    <h3>Foundation and Wall Crack Repairs</h3>
                    <p>We offer professional solutions for repairing foundation issues and wall cracks, ensuring the structural integrity and stability of your building.</p>
                </div>

                <div class="service">
                    <h3>Waterproofing</h3>
                    <p>Protect your property from moisture and water damage with our expert waterproofing services, designed to keep your building dry and structurally sound.</p>
                </div>
            </div>
        </div>

        <div class="section" id="landscape">
            <div class="blurred-block">
                <h2>Landscape</h2>

                <div class="service">
                    <h3>Design and Construction</h3>
                    <p>Transform your outdoor space into a beautiful and functional oasis with our professional landscaping design and construction services, tailored to your preferences and needs.</p>
                </div>

                <div class="service">
                    <h3>Site Clearance</h3>
                    <p>Prepare your property for landscaping projects with our site clearance services, clearing away debris and vegetation to create a clean slate for development.</p>
                </div>

                <div class="service">
                    <h3>Maintenance</h3>
                    <p>Maintain a manicured appearance for your lawn and garden with our regular mowing and maintenance services, ensuring a neat and tidy outdoor space year-round.</p>
                </div>
            </div>
        </div>

        <div class="section" id="solar-electronic">
            <div class="blurred-block">
                <h2>Solar and Electronics</h2>

                <div class="service">
                    <h3>Generators/Inverters</h3>
                    <p>Ensure uninterrupted power supply with our reliable generator solutions, tailored to meet your specific energy needs and requirements.</p>
                </div>

                <div class="service">
                    <h3>Solar Panels</h3>
                    <p>Harness the power of the sun with our high-quality solar panel installations, designed to maximize energy efficiency and reduce your carbon footprint.</p>
                </div>

                <div class="service">
                    <h3>Panel Cleaning</h3>
                    <p>Keep your solar panels performing at their best with our professional panel cleaning services, ensuring optimal energy production and efficiency.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="background-clip">
        <video autoplay loop muted playsinline class="video">
            <source src="servicebg.mp4" type="video/mp4">
        </video>
    </div>

    <script>
        document.getElementById('serviceSelect').addEventListener('change', function () {
            var value = this.value;
            if (value) {
                document.getElementById(value).scrollIntoView({ behavior: 'smooth' });
            }
        });

      
    </script>
</body>

</html>
