<?php

$con = new PDO("mysql:host=localhost;dbname=db_sti;charset=utf8mb4", "root","");
/*
$con=mysqli_connect("localhost","root","","db_sti");

*/

if(isset($_POST["submit"]))
{

	$allow =array('pdf');
	$temp=explode(".",$_FILES['pdf_upload']['name']);
	$extension=end($temp);
	$upload_file=$_FILES['pdf_upload']['name'];
	move_uploaded_file($_FILES['pdf_upload']['temp_name'], "uploads/pdf/".$_FILES['pdf_upload']['name']);
	$qry=mysqli_query($con,"INSERT INTO 'upload_pdf_file'('pdf_upload')VALUES('".$upload_file."')");
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>  
    <body>  
 
 
 <div class="container">
			<div class="row">	
				
			<div class="full-width bg-transparent">
				<div class="col-lg-6 col-lg-offset-3 col-md-offset-3 col-xs-12">	
					<div class="full-width" >
						<h1 class="text-left color">Only PDF File Upload</h1>
						<br />
						<div class="col-lg-12 col-md-12 col-sm-12">
            
							<form method"post" enctype="multipart/form-data">
								<input type="file" id="main-input" class="form-control form-input form-style-base" accept="application/pdf">
								<h4 id="fake-btn" class="form-input fake-styled-btn text-left truncate"><span class="margin">Choose File</span></h4>
								<input type="submit" class="btn btn-info" name="submit">
							
							</form>
			                   
			</div>
			</div>
		</div>
    </div>
    </body>  
</html>


   