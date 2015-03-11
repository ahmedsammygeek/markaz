<?php 
require 'header.php';
require 'connection.php';
$query = $pdo->prepare(" SELECT name , nickname , mother_name ,  egra2 , card_number , pic , id  FROM criminals ");
$query->execute();
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
		<div class="col-md-10">
			<?php 
			if(isset($_GET['msg'])) {
				$msg = $_GET['msg'];
				switch ($msg) {
					case 'done':
					echo '<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h3>تم الحذف بنجاح</h3>
					</div>';
					break;

					case 'no':
					echo '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h3>برجاء المحاولة مرة اخرى , حدث خطا</h3>
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
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					البحث فى جميع المتهمين 
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>الاسم</th>
									<th>اسم الشهرة</th>
									<th>الصورة</th>
									<th>اسم الام</th>
									
									<th>الاجراء</th>
									<th>رقم البطاقة</th>
									<th>خصائص</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if( $query->rowCount() ) {
									while ($row = $query->fetch(PDO::FETCH_OBJ) ) {
										echo "<tr class='gradeU'>
										<td>$row->name</td>
										<td>$row->nickname</td>
										<td><img with='100' height='100' src='pics/$row->pic' alt='لا يوجد صورة'></td>
										<td>$row->mother_name</td>";
										echo "										
										<td>$row->egra2</td>
										<td>$row->card_number</td>
										<td>
										<a href='details.php?id=".$row->id."' class='btn btn-warning btn-xs'>تفاصيل</a>
										";
										if($_SESSION['can_edit'] == 1) {
											echo "<a href='edit.php?id=".$row->id."' class='btn btn-info btn-xs'>تعديل</a>";
										}

										if($_SESSION['can_delete'] == 1)

										{
											echo "<a href='delete.php?id=".$row->id."' class='btn btn-danger btn-xs'>حذف</a>";
										}

										echo "</td>	</tr>";
									}

								}
								?>
								
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Tables -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- SB Admin Scripts - Include with every page -->
<script src="js/sb-admin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
	$('#dataTables-example').dataTable();
});
</script>

</body>

</html>