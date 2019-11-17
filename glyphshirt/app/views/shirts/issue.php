<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> BACK</a>
    <div class="card card-body bg-light mt-5">
        <h2> Issue Shirt</h2>
        <p>Issue shirts with this form</p>
        <form action="<?php echo URLROOT; ?>/shirts/issue" method="post">
            <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
                    <label for="quantity">Member / Volunteer: <sup>*</sup></label>
                    <input type="text" name="mv" class="form-control form-control-lg <?php echo (!empty($data['mv_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mv']; ?>">
                    <span class="invalid-feedback"><?php echo $data['mv_err']; ?></span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="color">Sold / Distributed</label>
                </div>
                <select class="custom-select <?php echo (!empty($data['sd_err'])) ? 'is-invalid' : ''; ?>" name="sd" id="sd">
                    <option selected>Choose...</option>
                    <option value="Sold">Sold</option>
                    <option value="Distributed">Distributed</option>
                </select>
                <span class="invalid-feedback"><?php echo $data['sd_err']; ?></span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label for="color">Date Distributed:</label>
                </div>
                <input id="datepicker" width="100%" name="dateDistributed" />
                <script>
                    $('#datepicker').datepicker({
                        uiLibrary: 'bootstrap'
                    });
                </script>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label for="color">Date Paid:</label>
                </div>
                <input id="datepicker2" width="100%" name="datePaid" />
                <script>
                    $('#datepicker2').datepicker({
                        uiLibrary: 'bootstrap'
                    });
                </script>
            </div>
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
            <div class="form-group">
                <label for="quantity">Remarks: <sup>*</sup></label>
                <input type="text" name="remarks" class="form-control form-control-lg <?php echo (!empty($data['remarks_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['remarks_err']; ?>">
                <span class="invalid-feedback"><?php echo $data['remarks_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>