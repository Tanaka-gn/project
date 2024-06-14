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
        width: 100px; 
    }

    nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 5px;
        background-color: #ffffff; 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        z-index: 10;
        display: flex;
        justify-content: space-between;
        align-items: center; 
    }

    nav ul {
        display: flex;
        justify-content: flex-end;
        gap: 20px;
        margin: 0; 
        padding: 0; 
    }

    nav ul li {
        list-style: none;
        font-size: 1.2em;
        cursor: pointer;
        transition: color 0.3s;
        color: #333; 
    }

    nav ul li:hover {
        color: #666;
    }

    .nav-btn {
        background: #333; 
        color: #fff;
        font-size: 14px;
        padding: 10px 20px;
        border: none;
        border-radius: 10px; /*  rounded corners */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .nav-btn:hover {
        background-color: #444; 
    }
</style>

<script>
   
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
