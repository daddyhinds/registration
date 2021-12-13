
    <?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    $results =$crud->getModels();
    
    ?>
        <!--
            - First name
            - Last name
            - Gender
            - Home Address
            - Date of Purchase (Use DatePicker)
            - Model (Impreza, Legacy, Crosstrek, Forester, Outback, Ascent, BRZ, WRX, Wilderness)
            - Email Address
            - TRN Number

        -->
    <h1 class="text-center">Subaru Motor Club  Registration </h1>

    <form method="post" enctype="multipart/form-data" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname" >
            
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname"  >
            
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="male" id="male">
            <label class="form-check-label" for="male"> Male</label>
        </div>
         <div class="form-check">               
            <input class="form-check-input" type="radio" name="gender" value="female" id="female" checked>
            <label class="form-check-label" for="female">Female</label>
            
          </div>

        <div class="form-group">
            <label for="homeaddress">Home Address</label>
            <input required type="text" class="form-control" id="homeaddress" name="homeaddress"  >
            
        </div>
        <div class="form-group">
            <label for="dop">Date of Purchase</label>
            <input type="text" class="form-control" id="dop" name="dop"  >
    
            
        </div>
        <div class="form-group">
            <label for="mtype">Model</label>
            <select class="form-control" id="mtype" name="mtype">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value = "<?php echo $r['mtype_id'] ?>"><?php echo $r['name'];?></option>

                <?php } ?>
            </select>
                
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailhelp">
            <small id="emailhelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="trn">TRN Number</label>
            <input type="text" class="form-control" id="trn" name="trn" aria-describedby="trnHelp">
            <small id="trnHelp" class="form-text text-muted">We'll never share your trn number  with anyone else.</small>
        </div>
             </br>
        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Upload Image Of Car</label>
            <small id="avatar" class="form-text text-danger">File Upload Is Optional</small>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary btn-lg" target ="_blank">Submit</button>
</form>
<br>
<br>
<br>
<br>
<br>
<br>

    <?php require_once 'includes/footer.php' ?>;
    