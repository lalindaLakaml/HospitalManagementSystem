<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>


<body >
	<form name = "frmMain" id = "frmMain"  action = "dbupdate\chagepassword.php"  method = "post" onsubmit="JavaScript:return test();">
<table>
	<tr >
		<th colspan="2">Change Password</th>
		
	</tr>
	<tr>
		<td>Current Password  :</td>
		<td><input type="password" size="25" name="pass"  required><br></td>
	</tr>

	
	<tr>
		<td>New Password  :</td>
		<td><input type="password" size="25" name="newpass" id="txtPassword" required><br></td>
	</tr>
	<tr>
		<td>Confirm Password :</td>
		<td><input type="password" size="25" name="conpass" id="txtConfirm" required><br></td>
	</tr>	
	
<tr>
		<td></td>
		<td><input type="submit" size="20" name="sub" onclick="validatePassword('ddd');" value="Login" align="left" class="btn btn-danger" ><br></td>
	</tr>	
	


</table>
</form>


</body>

</html>
