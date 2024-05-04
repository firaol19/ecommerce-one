<?php
$servername = "localhost";
$username = "root";
$password = "firaol@1995";
$db_name = "addtocart";
$conn = new mysqli($servername,$username,$password,$db_name);
$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="styles.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.2.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="header__top">
            <div class="header__container container">
                <div class="header__content">
                    <span>(+251) -904846321</span>
                    <span>Our Location</span>
                </div>

                <p class="header__alert-news">
                    Super value deals - save more with coupons
                </p>

                <a href="login-register.html" class="header__top-action">
                    Log In / Sign Up
                </a>
            </div>
        </div>

        <nav class="nav container">
            <a href="index.html" class="nav__logo">
                <img src="images/logo-img.png" alt="">
            </a>

            <div class="nav__menu" id="nav-menu">
                <div class="nav-list" id="nav-list1">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.html" class="nav__link active-link">Home</a>
                        </li>
    
                        <li class="nav__item">
                            <a href="shop.html" class="nav__link">Shop</a>
                        </li>
    
                        <li class="nav__item">
                            <a href="accounts.html" class="nav__link">My Account</a>
                        </li>
    
                        <li class="nav__item">
                            <a href="compare.html" class="nav__link">Compare</a>
                        </li>
    
                        <li class="nav__item">
                            <a href="login-register.html" class="nav__link">Login</a>
                        </li>
                    </ul>
    
                    <div class="nav__close" id="nav-close" onclick="coverMenu()">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    
                </div>

                <div class="header__search">
                    <input type="text" placeholder="search for items" class="form__input">
    
                    <button class="search__btn">
                        <img src="images/search.png" alt="">
                    </button>
                </div>
                
            </div>
            

            <div class="header__user-action">
                <a href="wishlist.html" class="header__action-btn">
                    <i class="fi fi-rs-heart"></i>
                    <span class="count">3</span>
                </a>

                <a href="cart.html" class="header__action-btn">
                    <i class="fi fi-rs-shopping-cart"></i>
                    <span class="count">3</span>
                </a>
            </div>
            <div class="nav__toggle" id="nav-toggle" onclick="showMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </header>
    <main>
        <h1> <?php echo mysqli_num_rows($all_cart);?> Items</h1>
        <?php
        while($row_cart = mysqli_fetch_assoc($all_cart)){
            $sql = "SELECT * FROM product WHERE product_id =" .$row_cart["product_id"];
            $all_product = $conn->query($sql);
            while($row = mysqli_fetch_assoc($all_product)){
        ?>
        <section class="product-section">
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["product_image"]?>" alt="">
                </div>
                <div class="contents">
                    <p class="product-name"><?php echo $row["product_name"]?></p>
                    <div class="prroduct__rating">
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                        <i class="fi fi-rs-star"></i>
                    </div>
                    <div>
                        <span class="new__price"><?php echo $row["product_new_price"]?></span>
                    <span class="old__price"><?php echo $row["product_old_price"]?></span>
                    </div>
                    <button class="remove-btn" data-id = "<?php echo $row["product_id"]?>">Remove from cart</button>
                </div>
            </div>
        </section>
        <?php
        }
    }
        ?>
    </main>

    <script>
        var Remove = document.getElementsByClassName("remove-btn");
        for(var i = 0; i<Remove.length; i++){
            Remove[i].addEventListener("click", function(event){
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onload =function(){
                    target.innerHTML = this.responseText;
                    target.style.opacity = .3;
                    
                }
                xml.open("GET","connection.php?cart_id="+cart_id,true);
                xml.send();
            })
        }
    </script>
</body>
</html>