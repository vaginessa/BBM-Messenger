<? session_start();


							
								$tablename="Users";
								
								$ColumnName2="Password";
								$ColumnValue2=htmlspecialchars($_POST['Password']);
								$ColumnName3="SaltString";
								$ColumnValue3=htmlspecialchars($_POST['SaltString']);
								$ColumnName4="NewPassword";
								$ColumnValue4=htmlspecialchars($_POST['NewPassword']);
								$ColumnName5="ConfirmPassword";
								$ColumnValue5=htmlspecialchars($_POST['ConfirmPassword']);
							
								$EmailAddress=($_POST['EmailAddress']);
								
	if (isset($ColumnValue4)&& isset($ColumnValue5)){
		//============= Check to see if new password1 = new password 2 ==============================
	if (trim($ColumnValue4) != trim($ColumnValue5))
	{
		echo "<p style='vertical-align: middle; width: 800px; text-align: center; font-size: 44pt; font-family: Arial; color:black; background-color: red;'>";
		echo "Your new passwords do not match.  Press the back button and try again </p>"; 
		exit;
	}else{
		changeThePassword($ColumnValue4);
	}
}else{
	echo "NewPassword IS BLANK or ConfirmPassword";
	echo $ColumnValue4;
	echo $ColumnValue5; 
}






function changeThePassword($ColumnValue4){
	
	
	$EmailAddress=$_POST['EmailAddress'];
	$ColumnValue4 = hash(sha256,SaltString, $ColumnValue4);
	
		//$sql="UPDATE Users SET 	WHERE Password='$Password'";
		$sql="UPDATE Users SET Password='$ColumnValue4' WHERE EmailAddress='$EmailAddress'";
	
		
	//echo "$sql<br><br>";
	
	/////////////////////// Update Database ///////////////////////////////////////////////////////
		include "Student6.ConnectString.php";
			if (mysqli_query($connect, $sql)) 
			{
				echo "<h3>Your new password is (For security reasons your password will be shown encrypted):" .$ColumnValue4. "</h3>";
				//header("Location:BBM-Modal.php");
			} else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}



}

?>