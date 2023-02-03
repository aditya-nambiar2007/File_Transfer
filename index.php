<form enctype="multipart/form-data" method="post" >
<input type="file" multiple="multiple" name="upload[]" style="display: block; font-weight:normal;" >
<input type="submit" value="UPLOAD" >
<div>
<?php 
$arr=scandir("DIR/");
for( $i=2 ; $i < count($arr) ; $i++ ) {
$x=$arr[$i];
echo "<a href='DIR/".$x."'>".$x."</a>";
}
?>
</div>
</form>
<style type="text/css">

form {margin-bottom:10vmin;}
a {
	background-color:orange;
	color:navy;
	outline:1px solid black;
		display:block;}
*{margin:1vmin;
	font-weight:bolder;
	font-size:5vmin;

}
</style>
<span style="display:block; margin:1vmin">

<?php

if(isset($_FILES["upload"]))
{$files = array_filter($_FILES['upload']['name']); 
$total_count = count($_FILES['upload']['name']);

for( $i=0 ; $i < $total_count ; $i++ ) {
   $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
   if ($tmpFilePath != ""){
      $newFilePath = "DIR/" .$_FILES['upload']['name'][$i];
    for( $io=1 ; $io < count($arr) ; $io++ ) {
    if(!file_exists($newFilePath)){break;}
    else{$newFilePath = "DIR/".$io."-" .$_FILES['upload']['name'][$i];echo $newFilePath;}
    }
	if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      echo "UPLOADED SUCCESSFULLY!<BR><script >setTimeout(location.reload,1000)</script>";
      }else{echo "OPPS ERROR!<br><script >setTimeout(location.reload,1000)</script>";}
   }
}
}
?>
</span>