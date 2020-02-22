<?php
	$pdo = new PDO('mysql:dbname=Woodlands;host=localhost', 'root', '');

	if(isset($_GET['ucID'])){
		$stmt = $pdo->prepare("UPDATE case_papers SET status='UNCONDITIONAL' WHERE case_id=:ucID");
		$stmt->execute($_GET);
	}
?>
<?php 
	
	include ("../include/header.php");
?>

<div class="main_body">
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

<table border="1">
    <tr>
    	<th>Action</th>
        <th>Student firstname</th>
        <th>Student Surname</th>
        <th>UCASID</th>
        <th>Course</th>
        <th>Birth Date</th>
        <th>Email</th>
        <th>GPA</th>
        <th>Gender</th>
        <th>Contact</th>
    </tr>

    <?php  
        $stmt = $pdo->prepare("SELECT * FROM UCAS u JOIN case_papers cp ON u.UCAS_id=cp.UCAS_id WHERE cp.status='CONDITIONAL'");
        $stmt->execute();
        foreach ($stmt as $data){?>
            <tr>
            	<td><button class="add_btn"><a href="conditional.php?ucID=<?php echo $data['case_id'];?>">Add to Unconditional</a></button></td>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['sur_name']; ?></td>
                <td><?php echo $data['UCAS_id']; ?></td>
                <td><?php echo $data['course_name']; ?></td>
                <td><?php echo $data['date_of_birth']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['gpa']; ?></td>
                <td><?php echo $data['gender']; ?></td>
                <td><?php echo $data['contact']; ?></td>
            </tr>
    <?php } ?>
</table>

<?php include ("../include/footer.php");
?>