<?php 

include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');

 ?> 
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4>Trending Products </h4>
            <hr>
              <div class="owl-carousel"> 
          <?php
                $trendingProducts = getAllTrending();
                if(mysqli_num_rows($trendingProducts) > 0)
                {
                  foreach ($trendingProducts as $item) {
                          ?>
                          <div class="item">
                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                              <div class="card shadow">
                                <div class="card-body">
                                  <img src="uploads/<?= $item['image']; ?>" alt="Products Image" class="w-100">
                                  <h6 class="text-center"><?= $item['name']; ?></h6>
                              </div>
                            </div>
                            </a>
                          </div>
                          <?php
                  }
                }


          ?>
          </div>
          </div>
        </div>
      </div>
    </div>


    <div class="py-5 bg-f2f2f2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4>About Us </h4>
            <div class="underline"> </div>
            <p>
              Welcome to PHP Stores
              <br>
              Have nice shop
            </p>
              
          </div>
        </div>
      </div>
    </div>


    <div class="py-5 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h4 class="text-white">E-Shop </h4>
            <div class="underline mb-2"> </div>
           <a href="index.php" class="text-white"> <i class="fa fa-angle-right"></i> Home</a><br>
           <a href="#" class="text-white"> <i class="fa fa-angle-right"></i> About Us</a><br>
           <a href="cart.php" class="text-white"> <i class="fa fa-angle-right"></i> My Cart</a><br>
           <a href="categories.php" class="text-white"> <i class="fa fa-angle-right"></i> Our Collections</a>
          </div>
          <div class="col-md-3">
            <h4 class="text-white"> Address </h4>
            <p class="text-white">Saudia</p>
            <a class="text-white" href="tel:+966541263743"> <i class="fa fa-phone"></i> (+966)541263743 </a><br>
            <a href="mailto:ahmed.y.s@outlook.com" class="text-white"> <i class="fa fa-envelope"></i> Ahmed.y.s@outlook.com </a>
          </div>
          <div class="col-md-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d475324.73932617344!2d38.930956130977606!3d21.44988976368877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2sJeddah!5e0!3m2!1sen!2ssa!4v1681346769831!5m2!1sen!2ssa" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>          </div>
        </div>
      </div>
    </div>

    <div class="py-2 bg-danger">
      <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ Eng.Ahmed <?= date('Y') ?></p>
      </div>
    </div>







  <?php include('includes/footer.php'); ?>  

      <script>
        $(document).ready(function() {

        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
          
        });

      </script>
