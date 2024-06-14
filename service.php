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
  background-color: #f7f7f7; /* Changed background color to a light gray */
  color: #333; /* Changed text color to a dark gray */
  overflow-x: hidden; /* To prevent horizontal scrolling */
}

.container {
  max-width: 800px; /* Changed width to a max-width to make it more responsive */
  margin: 40px auto; /* Added more margin to create space around the container */
  padding: 30px; /* Increased padding to create more space inside the container */
  background-color: #fff; /* Changed background color to white */
  border-radius: 10px; /* Added border radius to create a soft corner effect */
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Changed box shadow to a lighter gray */
}

h1, h2, h3 {
  font-weight: 500; /* Changed font weight to 500 to make headings more subtle */
  color: #333; /* Changed text color to a dark gray */
  margin-bottom: 10px; /* Added margin bottom to create space between headings and content */
}

h3 {
  background-color: transparent; /* Removed background color to make it more minimalist */
  padding: 0; /* Removed padding to make it more minimalist */
  border-radius: 0; /* Removed border radius to make it more minimalist */
}

.section {
  margin-bottom: 40px; /* Increased margin bottom to create more space between sections */
  background-color: #fff; /* Changed background color to white */
  padding: 30px; /* Increased padding to create more space inside the section */
  border-radius: 10px; /* Added border radius to create a soft corner effect */
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Changed box shadow to a lighter gray */
}

.service {
  margin-bottom: 20px; /* Decreased margin bottom to make it more compact */
}

.service p {
  margin: 0; /* Removed margin to make it more minimalist */
  border-top: 1px solid black;}

.dropdown {
  width: 100%; /* Removed margin to make it more compact */
  text-align: center; /* Removed margin to makaze it more compact */
}

.dropdown select {
  padding: 12px 20px; /* Decreased padding to make it more compact */
  font-size: 16px; /* Decreased font size to make it more compact */
  border: none; /* Removed border to make it more minimalist */
  border-radius: 5px; /* Decreased border radius to make it more compact */
  background-color: #fff; /* Changed background color to white */
  color: #333; /* Changed text color to a dark gray */
  cursor: pointer; /* Removed appearance to make it more minimalist */
}

.blurred-block {
  background-color: rgba(255, 255, 255, 0.5); /* Changed background color to a lighter gray */
  border-radius: 10px; /* Decreased border radius to make it more compact */
  backdrop-filter: blur(5px); /* Decreased blur effect to make it more subtle */
  padding: 20px; /* Decreased padding to make it more compact */
  margin-bottom: 30px; /* Decreased margin bottom to make it more compact */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Decreased box shadow to make it more subtle */
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
