<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container">
    <a class="navbar-brand" href="#">
    <?php echo SITENAME; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="container">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>">
          HOME
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">
          ABOUT
          </a>
        </li>
      </ul>
      <ul class="navbar-nav m1-auto">
        <?php if(isset($_SESSION['user_id'])) :?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/stockTakes/index">
            Stock Takes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/shirts/index">
            Shirts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/transactions/index">
            Transactions
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">
            LOGOUT
            </a>
          </li>
        <?php else: ?> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">
            REGISTER
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">
            LOGIN
            </a>
        <?php endif; ?>
        </li>
      </ul>
      </div>
    </div>
  </div>
</nav>