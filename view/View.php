<?php

  class View {
    protected $htmlElement;

    public function headerPage()
    {
      ob_start(); ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Camagru</title>
      </head>

      <?php $this->htmlElement .= ob_get_contents();

    }

    public function menu()
    {
      ob_start(); ?>
      
      <body>
      <?php $this->htmlElement .= ob_get_contents();
    }

    public function body($content)
    {
      ob_start(); ?>

      </body>
      <?php $this->htmlElement .= ob_get_contents();
    }

    public function footer()
    {
      ob_start(); ?>

      </html>
      <?php $this->htmlElement .= ob_get_contents();
    }
  }