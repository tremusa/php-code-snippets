<?php
    require_once('connect.php');

    $survey_id = $_GET['sid'];
    $ans = mysqli_fetch_assoc(mysqli_query($conn,"select round(avg(response),2) as average,max(response) as maximum,min(response) as minimum from response where survey_id=$survey_id"));
?>

<h1> Survey Statistics </h1>
<table width="20%" border='1' style='border-collapse:collapse;'>
    <tr>
        <th> Description </th>
        <th> Value </th>
    </tr>

    <tr>
        <td> Survey ID</td>
        <td> <?=$survey_id?></td>
    </th>

    <tr>
        <td> Survey Average Score</td>
        <td> <?=$ans['average']?> </td>
    </th>

    <tr>
        <td>Survey Max Score</td>
        <td> <?=$ans['maximum']?> </td>
    </th>

    <tr>
        <td>Survey Min Score</td>
        <td> <?=$ans['minimum']?> </td>
    </th>
</table>

<br/><br/>
<a href='user.php'>Go Back </a>