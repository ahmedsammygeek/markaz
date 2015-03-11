<?php 

function safe_redirect( $url , $msg )
{
	header( "location: $url.php?msg=". $msg, true, 302 );
	die();
}

// echo "sds";
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	require 'connection.php';
	$query = $pdo->prepare("SELECT *  FROM criminals WHERE id = ? ");
	$query->bindValue(1,$id , PDO::PARAM_INT);
	if(!$query->execute()) {
		safe_redirect('Mothms' , 'no');
		
	} 

}

else {
	header("Location: Mothms.php");
	die();
}

if(!$query->rowCount()) {
	header("Location: Mothms.php");
	die();
} 
$row = $query->fetch(PDO::FETCH_OBJ);

include 'header.php';

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-10">


        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    بيانات المتهم
                </div>
                <div class="panel-body">
                 <dl>


                 </dl>
                 <div class="row" >
                    <div class="col-md-6">
                        <img  width="250" heihgt="250" src="pics/<?php echo $row->pic ?>" alt="لا يوجد صورة" class="img-rounded pull-center">
                    </div>

                    <div class="col-md-6" dir="rtl">
                        <dl>
                            <dt>الاسم: <?php echo $row->name  ; ?></dt>

                            <dt>اسم الشهرة : <?php echo $row->nickname  ; ?> </dt>
                            <dt> انتحال : <?php echo $row->ent7al  ; ?> </dt>
                            <dt> تاريخ الميلاد: <?php echo $row->birthday  ; ?></dt>
                            <dt> العنوان: <?php echo $row->address  ; ?></dt>
                            <dt>  الوظيفة: <?php echo $row->job  ; ?></dt>

                            <dt>  اسم الام: <?php echo $row->mother_name  ; ?> </dt>
                            <dt>    رقم البطاقة : <?php echo $row->card_number  ; ?></dt>
                            <dt>    علامات مميزة: <?php echo $row->marks  ; ?></dt>
                            <dt>    الاجراء: <?php echo $row->egra2  ; ?></dt>

                        </dl>
                    </div>

                </div>

                <div class="row" dir="rtl">
                 <div class="col-md-8 pull-right">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-right">#</th>
                                    <th class="text-right" >رثم القضية</th>
                                    <th class="text-right"> التهمة </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $query2 = $pdo->prepare(" SELECT * FROM causes  WHERE criminal_id = ?");
                                $query2->bindValue(1,$id , PDO::PARAM_STR);

                                $query2->execute();
                                if($query2->rowCount()) {
                                 $i = 1;
                                 while ($case = $query2->fetch(PDO::FETCH_OBJ)) {
                                    echo "<tr>
                                    <td>$i</td>
                                    <td>$case->cause_number</td>
                                    <td>$case->charge_type</td>

                                    </tr>";
                                    $i++;
                                }
                            }
                            else {
                                echo "لا يوجد قضايا لهذا المتهم ";
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <button class="noprint btn btn-primary btn-lg"  onclick="myFunction()">اطبع</button>
        <a href="new_cause.php?id=<?php echo $id;  ?>" class="noprint btn btn-primary btn-lg"  >اضافة قضية جديدة </a>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>

</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Dashboard -->
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
<script src="js/demo/dashboard-demo.js"></script>
<script>


function myFunction() {
    window.print();
}
</script>
</script>

</body>

</html>
