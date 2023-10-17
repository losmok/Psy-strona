<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div class="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div class="left">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div class="right1">
        <h2>Zapisz się</h2>
        <!-- Formularz -->
        <form action="" method="POST">
            <label for="login">Login: </label><input type="text" id="login" name="login"><br>
            <label for="haslo">Hasło: </label><input type="password" id="haslo" name="password"><br>
            <label for="rpassword">Powtórz hasło: </label><input type="password" name="rpassword"><br>
            <button name="submit">Zapisz</button>
        </form>
        <!-- SCRIPT -->
        <?php 
            if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['rpassword'])) {
                $conn = mysqli_connect("localhost","root","","psy");
                $login = ($_POST['login']);
                $haslo = ($_POST['password']);
                $haslo2 = ($_POST['rpassword']);
                if ($haslo != '' && $login != '' && $haslo2 != '') {
                    $zapytanie = "SELECT login FROM `uzytkownicy`;";
                    $res = mysqli_query($conn, $zapytanie);
                    $name = (mysqli_fetch_row($res));
                    if ($name[0] == $login) {
                    echo "<p>Login znajduje się już w bazie danych</p>";
                    } else {
                        if ($haslo == $haslo2) {
                            $haslo = SHA1($_POST['password']);
                            $haslo2 = SHA1($_POST['rpassword']);
                            $zapytanie2 = "INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`) VALUES ('','$login','$haslo');";
                            $res2 = mysqli_query($conn,$zapytanie2);
                            echo "<p>Hasła są takie same, konto zostało dodane</p>";
                        } else {
                            echo "<p>Hasła nie są takie same</p>";
                        }
                    }
                } else {
                    echo "<p>Wypełni wszystkie pola</p>";
                }
               
               
               
               
               
        
                    
            
                
                
                
                
                
                
                
                // if ($haslo != '' && $login != '' && $haslo2 != '') {
                    
                //     if (mysqli_num_rows($res) > 0) {
                //         echo "Login znajduje się w bazie danych, konto nie zostało dodane";
                //     } else {
                //         echo "W bazie danych nie ma takiego loginu";
                //     }
                // }
                // else {
                //     echo "<p>Wypełni wszystkie pola</p>";
                // }
            };




            // mysqli_close($conn);
        ?>
    </div>
    <div class="right2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <div class="footer">
    Stronę wykonał: Paweł Lewandowski
    </div>
</body>
</html>