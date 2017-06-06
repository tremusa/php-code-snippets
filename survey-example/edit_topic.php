<?php
    require_once('connect.php');

    if(isset($_POST['save'])){
        if(mysqli_query($conn,"update topic set topic_name='{$_POST['topic_name']}' where topic_id={$_POST['topic_id']}")){
            header("Location: add_topic.php");
        }
    }

    $topic = mysqli_fetch_assoc(mysqli_query($conn,"select * from topic where topic_id={$_GET['tid']}"));
?>
<form method='post'>
    <input type='text' name='topic_name' value='<?=$topic['topic_name']?>' /><br/><br/>
    <input type='hidden' name='topic_id' value='<?=$_GET['tid']?>' />
    <input type='submit' value='Edit' name='save' />
</form>
<br/><br/>
<a href='add_topic.php'>Go Back </a>