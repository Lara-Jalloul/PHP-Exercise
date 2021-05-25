<?php

$username = 'Lara';
$password = 'lara1234';

if ($_POST['Username'] != $username) {
    echo '<h2> Wrong username</h2>';
} elseif ($_POST['Password'] != $password) {
    echo '<h2> Wrong password</h2>';
} else {
    echo '<h2>Login Successful</h2>';
    echo "<div >";
    echo "Hi Lara<br><br>";
    echo "You username is : lara<br><br>";
    echo "You password is: lara1234 <br><br>";
    echo "Your email is: lara@gmail.com<br><br>";
    echo "Your phone number is: 70******<br><br>";
    echo "Your birthday is:  1/1/1999 <br><br>";
    echo "Your social security number is: 123<br><br>'";
    echo '</div>';
}

?>

