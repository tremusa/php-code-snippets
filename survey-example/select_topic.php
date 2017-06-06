<?php
    require_once('connect.php');

    $topics = mysqli_query($conn,"select * from topic where topic_id in (select distinct topic_id from question) ");
?>
<h1> Select Survey Topic </h1>
<form method="get" action='take_survey.php'>
    <label>Topic</label>
    <select name='topic_id' id='topic_id' required>
        <option value=''>Select Topic </option>
        <?php
            while($row=mysqli_fetch_assoc($topics)){
                echo "<option value='{$row['topic_id']}'> {$row['topic_name']} </option>";
            }
        ?>
    </select>
    <br/><br/>
    <button type='submit' name='go' value='000'> Take Survey </button>
</form>
<br/><br/>
<a href='user.php'>Go Back </a>