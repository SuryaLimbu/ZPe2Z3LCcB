<?php
	$pdo = new PDO('mysql:dbname=woodlands;host=localhost', 'root', '');

	if(isset($_GET['ucID'])){
		$stmt = $pdo->prepare("UPDATE case_papers SET status='UNCONDITIONAL' WHERE case_id=:ucID");
		$stmt->execute($_GET);
	}
 
$base = "../../" ;
include $base."/classes/htmlTable.php";
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<body>
    <div class="container_fluid">
        <?php include $base."/admin/navigation.php"; 
        echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/style.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/admin.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/searchBar.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/table.css">';

        ?>
        <div class="main_body">
            <?php include $base."/include/searchBar.php";?>
    <div class="top_add_section">
        <div class="btns">
            <div class="btn">
                <button class="add_btn"><a href="index.php">UCAS applicants</a></button>
            </div>
            <div class="btn">
                <button class="add_btn"><a href="conditional.php">Conditional Students</a></button>
            </div>
            <div class="btn">
                <button class="add_btn" ><a href="unconditional.php">Unconditional Students</a></button>
            </div>
        </div>
</div>	

<?php
// creating table
$table = new createTable();
// adding a header for the table
// adding header of the table
$table->addHeader(array(
        'Action',
        'Case_id',
        'Student firstname',
        'Student Surname',
        'UCASID',
        'Course',
        'Birth Date',
        'Email',
        'GPA',
        'Gender',
        'Contact'
));
// finding all data from database
$stmt = $pdo->prepare("SELECT * FROM ucas u JOIN case_papers cp ON u.UCAS_id=cp.UCAS_id WHERE cp.status='UNCONDITIONAL'");
        $stmt->execute();
        foreach ($stmt as $data){
            $id = $data['case_id'];

    // adding rows of values in table
    $table->addRow(array(
        "<button class='add_btn'>
            <a href='unconditional.php?ucID=$id'>
                Add to Student
            </a>
        </button>",
        $data['case_id'],
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
// generating and displaying table in HTML
echo $table->getHTML();

include ($base."/include/footer.php");
?>