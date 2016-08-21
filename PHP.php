<?php
 if (isset($_POST['upload'])) {
  $file=$_FILES['sekil']['tmp_name'];
  $fileName=$_FILES['sekil']['name'];
  $fileSize=$_FILES['sekil']['size'];
  
  $target_dir = "uploads/";
  $target_file = $target_dir.basename($_FILES["sekil"]["name"]);

  $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
   
    if ($fileType=='jpg' || $fileType=='png' || $fileType=='gif') {
         move_uploaded_file($file,$target_file);

       if (is_dir( $target_dir)) {
          if ($open=opendir($target_dir)) {
              while ($img=readdir($open)!= false ){
                if ($img !=='.' || $img !=='..')  
                    echo "<img src=uploads/" .$fileName. " height=200 width=200 />"; 
                }
              closedir($open);
            }
        }  
    }
     else{
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
 }
?>
 <!DOCTYPE html>
<html>
<head>
  <title></title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style>

  </style>
</head>
<body>
 <div class="container">
            <div class="row">
                <?php
                echo date('d-M-y G:i:s');
                ?>
                <div class="col-md-6 col-md-offset-3">
                    <h3 class="title">Qeydiyyat</h3>
                    <form method="post" action="upload.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Adı">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="place" placeholder="Yer adı">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="sekil">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default pull-right" type="submit" value="Yukle" name="upload">
                        </div>
                    </form>
                </div>
                <br><br><br><br>
               
                <div class="row"> 
                    <div class="col-md-12">
                      
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Yükləyən</th>
                                    <th>Yer</th>
                                    <th>Şəkil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                      
                                    </td>
                                    <td>Quba</td>
                                    <td>
                                        <img width="128" src="uploads/19082016152158photo.jpg" class="img-responsive">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
