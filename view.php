<?php 
    $title = 'View Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    //Get Registrant by id
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';

        
    }else{
        $id = $_GET['id'];
        $result = $crud->getRegistrantDetails($id);
    
    
    ?>
<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path']; ?>" class="dashboard-profile-img rounded-circle" style="width: 30%; height: 30%" />

<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['firstname'].' '.$result['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']; ?></h6>
            <p class="card-text">
                Gender: <?php echo $result['gender']; ?></p>
            <p class="card-text">
                Home Address: <?php echo $result['homeaddress']; ?></p>
            <p class="card-text">
                Date Of Purchase: <?php echo $result['dateofpurchase']; ?></p>
            <p class="card-text">
                Email Address: <?php echo $result['emailaddress']; ?></p>
                <p class="card-text">
                TRN Number: <?php echo $result['trnnumber']; ?></p>
            
        </div>
    </div>
    <br/>
                <a href="viewrecords.php" class="btn btn-info">Back to List</a>
                <a href="edit.php?id=<?php echo $result['registrant_id']?>" class="btn btn-warning">Edit</a>
                <a onclick ="return confirm('Are You Sure You Want To Delete This Record?');"
                href="delete.php?id=<?php echo $result['registrant_id']?>" class="btn btn-danger">Delete</a>

<?php } ?>
<br>
<br>
<br>
<br>

    <?php require_once 'includes/footer.php' ?>;