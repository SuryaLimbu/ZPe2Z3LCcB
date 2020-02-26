<link rel="stylesheet" href="../css/table.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap" > 
<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">


<?php  

    $base = dirname(getcwd(), 1) ;


    require $base.'/classes/databaseQueries.php';
    require $base.'/classes/htmlTable.php';



    $database = new Database();

    if(isset($_POST['upload'])){
        if($_FILES['ucas_file']['name']){
            $file = fopen($_FILES['ucas_file']['tmp_name'], 'r');
            while($row = fgetcsv($file)){
                $value = "'".implode("','",$row)."'";
                $database->insert('ucas',$value);

            }

        }

        $database->update('ucas',array('unconditional'=>0),'recent_grade','pending');

    }

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



<?php
$table = new createTable();
// adding a header for the table
$table->addHeader(array(
    'Case Creation',
    'Student firstname',
    'Student Surname',
    'UCASID',
    'Course',
    'Birth Date',
    'Email',
    'Recent Grade',
    'Gender',
    'Contact'
));

$request = $database->findAll('ucas');
foreach ($request as $key => $data) {
    $caseCreation;
    if($data['case_status']==1){
         $caseCreation = 'Case Already Created';
    }else{
        $id = $data['UCAS_id'];
        $caseCreation = "<a href='casefile.php?ucId=$id>Create Case</a>";
    }   

    // adding rows of values in table
    $table->addRow(array(
    $caseCreation,
    $data['first_name'],
    $data['sur_name'],
    $data['UCAS_id'],
    $data['course_name'],
    $data['date_of_birth'],
    $data['email'],
    $data['recent_grade'],
    $data['gender'],
    $data['contact']
    ));
    
}

echo $table->getHTML();
?>