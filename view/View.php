<?php

class View
{
  protected $_htmlElement;
  protected $_items;

  public function __construct()
  {
    $this->_items = [
      'Signin' => 'signin',
      'Signup' => 'signup',
      'Account' => 'account',
      'Logout' => 'logout'
    ];
  }

  public function headerPage()
  {
    ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Camagru</title>
</head>

<?php
    }

    public function menu()
    { ?>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top py-4 bg-dark" id="main-nav">
  <div class="container">
    <a href="index.php?page=home" class="navbar-brand">
      <h3 class="d-inline align-middle">Camagru</h3>
    </a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <?php foreach ($this->_items as $key => $val) {
          if ($_SESSION['user'] == '' && $key !== 'Account' && $key !== 'Logout'): ?>
        <li class="nav-item">
          <a href="<?php echo "index.php?page=" . $val ?>" class="nav-link"
            style="cursor: pointer;"><?php echo $key ?></a>
        </li>
        <?php elseif ($_SESSION['user'] != '' && $key != 'Signin' && $key != 'Signup'): ?>
        <li class="nav-item">
          <a href="<?php echo "index.php?page=" . $val ?>" class="nav-link"
            style="cursor: pointer;"><?php echo $key ?></a>
        </li>
        <?php endif; } ?>
      </ul>
    </div>
  </div>
</nav>


  <?php
      }

      public function bodyPage()
      { ?>

<?php
    }

    public function footerPage()
    { ?>

  </body>
</html>
<?php
  }
  
  public function buildPage()
  {
    $this->_htmlElement = $this->headerPage();
    $this->_htmlElement .= $this->menu();
    $this->_htmlElement .= $this->bodyPage();
    $this->_htmlElement .= $this->footerPage();
    return $this->_htmlElement;
  }
}