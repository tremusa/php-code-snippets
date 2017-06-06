<?php
require_once('connect.php');

if(isset($_POST['add'])){
    $topic = mysqli_fetch_assoc(mysqli_query($conn,"select * from topic where topic_id={$_POST['topic_id']}"));
    $set_id = $topic['current_set_id'];
    $topic_id = $_POST['topic_id'];
    // Sanitize data from special characters
    $q1 = mysqli_real_escape_string($conn,$_POST['q1']);
    $q2 = mysqli_real_escape_string($conn,$_POST['q2']);
    $q3 = mysqli_real_escape_string($conn,$_POST['q3']);
    $q4 = mysqli_real_escape_string($conn,$_POST['q4']);
    $query = "insert into question (topic_id,set_id,question) values ($topic_id,$set_id,'$q1'),($topic_id,$set_id,'$q2'),($topic_id,$set_id,'$q3'),($topic_id,$set_id,'$q4') ";
    if(mysqli_query($conn,$query)){
        echo "<div style='color:green'> Questions added </div>";
        mysqli_query($conn,"update topic set current_set_id = current_set_id +1 where topic_id = {$_POST['topic_id']}") or die('Failed to update set');
    }
    else{
        echo mysqli_error($conn);
    }
    //echo $query;
}

$topics = mysqli_query($conn,"select * from topic");
?>
<h1> Add Question Set To Topic </h1>
<form method="post">
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
    <label>Question 1</label>
    <input type='text' name='q1' id='q1' required size='40'/> <br/><br/>
    <label>Question 2</label>
    <input type='text' name='q2' id='q2' required size='40'/> <br/><br/>
    <label>Question 3</label>
    <input type='text' name='q3' id='q3' required size='40'/> <br/><br/>
    <label>Question 4</label>
    <input type='text' name='q4' id='q4' required size='40'/> <br/><br/>
    <button type='submit' name='add'>Add Questions </button>
</form>
<br/><br/>
<a href='admin.php'>Go Back</a>