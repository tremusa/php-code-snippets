<?php
    require_once('connect.php');

    if(isset($_POST['edit'])){
        if(mysqli_query($conn,"update question set question='{$_POST['question']}' where question_id={$_POST['question_id']}")){
            header("Location: manage_question_groups.php");
        }
        else{
            echo mysqli_error($conn);
        }
    }

    $row = mysqli_fetch_assoc(mysqli_query($conn,"select * from question where question_id={$_GET['qid']}"));
?>

<form method='post'>
    <input type='text' value='<?=$row['question']?>' name='question' size='40'/><br/><br/>
    <input type='hidden' value='<?=$_GET['qid']?>' name='question_id' />
    <button name='edit'> Edit </button>
</form>
<br/><br/>
<a href='manage_question_groups.php'>Back</a>