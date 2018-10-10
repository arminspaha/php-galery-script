<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Gallery Script</title>
    <style>
        img {
            width: 200px;
            height: 200px !important;
            object-fit: cover;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <p>Add new image:</p>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Uploads images" readonly>
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Select <input type="file" name="files[]" multiple="multiple" style="display: none;">
                            </span>
                        </label>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary" value="Upload" name="submit">            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <?php
                $files = glob("uploads/*.*");
                for ($i=0; $i<count($files); $i++) {
                    $image = $files[$i];
                    $supportedFiles = array('gif', 'jpg', 'jpeg', 'png');

                    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    if (in_array($ext, $supportedFiles)) {
                        
                        echo '<div class="col-md-2 img-thumbnail my-2 mx-2">';
                        echo '<img src="'.$image .'" alt="'.$image .'" class="img-fluid float-left" />';
                        echo '</div>';
                        
                    } else {
                        continue;
                    }
                }
            ?>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

