<!DOCTYPE html>
<html>
<head>
    <title>Bild Upload</title>
</head>
<body>

<h2>Bild hochladen</h2>

<form action="<?= base_url('upload/store') ?>" method="post" enctype="multipart/form-data">
<!-- enctype="multipart/form-data" -> zum Übertragen der dateien -->
    <?= csrf_field() ?>

    <input type="file" name="cat_image">

    <br><br>

    <button type="submit">Upload</button>

</form>

</body>
</html>