<?php 
include 'header.php';
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">مستخدمى النظام</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					اضافة مستخدم جديد
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

						<form role="form" action="insert_member.php" method="post"  >
							<div class="col-lg-6">

							
								<div class="form-group">
									<label>اسم المستخدم</label>
									<input name="name" class="form-control">

								</div>

								<div class="form-group">
									<label>الرقم السرى</label>
									<input name="password" class="form-control">
								</div>

								
								<div class="form-group">
                                            <label>الصلاحيات</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="edit" type="checkbox" value="true">تعديل 
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="delete" type="checkbox" value="true">حذف 
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="add" type="checkbox" value="true">اضافة جديد
                                                </label>
                                            </div>
                                        </div>
							</div>

							<div class="row">
								<div class="col-md-10">
									
									<div class="col-md-3"><button type="submit" class="btn btn-primary pull-right ">  اضافة المستخدم</button> </div>
									<div class="col-md-3">
										<button type="reset" class="btn btn-danger pull-right">مسح الخانات</button>
									</div>

								</div>
							</div>
						</form>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
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
