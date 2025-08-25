<html>
<body>

<?php
if($_POST['formSubmit'] == "Submit") 
{
  $errorMessage = "";

  if(empty($_POST['fname'])) 
  {
    $errorMessage .= "<li>Please enter your first name!</li>";
  }
  if(empty($_POST['lname'])) 
  {
    $errorMessage .= "<li>Please enter your last name!</li>";
  }
  if(empty($_POST['email'])) 
  {
    $errorMessage .= "<li>Please enter your email!</li>";
  }

  $varFirstName = $_POST['fname'];
  $varLastName = $_POST['lname'];
  $varEmail = $_POST['email'];
  $varMessage = $_POST['message']

  if(!empty($errorMessage)) 
  {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
  } 

}
   
?>

<?php
if($errorMessage != "") 
{
  echo("<p>There was an error:</p>\n");
  echo("<ul>" . $errorMessage . "</ul>\n");
} 
else 
{
  $fs = fopen("mydata.csv","a");
  fwrite($fs,$varFirstName . ", " . $varLastName . ", " . $varEmail . ", " . $varMessage . "\n");
  fclose($fs);

  header("Location: index2.html");
  exit;
}
?>

</body>
</html>