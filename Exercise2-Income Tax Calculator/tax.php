<?php 
$salary_error=$paidMethod_error=$allowance_error="";
if(isset($_POST['submit'])){
    if(empty($_POST['salary'])){
        $salary_error='Salary is required';
    }else {
        $salary =$_POST["salary"];
        if(!is_numeric($salary)){
            $salary_error = "Salary must be a number";
        }
    }
    if (empty($_POST["payment_method"])) {
        $paidMethod_error = "This field is required";
    }else {
        $paidMethod = $_POST["payment_method"];
    }
    if (empty($_POST["allowance"])) {
        $allowance_error = "Tax Free Allowance is required";
    } else {
        $allowance =$_POST["allowance"];
        if(!is_numeric($allowance)){
            $allowance_error = "This field must contain a number";
        }
    }

    $taxAmount = $nssf = $totalSalary = $allowanceType = $yearlySalary = 0;
                if (isset($paidMethod) && $paidMethod=="yearly"){
                    $yearlySalary = $salary;
                    $allowanceType = $allowance;
                    if ($yearlySalary < 10000){
                        $totalSalary = $yearlySalary + $allowanceType;
                    }
                    elseif($yearlySalary > 10000 && $yearlySalary < 25000){
                        $taxAmount = $yearlySalary * (11 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $totalAmount = ($yearlySalary - ($taxAmount + $nssf)) + $allowanceType;
                    }
                    elseif($yearlySalary > 25000 && $yearlySalary < 50000){
                        $taxAmount = $yearlySalary * (30 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $totalSalary = ($yearlySalary - ($taxAmount + $nssf)) + $allowanceType;
                    }
                    elseif($yearlySalary > 50000){
                        $taxAmount = $yearlySalary * (45 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $totalSalary = ($yearlySalary - ($taxAmount + $nssf)) + $allowanceType;
                    }
                }

                else if(isset($paidMethod) && $paidMethod=="monthly"){
                    $yearlySalary = $salary * 12;
                    $allowanceType = $allowance * 12;
                    if ($yearlySalary < 10000){
                        $totalSalary = $yearlySalary + $allowanceType;
                    }
                    elseif($yearlySalary > 10000 && $yearlySalary < 25000){
                        $taxAmount = $yearlySalary * (11 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $totalSalary = ($yearlySalary - ($taxAmount + $nssf)) + $allowanceType;
                    }
                    elseif($yearlySalary > 25000 && $yearlySalary < 50000){
                        $taxAmount = $yearlySalary * (30 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $totalSalary = ($yearlySalary - ($taxAmount + $nssf)) + $allowanceType;
                    }
                    elseif($yearlySalary > 50000){
                        $taxAmount = $yearlySalary * (45 / 100);
                        $nssf = $yearlySalary * (4 / 100);
                        $totalSalary = ($yearlySalary - ($taxAmount + $nssf)) + $allowanceType;
                    }
                }
                $monthlySalary = $monthlyTaxAmount = $monthlyNSSF= $monthlyTotalSalary  = 0;
                $monthlySalary = $yearlySalary / 12;
                $monthlyTaxAmount = $taxAmount / 12;
                $monthlyNSSF = $nssf / 12;
                $monthlyTotalSalary = $totalSalary / 12;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Tax Calculator</title>
    <style>
    body{
        background-color:coral;
    }
     .container {
            display: flex;
            margin-top: 15%;
            margin-left:15%;
        }
        table {
            margin: 0;
            width: 400px;
            line-height: 20px;
            margin: auto;
          border:1px white solid;
        }
        .alert{
      color:darkred;
      font-size:15px;
    }
    </style>
</head>
<body>
    

<div class="container">
        <form method="POST" action="#">
            <fieldset>
                <legend>Income Tax Calculator:</legend>

                <table class=main><col class=w60><col class=w40>

               <tr><td>Salary :</td>
                <td><input type="text" id="salary" name="salary">
                <label for="salary">in $ </label> </td>
                <td><span class="alert"><?php echo $salary_error;?></span></td>
                <tr><td><label> Payement Method: </label></td>
                <td> <input type="radio" name="payment_method" id="monthly" value="monthly">
                <label for="monthly">monthly</label>
                <input type="radio" name="payment_method" id="yearly"  value="yearly">
                <label for="yearly">yearly</label> </td>
                <td><span class="alert"><?php echo $paidMethod_error;?></span></td>
                </tr>
                <tr><td><label>Tax Free Allowance :</label>  </td>
                <td> <input type="text" name="allowance" id="allowance">
                <label for="allowance"> in $</label></td>
                <td><span class="alert"><?php echo $allowance_error;?></span></td>
                </tr>
                <tr><td colspan="3"><button style="margin-left:30%;"class="button" type="submit" name="submit" value="Calculate">Calculate</button></td></tr>
                </table>
            </fieldset>
        </form>

        
        <?php
        if ($_POST) {
            if ($salary_error == "" && $paidMethod_error == "" && $allowance_error == ""){
            echo "<table>
            <tr>
                <td>Income with Taxes</td>
                <td>monthly</td>
                <td>yearly</td>
            </tr>
            <tr>
                <td>Total Salary</td>
                <td>$monthlySalary</td>
                <td>$yearlySalary</td>
            </tr>
            <tr>
                <td>Tax Amount</td>
                <td>$monthlyTaxAmount</td></td>
                <td>$taxAmount</td>
            </tr>
            <tr>
                <td>Social Security Fee</td>
                <td>$monthlyNSSF</td>
                <td>$nssf</td>
            </tr>
            <tr>
                <td>Salary After Tax</td>
                <td>$monthlyTotalSalary</td>
                <td>$totalSalary</td>
            </tr>
            </table>";
            }
        }
        ?>
    </div>
</body>
</html>