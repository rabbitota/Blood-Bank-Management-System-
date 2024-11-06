<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search Bar</title>
	<link rel="stylesheet" href="search.css">
</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
	*{
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
		font-family: 'Poppins',sans-serif;
	}
	.size{
		min-height: 0px;
		padding: 60px 0 40px 0;
		
	}
	.loader{
		display:none;
		width:69px;
		height:89px;
		position:absolute;
		top:25%;
		left:50%;
		padding:2px;
		z-index: 1;
	}
	.loader .fa{
		color: #e74c3c;
		font-size: 52px !important;
	}
	.form-group{
		text-align: left;
	}
	h1{
		color: white;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
	span{
		display: block;
	}
	.name{
		color: #e74c3c;
		font-size: 22px;
		font-weight: 700;
	}
	.donated{
		color: green;
		font-size: 16px;
		font-weight: 700;
	}
	.donors_data{
		background-color: white;
		border-radius: 5px;
		margin:20px 5px 0px 5px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		padding: 20px;
	}
	.updel{
		display: flex;
		flex-wrap: wrap;
	}
</style>


<?php 

	//include header file
    include 'include/header.php';
	include 'include/config.php';
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

		
?>

<form method="post">
<div class="container-fluid red-background size">
		<div class="main-search-input-wrap">
			
			
			<div class="main-search-input fl-wrap">
				<div class="main-search-input-item">
					<input type="text" name="search" value="<?php if(isset($search)) echo $search; ?>" placeholder="Search Donors">
				</div>
				
				<button class="main-search-button" name="submit">Search</button>
			</div>
											
		
		</div>
</div>
</form>

<div class="container" style="padding: 60px 0;">
	<div class="row data">
		<?php 
			include "include/config.php";
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
                $sql = "SELECT * FROM donor WHERE email='$search' || name='$search' || id='$search'";
				$result = mysqli_query($connection,$sql);
                $row = mysqli_fetch_assoc($result);
                if($row){
					$id = $row['id'];
					echo '<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
						<span class="name">'.$row['name'].'</span>
						<span>'.$row['city'].'</span>
						<span>'.$row['email'].'</span>
						<span><div class="updel"><div><a href="update_info.php?id='.$id.'"><button type="button" class="btn btn-success">Update</button></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div><a href="delete.php?id='.$id.'"><button type="button" class="btn btn-warning">Delete</button></div></div></span>
						</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Data not found.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>';
				}
            }
			if(isset($_GET['flag'])){
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Account deleted successfully.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
			}
		?>
	</div>
</div>


<?php
}else{
	header("Location:../index.php");
}
include 'include/footer.php'; 
?>
<!--
<form method="post">

    <div class="main-search-input-wrap">
        
        
        <div class="main-search-input fl-wrap">
            <div class="main-search-input-item">
                <input type="text" name="search" value="" placeholder="Search Donors">
            </div>
            
            <button class="main-search-button" name="submit">Search</button>
        </div>
                                        
    
    </div>
</form>
-->
