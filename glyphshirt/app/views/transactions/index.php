<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT; ?>/transactions/export">Export</a>
<h1> Transactions
</h1>
<?php flash('search_failure'); ?>
<div class="container">
    <div class="row">
        <form action="<?php echo URLROOT; ?>/transactions/index" method="post" id="form">
        <div class="col">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="search">Filter By:</label>
            </div>
            <select class="custom-select <?php echo (!empty($data['search_err'])) ? 'is-invalid' : ''; ?>" name="search" id="search">
                <option selected>Choose...</option>
                <option value="name">Name</option>
                <option value="member_volunteer">Member/Volunteer</option>
                <option value="color">Color</option>
                <option value="date_distributed">Date Distributed</option>
                <option value="date_paid">Date Paid</option>
                <option value="date_accounted">Date Accounted</option>

            </select>
            <span class="invalid-feedback"><?php echo $data['search_err']; ?></span>
        </div>
        </div>
        <div class="col">
        <div class="form-group">
            <input id="datepicker" id="searchValue" type="text" name="searchValue" class="form-control form-control-lg <?php echo (!empty($data['searchValue_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['searchValue']; ?>">
            <span class="invalid-feedback"><?php echo $data['searchValue_err']; ?></span>
            <script>
                    $('#datepicker').datepicker({
                        uiLibrary: 'bootstrap'
                    });
            </script>
        </div>
        </div>
        <div class="col">
            <input type="submit" class="btn btn-success" value="Search">
        </div>
        </form>
    </div>
    
    <div class="row">
    <div class="col">
    <div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Member/Volunteer</th>
            <th scope="col">Color</th>
            <th scope="col">Size</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sold/Distributed/Return</th>
            <th scope="col">Date Distributed</th>
            <th scope="col">Date Paid</th>
            <th scope="col">Date Accounted</th>
            <th scope="col">Remarks</th>
            <th scope="col">Added By</th>
            <th scope="col">Updated By</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['transactions'] as $transaction) : ?>
            <tr>
            <td><?php echo $transaction->id?></td>
            <td><?php echo $transaction->name?></td>
            <td><?php echo $transaction->member_volunteer?></td>
            <td><?php echo $transaction->color?></td>
            <td><?php echo $transaction->size?></td>
            <td><?php echo $transaction->quantity?></td>
            <td><?php echo $transaction->sold_distributed?></td>
            <td><?php echo $transaction->date_distributed?></td>
            <td><?php echo $transaction->date_paid?></td>
            <td><?php echo $transaction->date_accounted?></td>
            <td><?php echo $transaction->remarks?></td>
            <td><?php echo $transaction->added_by?></td>
            <td><?php echo $transaction->updated_by?></td>
            </tr>
            <?php endforeach;?>
        
    </tbody>
    </table>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>