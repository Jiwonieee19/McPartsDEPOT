<?php

include "../db_connect/db_connection.php";

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);


// SA DASHBOARD RANI TANAN THE REST NAA SA BABA
$countQuery = "SELECT COUNT(*) AS totalusers FROM users";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalUsers = $countRow["totalusers"];

$approvedQuery = "SELECT COUNT(*) AS totalApproved FROM history WHERE status = 'APPROVED'";
$approvedResult = mysqli_query($conn, $approvedQuery);
$approvedRow = mysqli_fetch_assoc($approvedResult);
$totalApproved = $approvedRow["totalApproved"];



// Count total male kids (1-17)
$maleKidQuery = "SELECT COUNT(*) AS male_kid FROM users WHERE gender = 'Male' AND age BETWEEN 1 AND 17";
$maleKidResult = mysqli_query($conn, $maleKidQuery);
$maleKidRow = mysqli_fetch_assoc($maleKidResult);
$maleKid = $maleKidRow["male_kid"];

// Count total male adults (18-59)
$maleAdultQuery = "SELECT COUNT(*) AS male_adult FROM users WHERE gender = 'Male' AND age BETWEEN 18 AND 59";
$maleAdultResult = mysqli_query($conn, $maleAdultQuery);
$maleAdultRow = mysqli_fetch_assoc($maleAdultResult);
$maleAdult = $maleAdultRow["male_adult"];

// Count total male seniors (60 and above)
$maleSeniorQuery = "SELECT COUNT(*) AS male_senior FROM users WHERE gender = 'Male' AND age >= 60";
$maleSeniorResult = mysqli_query($conn, $maleSeniorQuery);
$maleSeniorRow = mysqli_fetch_assoc($maleSeniorResult);
$maleSenior = $maleSeniorRow["male_senior"];

// Count total female kids (1-17)
$femaleKidQuery = "SELECT COUNT(*) AS female_kid FROM users WHERE gender = 'Female' AND age BETWEEN 1 AND 17";
$femaleKidResult = mysqli_query($conn, $femaleKidQuery);
$femaleKidRow = mysqli_fetch_assoc($femaleKidResult);
$femaleKid = $femaleKidRow["female_kid"];

// Count total female adults (18-59)
$femaleAdultQuery = "SELECT COUNT(*) AS female_adult FROM users WHERE gender = 'Female' AND age BETWEEN 18 AND 59";
$femaleAdultResult = mysqli_query($conn, $femaleAdultQuery);
$femaleAdultRow = mysqli_fetch_assoc($femaleAdultResult);
$femaleAdult = $femaleAdultRow["female_adult"];

// Count total female seniors (60 and above)
$femaleSeniorQuery = "SELECT COUNT(*) AS female_senior FROM users WHERE gender = 'Female' AND age >= 60";
$femaleSeniorResult = mysqli_query($conn, $femaleSeniorQuery);
$femaleSeniorRow = mysqli_fetch_assoc($femaleSeniorResult);
$femaleSenior = $femaleSeniorRow["female_senior"];

