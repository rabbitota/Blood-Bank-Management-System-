<?php 
    include "include/header.php";
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

        $sql = "SELECT * FROM stoke";
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

            

            for($i=0; $i<15; $i++){
                //echo $blood_group[$i];
                $sqql = "UPDATE `stoke` SET `blood`='$update_amount[$i]' WHERE name='$blood_group[$i]'";
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
        $zero = 0;
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
        <header>Update Stoke</header>

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
                            <input type="text" name="A+" placeholder="stoke of A+" value="<?php if(isset($blood_amount[0])){ if($blood_amount[0]>0){echo $blood_amount[0];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">A-</label>
                            <input type="text" name="A-" placeholder="stoke of A-" value="<?php if(isset($blood_amount[1])){ if($blood_amount[1]>0){echo $blood_amount[1];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">B+</label>
                            <input type="text" name="B+" placeholder="stoke of B+" value="<?php if(isset($blood_amount[2])){ if($blood_amount[2]>0){echo $blood_amount[2];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">B-</label>
                            <input type="text" name="B-" placeholder="stoke of B-" value="<?php if(isset($blood_amount[3])){ if($blood_amount[3]>0){echo $blood_amount[3];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">AB+</label>
                            <input type="text" name="AB+" placeholder="stoke of AB+" value="<?php if(isset($blood_amount[4])){ if($blood_amount[4]>0){echo $blood_amount[4];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">AB-</label>
                            <input type="text" name="AB-" placeholder="stoke of AB-" value="<?php if(isset($blood_amount[5])){ if($blood_amount[5]>0){echo $blood_amount[5];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">O+</label>
                            <input type="text" name="O+" placeholder="stoke of O+" value="<?php if(isset($blood_amount[6])){ if($blood_amount[6]>0){echo $blood_amount[6];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">O-</label>
                            <input type="text" name="O-" placeholder="stoke of O-" value="<?php if(isset($blood_amount[7])){ if($blood_amount[7]>0){echo $blood_amount[7];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">PLASMA</label>
                            <input type="text" name="PLASMA" placeholder="stoke of PLASMA" value="<?php if(isset($blood_amount[8])){ if($blood_amount[8]>0){echo $blood_amount[8];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">RBC</label>
                            <input type="text" name="RBC" placeholder="stoke of RBC" value="<?php if(isset($blood_amount[9])){ if($blood_amount[9]>0){echo $blood_amount[9];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">WBC</label>
                            <input type="text" name="WBC" placeholder="stoke of WBC" value="<?php if(isset($blood_amount[10])){ if($blood_amount[10]>0){echo $blood_amount[10];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">PLATILATE</label>
                            <input type="text" name="PLATILATE" placeholder="stoke of PLATILATE" value="<?php if(isset($blood_amount[11])){ if($blood_amount[11]>0){echo $blood_amount[11];}else echo $zero;} ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="">HIMOGLOBIN</label>
                            <input type="text" name="HIMOGLOBIN" placeholder="stoke of HIMOGLOBIN" value="<?php if(isset($blood_amount[12])){ if($blood_amount[12]>0){echo $blood_amount[12];}else echo $zero;} ?>" required>
                        </div>

                        <div class="input-field">
                            <label for="">BOMBAY</label>
                            <input type="text" name="BOMBAY" placeholder="stoke of BOMBAY" value="<?php if(isset($blood_amount[13])){ if($blood_amount[13]>0){echo $blood_amount[13];}else echo $zero;} ?>" required>
                        </div>
                        
                        <div class="input-field">
                            <label for="">cis-AB</label>
                            <input type="text" name="cis-AB" placeholder="stoke of cis-AB" value="<?php if(isset($blood_amount[14])){ if($blood_amount[14]>0){echo $blood_amount[14];}else echo $zero;} ?>" required>
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