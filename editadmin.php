<?php 
include 'header.php';


require 'connection.php';
$id = $_SESSION['user_id'];
$query = $pdo->prepare(" SELECT * FROM system_users  WHERE id = ? ");
$query->bindValue(1,$id , PDO::PARAM_INT);

$query->execute();

$info = $query->fetch(PDO::FETCH_OBJ);



?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">welcome <?php echo $_SESSION['username'] ; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?php 


    if(isset($_GET['msg']))
    {

        if($_GET['msg'] == 'successup') { echo '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        data was updated successfully !
        </div>' ; }


        if($_GET['msg'] == 'failup') { echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        please try again
        </div>' ; }

       if($_GET['msg'] == 'failup') { echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        please try again
        </div>' ; }


        if($_GET['msg'] == 'wop') { echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        please enter your old password right !
        </div>' ; }

        if($_GET['msg'] == 'ndm') { echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        new passwords do not matches , enter it again 
        </div>' ; }
    }
     ?>
    <!-- /.row -->
    <div class="row">

     <div class="panel panel-default">
        <div class="panel-heading">
            Edit your into
        </div>
        <div class="panel-body">
            <div class="row">
                <form action="updateadmin.php" method="post" >
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <h2>change data</h2>

                            <div class="form-group">
                                <label> username</label>
                                <input class="form-control" placeholder="Enter text" name="username"
                                value="<?php  echo $info->username; ?>">
                            </div>
                            <div class="form-group">
                                <label>old password </label>
                                <input class="form-control" placeholder="Enter password" name="old_password"
                                >
                            </div>

                            <div class="form-group">
                                <label>new password </label>
                                <input class="form-control" placeholder="Enter password" name="password"
                                >
                            </div>

                            <div class="form-group">
                                <label>new password again </label>
                                <input class="form-control" placeholder="Enter password" name="password_again"
                                >
                            </div>
                            


                        
                        </div>



                        <input type="submit" class="btn btn-primary btn-block" value="Updated info" name="submit">


                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->


<!-- Core Scripts - Include with every page -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Forms -->

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
