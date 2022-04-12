<?php
$message = "";
$item_id = $_GET['item_id'] ?? 1;
// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){     

$userid = $_SESSION['id'];


// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["imagename"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

 // Allow certain file formats
 $allowTypes = array('jpg','png','jpeg','gif','pdf','jfif');
 if(in_array($fileType, $allowTypes)){
     // Upload file to server
     if(move_uploaded_file($_FILES["imagename"]["tmp_name"], $targetFilePath)){
         $Edit->editBook($_POST['author'], $_POST['bookname'], $userid, $_POST['stock'], $targetFilePath, $item_id );
         header("Location: ./index.php");
     }else{
         $message = "Sorry, there was an error uploading your file.";
     }
 }else{
     $message = 'Sorry, only JPG, JPEG, PNG, GIF,jfif, & PDF files are allowed to upload.';
 }


}
?>
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>
<section>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div style="margin-top:80px; margin-bottom:80px" class="col-md-6">
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="bookname" class="form-label">Book name</label>
    <input name="bookname" placeholder="<?php echo $item['item_name'] ?>" type="text" class="form-control" id="username" aria-describedby="bookname" required>
  </div>
  <div class="mb-3">
    <label for="author" class="form-label">Author</label>
    <input name="author" placeholder="<?php echo $item['item_brand'] ?>" type="text" class="form-control" id="author" required>
  </div>
  <div class="mb-3">
    <label for="stock" class="form-label">Number of books in Stock</label>
    <input name="stock" placeholder="<?php echo $item['item_stork'] ?>" type="text" class="form-control" id="stock" required>
  </div>
  <div class="form-group">
    <label for="imagename">Upload image</label>
    <input  name="imagename" type="file" class="form-control-file" id="imagename" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br/>
<a style="color:red;background-color: rgb(235, 235, 182);border-raduis:3px;"><?php echo $message ?></a>
</div>
<div class="col-md-3"></div>
</div>
</div>
<section>
<?php
        endif;
        endforeach;
?>