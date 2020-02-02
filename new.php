<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>


 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="main.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>
<body>

<?php

//if request method POST
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 


//collect all the values  
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$club = $_POST['club'];
$events = $_POST['event'];
 
//Database Connection
include('connect.php');

//checkbox values
$chr = '';
if(is_array($events)){
    foreach($events as $userPost){
        $chr = $userPost.' '.$chr;
    }
}


//check if email already exists
$dql = 'SELECT email FROM safwan WHERE email='."'".$email."'";
$results = $conn->query($dql);


//if email exists show error
if($results->num_rows!=0)
{
echo "<h1 style='color:red;'>email aleady used</h1>";
}


//if password doesnt match show error
else if($password1!=$password2)
{
  echo "<h1 style='color:red;'>password doesnt match</h1>";
// header( "refresh:5; url=new.php" );
}


//finally everything seems correct add values into database and show success message
else
{
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
$image_name = addslashes($_FILES['image']['name']);

$passwords = password_hash($password2,PASSWORD_BCRYPT);
$first = ucfirst($first);
$last =   ucfirst($last);

$stmt = $conn->prepare("insert into safwan(first,last,email,image,password,club,events)values(?,?,?,?,?,?,?)");
$stmt->bind_param("sssssss",$first,$last,$email,$image_name,$passwords,$club,$chr);
$stmt->execute();
echo "<h1 style='color:green;'>SUCCESS</h1>";
$stmt->close();
$conn->close(); 
}
} 


?>


<div class="parent">
	
<div class="row">
<div class="col-7">
	
<div id="tabs" style="">

  <ul>
    <li><a href="#tabs-1">Login</a></li>
    <li><a href="#tabs-2">Register</a></li>
  </ul>

  <!-- singin -->
  <div id="tabs-1">
    <form>
		<input type="email" name="emaill" placeholder="Enter your Emaill"><br><br><br>
    	<input type="password" name="password1" placeholder="Enter your password"><br><br><br>
    	<button>Submit</button><br><br>
    </form>
  </div>

  <!-- singnup -->
  <div id="tabs-2">
    <form action="new.php" method="POST" enctype='multipart/form-data'>
    	<input type="text" name="first"   pattern="^[a-zA-Z]" oninvalid="setCustomValidity('Please enter on alphabets only. ')" placeholder="Enter your first Name"><br><br><br>
    	<input type="text" name="last" pplaceholder="Enter your last Name"><br><br><br>
    	<input type="email" name="email" placeholder="Enter your Email"><br><br><br>
    	<input type="file" name="image"><br><br><br>
    	<input type="password" name="password1" placeholder="Enter your password"><br><br><br>
    	<input type="password" name="password2" placeholder="confirm password"><br><br><br>
    	<select name="club">
    		<option selected="True" disabled>Select Club</option>
    		<option value="cc">Cultural Club</option>
    		<option value="pc">Programming Club</option>
    		<option value="mc">Mechatronics Club</option>
    		<option value="lc">Living and Welfare Club</option>
    	</select><br><br><br>

          <div class="cc" style="display: none;">
                    <input type="checkbox" class="n" name="event[]" value="dance">dance
                    <input type="checkbox" class="n" name="event[]" value="sing">sing
                    <input type="checkbox" class="n" name="event[]" value="poetry">poetry
                    <input type="checkbox" class="n" name="event[]" value="tabla">tabla
                    <br><br><br>
          </div>

          <div class="pc" style="display: none;">
                    <input type="checkbox" class="n" name="event[]" value="java">java
                    <input type="checkbox" class="n" name="event[]" value="c++">c++
                    <input type="checkbox" class="n" name="event[]" value="c">c
                    <input type="checkbox" class="n" name="event[]" value="python">python
                    <br><br><br>
          </div>

          <div class="mc" style="display: none;">
                    <input type="checkbox" class="n" name="event[]" value="hammer">hammer
                    <input type="checkbox" class="n" name="event[]" value="nail">nail
                    <input type="checkbox" class="n" name="event[]" value="fan">fan
                    <input type="checkbox" class="n" name="event[]" value="ran">ran
                    <br><br><br>
          </div>

          <div class="lc" style="display: none;">
                    <input type="checkbox" class="n" name="event[]" value="mumbai">Mumbai
                    <input type="checkbox" class="n" name="event[]" value="pune">Pune
                    <input type="checkbox" class="n" name="event[]" value="banglore">Banglore
                    <input type="checkbox" class="n" name="event[]" value="hyderabad">Hyderabad
                    <br><br><br>
          </div>




    	<button>Submit</button><br><br><br>
    </form>
  </div>

</div>
</div>
<!-- first col -->

<div class="col-4 ">
	<img src="sa.jpeg" height="800px" width="610px">
</div>




	
</div>
<!-- row -->
</div>
<!-- container -->



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

var selected = '';
var cnt = 0;

  $( function() {
    $( "#tabs" ).tabs();
  } );


$('select').on('change', function() {

console.log(this.value);

if(this.value == 'cc')
{
  if(selected=='' && cnt == 0)
  {
    $('.cc').show();
    selected = 'cc';
    cnt = 1;
  }
  else
  {
    $('.'+selected).hide();
    $('.cc').show();
    selected = 'cc';
    cnt = 1;
  }
}

if(this.value == 'pc')
{
  if(selected=='' && cnt == 0)
  {
    $('.pc').show();
    selected = 'pc';
    cnt = 1;
  }
  else
  {
    $('.'+selected).hide();
    $('.pc').show();
    selected = 'pc';
    cnt = 1;
  }
}

if(this.value == 'mc')
{
  if(selected=='' && cnt == 0)
  {
    $('.mc').show();
    selected = 'mc';
    cnt = 1;
  }
  else
  {
    $('.'+selected).hide();
    $('.mc').show();
    selected = 'mc';
    cnt = 1;
  }
}

if(this.value == 'lc')
{
  if(selected=='' && cnt == 0)
  {
    $('.lc').show();
    selected = 'lc';
    cnt = 1;
  }
  else
  {
    $('.'+selected).hide();
    $('.lc').show();
    selected = 'lc';
    cnt = 1;
  }
}


});




  var limit = 3;
  $('.n').on('change', function(evt) {
   if($(this).siblings(':checked').length >= limit) {
       this.checked = false;
   }
});



  </script>


</body>
</html>
