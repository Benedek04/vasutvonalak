<?php
$host = "localhost"; 
$username = "root"; 
$password = "";     
$database = "vasutvonalak";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $kiinduloHely = $_POST["kiinduloHely"];
    $destination = $_POST["destination"];
    $atlagSeb = $_POST["atlagSeb"];
    $distance = $_POST["distance"];

    // SQL to insert data into table
    $sql = "INSERT INTO adatok ( kiinduloVáros, célVáros, Távolság, ÁtlagSebesség)
            VALUES ( '$kiinduloHely', '$destination', '$distance', '$atlagSeb')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>