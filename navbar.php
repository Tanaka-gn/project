<!-- Navigation -->
<nav id="navbar">
    <img class="logo" src="logolight.jpg" alt="logoimage">
    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Services</li>
        <li>Contact</li>
        <li>Projects</li>
        <li>Purchase</li>

        <div class="button-container">
            <button class="nav-btn" onclick="location.href='login.php'">Sign In</button>
            <button class="nav-btn" onclick="location.href='signup.php'">Sign Up</button>

</div>
    </ul>
</nav>

<style>
    /* Navigation */
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

<script>
    // Ensure the DOM has loaded before running the script
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listeners to the navigation items
        const navItems = document.querySelectorAll('nav ul li');
        const navLinks = ['home.php', 'aboutus.php', 'service.php', 'contactus.php', 'projects.php', 'purchase.php'];

        navItems.forEach((item, index) => {
            if (index < navLinks.length) {
                item.addEventListener('click', function () {
                    window.location.href = navLinks[index];
                });
            }
        });
    });
</script>
