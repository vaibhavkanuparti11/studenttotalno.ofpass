<?php
session_start();
include 'dbconnection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<form action="save.php" method="post">
    <div class="container mt-5">
        <div class="row">
  <div class="form-group col-sm-4">
    <label for="text">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">    
  </div>
  <div class="form-group col-sm-4">
    <label for="text">Telugu</label>
    <input type="text" class="form-control" id="telugu" name="telugu" aria-describedby="emailHelp" placeholder="Enter name">    
  </div>
  <div class="form-group col-sm-4">
    <label for="text">Hindi</label>
    <input type="text" class="form-control" id="hindi" name="hindi" aria-describedby="emailHelp" placeholder="Enter name">    
  </div>
  <div class="form-group col-sm-4">
    <label for="text">English</label>
    <input type="text" class="form-control" id="english" name="english" aria-describedby="emailHelp" placeholder="Enter name">    
  </div>
  <div class="form-group col-sm-4">
    <label for="text">Maths</label>
    <input type="text" class="form-control" id="maths" name="maths" aria-describedby="emailHelp" placeholder="Enter name">    
  </div>
  <div class="form-group col-sm-4">
    <label for="text">Social</label>
    <input type="text" class="form-control" id="social" name="social" aria-describedby="emailHelp" placeholder="Enter name">    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button><br><br>
  </div> 
</div><br><br>
</form>
<table border="1">
    <tr>
      <th>sno</th>
<th>Name</th>
<th>Telugu</th>
<th>Hindi</th>
<th>English</th>
<th>Maths</th>
<th>Social</th>
<th>Total</th>
<th>percentage</th>
<th>result</th>
<th>grade</th>
</tr>
<?php
$sql=mysqli_query($conn,"select * from sturesult");
$i=1;$pass=0;$fail=0;$x=0;
while($result=mysqli_fetch_assoc($sql)){
    ?>
  <tr>
<td><?php echo $i++;?></td>
<td><?php echo $result['name']?></td>
<td><?php echo $result['telugu']?></td>
<td><?php echo $result['hindi']?></td>
<td><?php echo $result['english']?></td>
<td><?php echo $result['maths']?></td>
<td><?php echo $result['social']?></td>
<td><?php echo $result['total']=$result['telugu']+$result['hindi']+$result['english']+$result['maths']+$result['social'];?></td>
<td><?php echo $result['percentage']=($result['total']/500)*100 ."%";?></td>
<td><?php echo $result['result']=$result['telugu']>=35 && $result['hindi']>=35 && $result['english']>=35 && $result['maths']>=35 && $result['social']>=35 ? "pass" : "fail"; ?></td>
<td><?php echo $result['grade']=$result['total']>450 ? "Grade A" : (($result['total']>380) ? "Grade B" : (($result['total']>300 ? "Grade C" : "Grade D")));?>
<?php if($result['result']=="pass"){$pass++;}
      if($result['result']=="fail"){$fail++;}
      if($result['total']>$x){
        $x=$result['total'];
        $y=$result['name'];       
      }
?>
</tr>
<?php
}?>
<h6>Total no.of pass:<?php echo $pass;?></h6>
<h6>Total no.of fail:<?php echo $fail;?></h6>
<h6>1st rank student:<?php echo $y;?></h6>
</body>
</html>