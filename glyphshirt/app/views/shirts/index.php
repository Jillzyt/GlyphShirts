<?php require APPROOT . '/views/inc/header.php'; ?>

<h1> Shirts Inventory
<a href="<?php echo URLROOT;?>/shirts/add" class="btn btn-primary pull-right">
    <i class="fa fa-pencil">ADD SHIRT</i>
</a>
<a href="<?php echo URLROOT;?>/shirts/issue" class="btn btn-primary pull-right">
    <i class="fa fa-pencil">ISSUE SHIRT</i>
</a>
<a href="<?php echo URLROOT;?>/shirts/return" class="btn btn-primary pull-right">
    <i class="fa fa-pencil">RETURN SHIRT</i>
</a>
</h1>
<div class="container">
<div class="row">
<div class="col">
<table class="table">
<h2 class="text-center">White shirts</h2>
    <thead class="thead-dark">
        <tr>
        <th scope="col">Shirt Size</th>
        <th scope="col">Quantity</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data['shirts'] as $shirt) : ?>
    <?php if ($shirt->color == 'White') :?>
    <tr>
      <td><?php echo $shirt->size?></td>
      <td><?php echo $shirt->quantity?></td>
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
        </tr>
    </thead>
    <tbody>
  <?php foreach($data['shirts'] as $shirt) : ?>
    <?php if ($shirt->color == 'Black') :?>
    <tr>
      <td><?php echo $shirt->size?></td>
      <td><?php echo $shirt->quantity?></td>
    </tr>
    <?php endif;?>
    <?php endforeach;?>
  </tbody>
</table>
</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>