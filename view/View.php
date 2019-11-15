<?php

class View
{
  protected $htmlElement;
  protected $items;

  public function __construct()
  {
    $this->items = [
      'Home' => 'home.php',
      'Signin' => 'signin.php',
      'Signup' => 'signup.php',
      'Account' => 'account.php',
      'Logout' => 'logout.php'
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

<?php $this->htmlElement .= ob_get_contents();
    }

    public function menu()
    { ?>
<nav class="navbar navbar-expand-md navbar-light fixed-top py-4" id="main-nav">
  <div class="container">
    <a href="home" class="navbar-brand">
      <!-- <img src="" width="50" height="50" alt="logo" /> -->
      <h3 class="d-inline align-middle">Camagru</h3>
    </a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <?php foreach ($this->items as $key => $val) { ?>
        <li class="nav-item">
          <a href="<?php echo "index.php?page=" . $val ?>" class="nav-link" style="cursor: pointer;"><?php echo $key ?></a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<body>
  <?php $this->htmlElement .= ob_get_contents();
      }

      public function body($content)
      { ?>

</body>
<?php $this->htmlElement .= ob_get_contents();
    }

    public function footer()
    { ?>

</html>
<?php $this->htmlElement .= ob_get_contents();
  }
}