<?php
class myPage {
  function __Construct( $title ){
      $this->title = $title;
      $this->LINKS['Home'] = 'home.php';
      $this->LINKS['HW1'] = 'hw1.php';
      $this->LINKS['About'] = 'about.php';
  }
  function showHeader(  ) {
    print <<<EOF
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>
EOF;
        echo $this->title;
    print <<<EOF
      </title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="theme.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
      </head>
EOF;
}
  function showNav( $currPage ){
    print <<<EOF
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
EOF;
        foreach ( $this->LINKS as $L => $DEST ) {
            $C = '';
            if ( $L == $currPage ) {
                $C = "class='active'";
            }
            print "<li $C ><a href='$DEST'>$L</a></li>";
        }
    print <<<EOF
          </ul>
        </div>
        </nav>
EOF;
  }
  function showJumbo( $jumboTitle, $jumboText ) {
    print "\n<div class='jumbotron'>";
    print "\n<h1>$jumboTitle</h1> ";
    print "\n <p> $jumboText </p>";
    print "\n</div>";
  }
}
?>
