<?php 
    session_start();

    require_once '../config.php';
    include 'includes/head.php';
    //logout
    $sql = $conn->query("SELECT * FROM time");
    if(isset($_GET['logout'])){
    unset($_SESSION["login"]);
    $_SESSION = array();
   header('LOCATION:index.php');
    }
    // DELETE TIMESHEET
    if(isset($_GET['delete'])){
        $del = (int)$_GET['delete'];
        $delsql = $conn->query("DELETE FROM time WHERE id= $del");
        header('Location:admin.php');
    }
    //EIDT TIMESHEET


    

    // ADD NEw Employee
    if (isset($_GET['add'])) {
        $deptsql = $conn->query("SELECT * FROM department");
        if (isset($_POST['add_employee'])) {
            $name = $_POST['name'];
            $eid = $_POST['eid'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $phone = $_POST['phone'];
            $dept =$_POST['dept'];
            $position =$_POST['position'];

            $savequery = $conn->query("INSERT INTO employeedetail(name,eid,address,dob,phone,department,position)VALUES('$name','$eid','$address','$dob','$phone','$dept','$position')");
        }
    
?>



        <!-- ADD new EMPLOYEE -->
        <h2 class="text-center">ADD New Employee</h2>

    <!-- <a href="index.php?edit=1" class="btn btn-primary pull-left" id="add-employee">Edit Employee </a> -->
    <a href="admin.php" class="btn btn-primary pull-right" id="add-employee">Time Sheet</a>
    <br><hr>
    <div class="row">
        <div class="col-md-6">
            <form class="form" action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</lable>
                    <input type="text" id="name" name="name" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="eid">Employment ID:</lable>
                    <input type="text" id="eid" name="eid" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address:</lable>
                    <textarea type="text" id="address" name="address" value="" rows="6" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</lable>
                    <input type="date" id="dob" name="dob" value="" class="form-control">
                </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone Number:</lable>
                    <input type="number" id="phone" name="phone" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="dept">Department</lable>
                    <select id="dept" name="dept" class="form-control">
                    
                        <option value="0">Department</option>
                        <?php while($dept = mysqli_fetch_assoc($deptsql)): ?>
                        <option value="<?=$dept['id'];?>"><?=$dept['department'];?></option>
                    <?php endwhile;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position">Position:</lable>
                    <input type="text" id="position" name="position" value="" class="form-control">
                </div>
                <input type="submit" name="add_employee" value="Save" class="btn btn-success form-control">
            </form>
        </div>
    </div>
 
<?php }else{

?> <!-- VIEW TIMESHEET -->
            <h2 class="text-center"> Admin Area </h2>
             <div class="clearfix"></div><a href="../index.php?logout=1" class="btn btn-success pull-left" >Log Out</a>
            <a href="admin.php?add=1" class="btn btn-success pull-right" id="add-employee">Add Employee </a><div class="clearfix"></div>
            <hr>
            
           <table class="table table-bordered table-condensed table striped"> 
            <thead> 
                <th>Date</th><th> Eid </th><th>Name </th><th>Department </th><th>Time In </th><th>Time Out </th><th> </th>
            </thead>
            <tbody> <?php
                 while($time = mysqli_fetch_assoc($sql)):?>
                 <?php $sql2 = $conn->query("SELECT * FROM employeedetail WHERE eid = '$time[eid]'");
                     $name = mysqli_fetch_assoc($sql2); ?>
                     
                   
                
                <tr> 
                    <td><?=$time['date']; ?> </td>
                    <td><?=$time['eid']; ?></td>
                    <td><?=$name['name']; ?> </td>
                    <td> <?=$name['department']; ?></td> 
                    <td><?=$time['timein']; ?> </td>
                    <td><?=$time['timeout']; ?></td>
                    <td>
                    <!-- <a href="admin.php?edit=" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> -->
                    <a href="admin.php?delete=<?=$time['id']; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-remove"></span></a>
                     </td>
                </tr>
    <?php endwhile; ?>
    
            </tbody>
           </table>

<?php } include 'includes/footer.php'; ?>