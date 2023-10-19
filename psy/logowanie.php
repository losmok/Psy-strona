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
           <?php 
           if (isset($_POST['submit'])) { // sprawdzanie czy formularz został kliknięty
               if (
                   empty($_POST['login']) &&
                   empty($_POST['password']) && 
                   empty($_POST['rpassword'])
               ) { // sprawdzanie czy wszystkie pola zostały wypełnione
                   echo "<p>Wypełni wszystkie pola</p>";
               }
           
               $login = $_POST['login'];
               $haslo = $_POST['password'];
               $haslo2 = $_POST['rpassword'];
           
               if ($haslo != $haslo2) { // sprawdzanie czy hasła nie są takie same, jeżeli nie są wyświetl błąd i zakończ działanie aplikacji
                   echo "<p>Hasła nie są takie same</p>";
                   die;
               } 
           
               $conn = mysqli_connect("localhost","root","","psy");
               $zapytanie = "SELECT login FROM uzytkownicy WHERE login = '$login';"; // sprawdzanie czy taka nazwa użytkownika istnieje w bazie danych
               $res = mysqli_query($conn, $zapytanie);
               $res = mysqli_fetch_row($res);
           
               if ($res){ // sprawdź czy użytkownik o takim loginie istnieje w bazie danych jak nie wyświetl błąd
                   echo "<p>Login znajduje się już w bazie danych</p>";
                   die;
               }
           
               $haslo = SHA1($haslo);
               $zapytanie2 = "
                   INSERT INTO uzytkownicy (login, haslo) 
                   VALUES ('$login','$haslo');
               ";
               $res2 = mysqli_query($conn, $zapytanie2);
           
               if (!$res2) { // sprawdź czy dodało użytkownika do bazy jak nie wyświetl błąd
                   echo "<p>Coś poszło nie tak!</p>";
                   die;
               }
           
               echo "<p>Hasła są takie same, konto zostało dodane</p>";
           }
                
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