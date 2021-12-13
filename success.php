<?php 
    $title = 'success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
    require_once 'sendemail.php';


    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $address = $_POST['homeaddress'];
        $dop = $_POST['dop'];
        $email = $_POST['email'];
        $trn = $_POST['trn'];
        $mtype = $_POST['mtype'];

        $orig_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        $target_dir = 'uploads/';
        $destination = "$target_dir$trn.$ext";
        move_uploaded_file($orig_file,$destination);

    
        //Call function to insert and track if success or not
       $isSuccess = $crud->insertRegistrants($fname, $lname, $gender, $address, $dop, $email, $trn, $mtype,$destination);
       $mtypeName = $crud->getModelById($mtype);

       if($isSuccess){
          // SendEmail::SendMail($email,'Welcome to Subaru's Motor Club','You have successfully registered your vehicle');
        include 'includes/successmessage.php';

       }
       else{
        include 'includes/errormessage.php';

       }
    }
    ?>
    
<!-- This Prints out values passed to the action page using method="post" -->
<img src="<?php echo $destination; ?>" class="dashboard-profile-img rounded-circle" style="width: 45%; height: 45%" />
<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'].' '.$_POST['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $mtypeName['name']; ?></h6>
            <p class="card-text">
                Gender: <?php echo $_POST['gender']; ?></p>
                <p class="card-text">
                Home Address: <?php echo $_POST['homeaddress']; ?></p>
            <p class="card-text">
                Date Of Purchase: <?php echo $_POST['dop']; ?></p>
            <p class="card-text">
                Email Address: <?php echo $_POST['email']; ?></p>
                <p class="card-text">
                TRN Number: <?php echo $_POST['trn']; ?></p>
            
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>

    <?php require_once 'includes/footer.php' ?>;