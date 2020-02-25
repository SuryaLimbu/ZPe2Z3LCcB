<?php  
    $pdo = new PDO('mysql:dbname=Woodlands;host=localhost', 'root', '');

    if(isset($_POST['upload'])){
        if($_FILES['ucas_file']['name']){
            $file = fopen($_FILES['ucas_file']['tmp_name'], 'r');
            while($row = fgetcsv($file)){
                $value = "'".implode("','",$row)."'";
                $stmt = $pdo->prepare("INSERT INTO UCAS(UCAS_id, first_name, sur_name, course_name, email, recent_grade, gender, date_of_birth, address, contact) VALUES(".$value.")");
                $res=$stmt->execute();
            }
            if($res){
                echo "imported";
            }else{
                echo "error";
            }
        }
        $stmt=$pdo->prepare("UPDATE UCAS SET unconditional=0 WHERE recent_grade='pending'");
        $r=$stmt->execute();
        if($r){
            echo "Success";
        }else{
            echo "Error2";
        }
    }

    // if(isset($_GET['ucId'])){
    //     $stmt=$pdo->prepare("UPDATE UCAS SET case_status = 1 WHERE UCAS_id = :ucId");
    //     $stmt->execute($_GET);

    //     $stmt=$pdo->prepare("INSERT INTO case_papers(UCAS_id, date_created) VALUES(:UCAS_id, :date_created)");
    //     $criteria = [
    //         'UCAS_id'=>$_GET['ucId'],
    //         'date_created'=>date('Y-m-d H:m:s'),
    //     ];
    //     $res=$stmt->execute($criteria);
    //     if($res){
    //         echo "Case Created";
    //     }else{
    //         echo "There was an error";
    //     }
    // }
?>
<div class="main_body">
    <div class="top_add_section">
        <div class="btns">
            <div class="btn">
                <button class="add_btn" onclick="expand()">Import form</button>
            </div>
            <div class="btn">
                <button class="add_btn"><a href="index.php?order=conditional">Conditional Students</a></button>
            </div>
            <div class="btn">
                <button class="add_btn" ><a href="unconditional.php">Unconditional Students</a></button>
            </div>
        </div>


      
        <div id="expand_add_btn">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" id="ucas_file" name="ucas_file"><br><br>
                <input class="add_btn" type="submit" name="upload" id="submit_btn" value="Upload"><br>
            </form>
        </div>
    </div>
</div>

<table border="1">
    <tr>
        <th></th>
        <th>Student firstname</th>
        <th>Student Surname</th>
        <th>UCASID</th>
        <th>Course</th>
        <th>Birth Date</th>
        <th>Email</th>
        <th>Recent Grade</th>
        <th>Gender</th>
        <th>Contact</th>
        <th></th>
    </tr>

    <?php  
        $stmt = $pdo->prepare("SELECT * FROM UCAS");
        $stmt->execute();
        foreach ($stmt as $data){?>
            <tr>
                <td>
                    <?php  
                        if($data['case_status']==1){
                            echo '<a href="#">Case Already Created</a>';
                        }else{?>
                            <a href="casefile.php?ucId=<?php echo $data['UCAS_id']; ?>">Create Case</a>
                    <?php } ?>
                    
                </td>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['sur_name']; ?></td>
                <td><?php echo $data['UCAS_id']; ?></td>
                <td><?php echo $data['course_name']; ?></td>
                <td><?php echo $data['date_of_birth']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['recent_grade']; ?></td>
                <td><?php echo $data['gender']; ?></td>
                <td><?php echo $data['contact']; ?></td>
            </tr>
    <?php } ?>
</table>