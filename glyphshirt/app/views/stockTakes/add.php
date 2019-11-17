<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/stockTakes" class="btn btn-light"><i class="fa fa-backward"></i> BACK</a>
    <div class="card card-body bg-light mt-5">
        <?php flash('stocktake_success'); ?>
        <h2> Count Shirt</h2>
        <p>Count shirts with this form</p>
        <form action="<?php echo URLROOT; ?>/stockTakes/add" method="post">
        <div class="container">
<div class="row">
<div class="col">
<table class="table">
    <h2 class="text-center">White shirts</h2>
        <thead class="thead-dark">
            <tr>
            <th scope="col">Shirt Size</th>
            <th scope="col">Predicted Quantity</th>
            <th scope="col">Actual Quantity</th>
            </tr>
        </thead> 
        <tbody>
        <?php foreach($data['shirts'] as $shirt) : ?>
        <?php if ($shirt->color == 'White') :?>
        <tr>
        <td><?php echo $shirt->size?></td>
        <td><?php echo $shirt->quantity?></td>
        <td>
            <input type="text" name="quantity<?php echo $shirt->size. $shirt->color?>" class="form-control form-control-lg <?php echo (!empty($data['quantity'.$shirt->size. $shirt->color.'_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantity'.$shirt->size. $shirt->color]; ?>">
            <span class="invalid-feedback"><?php echo $data['quantity'.$shirt->size. $shirt->color.'_err']; ?></span>
        </td>
        </tr>
        <?php endif;?>
        <?php endforeach;?>
    </tbody>
    </table>
    </div>

    <div class="col">
    <table class="table">
    <h2 class="text-center">Black shirts</h2>
    <thead class="thead-dark">
            <tr>
            <th scope="col">Shirt Size</th>
            <th scope="col">Quantity</th>
            <th scope="col">Actual Quantity</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($data['shirts'] as $shirt) : ?>
        <?php if ($shirt->color == 'Black') :?>
        <tr>
        <td><?php echo $shirt->size?></td>
        <td><?php echo $shirt->quantity?></td>
        <td>
            <input type="text" name="quantity<?php echo $shirt->size. $shirt->color?>" class="form-control form-control-lg <?php echo (!empty($data['quantity'.$shirt->size. $shirt->color.'_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantity'.$shirt->size. $shirt->color]; ?>">
            <span class="invalid-feedback"><?php echo $data['quantity'.$shirt->size. $shirt->color.'_err']; ?></span>
        </td>
        </tr>
        <?php endif;?>
        <?php endforeach;?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>