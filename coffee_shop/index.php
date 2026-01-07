<?php
include 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, message)
            VALUES ('$name', '$email', '$message')";

    mysqli_query($con, $sql);

}
?>

<script>
let cart = [];

function addToCart(name, price) {
    const item = cart.find(p => p.name === name);

    if (item) {
        item.qty++;
    } else {
        cart.push({ name, price, qty: 1 });
    }

    updateCart();
}

function updateCart() {
    const cartItems = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");
    const cartCount = document.getElementById("cart-count");

    cartItems.innerHTML = "";
    let total = 0;
    let count = 0;

    cart.forEach((item, i) => {
        total += item.price * item.qty;
        count += item.qty;

        cartItems.innerHTML += `
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <strong>${item.name}</strong><br>
                    ₹${item.price} × ${item.qty}
                </div>
                <div>
                    <button class="btn btn-sm btn-outline-dark"
                        onclick="changeQty(${i},-1)">−</button>
                    <button class="btn btn-sm btn-outline-dark"
                        onclick="changeQty(${i},1)">+</button>
                    <button class="btn btn-sm btn-outline-danger"
                        onclick="removeItem(${i})">✕</button>
                </div>
            </div>
        `;
    });

    cartTotal.innerText = total;
    cartCount.innerText = count;
}

function changeQty(i, change) {
    cart[i].qty += change;
    if (cart[i].qty <= 0) cart.splice(i, 1);
    updateCart();
}

function removeItem(i) {
    cart.splice(i, 1);
    updateCart();
}

/* TOGGLE */
function showCoffee() {
    document.querySelector('.coffee-items').style.display = "flex";
    document.querySelector('.snack-items').style.display = "none";
}

function showSnacks() {
    document.querySelector('.coffee-items').style.display = "none";
    document.querySelector('.snack-items').style.display = "flex";
}

function placeOrder() {
    alert("Order placed successfully!");
    cart = [];
    updateCart();
}

function contactthx(){
    alert("your response has been recorded. thank you.");
}
</script>
    
   <?php
include_once 'header.php';
   ?>

<!-- ================= SLIDER ================= -->
<div id="coffeeCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
  <ol class="carousel-indicators">
    <li data-target="#coffeeCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#coffeeCarousel" data-slide-to="1"></li>
    <li data-target="#coffeeCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="slider-img">
        <img src="img/bg1.jpg" class="d-block w-100" alt="Slide 1">
        <div class="hero-overlay d-flex align-items-center justify-content-center">
          <div class="container text-center text-white">
            <h1 class="display-4">Welcome to Our Coffee Shop</h1>
            <p class="lead">Experience the best coffee in town.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="slider-img">
        <img src="img/bg.jpg" class="d-block w-100" alt="Slide 2">
        <div class="hero-overlay d-flex align-items-center justify-content-center">
          <div class="container text-center text-white">
            <h1 class="display-4">Welcome to Our Coffee Shop</h1>
            <p class="lead">Experience the best coffee in town.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="slider-img">
        <img src="img/bg2.jpg" class="d-block w-100" alt="Slide 3">
        <div class="hero-overlay d-flex align-items-center justify-content-center">
          <div class="container text-center text-white">
            <h1 class="display-4">Welcome to Our Coffee Shop</h1>
            <p class="lead">Experience the best coffee in town.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#coffeeCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#coffeeCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





<!-- POPULAR COFFEE SECTION -->
<section id="popular-coffee" class="popular-section">
    <div class="container">
        <h2 class="text-center mb-5">Our Popular Coffees</h2>

        <div class="text-center mb-5">
            <div class="toggle-wrap">
                <button class="toggle-btn active" onclick="showCoffee()">Coffee</button>
                <button class="toggle-btn" onclick="showSnacks()">Snacks</button>
            </div>
        </div>

        <!-- COFFEE ITEMS -->
        <div class="row coffee-items">

            <!-- CARD 1 -->
            <div class="col-md-3 mb-4">
                <div class="coffee-product-card">
                    <div class="coffee-img-wrap">
                        <img src="img/cappuccino.jpg">
                    </div>
                    <div class="coffee-content">
                        <span class="coffee-tag">MEDIUM ROAST</span>
                        <h5>Regular Coffee</h5>

                        <div class="rating">★★★★☆ <span>(124)</span></div>

                        <p>Strong & bold coffee shot.</p>

                        <div class="price-row">
                            <span class="price">₹ 250</span>
                        </div>

                       <button class="buy-btn" onclick="addToCart('Regular Coffee', 250)">ADD TO CART</button>
                        <a href="#" class="details-link">More details →</a>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-3 mb-4">
                <div class="coffee-product-card">
                    <div class="coffee-img-wrap">
                        <img src="img/latte.jpg">
                    </div>
                    <div class="coffee-content">
                        <span class="coffee-tag">LIGHT ROAST</span>
                        <h5>Latte</h5>
                        <div class="rating">★★★★★ <span>(98)</span></div>
                        <p>Smooth & creamy coffee.</p>

                        <div class="price-row">
                            <span class="price">₹ 280</span>
                        </div>

                        <button class="buy-btn" onclick="addToCart('Latte', 280)">ADD TO CART</button>
                        <a href="#" class="details-link">More details →</a>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-md-3 mb-4">
                <div class="coffee-product-card">
                    <div class="coffee-img-wrap">
                        <img src="img/bg.jpg">
                    </div>
                    <div class="coffee-content">
                        <span class="coffee-tag">DARK ROAST</span>
                        <h5>Mocha</h5>
                        <div class="rating">★★★★☆ <span>(76)</span></div>
                        <p>Chocolate coffee delight.</p>

                        <div class="price-row">
                            <span class="price">₹ 300</span>
                        </div>

                        <button class="buy-btn" onclick="addToCart('Mocha', 300)">ADD TO CART</button>
                        <a href="#" class="details-link">More details →</a>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="col-md-3 mb-4">
                <div class="coffee-product-card">
                    <div class="coffee-img-wrap">
                        <img src="img/black_coffee.jpg">
                    </div>
                    <div class="coffee-content">
                        <span class="coffee-tag">STRONG</span>
                        <h5>Black Coffee</h5>
                        <div class="rating">★★★☆☆ <span>(52)</span></div>
                        <p>Pure & intense taste.</p>

                        <div class="price-row">
                            <span class="price">₹ 220</span>
                        </div>

                        <button class="buy-btn" onclick="addToCart('Black Coffee', 220)">ADD TO CART</button>
                        <a href="#" class="details-link">More details →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SNACKS -->
       <div class="row snack-items" style="display:none;">

    <!-- SNACK 1 -->
    <div class="col-md-3 mb-4">
        <div class="coffee-product-card">
            <div class="coffee-img-wrap">
                <img src="img/cookies.jpg">
            </div>
            <div class="coffee-content">
                <span class="coffee-tag">SNACK</span>
                <h5>Chocolate Cookie</h5>

                <div class="rating">★★★★★ <span>(61)</span></div>

                <p>Crunchy cookie with rich chocolate.</p>

                <div class="price-row">
                    <span class="price">₹ 120</span>
                </div>

                <button class="buy-btn" onclick="addToCart('Chocolate Cookie', 120)">ADD TO CART</button>
                <a href="#" class="details-link">More details →</a>
            </div>
        </div>
    </div>

    <!-- SNACK 2 -->
    <div class="col-md-3 mb-4">
        <div class="coffee-product-card">
            <div class="coffee-img-wrap">
                <img src="img/croissant.jpg">
            </div>
            <div class="coffee-content">
                <span class="coffee-tag">SNACK</span>
                <h5>Butter Croissant</h5>

                <div class="rating">★★★★☆ <span>(48)</span></div>

                <p>Flaky, buttery & freshly baked.</p>

                <div class="price-row">
                    <span class="price">₹ 150</span>
                </div>

                <button class="buy-btn" onclick="addToCart('Butter Croissant', 150)">ADD TO CART</button>
                <a href="#" class="details-link">More details →</a>
            </div>
        </div>
    </div>

    <!-- SNACK 3 -->
    <div class="col-md-3 mb-4">
        <div class="coffee-product-card">
            <div class="coffee-img-wrap">
                <img src="img/brownies.jpg">
            </div>
            <div class="coffee-content">
                <span class="coffee-tag">SNACK</span>
                <h5>Brownie</h5>

                <div class="rating">★★★★★ <span>(89)</span></div>

                <p>Soft & fudgy chocolate brownie.</p>

                <div class="price-row">
                    <span class="price">₹ 180</span>
                </div>

                <button class="buy-btn" onclick="addToCart('Brownie', 180)">ADD TO CART</button>
                <a href="#" class="details-link">More details →</a>
            </div>
        </div>
    </div>

    <!-- SNACK 4 -->
    <div class="col-md-3 mb-4">
        <div class="coffee-product-card">
            <div class="coffee-img-wrap">
                <img src="img/sandwiches.jpg">
            </div>
            <div class="coffee-content">
                <span class="coffee-tag">SNACK</span>
                <h5>Cheese Sandwich</h5>

                <div class="rating">★★★★☆ <span>(54)</span></div>

                <p>Grilled sandwich with melted cheese.</p>

                <div class="price-row">
                    <span class="price">₹ 160</span>
                </div>

                <button class="buy-btn" onclick="addToCart('Cheese Sandwich', 160)">ADD TO CART</button>
                <a href="#" class="details-link">More details →</a>
            </div>
        </div>
    </div>

</div>


        

    </div>
</section>




<!-- ================= CART MODAL ================= -->
<div class="modal fade" id="cartModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">🛒 Your Cart</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div id="cart-items"></div>

        <hr>
        <h5 class="text-right">
          Total: ₹ <span id="cart-total">0</span>
        </h5>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
        <button class="btn btn-success" onclick="placeOrder()">Place Order</button>
      </div>

    </div>
  </div>
</div>


<!-- ================= ABOUT US ================= -->
 <!-- ================= ABOUT US ================= -->
<section id="about-us" class="about-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- Text -->
            <div class="col-md-6 about-text">
                <h2>About Our Coffee Shop</h2>
                <p>
                    Since 2010, our coffee shop has been serving freshly brewed coffee
                    made from carefully selected premium beans. We believe coffee is
                    not just a drink, but an experience.
                </p>
                <p>
                    Our cozy atmosphere, friendly baristas, and handcrafted beverages
                    make every visit special. Whether you're here to relax or recharge,
                    we’ve got the perfect cup waiting for you.
                </p>
                <button class="btn about-btn"> Read More</button>
            </div>

            <!-- Image -->
            <div class="col-md-6 text-center">
                <div class="about-img">
                    <img src="img/bg.jpg" alt="About Coffee Shop">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= CONTACT ================= -->
 <!-- ================= CONTACT US ================= -->
<section id="contact-us" class="contact-section">
    <div class="container">
        <div class="container">
        <h2 class="text-center mb-5 font-weight-bold" style="color:#7b3f00;">Contact Us</h2>

        <div class="row g-4">

            <!-- Column 1: Contact Form -->
            <div class="col-md-4">
                <div class="contact-card p-4 h-100 shadow-sm rounded bg-white hover-card">
                    <h5 class="mb-3 font-weight-bold text-center" style="color:#7b3f00;">Send Us a Message</h5>
                    <form method="POST" action="" >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Your Message" name="message" required></textarea>
                        </div>
                        <button onclick="contactthx()" type="submit" class="btn btn-block" style="background-color:#7b3f00; color:white;">Send Message</button>
                    </form>
                    
                </div>
            </div>

            <!-- Column 2: Shop Info / Photo -->
            <div class="col-md-4">
                <div class="contact-card p-4 h-100 shadow-sm rounded bg-white hover-card text-center">
                    <div class="logo-circle mx-auto mb-3">
                        <img src="img/logo.jpg" alt="Coffee Shop" class="img-fluid rounded-circle">
                    </div>
                    <h5 class="mb-3 font-weight-bold" style="color:#7b3f00;">Our Coffee Shop</h5>
                    <p><strong>Email:</strong> coffee@gmail.com</p>
                    <p><strong>Location:</strong> 2nd floor, Indu Dreams, 1571, Pune</p>
                    <p><strong>Call Us:</strong> 9561984157</p>
                </div>
            </div>

            <!-- Column 3: Google Map -->
            <div class="col-md-4">
                <div class="contact-card h-100 shadow-sm rounded hover-card overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3790.928456471112!2d74.2318562!3d16.691892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc1032fa6c8f0a3%3A0xabc123456789!2sSM%20Homoeopathic%20Clinic!5e0!3m2!1sen!2sin!4v1600000000000!5m2!1sen!2sin" 
                        width="100%" height="100%" style="border:0; min-height:350px;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
    
</section>

<!-- ================= FOOTER ================= -->
<!-- ================= FOOTER ================= -->
<?php
include_once 'footer.php';  
?>

