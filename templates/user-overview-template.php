<link rel="stylesheet" href="../css/table.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
<?php
$database = new Database();
$baseLink = '?page=user';
// uploading under normal conditions
if (isset($_POST['upload'])) {
    if ($_FILES['ucas_file']['name']) {
        $file = fopen($_FILES['ucas_file']['tmp_name'], 'r');
        while ($row = fgetcsv($file)) {

            // inserting into database
            $database->insert('ucas', array(
                'UCAS_id' => $row[0],
                'first_name' => $row[1],
                'sur_name' => $row[2],
                'course_name' => $row[3],
                'email' => $row[4],
                'recent_grade' => $row[5],
                'gender' => $row[6],
                'date_of_birth' => $row[7],
                'address' => $row[8],
                'contact' => $row[9]
            ));
        }
        header("Location: ?page=user");
    }
    $database->update('ucas', array('unconditional' => 0), 'recent_grade', 'pending');
}
if (isset($_GET['setStu'])) {
    $database->update('case_papers', array('status' => 'UNCONDITIONAL'), 'case_id', $_GET['setStu']);
}
if (isset($_GET['unconditional'])) {
    $database->update('case_papers', array('status' => 'UNCONDITIONAL'), 'case_id', $_GET['unconditional']);
}
if (isset($_GET['createCase'])) {
    $database->update('ucas', array('case_status' => 1), 'UCAS_id', $_GET['createCase']);

    $criteria = [
        'UCAS_id' => $_GET['createCase'],
        'date_created' => date('Y-m-d H:m:s'),
    ];
    $database->insert('case_papers', $criteria);
    echo "Case Created";
    $stmt = $database->executeQuery("SELECT * FROM ucas u JOIN case_papers c ON u.UCAS_Id = c.UCAS_Id WHERE u.UCAS_Id= " . $_GET['createCase']);
    $stdn = $stmt->fetch();
}

if (isset($_GET['createCase'])) {
?>

    <div class="btns">
        <button id="view_letter" class="add_btn">view</button><br>
        <button id="print" class="add_btn" onClick="printdiv('content');">Print</button>
    </div>

    <div id="letter">
        <div id="view">
            <button id="edit_letter" class="add_btn">edit</button><br>
            <div id="content">

                <?php echo $stdn['first_name']; ?>
            </div>

            <button id="done" class="add_btn" style="float: right">Done</button>
            <br><br>
        </div>

        <div id="edit_view">
            <textarea name="edited" id="edit" cols="50" rows="30">

						Dear,<br>
						Mr/Ms <?php echo $stdn['first_name'] . ' ' . $stdn['sur_name']; ?>,<br>
						<br>
						We are pleased to inform that you are admitted to the college under conditional admission. 
						Your student ID is <?php echo $stdn['case_id']; ?>.<br>
						<br>
						Please submit the remaining required files within two weeks from this date.<br>
						You will receive another e-mail once you submit all the required files.<br>
						<br>
						This invitation was intended for email(e.g. coopersheldon@gmail.com) If you were not expecting this invitation, you can ignore this email. Thank you.<br>
						<br>
						Best Regards,<br>
						Woodlands University College<br>
						<br>
						Note: This is an automated email do not reply to this email<br><br>
					</textarea>
            <br><br>
            <button id="done2" class="add_btn" style="float: right">Edit</button>
        </div>
    </div>
    <script>
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }

        function letterPop() {
            var content = document.getElementById("content");
            var let_value = document.getElementById("edit").value;
            letter.classList.toggle("pop");
            content.classList.add('show');
            content.innerHTML = let_value;
        }

        function editView() {
            var let_value = document.getElementById("edit").value;
            document.getElementById("content").innerHTML = let_value;
            document.getElementById("edit_view").classList.remove('show');
            document.getElementById("content").classList.add("show");
        }

        function showEdit() {
            document.getElementById("content").classList.remove('show');
            document.getElementById("edit_view").classList.add('show');
        }

        document.getElementById("edit_letter").addEventListener('click', showEdit);
        document.getElementById("done2").addEventListener('click', editView);
        document.getElementById("done").addEventListener('click', letterPop);
        document.getElementById("view_letter").addEventListener('click', letterPop);
    </script>
<?php
} else {
?>
    <div class="top_add_section">
        <div class="btns">
            <button class="add_btn" onclick="expand()">Import form</button>
            <a class='add_btn' <?php echo "href='$baseLink&overview'" ?>>All Students</a>
            <a class='add_btn' <?php echo "href='$baseLink&conditional'" ?>>Conditional Students</a>
            <a class='add_btn' <?php echo "href='$baseLink&unconditional'" ?>>Unconditional Students</a>
        </div>



        <div id="expand_add_btn">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" id="ucas_file" name="ucas_file"><br><br>
                <input class="add_btn" type="submit" name="upload" id="submit_btn" value="Upload"><br>
            </form>
        </div>
    </div>
<?php

    // creating table
    $table = new createTable();
    // adding a header for the table
    // adding header of the table
    $table->addHeader(array(
        'Action',
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

    $request;

    if (isset($_GET['conditional'])) {
        $request = $database->executeQuery("SELECT * FROM UCAS u JOIN case_papers cp ON u.UCAS_id=cp.UCAS_id WHERE cp.status='CONDITIONAL'");
    } else if (isset($_GET['unconditional'])) {
        $request = $database->executeQuery("SELECT * FROM ucas u JOIN case_papers cp ON u.UCAS_id=cp.UCAS_id WHERE cp.status='UNCONDITIONAL'");;
        // $action = ;
    } else {
        $request = $database->findAll('ucas');
    }

    foreach ($request as $key => $data) {
        $action;

        if (isset($_GET['unconditional'])) {
            $id = $data['case_id'];
            $action = "<a class='add_btn' href='$baseLink&setStu=$id'>Add to student</a>";
        } else if (isset($_GET['conditional'])) {
            $id = $data['case_id'];
            $action = "<a class='add_btn' href='$baseLink&unconditional=$id'>Add to Unconditional</a>";
        } else {
            if ($data['case_status'] == 1) {
                $action = "<a class='add_btn' href=''>Case Already Created</a>";
            } else {
                $id = $data['UCAS_id'];
                $action = "<a class='add_btn' href='$baseLink&createCase=$id'>Create Case</a>";
            }
        }
        // adding rows of values in table
        $table->addRow(array(
            $action,
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
}

?>