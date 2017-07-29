<html>
<head>
<title>Les grimpeus</title>
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body bgcolor="#ffFFFF">
 
	<div id="dor"><center><h1><u>Livre D'or</u></H1></center>
	<p>

	<form action="index.php?voix=4&<?=SID?>&action=2" method="post">
		<?php
		if(isset($_GET['action']) AND $_GET['action'] == 2)
		{
			$resultValue = saveMessageInDB(); //sagt, ob gespeichert oder fehler, wenn fehler, die nummer des feldes
			switch($resultValue)
			{
			case 0;
			?>
			<p>Votre nom: <br><input type="text" name="name" /></p>
			<p>Votre Prénom: <br><input type="text" name="prename" /></p>
			<p>Votre Texte<br>
			<textarea name="text" ROWS="8" COLS="30" ></TEXTAREA></p>
			<p><font color="white">Votre e-mail:</font> <br><input type="text" name="mail" /></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">stocké avec succès</font>
			<?php
			break;
			case 1;
			?>
			<p>Votre Nom: <br><input type="text" name="name" /></p>
			<p>Votre Prénom: <br><input type="text" name="prename" value="<?=$_POST['prename']?>"/></p>
			<p>Votre Text<br>
			<textarea name="text" ROWS="8" COLS="30"  ><?=$_POST['text']?></TEXTAREA></p>
			<p><font color="white">Votre e-mail:</font> <br><input type="text" name="mail" value="<?=$_POST['mail']?>"/></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">Nom trop longtemps</font>
			<?php
			break;
			case 2;
			?>
			<p>Votre Nom: <br><input type="text" name="name" value="<?=$_POST['name']?>" /></p>
			<p>Votre Prénom: <br><input type="text" name="prename"/></p>
			<p>Votre Text<br>
			<textarea name="text" ROWS="8" COLS="30" ><?=$_POST['text']?></TEXTAREA></p>
			<p><font color="white">Votre e-mail:</font> <br><input type="text" name="mail" value="<?=$_POST['mail']?>"/></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">Prénom trop longtemps </font>
			<?php
			break;
			case 3;
			?>
			<p>Votre Nom: <br><input type="text" name="name" value="<?=$_POST['name']?>" /></p>
			<p>Votre Prénom: <br><input type="text" name="prename" <?=$_POST['prename']?>/></p>
			<p>Votre Text<br>
			<textarea name="text" ROWS="8" COLS="30"><?=$_POST['text']?></TEXTAREA></p>
			<p><font color="white">Votre e-mail:</font> <br><input type="text" name="mail"/></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">E-mail trop longtemps </font>
			<?php
			break;
                        case 4;
			?>
			<p>Votre Nom: <br><input type="text" name="name" value="<?=$_POST['name']?>" /></p>
			<p>Votre Prénom: <br><input type="text" name="prename" <?=$_POST['prename']?>/></p>
			<p>Votre Text<br>
			<textarea name="text" ROWS="8" COLS="30"><?=$_POST['text']?></TEXTAREA></p>
			<p><font color="white">Votre e-mail:</font> <br><input type="text" name="mail"/></p>
			<p><input type="submit" /></p>
			<font color="#FF0000">E-mail Incorrecte </font>
			<?php
			break;
			}
		}
		else
		{
		?>
			<p>Votre Nom: <br><input type="text" name="name" /></p>
			<p>Votre Prénom: <br><input type="text" name="prename" /></p>
			<p>Votre Text<br><textarea name="text" ROWS="8" COLS="30" ></TEXTAREA></p>
			<p><font color="white">Votre e-mail:</font> <br><input type="text" name="mail" /></p>
			<p><input type="submit" /></p>
		<?php
		}
		?>		  	
		</form>
		<hr>
		<?php
		loadMessagesFromDB('dbGrimpe')
		?>
	 
	</p> 
	 
</div>

<?php

function saveMessageInDB()
{
	$name = $_POST['name'];
	$prename = $_POST['prename'];
	$message = $_POST['text'];
	$mail = $_POST['mail'];
	

	//Falls der User die Länge der Textbox überschreitet, wird die Nummer des Textfeldes zurückgegeben
	if(strlen($name) >= 50)
	{
		return 1;
	}
        
        if(strlen($name) == strlen($prename)) 
	{
		if(strlen($prename) == 0)
          {
                  $name="Anonymous";
          }
	}
                
	if(strlen($prename) >= 50)
	{
		return 2;
	}
	
	if(strlen($mail) >= 50)
	{
		return 3;
	}
        
        if(strlen($mail) != 0)
	{
           if(ereg("@","$mail"))
              {return 0;} 
            else 
              {return 4;} 
	}
        
	
	$connection = connectDB('dbGrimpe');
	$sqlQuerry = "INSERT INTO tbgaestebuch (prename , name , message ,mail, dateTime ) VALUES ('".$prename."', '".$name."', '".$message."', '".$mail."',NOW())";
	
	mysql_query($sqlQuerry,$connection);
	
	mysql_close($connection);
	return 0;
}


function connectDB($datebank)
{
	$linkID = mysql_connect('localhost', 'grimpe', '3Aw030785') OR die(mysql_error());
	mysql_select_db($datebank, $linkID) OR die(mysql_error());
	return $linkID;
}
 
function loadMessagesFromDB($datebank)
{
	$connection = connectDB($datebank);
	$sqlQuerry = "SELECT * FROM tbgaestebuch ORDER BY dateTime DESC";
	$result = mysql_query($sqlQuerry,$connection);

	while($message= mysql_fetch_array($result))		//schlaufenweise werden nun die wörter mit dem test und dem titel verglichen
	{
		?>
		<div id="Message">
		From:<br>
                <I><B> <?=$message['name']?> <?=$message['prename']?></B>  <?=$message['dateTime']?></I>  <a href="mailto:<?=$message['mail']?>"><?=$message['mail']?></a>
		<p><?=$message['message']?>
		</p>
		</div>
		<hr>
		<?php
	}	
	mysql_close($connection);
}
?>


</body>
</html>




