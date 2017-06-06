<?php
/*
    Read topic_id and select a random set id, generate the questions based
    on these set id and take survey. Store the result in db.
*/
    require_once('connect.php');

    if(isset($_POST['submit_survey'])){
        $ans1 = $_POST['q1'];
        $ans2 = $_POST['q2'];
        $ans3 = $_POST['q3'];
        $ans4 = $_POST['q4'];
        $tid = $_POST['topic_id'];
        $sid = $_POST['set_id'];
        $q = explode(':',$_POST['questions']);

        $result = mysqli_query($conn,"insert into survey () values ()");
        if($result){
            $survey_id = mysqli_insert_id($conn);
            $insert = "insert into response (survey_id,set_id,topic_id,question_id,response) values ($survey_id,$sid,$tid,$q[0],$ans1),($survey_id,$sid,$tid,$q[1],$ans2),($survey_id,$sid,$tid,$q[2],$ans3),($survey_id,$sid,$tid,$q[3],$ans4)";
            if(mysqli_query($conn,$insert)){
                header('Location: view_stats.php?sid='.$survey_id);
            }
            else{
                echo "Error storing response: ".mysqli_error($conn);
            }
        }
        else{
            echo " Error creating survey: ".mysqli_error($conn);
        }
    }

    $topic_id = $_GET['topic_id'];
    // Makes sure only question set is presented from only available ones
    $query = "select distinct set_id from question where topic_id = $topic_id and is_deleted=0";
    //echo $query;
    $result = mysqli_fetch_all(mysqli_query($conn,$query),MYSQLI_NUM);
    $cnt = 0;
    while($cnt<count($result)){
        $list[] = $result[$cnt][0];
        $cnt++;
    }
    $random_index = array_rand($list,1); // array_rand or array_rand_value
    
    $selected_set_id = $list[$random_index];
    $questions = mysqli_query($conn,"select * from question where topic_id=$topic_id and set_id=$selected_set_id and is_deleted=0 order by question_id");
?>

<style>
    .box{
        margin: 10px 5px 10px 20px;
        border: dashed 0.1px grey;
        width: 30%;
    }
    .question{
        margin: 10px 5px 10px 20px;
    }
    .options{
        margin: 10px 5px 10px 20px;
    }
    label{
        margin-right:25px;
    }
</style>
<h1> Survey Questionnare</h1>
<form method="post">
    <input type='hidden' name='topic_id' value='<?=$topic_id?>' />
    <input type='hidden' name='set_id' value='<?=$selected_set_id?>' />
    <?php
        $cnt = 1;
        $question_set = '';
        while($row = mysqli_fetch_assoc($questions)){
            $question_set .= $row['question_id'].':';
            ?>
            <div class='box'>
                <div class='question'>
                    <?=$row['question']?>
                </div>
                <div class='options'>
                    <label><input type='radio' name='q<?=$cnt?>' value='1' required/>1 </label>
                    <label><input type='radio' name='q<?=$cnt?>' value='2' required/>2 </label>
                    <label><input type='radio' name='q<?=$cnt?>' value='3' required/>3 </label>
                    <label><input type='radio' name='q<?=$cnt?>' value='4' required/>4 </label>
                    <label><input type='radio' name='q<?=$cnt?>' value='5' required/>5 </label>
                </div>
            </div>
            <?php 
            $cnt++;
        }
    ?>
    <input type='hidden' name='questions' value='<?=$question_set?>' />
    <br/>
    <button name='submit_survey'>Submit Response</button>
</form>
<br/><br/>
<a href='select_topic.php'> Go Back </a>