$query = "select * from question where topic_id = {$_POST['topic_id']} order by set_id,question_id";
        $total_sets = $topic['current_set_id']; // one less
        $questions = mysqli_query($conn,$query);
        if(mysqli_num_rows($questions)>0){
            $table = "  <table width='50%' style='text-align:center;'>
                                <tr>
                                    <th>Question ID</th>
                                    <th>Topic ID</th>
                                    <th>Set ID</th>
                                    <th>Question</th>
                                </tr>
                            ";
            while($row = mysqli_fetch_assoc($questions)){
                $table.= "  <tr>
                                <td> {$row['question_id']} </td>
                                <td> {$row['topic_id']} </td>
                                <td> {$row['set_id']} </td>
                                <td> {$row['question']} </td>
                            </tr>";
            }
            $table .= "</table>";
            echo $table;