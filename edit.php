
    <?php 
    $title = 'Edit Record';
    require_once 'includes/header.php'; 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results =$crud->getModels();
    if(!isset($_GET['id']))
    {
        
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $registrant = $crud->getRegistrantDetails($id);
    
    ?>
        
    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value ="<?php echo $registrant['registrant_id'] ?>" />
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value ="<?php echo $registrant['firstname'] ?>" id="firstname" name="firstname" >
            
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value ="<?php echo $registrant['lastname'] ?>" id="lastname" name="lastname"  >
            
        </div>
        <div class="form-check">
            <label for="gender">Gender</label>
            <input type="radio" class="form-control" value ="<?php echo $registrant['gender'] ?>" id="gender" name="gender"  >
            
        </div>
        <div class="form-group">
            <label for="homeaddress">Home Address</label>
            <input type="text" class="form-control" value ="<?php echo $registrant['homeaddress'] ?>" id="homeaddress" name="homeaddress"  >
        <div class="form-group">
            <label for="dop">Date of Purchase</label>
            <input type="text" class="form-control" value ="<?php echo $registrant['dateofpurchase'] ?>" id="dob" name="dop"  >
    
            
        </div>
        <div class="form-group">
            <label for="mtype">Model</label>
            <select class="form-control" id="mtype" name="mtype">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value = "<?php echo $r['mtype_id'] ?>"<?php if($r['mtype_id'] == $registrant['mtype_id']) echo 'selected'?>>
                    <?php echo $r['name'];?></option>

                <?php } ?>
            </select>
                
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value ="<?php echo $registrant['emailaddress'] ?>" id="email" name="email" aria-describedby="emailhelp" readonly>
            <small id="emailhelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="trn">TRN Number</label>
            <input type="text" class="form-control" value ="<?php echo $registrant['trnnumber'] ?>" id="ren" name="trn" aria-describedby="trnHelp">
            <small id="trnHelp" class="form-text text-muted">We'll never share your TRN number  with anyone else.</small>
        </div>
        
        <a href="viewrecords.php" class="btn btn-default " >Back to List</a>
        <button type="submit" name="submit" class="btn btn-info " >Save Changes</button>

</form>
<?php } ?>
<br>
<br>
<br>
<br>
<br>
<br>

    <?php require_once 'includes/footer.php' ?>;
    