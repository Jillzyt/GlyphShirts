<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> BACK</a>
    <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2> Add Shirt</h2>
        <p>Add shirts with this form</p>
        <form action="<?php echo URLROOT; ?>/shirts/add" method="post">
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="color">Shirt Color</label>
                </div>
                <select class="custom-select <?php echo (!empty($data['color_err'])) ? 'is-invalid' : ''; ?>" name="color" id="color">
                    <option selected>Choose...</option>
                    <option value="White">White</option>
                    <option value="Black">Black</option>
                </select>
                <span class="invalid-feedback"><?php echo $data['color_err']; ?></span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="size">Shirt Size</label>
                </div>
                <select class="custom-select <?php echo (!empty($data['size_err'])) ? 'is-invalid' : ''; ?>" name="size" id="size">
                    <option selected>Choose...</option>
                    <option value="28">28</option>
                    <option value="30">30</option>
                    <option value="4XS">4XS</option>
                    <option value="3XS">3XS</option>
                    <option value="2XS">2XS</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
                <span class="invalid-feedback"><?php echo $data['size_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity: <sup>*</sup></label>
                <input type="text" name="quantity" class="form-control form-control-lg <?php echo (!empty($data['quantity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantity']; ?>">
                <span class="invalid-feedback"><?php echo $data['quantity_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>