<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome</title>
</head>
<body style="background-color:black;color:white;" >
<h1 style="text-align:center;"> Palindrome String</h1>
    <div style="text-align:center; height:200px;">
    <form action="#" method="GET">
        <label style="font-size:40px;">Enter a string</label>
        <input type="text" name="str" ><br><br>
        <input type="submit" name="submit" value="Check" style="width:100px; height:40px;">
    </form>
    </div>
    <hr>
    <?php 
    if(isset($_GET['submit'])){
    function palindrome($str){
        $str_len = strlen($str) - 1;
        $output= '';
        for($x = $str_len; $x>=0 ; $x--){
            $output .= $str[$x];
        }
        if($output == $str){
            echo '<h2 style="text-align:center;font-size:50px;"> True </h2>';
        }else{
            echo '<h2 style="text-align:center;font-size:50px;"> False </h2>';
        }
    }
    palindrome($_GET['str']);
}
     ?>
   
</body>
</html>