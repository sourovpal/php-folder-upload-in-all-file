<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folder Upload</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <h2>Folder Upload</h2>

    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" id="folderInput" webkitdirectory directory multiple>
        <button type="submit">Upload Folder</button>
    </form>

    <div id="uploadStatus"></div>

    <script>
    $(document).ready(function() {
        $('#uploadForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData();
            var files = $('#folderInput')[0].files;
            var folderName = null;
            for (file of files) {
                if (!folderName) {
                    folderName = file.webkitRelativePath.split('/').shift();
                    formData.append('folder_name', folderName);
                }
                formData.append('folder[]', file);
            }
            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response)
                    $('#uploadStatus').html(response);
                }
            });
        });
    });
    </script>

</body>

</html>