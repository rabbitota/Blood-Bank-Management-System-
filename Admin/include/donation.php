<?php 
    include "include/header.php";
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

        $sql = "SELECT * FROM todayd";
        $count =0;
        $result = mysqli_query($connection,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $blood_group[$count] = $row['name'];
                $count = $count+1;
            }
        }

        if(isset($_POST['submit'])){
            $update_amount[0] = $_POST['A+'];
            $update_amount[1] = $_POST['A-'];
            $update_amount[2] = $_POST['B+'];
            $update_amount[3] = $_POST['B-'];
            $update_amount[4] = $_POST['AB+'];
            $update_amount[5] = $_POST['AB-'];
            $update_amount[6] = $_POST['O+'];
            $update_amount[7] = $_POST['O-'];
            $update_amount[8] = $_POST['PLASMA'];
            $update_amount[9] = $_POST['RBC'];
            $update_amount[10] = $_POST['WBC'];
            $update_amount[11] = $_POST['PLATILATE'];
            $update_amount[12] = $_POST['HIMOGLOBIN'];
            $update_amount[13] = $_POST['BOMBAY'];
            $update_amount[14] = $_POST['cis-AB'];

            $ssql = "SELECT * FROM stoke";
            $count =0;
            $result = mysqli_query($connection,$ssql);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $stoke_amount[$count] = $row['blood'];
                    $count = $count+1;
                }
            }
            $count = 0;
            for($i=0; $i<15; $i++){
                $update_stoke[$count] = $stoke_amount[$count] - $update_amount[$count];
                $count = $count+1;
            }

            
            $count = 0;
            for($i=0; $i<15; $i++){
                //echo $blood_group[$i];
                $sqql = "UPDATE `todayd` SET `blood`='$update_amount[$i]' WHERE name='$blood_group[$i]'";
                $sqll = "UPDATE `stoke` SET `blood`='$update_stoke[$i]' WHERE name='$blood_group[$i]'";
                $res = mysqli_query($connection,$sqll);
                if(mysqli_query($connection, $sqql)){
					$updateSuccess= '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Data updated successfully.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
					
				}else{
					$updateError= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Data not updated. Try again.</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
				}
            }
        }
        $count =0;
        $result = mysqli_query($connection,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $blood_amount[$count] = $row['blood'];
                $count = $count+1;
            }
        }

        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="upd_blood.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>Today's Donation</header>

        <?php 
            if(isset($updateError)) echo $updateError;
			if(isset($updateSuccess)) echo $updateSuccess;
		?>

        <form method="post">
            <div class="form first">
                <div class="detail personal">

                    <div class="fields">
                        <div class="input-field">
                            <label for="">A+</label>
                            <input type="text" name="A+" placeholder="Donation of A+" value="<?php if(isset($blood_amount[0])) echo $blood_amount[0]; ?>">
                        </div>

                        <div class="input-field">
                            <label for="">A-</label>
                            <input type="text" name="A-" placeholder="Donation of A-" value="<?php if(isset($blood_amount[1])) echo $blood_amount[1]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">B+</label>
                            <input type="text" name="B+" placeholder="Donation of B+" value="<?php if(isset($blood_amount[2])) echo $blood_amount[2]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">B-</label>
                            <input type="text" name="B-" placeholder="Donation of B-" value="<?php if(isset($blood_amount[3])) echo $blood_amount[3]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">AB+</label>
                            <input type="text" name="AB+" placeholder="Donation of AB+" value="<?php if(isset($blood_amount[4])) echo $blood_amount[4]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">AB-</label>
                            <input type="text" name="AB-" placeholder="Donation of AB-" value="<?php if(isset($blood_amount[5])) echo $blood_amount[5]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">O+</label>
                            <input type="text" name="O+" placeholder="Donation of O+" value="<?php if(isset($blood_amount[6])) echo $blood_amount[6]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">O-</label>
                            <input type="text" name="O-" placeholder="Donation of O-" value="<?php if(isset($blood_amount[7])) echo $blood_amount[7]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">PLASMA</label>
                            <input type="text" name="PLASMA" placeholder="Donation of PLASMA" value="<?php if(isset($blood_amount[8])) echo $blood_amount[8]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">RBC</label>
                            <input type="text" name="RBC" placeholder="Donation of RBC" value="<?php if(isset($blood_amount[9])) echo $blood_amount[9]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">WBC</label>
                            <input type="text" name="WBC" placeholder="Donation of WBC" value="<?php if(isset($blood_amount[10])) echo $blood_amount[10]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">PLATILATE</label>
                            <input type="text" name="PLATILATE" placeholder="Donation of PLATILATE" value="<?php if(isset($blood_amount[11])) echo $blood_amount[11]; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="">HIMOGLOBIN</label>
                            <input type="text" name="HIMOGLOBIN" placeholder="Donation of HIMOGLOBIN" value="<?php if(isset($blood_amount[12])) echo $blood_amount[12]; ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">BOMBAY</label>
                            <input type="text" name="BOMBAY" placeholder="Donation of BOMBAY" value="<?php if(isset($blood_amount[13])) echo $blood_amount[13]; ?>" required>
                        </div>
                        
                        <div class="input-field">
                            <label for="">cis-AB</label>
                            <input type="text" name="cis-AB" placeholder="Donation of cis-AB" value="<?php if(isset($blood_amount[14])) echo $blood_amount[14]; ?>" required>
                        </div>

                    </div>

                    <div class="form-group">
				        <button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">Update</button>
			        </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>


<?php 
    }else{
        header("Location:../index.php");
    }
    include 'include/footer.php'; 
?>