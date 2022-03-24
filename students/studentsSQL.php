<?php
	$path = '../../';
	$page = 'Data from Database Tables';
	include 'assets/inc/headerStudents.php';
	require $path.'dbConnect.inc';
?>
<h3>Sample PHP that uses a Database</h3>



<?php
//-----------------------------------------------------------
// Get the user's Information

$sql = "SELECT concat(LastName,', ',FirstName) FROM student where ID ='1'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_row($res);
$student1 = $row[0];
echo "The first student is ----> ".$student1."<br>";
$sql = "SELECT concat(LastName,', ',FirstName) FROM student where ID ='2'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_row($res);
$student2 = $row[0];
echo "The second student is ---> $student2" ."<br>";
$sql = "SELECT concat(LastName,', ',FirstName) FROM student where ID ='3'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_row($res);
$student3 = $row[0];
echo "The third student is ----> $student3" ."<br>";
$sql = "SELECT concat(LastName,', ',FirstName) FROM student where ID ='4'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_row($res);
$student4 = $row[0];
echo "The forth student is ----> $student4 <br>";
?>

<div>
<h2>Eat more Pizza!</h2>
<p><img src="assets/img/hotpizza.png" alt="Pizza" title="Pizza" /></p>
</div>

<?php


//setup for Pizza   Exercise06.php    program
$sql = "SELECT * FROM pizzatopping";

// step 3 - execute the query - goal to count the rows in pizzatopping
if($results = $mysqli->query($sql) )
	      {
		echo("SELECT returned ".$results->num_rows." rows<br/><br/>");
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

 var_dump($toppings);   //optional  - excellent to debug arrays - displays what is in the array
?>

<?php
	include 'assets/inc/footerStudents.php';
	mysqli_close($mysqli);
?>