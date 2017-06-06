<?php
    require_once('connect.php');
    echo "<h1> Manage Survey Questions</h1>";
    if(isset($_POST['delete_set'])){
        mysqli_query($conn,"update question set is_deleted=1 where set_id={$_POST['delete_set']} and topic_id={$_POST['topic_id']}");
        echo "Question set deleted !";
    }

    if(isset($_POST['edit'])){
        header("Location: edit_question.php?qid=".$_POST['edit']);
    }

    if(isset($_POST['delete'])){
        mysqli_query($conn,"update question set is_deleted=1 where question_id={$_POST['delete_set']}");
        echo "Question deleted !";
    }

    if(isset($_POST['fetch'])){
        $topic = mysqli_fetch_assoc(mysqli_query($conn,"select * from topic where topic_id={$_POST['topic_id']}"));
        $query = "select * from question where topic_id = {$_POST['topic_id']} and is_deleted=0 order by set_id,question_id";
        $total_sets = $topic['current_set_id']; // one less
        $questions = mysqli_query($conn,$query);
        // just verify if topic contains any questions
        if(mysqli_num_rows($questions)>0){ 
            $counter = 1;
            $table = "     <form method='post'>
                            <table width='50%' border='1' style='text-align:center;border-collapse:collapse;'>
                            <tr>
                                <th>Question ID</th>
                                <th>Topic ID</th>
                                <th>Set ID</th>
                                <th>Question</th>
                                <th> Actions </td>
                            </tr>
                        ";
            while($counter<$total_sets){
                $query2 = "select * from question where topic_id = {$_POST['topic_id']} and set_id=$counter and is_deleted=0  order by set_id,question_id";
                $result = mysqli_query($conn,$query2);
                if(mysqli_num_rows($result)>0){
                    $table.= "  <tr style='background-color:lightgrey;'>
                                    <td colspan='4'> Set ID : $counter </td>
                                    <td colspan='1'> 
                                        <button name='delete_set' value='$counter'>Delete Set</button> 
                                        <input type='hidden' name='topic_id' value='{$_POST['topic_id']}' />
                                    </td>
                                </tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        $table .= " <tr>
                                        <td> {$row['question_id']} </td>
                                        <td> {$row['topic_id']} </td>
                                        <td> {$row['set_id']} </td>
                                        <td> {$row['question']} </td>
                                        <td> 
                                            <button name='edit' value='{$row['question_id']}'>Edit</button>
                                            <button name='delete' value='{$row['question_id']}'>Delete</button>
                                        </td>
                                    </tr>";
                    }
                }
                $counter++;
            }
            $table.= "</table></form>";
            echo $table;
        }
        else{
            echo "No question in this topic";
        }
    }

    $topics = mysqli_query($conn,"select * from topic");
?>

<hr/>
<form method="post">
    <select name='topic_id' id='topic_id' required>
    <option value=''>Select Topic </option>
    <?php
        while($row=mysqli_fetch_assoc($topics)){
            echo "<option value='{$row['topic_id']}'> {$row['topic_name']} </option>";
        }
    ?>
    </select>
    <button type='submit' name='fetch'>Fetch Question Sets </button>
</form>
<br/><br/>
<a href='admin.php'>Back</a>