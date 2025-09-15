<?php
$name = null;
            if (isset($_POST['submit'])) {
                $file = $_FILES['file'];
                $name = $file['name'];
                $tmp = $file['tmp_name'];
                $size = $file['size'];
                $type = $file['type'];
                $folder = "uploads/";

                $maxSize = 2 * 1024 * 1024;
                $allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                    'application/pdf',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ];


                if (!is_dir($folder)) mkdir($folder, 0777, true);

                if ($size > $maxSize) die("File is too large. Max allowed: " . ($maxSize / 1024 / 1024) . " MB");

                if (!in_array($type, $allowedTypes)) die("Invalid file type: $type");

                if (move_uploaded_file($tmp, $folder . $name)) {
                    echo "<p style='text-align:center'>File uploaded successfully: $name </p>";
                } else {
                    echo "Failed to upload file.";
                }
            }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload File</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }

        .upload-box {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #109092ff;
            border-radius: 8px;
        }

        input[type=file] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 50%;
            padding: 10px;
            background: #109092ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        embed,
        img {
            margin-top: 15px;
            border-radius: 5px;
            max-width: 100%;
            height: 300px;
        }
    </style>
</head>

<body>
    <div class="upload-box">
        <h2>Upload a File</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Upload</button>
        </form>
        <?php if ($name && file_exists("uploads/" . $name)): ?>
            <embed src="uploads/<?php echo $name ?>" width="300" height="500">
        <?php endif; ?>

    </div>
</body>

</html>