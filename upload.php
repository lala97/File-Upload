<?php  
 if (isset($_POST['upload'])) {
 	$text=$_POST['name']."|".$_POST['place']."|".date('dmYGis').$_FILES['sekil']['name']."@@##@@";
 	$myFile=fopen("file.txt", "a+") or die("Unable to open file!");
 	fwrite($myFile,$text);
 	fclose($myFile);

 	$file=$_FILES['sekil']['tmp_name'];
    $fileName=$_FILES['sekil']['name'];

    $target_dir="uploads/";
  	$target_file = $target_dir.date('dmYGis').basename($_FILES["sekil"]["name"]);
  	echo "$target_file";
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
  	 chmod("uploads/", 0777);

	if ( $fileType=="jpg" || $fileType=="png" || $fileType=="gif") {
			move_uploaded_file($file, $target_file);
			header('Location:index.php');
		}
	else{
		echo "Bu fayl uygun deyl";
	}
 	
	
 }
?>
