<?php 
   $myFile=fopen("file.txt", "a+") or die("Unable to open file!");
   $fileRead=fread($myFile, filesize('file.txt'));
  
   $myList=[];
   while (!feof($myFile)) {
      $myList=fgets($myFile);
   }
    fclose($myFile);
   $myList=explode("@@##@@","$fileRead");
    foreach ($myList as $key => $value) {
       $myList[$key]=explode("|", "$value"); 
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
                                 <?php

                                foreach ($myList as $value) {
                                  echo "<tr>";
                                    if (isset($value[1])) {
                                                                            
                                  echo "<td> $value[0]</td><td> $value[1]</td><td><img src=uploads/".$value[2]." height=150 width=200/></td>";
                              }
                                  echo "</tr>";

                                            }
                                      
                                     

                                  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
