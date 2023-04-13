<?php 
include('functions/userfunctions.php');
include('includes/header.php');

include('authenticate.php');


 ?> 

            <div class="py-3 bg-primary">
            <div class="container">
                    <div class="card">
                    <div class="card-body">
                <h6 class="text-white">
                    <a href="index.php" class="text-white">
                Home / 
                    </a>
                    <a href="checkout.php" class="text-white">
                Checkout
                    </a>
                    </h6>
            </div>
            </div>
            <div class="py-5">
            <div class="container">
                <div class="card">
                    <div class="card-body shadow"></div>
                    <form action="functions/placeorder.php" method="POST">
                    <div class="col-md-7">
                    <h5> Basic Details </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold "> Name</label>
                            <input type="text" name="name" required placeholder="Enter Your Full Name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold "> Email</label>
                            <input type="email" name="email" required placeholder="Enter Your Full Email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold "> Phone</label>
                            <input type="text" name="phone" required placeholder="Enter Your Full Number" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold "> Pin Code</label>
                            <input type="text" name="pincode" required placeholder="Enter Your Full Number" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold "> Address</label>
                            <textarea name="address" required class="form-control" row="5"></textarea>
                        </div>
                    </div>

                    </div>
                    <div class="col-md-5"></div>
                    <h5> Order Details</h5>
                    <hr>             
                    <?php $items = getCarItems();
                    $totalPrice = 0;
                    foreach ($items as $citem) 
                    {
                        ?>
                    <div class="mb-1 border">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="uploads/<? $citem['image'] ?>" alt="Image" class="60px">
                            </div>
                            <div class="col-md-5">
                                <label><? $citem['name'] ?></label>
                            </div>
                            <div class="col-md-3">
                                <label><? $citem['selling_price'] ?></label>
                            </div>
                            <div class="col-md-2">
                                <label>x <? $citem['prod_qty'] ?></label>
                            </div>
                        </div>
                    </div>
                        <?php
                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                    }
                        ?>
                        <hr>
                        <h5>Total Price : <span class="float-end fw-bold"><?= $totalPrice ?></span> </h5>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm And Place order | COD</button>
                        </div>
                        <div id="paypal-button-container" class="mt-3"></div>
                </div>
                </div>
                </form>
                    </div>
                    </div>
            </div>
            </div>


  <?php include('includes/footer.php'); ?>  

  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>



  <script>
      paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder() {
          return fetch("/my-server/create-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            // use the "body" param to optionally pass additional order information
            // like product skus and quantities
            body: JSON.stringify({
              cart: [
                {
                  sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
                  quantity: "YOUR_PRODUCT_QUANTITY",
                },
              ],
            }),
          })
          .then((response) => response.json())
          .then((order) => order.id);
        },
        // Finalize the transaction on the server after payer approval
        onApprove(data) {
          return fetch("/my-server/capture-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              orderID: data.orderID
            })
          })
          .then((response) => response.json())
          .then((orderData) => {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  window.location.href = 'thank_you.html';
          });
        }
      }).render('#paypal-button-container');
    </script>