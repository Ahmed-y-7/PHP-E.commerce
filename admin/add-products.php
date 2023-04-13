<?php
include('includes/header.php');
include('../middleware/adminMiddlew.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 > Add Product </h4>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0">Select Category</label>
                                <select name="category_id" class="form-select mb-3">
                                    <option selected>Select Category</option>
                                    <?php 
                                    $categories = getAll("categories");
                                    if(mysqli_num_rows($categories) > 0)
                                    {
                                        foreach ($categories as $item) {
                                            ?>
                                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?> </option>
                                                <?php
                                            }
                                    }
                                    else {
                                        echo "Not Category Available";
                                    }
                                    
                                    ?>
                                </select>
                                 </div>
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" required name="name" placeholder="Enter Category Name" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" required name="slug" placeholder="Enter Slug" class="form-control mb-3">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" required name="small_description" placeholder="Enter Your Small description" class="form-control mb-3"> </textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" required name="description" placeholder="Enter Your description" class="form-control mb-3"> </textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="text" required name="original_price" placeholder="Enter Original Price" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" required name="selling_price" placeholder="Selling Price" class="form-control mb-3">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" required name="image"class="form-control mb-3">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" required name="qty" placeholder="Enter Quantity" class="form-control mb-3">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Status</label> <br>
                                    <input type="checkbox"  name="status">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label> <br>
                                    <input type="checkbox"  name="trending">
                                </div>         
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" required name="meta_title" placeholder="Enter Meta Title" class="form-control mb-3">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0"> Meta Keywords</label>
                                <textarea rows="3" required name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-3"> </textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" required name="meta_description" placeholder="Enter Meta Description" class="form-control mb-3"> </textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>              
                        </div>
                    </div>
</div>
</form>
    </div>
        </div>
            </div>
                </div>
    
    

<?php include('includes/footer.php'); ?>