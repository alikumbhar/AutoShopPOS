<!DOCTYPE html>
<html>
<head>
	<title>View File Uploads</title>
</head>
<body>

<form action="<?php echo base_url();?>imports/uploadData" method="post" enctype="multipart/form-data">
    Upload excel file : 
    <input type="file" name="uploadFile" value="" /><br><br>
    <input type="submit" name="submit" value="Upload" />
</form>

</body>
</html>