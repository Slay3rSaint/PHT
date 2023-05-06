<?php
$op = "";
if (isset($_GET['output'])) {
    $output = $_GET['output'];
    if ($output == 0){
        $GLOBALS['op'] = "Based on your input, our analysis indicates that you are not at an increased likelihood of experiencing Coronary Heart Disease (CHD). Keep up the good work and stay healthy!";
    }elseif($output == 1){
        $GLOBALS['op'] = "Based on your input, our analysis suggests that you are at an increased likelihood of experiencing Coronary Heart Disease (CHD). As such, we highly recommend seeking consultation with a medical professional in order to better understand your current state of health and discuss potential preventative measures.";
    }  
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CHD</title>
    <link rel="stylesheet" href="../../CSS/form_prediction.css" />
<body>
    <div class="title">Chronic Heart Disease</div>
<form method="post" action="http://localhost:5000/predict" >
    <div class="input_container">
        <table>
            <tr><td><input type="number" class="input" name="gender" placeholder="gender"></td></tr>
            <tr><td><input type="number" class="input" name="BPMeds" placeholder="BPMeds"></td></tr>
            <tr><td><input type="number" class="input" name="prevalentStroke" placeholder="prevalentStroke"></td></tr>
            <tr><td><input type="number" class="input" name="prevalentHyp" placeholder="prevalentHyp"></td></tr>
            <tr><td><input type="number" class="input" name="diabetes" placeholder="diabetes"></td></tr>
            <tr><td><input type="number" class="input" name="cigsPerDay" placeholder="cigsPerDay"></td></tr>
            <tr><td><input type="number" class="input" name="totChol" placeholder="totChol"></td></tr>
            <tr><td><input type="number" class="input" name="diaBP" placeholder="diaBP"></td></tr>
            <tr><td><input type="number" class="input" name="BMI" placeholder="BMI"></td></tr>
            <tr><td><input type="number" class="input" name="heartRate" placeholder="heartRate"></td></tr>
            <tr><td><input type="number" class="input" name="glucose" placeholder="glucose"></td></tr>
            <tr><td><input type="number" class="input" name="age" placeholder="age"></td></tr>
            <tr><td><input type="submit" value="PREDICT" class="Predbtn" ></td></tr>
        </table>    
    <br><label class="op_box"><?php echo $op; ?> </label>
    </div>
</form>
</body>
</html>



