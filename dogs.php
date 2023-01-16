<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Random dog photo</title>
</head>
<body>
    <div class="menu">
        <a href="converter.php" >Conventer</a>
        <a href="dogs.php" class="active">Dogs</a>
    </div>
    
    <form action="" method="get">
        <label for="rasa">Choose a dog breed:</label>
        <select id="rasa" name="breed" value="<?php $_GET['breed'] ?>">
        <?php
            $data = file_get_contents('https://dog.ceo/api/breeds/list/all');

            if ($data === false) {
                echo 'Wystąpił błąd podczas pobierania danych z API.';
                exit;
            }
            
            $breeds = json_decode($data, true);
            if ($breeds === null) {
                echo 'Dane z API nie są w formacie JSON.';
                exit;
            }
            
            if ($breeds['status'] !== 'success') {
                echo 'API zwróciło błąd: ' . $breeds['message'];
                exit;
            }
            
            
            foreach ($breeds['message'] as $breed => $subbreeds) {
                if ($_GET['breed']==$breed) {
                    echo '<option selected value="' . $breed . '">' . ucwords($breed) . '</option>';
                }else{
                    echo '<option value="' . $breed . '">' . ucwords($breed) . '</option>';
                }
                
              
            }
            
        ?> 
        </select>
        <input type="submit" value="Random photo" name="ok">
       
    </form>
    <div id="fota">
        <?php
         if(isset($_GET['breed'])) 
         {
            $breed = $_GET['breed'];
            $data = file_get_contents('https://dog.ceo/api/breed/' . $breed . '/images/random');
            $image = json_decode($data, true);
            if ($image['status'] === 'success') {
                echo '<img src="' . $image['message'] . '" alt="' . $breed . '">';
            } else {
                echo 'Wystąpił błąd: ' . $image['message'];
            }
        
         }
         ?>
    </div>
    <footer>
        <p>
            Created by Rafał Kosowski &copy; 2023
        </p>
    </footer>
</body>
</html>



