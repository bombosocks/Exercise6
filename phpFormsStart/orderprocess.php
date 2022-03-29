<?php
        $path = './';
        $page = 'Order Reciept';
        include $path.'assets/inc/header.php';

  	    $DBpath = '../../';
        require $DBpath.'dbConnect.inc';


?>
<h2>Your Pizza Order</h2>



<?php
//-----------------------------------------------------------
// Get the user's Information
$custName = $_POST['customerName'] ;
$custID = $_POST['customerID'] ;
$pizzaSize = $_POST['pizzaSize'];
$topping = $_POST['topping'];
$sql = "SELECT price FROM pizzacost where size='P'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_row($res);
$personal = $row[0];




// var_dump($_POST);
// validate the customer ID for numerics
     if (empty($custID))
     {
          if (empty($custName)) {
            //sends them back to the previous page...
		    header("Location: orderform.php");
            }
          else {
           //sends them back to the previous page but with name
		   header("Location: orderform.php?name=$custName");
		   }
     }// end of outer if
     


 				switch ($pizzaSize)
				{
				case 'P':
  					$pizzaCost = $personal;
  					$pizzaType = "Personal";
  					break;
				case 'S':
  					$pizzaCost = $small;
  					$pizzaType = "Small";
  					break;
				case 'M':
  					$pizzaCost = $medium;
  					$pizzaType = "Medium";
  					break;
				case 'L':
  					$pizzaCost = $large;
  					$pizzaType = "Large";
  					break;
				default:  // if no choice, customer gets medium.
  					$pizzaCost = $medium;
  					$pizzaType = "Medium";
				}


/* ****************************************************************************
         switch ($topping)
		 {
		 			case '0':
		   				  $toppingCost = 0;
  					      break;
  					case '1':
  					      $toppingCost = 2.00;
  					      break;
  					case '2':
  					      $toppingCost = 3.00;
  					      break;
  					case '3':
  					      $toppingCost = 3.75;
  					      break;
  					default:
  					      $toppingCost = 0;
  					}


******************************************************************* */


//step 1 - getting the pizzatopping from a database all at once

//step 2 create a select statement to get ALL that data in pizzatopping
	$sql = "SELECT * from pizzatopping";

//step 3 - execute the query - goal to count the rows in pizzatopping
	if($results = $mysqli->query($sql) )
	      {
		echo("select returned ".$results->num_rows." rows<br/><br/>");
	      }                         // (reservered constant  "num_rows")
	else
	      {
		echo 'issue with query';
                die;  // your program will stop
	      }

if($results){
//loop through results
     while($rowHolder = mysqli_fetch_array($results,MYSQLI_ASSOC)){
	            $toppings[]=$rowHolder;
          }//end of while
 }//end of if

// var_dump($toppings);   //optional

$toppingCost   = $toppings[$topping]['cost'];





// Calculate Tax

	$taxAmount = 
	$totalCost = 

// Print the receipt
$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);


			?>
				<div id='receipt'>
				<br/> Your Delicious Pizza Order!!
				<br/>
				<br/>Pizza Price:
			<?php
				
            echo numfmt_format_currency($fmt, $pizzaCost, "USD");
            // echo  money_format('%(#6n',$pizzaCost) ;
echo "<br>Topping Price: " . numfmt_format_currency($fmt, $toppingCost, "USD");
echo "<br>Tax Amount: "    . numfmt_format_currency($fmt,$taxAmount, "USD");
echo "<br>Total Cost of your order is: " . numfmt_format_currency($fmt,$totalCost, "USD");
				echo "<br><br>Thank you for your order";
				echo ($custName == '')? '.': ", $custName.";
				echo "</div>";
			}
		
?>
</div>

<?php
	include 'assets/inc/footer.php';
	mysqli_close($mysqli);
?>