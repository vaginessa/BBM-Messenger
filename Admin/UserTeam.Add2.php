<? session_start();
/***************************************************************
	* Purpose: ADD User Email and Password by Admin
	* Created By: Allan Miller
	* Created On: 15-Dec-2016
	* Revised By: Allan Miller
	* Revised On: 15-Dec-2016	
****************************************************************/

								//===== This is how you get data from a HTML form =====
								$tablename="TeamMembers";
								$ColumnName1="UserID";
								$ColumnValue1=htmlspecialchars($_POST['UserID']);
								$ColumnName2="TeamID";
								$ColumnValue2=htmlspecialchars($_POST['TeamID']);
							
//echo $ColumnValue1;
	
				$NewRowID=AddNewRow($tablename, $ColumnName1, $ColumnValue1,$ColumnName2, $ColumnValue2);
			?>
	</center>
</body>
</html>

<?
/////////////////////////////////////////////////////////////////////////////////////////////////////////
function AddNewRow($tablename, $ColumnName1, $ColumnValue1,$ColumnName2, $ColumnValue2) 
	/***************************************************************
	* Prupose: Adds a new row to an existing table
	* Created By: Allan Miller
	* Created On: 13-Dec-2016
	* Revised By: Allan Miller
	* Revised On: 13-Dec-2016	
****************************************************************/
{
		$sql="INSERT INTO $tablename ($ColumnName1, $ColumnName2) 
		VALUES('$ColumnValue1', '$ColumnValue2')";
		
		echo $sql;		

		include "Student6.ConnectString.php";
		if (mysqli_query($connect, $sql)) 
			{
				$NewRowID=mysqli_insert_id($connect); 
				echo "<h3>Record Added:" . $NewRowID . "</h3>";
				header("Location: Admin.Manage.php");
			} else {
				//echo "Error: " . $sql . "<br>" . mysqli_error($connect);
				header("Location: Page.Error.php?Error=". mysqli_error($connect));
			}
			mysqli_close($connect);

	return $NewRowID;
} // end function