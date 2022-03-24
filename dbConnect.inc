<?php
//             username is mine, change to  your username - remove jrhicsa
//             whichMachine  username    password  whichDatabaseToUse
//             ""   between "" insert your Database password found in .my.cnf
$mysqli = mysqli_connect("localhost", "jas6417", "Fartootoo9678!", "jas6417");
if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
        }
?>