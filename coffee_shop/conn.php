<?php
$con=new mysqli("localhost","root","","userdemo");
if($con->connect_error){
    die("Connection failed: ".$con->connect_error);
}   else {
     //echo "Connected successfully <br>";
}
//create contact table
// $create_table="CREATE TABLE contact (   
// id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
// name VARCHAR (50) NOT NULL, 
// email VARCHAR (50) NOT NULL,
// message VARCHAR (255) NOT NULL,
// created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";
// if($con->query($create_table)===TRUE){
//     echo "Table Contact created successfully";
// } else {
//     echo "Error creating table: ".$con->error;
// }


