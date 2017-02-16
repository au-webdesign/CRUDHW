<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php
  include_once("pageConfigClass.php");
  include_once("dbClass.php");
  $p = new myPage( 'CRUD Manager For Inventory');
  $p->showHeader( );
?>
  <body>
<?php
  $p->showNav('Home');
  $jumboTitle = '';
  $jumbo = 'AU - Inventory CRUD Manager  ';
  print "\n<div class='container theme-showcase' role='main'>";
  $p->showJumbo( $jumboTitle, $jumbo );

  $db = new dbClass( );
  $db->getProductData();
  if ( !isset( $_REQUEST['state'] )) {
      showMainForm( $db->PRODUCTS );
  } else {
     if ( $_REQUEST['state'] == 'insert' ) {
        print "<br /> Inside Insert new records .... ";
     } elseif ( $_REQUEST['state'] == 'edit' ) {
        if ( !isset ( $_REQUEST['pid'] ) ) {
            print "<br /> Edit received but not PID is set";
            $S = $_SERVER['PHP_SELF'];
      print <<<EOF
        <form action="$S" method='get'>
               <button type="submit" class="btn btn-primary">Go Back to the Main Form </button>
        </form>
EOF;

            exit;
        }
        print "<br /> Inside edit new records PID=$PID";
        print "<br /> REQUEST=<pre>"; print_r( $_REQUEST );
        $PID= $_REQUEST['pid'];
     } else {
        print "<br /> Unknown State .... cannot continue";
        print "<br /> REQUEST=<pre>"; print_r( $_REQUEST );
     }
  }
  function showMainForm( $PRODUCTS ) {
      #PRODUCTS= Array (
      #  [Wrench] => Array (
      #      [product] => Wrench
      #      [cost] => 4.99
      #      [count] => 18
      #      [weight] => 5.40
      #  )
      $S = $_SERVER['PHP_SELF'];
      print <<<EOF
      <div class='panel panel-primary'>
      <div class='panel-heading'>
      </div>
      <div class='panel-body'>
      <div class="container">
      <table class="table table-striped">
        <thead>
        <form action="$S" method='get'>
        <tr>
EOF;
          $First = true;
          foreach ( $PRODUCTS as $PR => $PROW ){
             if ( $First ) {
               $First = false;
              print "<tr> ";
               foreach ( $PROW as $HAND => $VAL ){
                   print "<th>$HAND </th>";
                  $HDRS[] = $HAND;
               }
              print "</tr> ";
            }
          }
      print <<<EOF
           </tr>
           </thead>
EOF;
          foreach ( $PRODUCTS as $PR => $PROW ){
             print "<tr> ";
             foreach ( $HDRS as $ct => $VAL ){
                  $V = $PROW["$VAL"];
                  if ( $VAL == 'pid' )  {
                      print "<td>$V  <input type='radio' name='pid' id='pid' value='$V'> </td>";
                  } else {
                     print "<td> $V </td> ";
                  }

             }
             print "</tr> ";
           }
      print <<<EOF
      </table>
EOF;
      print <<<EOF
               <input  type="hidden" name='state' value='edit'>
               <button type="submit" class="btn btn-primary">Edit This Record</button>
        </form>
        <form action="$S" method='post' style='display:inline'>
               <input  type="hidden" name='state' value='insert'>
               <button type="submit" class="btn btn-primary">Insert A New Record</button>
        </form>
EOF;
      print "</div>";
      print "</div>";
      print "</div>";
    }
?>
