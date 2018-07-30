<?php

$firstname= filter_input(INPUT_POST, "Firstname");
$lastname= filter_input(INPUT_POST, "Lastname");
$phone= filter_input(INPUT_POST, "phone");
$pass= filter_input(INPUT_POST, "password");

if(!empty($firstname))
{
	if(!empty($lastname))
	{
		if(!empty($phone))
		{
			if(!empty($pass))
			{

				$host= "localhost";
				$dbusername= "root";
				$dbpassword= "";
				$dbname= "chihiroa";

				$consql= new mysqli($host, $dbusername, $dbpassword, $dbname);
				if(mysqli_connect_error())
				{
					die("Connecting to SQL is ERROR('.mysql_connect_error().')". mysql_connect_error());
				}
				else
				{
					$sql= "INSERT INTO account(Firstname, Lastname, phone, password) values('$firstname', '$lastname', '$phone', '$pass')";/*← valuesの中は、""だとエラーになる。*/

						if($consql-> query($sql))
						{
							echo "Your account created correctly";
						}
						else
						{
							echo "Error Please fill the form correctly". $sql. "<br>". $consql->error;
						}
						$consql-> close();
				}
			}

			else
			{
				echo "Password cannot be empty!!";
			}
		}

		else
		{
			echo "Phone number cannot be empty!!";
			die();
		}	
	}

	else
	{
		echo "Lastname cannot be empty!!";
		die();
	}
}
else
{
	echo "Firstname cannot be empty!!";
	die();
}

?>