<?php
require_once('connect.php');

if(isset($_POST['add'])){
    mysqli_query($conn,"insert into topic (topic_name) values ('{$_POST['name']}')") or die(mysqli_error($conn));
}

if(isset($_POST['delete'])){
    mysqli_query($conn,"update topic set is_deleted=1 where topic_id={$_POST['delete']}");
}
?>
<style>
    tr{
        text-align: center;
    }
</style>
<h1> Manage Topics </h1>
<form method='post' />
    <input type='text' placeholder='Topic Name' name='name'/>
    <button type='submit' name='add'>Add Topic </button>
</form>
<br/><br/>

<?php
    $query = 'select * from topic where is_deleted=0';
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $table = "  <form method='post'>
                    <table width='25%'>
                        <tr>
                            <th> Topic ID </th>
                            <th> Topic Name </th>
                            <th> Current Set ID </th>
                            <th> Action </th>
                        </tr> ";
        while($row=mysqli_fetch_assoc($result)){
            $table .= " <tr>
                            <td> {$row['topic_id']}</td>
                            <td> {$row['topic_name']}</td>
                            <td> {$row['current_set_id']}</td>
                            <td> <button name='delete' value='{$row['topic_id']}'> Delete </button> </td>
                        </tr>";
        }

        $table .= "</table></form>";
        echo $table;
    }
    else{
        echo 'No Topics Found !';
    }
?>
<br/><br/>
<a href='admin.php'>Back</a>