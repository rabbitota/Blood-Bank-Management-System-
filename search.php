<?php 

	//include header file
	include ('include/header.php');

?>
<style>
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
		margin: 25px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		-moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		padding: 20px 10px 20px 30px;
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div class="ccol-md-6 offset-md-3">
			<h1 class="text-center">Search Donors</h1>
			<hr class="white-bar">
			<br>
			<form action="search.php" method="get" class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
			<div class="form-group text-center justify-content-center">
			<select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default" required>
			<option value="">-- Select --</option>
	<optgroup title="Chittagong" label="&raquo; Chittagong Division"></optgroup>
	<option value="Bandarban" >Bandarban</option>
	<option value="Brahmanbaria" >Brahmanbaria</option>
	<option value="Chattogram" >Chattogram</option>
	<option value="Cumilla" >Cumilla</option>
	<option value="Cox's Bazar" >Cox's Bazar</option>
	<option value="Feni" >Feni</option>
	<option value="Khagrachari" >Khagrachari</option>
	<option value="Rangamati" >Rangamati</option>
	<option value="Noakhali" >Noakhali</option>
	<option value=" Chandpur" > Chandpur</option>
	<option value="Lakshmipur" >Lakshmipur</option>
	<optgroup title="Rajshahi" label="&raquo; Rajshahi Division"></optgroup>
	<option value="Sirajganj " >Sirajganj </option>
	<option value="Pabna" >Pabna</option>
	<option value="Bogura" >Bogura</option>
	<option value="Rajshahi" >Rajshahi</option>
	<option value="Natore" > Natore</option>
	<option value="Joypurhat" >Joypurhat</option>
	<option value="Chapainawabganj" >Chapainawabganj</option>
	<option value="Naogaon" >Naogaon</option>
	<optgroup title="Khulna" label="&raquo; Khulna Division"></optgroup>
	<option value="Khulna" >Khulna</option>
	<option value="Jashore" >Jashore</option>
	<option value="Satkhira" >Satkhira</option>
	<option value=" Meherpur" > Meherpur</option>
	<option value="Narail" >Narail</option>
	<option value="Chuadanga" >Chuadanga</option>
	<option value=" Kushtia" > Kushtia</option>
	<option value="Magura" >Magura</option>
	<option value="Bagerhat" >Bagerhat</option>
	<option value="Jhenaidah" >Jhenaidah</option>
	<optgroup title="Barishal" label="&raquo; Barishal Division"></optgroup>
	<option value="Jhalakathi" >Jhalakathi</option>
	<option value="Patuakhali" >Patuakhali</option>
	<option value=" Pirojpur" > Pirojpur</option>
	<option value="Barishal" >Barishal</option>
	<option value="Bhola" >Bhola</option>
	<option value="Barguna" >Barguna</option>
	<optgroup title="Sylhet" label="&raquo; Sylhet Division"></optgroup>
	<option value=" Moulvibazar" > Moulvibazar</option>
	<option value="Habiganj" >Habiganj</option>
	<option value="Sunamganj" >Sunamganj</option>
	<option value="Sylhet" >Sylhet</option>
	<optgroup title="Dhaka" label="&raquo; Dhaka Division"></optgroup>
	<option value="Narsingdi" >Narsingdi</option>
	<option value="Gazipur" >Gazipur</option>
	<option value="Shariatpur" >Shariatpur</option>
	<option value=" Narayanganj" > Narayanganj</option>
	<option value=" Tangail " > Tangail</option>
	<option value="Kishoreganj" >Kishoreganj</option>
	<option value="Manikganj" >Manikganj</option>
	<option value="Dhaka" >Dhaka</option>
	<option value="Munshiganj" >Munshiganj</option>
	<option value="Rajbari" >Rajbari</option>
	<option value="Madaripur" >Madaripur</option>
	<option value="Gopalganj" >Gopalganj</option>
	<option value="Faridpur" >Faridpur</option>
	<optgroup title="Rangpur" label="&raquo; Rangpur Division"></optgroup>
	<option value="Panchagarh" >Panchagarh</option>
	<option value="Dinajpur" >Dinajpur</option>
	<option value="Lalmonirhat" >Lalmonirhat</option>
	<option value="Nilphamari" >Nilphamari</option>
	<option value="Gaibandha" >Gaibandha</option>
	<option value="Thakurgaon" >Thakurgaon</option>
	<option value="Rangpur" >Rangpur</option>
	<option value="Kurigram" >Kurigram</option>
	<optgroup title="Mymensingh" label="&raquo; Mymensingh Division"></optgroup>
	<option value="Sherpur" >Sherpur</option>
	<option value="Mymensingh" >Mymensingh</option>
	<option value="Jamalpur" >Jamalpur</option>
	<option value="Netrokona" >Netrokona</option>
								</select>
							</div>
							<div class="form-group center-aligned">
								<select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;" class="form-control demo-default text-center margin10px">

									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>

								</select>
							</div>
							<div class="form-group center-aligned">
								<button type="button" class="btn btn-lg btn-default" id="search">Search</button>
							</div>
						</div>
		</div>
	</div>
</div>
<div class="container" style="padding: 60px 0 60px 0;">
	<div class="row " id="data">

		<!-- Display The Search Result -->

		<?php 
			if((isset($_GET['city']) && !empty($_GET['city'])) && (isset($_GET['blood_group']) && !empty($_GET['blood_group']))){
				$city = $_GET['city'];
				$blood_group = $_GET['blood_group'];
				$sql = "SELECT * FROM donor WHERE city='$city'
				 AND blood_group='$blood_group'";
				$result = mysqli_query($connection,$sql);
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)){
						if($row['save_life_date']=='0'){
							echo '<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
							<span class="name">'.$row['name'].'</span>
							<span class="donated">Donated blood '.$row['how_many_time'].' times</span>
							<span>'.$row['city'].'</span>
							<span>'.$row['blood_group'].'</span>
							<span>'.$row['gender'].'</span>
							<span>'.$row['email'].'</span>
							<span>'.$row['contact'].'</span>
							
							</div>';
						}else{
							echo '<div class="col-md-3 col-sm-12 col-lg-3 donors_data">
							<span class="name">'.$row['name'].'</span>
							<span class="donated">Donated blood '.$row['how_many_time'].' times</span>
							<span>'.$row['city'].'</span>
							<span>'.$row['blood_group'].'</span>
							<span>'.$row['gender'].'</span>
							<h4 class="name text-center">Donated</h4>
							</div>';
						}
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Data not found.</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>';
				}
			}
		?>

	</div>
</div>
<div class="loader" id="wait">
	<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i>
</div>
<?php 

	//include footer file
	include ('include/footer.php');

?>

<script type="text/javascript">
	$(function(){

		$("#search").on('click',function(){

			var city = $("#city").val();
			var blood_group = $("#blood_group").val();

			$.ajax({
				type: 'GET',
				url: 'ajaxsearch.php',
				data:{city:city,blood_group,blood_group},
				success:function(data){
					if(!data.error){
						$("#data").html(data);
					}
				}
			});
		});
	});
</script>
