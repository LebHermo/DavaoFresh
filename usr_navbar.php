<script>
    // navbar animations
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('nav');
        if (window.pageYOffset > 0) {
            navbar.classList.add('nav-shadow');
        } else {
            navbar.classList.remove('nav-shadow');
        }
    });

    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
            document.querySelector("nav").style.padding = "1% 10%";
            document.querySelector("nav").style.height = "50px";
            document.querySelector("nav").style.transition = "all 0.3s ease-in-out";
        } else {
            document.querySelector("nav").style.padding = "2% 10%";
            document.querySelector("nav").style.height = "60px";
            document.querySelector("nav").style.transition = "all 0.3s ease-in-out";
        }
    }
</script>
<nav>
    <img class="logo" src="assets/LOGO - Davao Fresh.svg"></img>
    <ul style="display: inline-block;">
        <li class="<?php echo ($active_tab == 'home') ? 'active-tab' : ''; ?>"><a href="home.php"> Home </a></li>
        <li class="<?php echo ($active_tab == 'products') ? 'active-tab' : ''; ?>"><a href=" products.php"> Products </a></li>
        <li class="<?php echo ($active_tab == 'about') ? 'active-tab' : ''; ?>"><a href="about.php"> About Us</a></li>

    </ul>
    <?php if (isset($_SESSION['email'])) : ?>
        <select id="home-dropdown" style="height: 24px; border: none; font-size: 1rem; outline: none;">
            <option value="" selected disabled hidden>
                <?php
                $email = $_SESSION['email'];
                $name = getDataBySession('acc_name', $conn, $email);
                echo $name;
                ?></option>
            <option value="basket">My Basket</option>
            <option value="profile">Profile</option>
            <option value="logout">Logout</option>
        </select>
    <?php else : ?>
        <ul>
            <li><a href="login.php">Login</a></li>
        </ul>
    <?php endif; ?>
</nav>

<script>
    // home dropdown
    const selectElement = document.querySelector('#home-dropdown');
    selectElement.addEventListener('change', (event) => {
        const selectedValue = event.target.value;
        if (selectedValue === 'logout') {
            window.location.href = 'logout.php';
        } else if (selectedValue === 'basket') {
            window.location.href = 'basket.php';
        } else if (selectedValue === 'profile') {
            window.location.href = 'profile.php';
        }
    });
</script>