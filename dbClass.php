<?php
class dbClass {
  function __construct() {
      $server = '127.0.0.1';
      $user = 'root';
      $pass = '';
      $mydb = 'cust_orders';
      $this->DBH = mysqli_connect($server, $user, $pass, $mydb )
          or mydie ("Cannot connect to $server using $user Errst=" .  mysql_error());
      $this->TABLE = 'product_inventory';
      $this->COLS[] = 'pid';
      $this->COLS[] = 'product';
      $this->COLS[] = 'cost';
      $this->COLS[] = 'count';
      $this->COLS[] = 'weight';
   }
 function getProductData( ) {
   $WHAT = implode( ',', $this->COLS );
   $WHERE = '';
   $query = "SELECT $WHAT from $this->TABLE $WHERE";
   print "The Query is <i>$query</i><br>";
   $results = mysqli_query( $this->DBH, $query )
        or die ("Database query failed SQLcmd=$query Error_str=" .  mysql_error());
    while ($R = mysqli_fetch_array($results, MYSQL_ASSOC)) {
        $BY = $R['product'];
        $this->PRODUCTS["$BY"] = $R;
      }
    #print "<br> PRODUCTS=<pre>"; print_r( $this->PRODUCTS );
 }

}
?>
