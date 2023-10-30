<?php 
  require '../global/conn.php';
  require '../global/func.php';
  require '../global/header.php'; 
  require '../global/menubar.php';
?>

    <main>
    <section class="sectiona">
      <div class="sidebar">
        <div class="sidebar-scrollbar">

        <div class="topic-cat">
            <div class="box-cat-tem1 header-cat">
              <div class="box-cat-tem2 header-title">
              <h4 class="p-sidebar">Categories</h4>
              </div>
            </div>
            <div class="box-cat">
              <div class="box-cat-fl">
                <div class="box-cat-width">
              <div class="box-cat-pad">
                <ul class="cat-item-list">
        <?php
          $conn = conndb();
          $result = tablequery('SELECT * FROM categories');

          if($result){
            foreach($result as $row){
              echo '<li>
              <div class="box-cat-tem1 cat-item">
                  <a href="#" class="cat-item-text">'.$row['category_name'].'</a>
              </div>
              </il>';
            }
          }else{
            echo "0 results";
          }
        ?>
              </ul>
              </div>
            </div>
          </div>
            </div>
          </div>

          <div class="topic-cat">
            <div class="box-cat-tem1 header-cat">
              <div class="box-cat-tem2 header-title">
              <h4 class="p-sidebar">Car Brands</h4>
              </div>
            </div>
            <div class="box-cat">
              <div class="box-cat-fl">
                <div class="box-cat-width">
              <div class="box-cat-pad">
                <ul class="cat-item-list">
                <?php
          $conn = conndb();
          $result = tablequery('SELECT DISTINCT SUBSTRING(carbrand_id, 1, 2) AS carbrand_text FROM carbrands');

          if($result){
            foreach($result as $row){
              echo '<li>
              <div class="box-cat-tem1 cat-item">
                  <a href="#" class="cat-item-text">'.$row['carbrand_text'].'</a>
              </div>
              </il>';
            }
          }else{
            echo "0 results";
          }
        ?>
              </ul>
              </div>
            </div>
          </div>
            </div>
          </div>

          <div class="topic-cat">
            <div class="box-cat-tem1 header-cat">
              <div class="box-cat-tem2 header-title">
              <h4 class="p-sidebar">Car Brands</h4>
              </div>
            </div>
            <div class="box-cat">
              <div class="box-cat-fl">
                <div class="box-cat-width">
              <div class="box-cat-pad">
                <ul class="cat-item-list">
                <?php
          $conn = conndb();
          $result = tablequery('SELECT * FROM carbrands');

          if($result){
            foreach($result as $row){
              echo '<li>
              <div class="box-cat-tem1 cat-item">
                  <a href="#" class="cat-item-text">'.$row['carbrand_name'].'</a>
              </div>
              </il>';
            }
          }else{
            echo "0 results";
          }
        ?>
              </ul>
              </div>
            </div>
          </div>
            </div>
          </div>

          </div>
      </div>

          </div>
        </div>

        <!--
            PRODUCT SECTION
        -->

        <div class="section product">
        <div class="container">
            <h2 class="h2 section-title" style="text-align: left;
            margin-left: 2.2rem; margin-bottom: 6rem;">Explore The Hot Wheels Realms</h2>

            <ul class="product-list" id="product-list">
                <!-- Product Listing -->
                <?php
                $result = tablequery("SELECT p.*, c.category_name, b.carbrand_name FROM products p
                  LEFT JOIN categories c ON p.category_id = c.category_id
                  LEFT JOIN carbrands b ON p.carbrand_id = b.carbrand_id
                  WHERE (p.Release_Date IS NULL OR p.Release_Date <= CURDATE())
                  ORDER BY p.Release_Date DESC limit 8");

                if ($result) {
                    if ($result->rowCount() > 0) {
                        foreach ($result as $row) {
                            $isNewProduct = false;

                            if (!empty($row['Release_Date'])) {
                                $releaseDate = strtotime($row['Release_Date']);
                                $oneWeekAgo = strtotime('-1 week');
                                if ($releaseDate > $oneWeekAgo) {
                                    $isNewProduct = true;
                                }
                            }

                            echo '<li class="product-item" release-date="' . $row['Release_Date'] . '">
                                <div class="product-card" tabindex="0">
                                    <figure class="card-banner">
                                        <a class="image-contain" href="../views/products_view.php?product_id=' . $row['product_id'] . '">
                                            <img src="../assets/images/' . $row['p_image'] . '" width="312" height="350" loading="lazy"
                                                alt="' . $row['product_name'] . '" class="image-contain">
                                        </a>';

                            if ($isNewProduct) {
                                echo '<div class="card-badge">New</div>';
                            }

                            echo '
                                        <ul class="card-action-list">
                                            <!-- Card actions here -->
                                        </ul>
                                    </figure>
                                    <div class="card-content">
                                        <div class="card-cat">
                                            <a href="#" class="card-cat-link">' . $row['category_name'] . '</a> /
                                            <a href="#" class="card-cat-link">' . $row['carbrand_name'] . '</a>
                                        </div>
                                        <h3 class="h3 card-title">
                                            <a href="#">' . $row['product_name'] . '</a>
                                        </h3>
                                        <data class="card-price" value="180.85">฿' . $row['price'] . '</data>
                                    </div>
                                </div>
                            </li>';
                        }
                    } else {
                        echo "We apologize, but there are currently no products available at this time.";
                    }
                } else {
                    echo "Database error";
                }
                ?>
            </ul>
        </div>
        </div>
    </section>
      
</main>
<?php require '../global/footer.php'; ?>


  <!-- 
    - #GO TO TOP
  -->
  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>



  <!-- 
    - custom js link
  -->
  <script src="../assets/js/script.js"></script>


  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


  <!-- 
    - tailwindcss link
  -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>