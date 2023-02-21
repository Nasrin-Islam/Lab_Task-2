<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
.container{ background-color:rgb(231,230,241);
border:4px solid
margin:13px;


}
</style>
</head>
<body>  
<div class="container">
<?php
$nameErr = $emailErr = $genderErr = $dateofbirthErr=$degreeErr=$bloodgroupErr = "";
$name = $email = $gender = $dateofbirth=$degree=$bloodgroup= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and desh allowed";
    }
  }
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

if (empty($_POST["date of birth"])) {
    $dateofbirthErr = "birthdate is required";
  } else {
    $dateofbirth = test_input($_POST["date of birth"]);
  }
  if (empty($_POST["degree"])) {
    $degreeErr = "please enter";
  } else {
    $degree = test_input($_POST["degree"]);
  }
    if (empty($_POST["bloodgroup"])) {
      $bloodgroupErr = "please enter";
    } else {
      $bloodgroup = test_input($_POST["bloodgroup"]);
      
    }
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 <p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 


Name:<br> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail:<br> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

Date of Birth:<br><input type="date" name="date of birth" value="<?php echo $dateofbirth;?>">
<span class="error">*<?php echo $dateofbirthErr;?></span>
  <br>

<br>
Gender:<br> <input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other <input type="varchar" name="gender" value="<?php echo $gender;?>">
<span class="error">*<?php echo $genderErr;?></span>
  <br><br>

Degree:<br><input type="checkbox"SSC>SSC
<input type="checkbox"HSC>HSC
<input type="checkbox"BSC>BSC
<input type="checkbox"MSC>MSC


  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>



Blood group:<br><select>
  <option value="a+">A+</option>
<option value="o-">O-</option>
<option value="ab+">AB+</option>
<option value="o+">O+</option>
</select><br><br>

<input type="submit" name="submit" value="Submit">  <br>
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dateofbirth;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $bloodgroup;

?>


</body>
</html>