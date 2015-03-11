<?php

if(!isset($_GET['id']) || empty($_GET['id'])) {
	header("Location: Mothms.php");
	die();
} 
$id = $_GET['id'];
include 'header.php';
require 'connection.php';

$query = $pdo->prepare(" SELECT * FROM criminals  WHERE id = ?");
$query->bindValue(1,$id , PDO::PARAM_STR);

// die();

if(!$query->execute()) {
	header("Location: Mothms.php");
	die();
}

if(!$query->rowCount()) {
	header("Location: Mothms.php");
	die();
}



$row = $query->fetch(PDO::FETCH_OBJ);


?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">المتهمين</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<form role="form" action="update_motham.php?id=<?php echo $id;  ?>" method="post" enctype="multipart/form-data" >
		<!-- /.row -->
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						اضافة متهم جديد
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-10">
								<?php 
								if(isset($_GET['msg'])) {
									$msg = $_GET['msg'];
									switch ($msg) {
										case 'done':
										echo '<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h3>تم الاضافة بنجاح</h3>
										</div>';
										break;

										case 'no':
										echo '<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h3>عفوا حدث خطا فى ادخال البينات برجاء ادخالها مرة اخرى</h3>
										</div>';
										break;


										case 'miss':
										echo '<div class="alert alert-warning alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h3>برجاء ادخال اسم المتهم</h3>
										</div>';
										break;

										default:
									# code...
										break;
									}
								}
								?>
							</div>
						</div>
						<div class="row">


							<div class="col-lg-6">

								<div class="form-group">
									<label>صورة المتهم</label>
									<input type="file" name="pic">
								</div>
								<div class="form-group">
									<label>اسم المتهم</label>
									<input name="name" value="<?php echo $row->name  ; ?>" class="form-control">

								</div>

								<div class="form-group">
									<label>اسم الشهرة</label>
									<input name="nickname" value="<?php echo $row->nickname  ; ?>" class="form-control">
								</div>

								<div class="form-group">
									<label>انتحال </label>
									<input name="ent7al" value="<?php echo $row->ent7al  ; ?>" class="form-control">
								</div>

								<div class="form-group">
									<label>تاريخ الميلاد</label>
									<input class="form-control" value="<?php echo $row->birthday  ; ?>" name="birthday">
								</div>
								<div class="form-group">
									<label>العنوان</label>
									<input class="form-control" value="<?php echo $row->address  ; ?>" name="address">
								</div>
								<div class="form-group">
									
									<input type="hidden" class="form-control" value="<?php echo $id  ; ?>" name="id">
								</div>


							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label>الوظيفة</label>
									<input class="form-control" value="<?php echo $row->job  ; ?>" name="job">
								</div>

								<div class="form-group">
									<label>اسم الام</label>
									<input name="mother_name" value="<?php echo $row->mother_name  ; ?>" class="form-control">

								</div>


								
								<div class="form-group">
									<label>اجراء</label>
									<input class="form-control" value="<?php echo $row->egra2  ; ?>" name="egra2">
								</div>

								<div class="form-group">
									<label>رقم البطاقة</label>
									<input class="form-control" value="<?php echo $row->card_number  ; ?>" name="card_number">
								</div>

								<div class="form-group">
									<label>علامات مميزة </label>
									<textarea name="marks" class="form-control" rows="3"><?php echo $row->marks  ; ?></textarea>
								</div>		
							</div>
							<!-- /.col-lg-6 (nested) -->
							

						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->



		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				اضافة القضايا للمهم 
			</div>
			<div class="panel-body causes">
				<div class="row">
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary pull-right add_charge" value="اضافة بيانات لقضية جديد ">
						
					</div>
					<?php 

					$query2 = $pdo->prepare(" SELECT * FROM causes  WHERE criminal_id = ?");
					$query2->bindValue(1,$id , PDO::PARAM_STR);

					$query2->execute();
					if($query->rowCount()) {
						
						while ($case = $query2->fetch(PDO::FETCH_OBJ)) {
							echo '<div class="col-md-8">
						<div class="form-group">
							<label>رقم القضية</label>
							<input name="cause_number[]" class="form-control" value='.$case->cause_number.'>
						</div>

						<div class="form-group">
							<label>التهمة </label>
							<textarea name="charge_type[]" class="form-control" rows="3">'.$case->charge_type.'</textarea>
						</div>

					</div>';
						}
					}
					else {
						echo "no cause for this one";
					}
					
					

					?>
					

				</div>
			</div>
			<div class="panel-footer">
				Panel Footer
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10">
				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="col-md-10">

							<div class="col-md-3"><button type="submit" class="btn btn-primary pull-right ">تعديل</button> </div>
							<div class="col-md-3">
								<button type="reset" class="btn btn-danger pull-right">مسح الخانات</button>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>

</form>


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
