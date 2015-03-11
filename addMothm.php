<?php 
include 'header.php';
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">المتهمين</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<form role="form" action="insertMotham.php" method="post" enctype="multipart/form-data" >
			<div class="col-lg-12">
				<div class="panel panel panel-primary">
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
									<input name="name" class="form-control">

								</div>

								<div class="form-group">
									<label>اسم الشهرة</label>
									<input name="nickname" class="form-control">
								</div>

								<div class="form-group">
									<label>انتحال </label>
									<input name="ent7al" class="form-control">
								</div>

								<div class="form-group">
									<label>تاريخ الميلاد</label>
									<input class="form-control" name="birthday">
								</div>
								<div class="form-group">
									<label>العنوان</label>
									<input class="form-control" name="address">
								</div>

								
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label>الوظيفة</label>
									<input class="form-control" name="job">
								</div>
								<div class="form-group">
									<label>اسم الام</label>
									<input name="mother_name" class="form-control">

								</div>

								
								
								<div class="form-group">
									<label>اجراء</label>
									<textarea class="form-control" name="egra2" rows="3"></textarea>
									
								</div>

								<div class="form-group">
									<label>رقم البطاقة</label>
									<input class="form-control" name="card_number">
								</div>

								<div class="form-group">
									<label>علامات مميزة </label>
									<textarea name="marks" class="form-control"  rows="4"></textarea>
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

			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						اضافة القضايا للمهم 
					</div>
					<div class="panel-body causes">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>رقم القضية</label>
									<input name="cause_number[]" class="form-control">
								</div>

								<div class="form-group">
									<label>التهمة </label>
									<textarea name="charge_type[]" class="form-control" rows="3"></textarea>
								</div>

							</div>
							<div class="col-md-4">
								<input type="submit" class="btn btn-primary pull-right add_charge" value="اضافة بيانات لقضية جديد ">
							</div>
						</div>
					</div>
					<div class="panel-footer">
						Panel Footer
					</div>
				</div>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-12">
				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="row">
							<div class="col-md-10">

								<div class="col-md-3">
									<input type="submit" class="btn btn-primary pull-right " value="اضافة"> </div>
									<div class="col-md-3">
										<button type="reset" class="btn btn-danger pull-right">مسح الخانات</button>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>

				
			</form>
		</div>
		
		<!-- /.row -->
	</div>


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
