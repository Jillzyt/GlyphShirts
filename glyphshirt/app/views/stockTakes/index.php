<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?php echo URLROOT; ?>/stockTakes/export">Export</a>
<h1> Stock Takes
<a href="<?php echo URLROOT;?>/stockTakes/add" class="btn btn-primary pull-right">
    <i class="fa fa-pencil">ADD STOCKTAKES</i>
</a>
</h1>
<div class="container">
    <!-- <div class="row">
        <form action="<?php echo URLROOT; ?>/stockTakes/search" method="post" id="form">
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
     -->
    <div class="row">
    <div class="col">
    <div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Date Accounted</th>
            <th scope="col">Predicted White</th>
            <th scope="col">Predicted Black</th>
            <th scope="col">Actual White</th>
            <th scope="col">Actual Black</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['stockTakes'] as $stockTake) : ?>
            <tr>
            <td><?php echo $stockTake->id?></td>
            <td><?php echo $stockTake->date_accounted?></td>
            <td><?php echo $stockTake->predicted_white?></td>
            <td><?php echo $stockTake->predicted_black?></td>
            <td><?php echo $stockTake->actual_white?></td>
            <td><?php echo $stockTake->actual_black?></td>
            </tr>
            <?php endforeach;?>
        
    </tbody>
    </table>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>