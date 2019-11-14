<?php

/*$db = new PDO("mysql:host=localhost;dbname=db_sti;charset=utf8mb4", "root","");*/

$con=mysqli_connect("localhost","root","","db_sti");
$error = "error";
 
 $sql = "SELECT * FROM upload_pdf";
 
 /*$res =$con->prepare($query);
 $res =$con->prepare($sql);*/
  $res = mysqli_query($con,"select * from upload_pdf");


if(isset($_POST["submit"]))
{
	//path
	$location = "Test/".$_FILES['pdf_file']['name'];
	$doc_name	=$_POST['doc_name'];
	
	/*
		$qry=mysqli_query($con,"INSERT INTO upload_pdf_file (pdf_file) VALUES('".$upload_file."')");

	*/
	//end of path
	$allow =array('pdf');
	$temp=explode(".",$_FILES['pdf_file']['name']);
	$extension=end($temp);
	$upload_file=$_FILES['pdf_file']['name'];
	move_uploaded_file($_FILES['pdf_file']['tmp_name'], "Test/".$_FILES['pdf_file']['name']);
	$qry=mysqli_query($con,"INSERT INTO upload_pdf (name,path) VALUES('".$doc_name."','".$location."')");
	if($qry){
	echo "PDF File Upload Success";
	}
	else{
	echo "Upload Error!!";	
	}

}


?>
<html>  
    <head>    
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 

  </head>  
    <body>  
 	<p><br/></p>
		<div class="container">
		
		<div class="full-width bg-transparent">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-12">	
					<div class="full-width" >
						<h3 class="text-left color">UPLOAD FILES HERE</h3>
						
						<div class="col-lg-12 col-md-12 col-sm-12">
            
							<!--form method="post" enctype="multipart/form-data">
								<input type="file" id="main-input" class="form-control form-input form-style-base" accept="application/pdf" name="pdf_file">
								<input type="text" name="doc_name" />
								<input type="submit" class="btn btn-info" name="submit">
							
							</form-->
							<form method="post" enctype="multipart/form-data">
				<div class="form-group">
				<br />
					<input type="file" name="pdf_file" class="form-control" accept="application/pdf" placeholder="Upload File"/>
					</div>
					<div class="form-group">
					<label>Enter Document Name</label>
					<input type="text" name="doc_name" class="form-control" placeholder="Document Name"/>
					</div>
					<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info" value="Upload" />
					</div>
					</form>
			                   
			</div>
			</div>
		</div>
		<br />
		<br />
		<br />
		<br />

<table class="table table-bordered table-striped">
<thead>
 <tr>
  <td>Name</td>
  <td>Path</td>
  <td>Action</td>
 </tr>
 </thead>
 <tbody>
<?php	
 $connect = new PDO("mysql:host=localhost;dbname=db_sti;charset=utf8mb4", "root","");
	$stat =$connect->prepare("select * from upload_pdf");
	$stat->execute();
	while($row= $stat->fetch()){				
		?>
 <tr>
  <td><?php echo $row['name'] ?></td>
   <td><?php echo $row['path'] ?></td>
  <td class="text-center"><a href="download1.php?dow=<?php echo $row['path'] ?>"class="btn btn-primary">Download</a></td>
 </tr>
 <?php
 }
 
 ?>
 
</div>
<?php
/*		  <td><button type="button" class="btn btn-info btn-xs "><a href="download1.php?dow=$path">Download</a></button></td>

		$id	= $row['id'];
		$name	= $row['name']; 
		$path	= $row['path'];
		echo $id. "" .$name. "<a href='download1.php?dow=$path'>Download</a><br>";
		}
					?>	
	</tr>
</tbody>
			</table>
	*/				
	?>	
 
 
	
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </body>  
</html>
