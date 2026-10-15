<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="styles.css">
  <title>NeoCom</title>
</head>
<body>
  <header>
    <h1>NeoCom</h1>
    <form action="search.php" method="get" class="search-container">
    <input type="text" id="searchInput" name="query" placeholder="Search...">
    <button class="search-icon" type="submit">
    <img src="https://cdn-icons-png.flaticon.com/512/622/622669.png" alt="Search">
    </button>
    </form>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="phones.php">Phones</a></li>
        <li><a href="tablets.php">Tablets</a></li>
        <li><a href="laptops.php">Laptops</a></li>
        <li><a href="accessories.php">Accessories</a></li>
        <li><a href="cart.php">Cart</a></li>
        <?php if(!isset($_SESSION['client'])){echo"<li><a href='login.php'>Login</a></li>";}
         else echo"<li><a href='profile.php'>My Account</a></li>";?>
      </ul>
    </nav>
  </header>
  <main>
    <section id="about" class="active">
      <div style="text-align: center; padding: 2rem 0; border-bottom: 2px solid #0073e6; margin-bottom: 2rem;">
        <h1 style="color: #0073e6; font-size: 2.5rem; margin-bottom: 1rem;">About NeoCom</h1>
        <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto; line-height: 1.6;">
          Pioneering the future of technology retail with cutting-edge devices, exceptional service, and innovative solutions that connect you to tomorrow.
        </p>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin: 2rem 0;">
        <div style="background: #fafafa; padding: 2rem; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
          <h2 style="color: #0073e6; margin-top: 0; margin-bottom: 1rem; font-size: 1.5rem;">Our Story</h2>
          <p style="line-height: 1.6; margin-bottom: 1rem;">
            Founded in 2025, NeoCom emerged from a simple vision: to make premium technology accessible to everyone. What started as a small startup has grown into a leading technology retailer, serving thousands of customers worldwide with the latest smartphones, tablets, laptops, and accessories.
          </p>
          <p style="line-height: 1.6;">
            We believe technology should enhance lives, not complicate them. That's why we carefully curate every product in our catalog, ensuring our customers receive only the highest quality devices backed by exceptional support.
          </p>
        </div>

        <div style="background: #fafafa; padding: 2rem; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
          <h2 style="color: #0073e6; margin-top: 0; margin-bottom: 1rem; font-size: 1.5rem;">Our Mission</h2>
          <p style="line-height: 1.6; margin-bottom: 1rem;">
            To democratize access to cutting-edge technology while providing an unparalleled shopping experience that puts our customers first. We're not just selling devices - we're enabling connections, productivity, and digital transformation.
          </p>
          <div style="background: white; padding: 1rem; border-radius: 6px; border-left: 4px solid #0073e6;">
            <p style="margin: 0.5rem 0; font-weight: 600;"><strong>Innovation First:</strong> We showcase the latest technological breakthroughs</p>
            <p style="margin: 0.5rem 0; font-weight: 600;"><strong>Customer Excellence:</strong> Your satisfaction drives everything we do</p>
            <p style="margin: 0.5rem 0; font-weight: 600;"><strong>Quality Assurance:</strong> Every product meets our rigorous standards</p>
            <p style="margin: 0.5rem 0; font-weight: 600;"><strong>Accessibility:</strong> Premium technology at competitive prices</p>
          </div>
        </div>

        <div style="background: #fafafa; padding: 2rem; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
          <h2 style="color: #0073e6; margin-top: 0; margin-bottom: 1rem; font-size: 1.5rem;">Why Choose NeoCom?</h2>
          <p style="line-height: 1.6; margin-bottom: 1rem;">
            In a crowded marketplace, NeoCom stands apart through our commitment to excellence and innovation. We don't just follow trends - we anticipate them, bringing you tomorrow's technology today.
          </p>
          <p style="line-height: 1.6;">
            Our expert team stays ahead of industry developments, ensuring our product selection represents the best in class across all categories. From flagship smartphones to professional-grade laptops, we've got the perfect device for every need and budget.
          </p>
        </div>
      </div>

      <div style="background: #0073e6; color: white; padding: 2rem; border-radius: 8px; margin: 2rem 0; text-align: center;">
        <h2 style="margin-top: 0; margin-bottom: 2rem; font-size: 2rem;">NeoCom by the Numbers</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 2rem;">
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">50K+</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Happy Customers</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">2,500+</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Products Available</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">1</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Years in Business</div>
          </div>
          <div>
            <div style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0.5rem;">99.8%</div>
            <div style="font-size: 1.1rem; opacity: 0.9;">Customer Satisfaction</div>
          </div>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin: 2rem 0;">
        <div style="background: #fafafa; padding: 2rem; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
          <h2 style="color: #0073e6; margin-top: 0; margin-bottom: 1rem; font-size: 1.5rem;">Our Commitment</h2>
          <p style="line-height: 1.6; margin-bottom: 1rem;">
            Every purchase from NeoCom comes with our promise of quality, reliability, and support. We stand behind every product we sell with comprehensive warranties and dedicated customer service.
          </p>
          <ul style="list-style: none; padding: 0;">
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee; position: relative; padding-left: 2rem;">
              <span style="position: absolute; left: 0; color: #0073e6; font-weight: bold;">✓</span>
              Free shipping on orders over $1000
            </li>
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee; position: relative; padding-left: 2rem;">
              <span style="position: absolute; left: 0; color: #0073e6; font-weight: bold;">✓</span>
              30-day money-back guarantee
            </li>
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #eee; position: relative; padding-left: 2rem;">
              <span style="position: absolute; left: 0; color: #0073e6; font-weight: bold;">✓</span>
              24/7 customer support
            </li>
            <li style="padding: 0.5rem 0; position: relative; padding-left: 2rem;">
              <span style="position: absolute; left: 0; color: #0073e6; font-weight: bold;">✓</span>
              Extended warranty options
            </li>
          </ul>
        </div>

        <div style="background: #fafafa; padding: 2rem; border-radius: 8px; border: 1px solid #ddd; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
          <h2 style="color: #0073e6; margin-top: 0; margin-bottom: 1rem; font-size: 1.5rem;">Looking Forward</h2>
          <p style="line-height: 1.6; margin-bottom: 1rem;">
            As technology continues to evolve at breakneck speed, NeoCom remains committed to being your trusted partner in the digital age. We're constantly expanding our product lineup and improving our services to meet your changing needs.
          </p>
          <p style="line-height: 1.6;">
            From emerging technologies like 5G smartphones and AI-powered devices to sustainable tech solutions, we're here to help you navigate the future of technology with confidence.
          </p>
        </div>
      </div>

      <div style="background: linear-gradient(135deg, #0073e6, #005bb5); color: white; padding: 3rem 2rem; border-radius: 8px; text-align: center; margin: 2rem 0;">
        <h2 style="margin-top: 0; margin-bottom: 1rem; font-size: 2rem;">Ready to Experience the NeoCom Difference?</h2>
        <p style="font-size: 1.1rem; margin-bottom: 2rem; opacity: 0.9;">
          Join thousands of satisfied customers who trust NeoCom for their technology needs.
        </p>
        <a href="products.php" style="display: inline-block; background: white; color: #0073e6; padding: 1rem 2rem; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 1.1rem; transition: transform 0.2s ease;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
          Shop Now
        </a>
      </div>

      <div style="text-align: center; padding: 2rem 0; border-top: 1px solid #eee; margin-top: 2rem;">
        <h3 style="color: #0073e6; margin-bottom: 1rem;">Get in Touch</h3>
        <p style="line-height: 1.6; color: #666;">
          Have questions about our products or services? Our friendly customer support team is here to help.
        </p>
        <div style="display: flex; justify-content: center; gap: 2rem; margin-top: 1rem; flex-wrap: wrap;">
          <div style="text-align: center;">
            <strong style="color: #0073e6;">Email:</strong><br>
            <span style="color: #666;">support@neocom.com</span>
          </div>
          <div style="text-align: center;">
            <strong style="color: #0073e6;">Phone:</strong><br>
            <span style="color: #666;">1-800-NEOCOM-1</span>
          </div>
          <div style="text-align: center;">
            <strong style="color: #0073e6;">Hours:</strong><br>
            <span style="color: #666;">24/7 Support</span>
          </div>
        </div>
      </div>
    </section>
   <footer style="text-align: center; position: relative; background-color: transparent; color: #888;">
&copy; 2025 NeoCom, All rights reserved
</footer>
</main>
  </body>
  </html>