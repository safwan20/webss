<!DOCTYPE html>
<html>
<body>

<?php

include('connect.php');

$sql = "SELECT * FROM safwan ";
$result = $conn->query($sql);


?>



<table>
	
	<thead>
		<tr>
			<th>id</th>
			<th>first</th>
			<th>last</th>
			<th>email</th>
			<th>club</th>
			<th>view</th>
		</tr>
	</thead>

	<tbody>
<?php
while($row=$result->fetch_assoc())
{
?>

		<tr>
			<th>  <?php echo $row['id'] ?>    </th>
			<th>  <?php echo $row['first'] ?> </th>
			<th>  <?php echo $row['last'] ?>  </th>
			<th>  <?php echo $row['email'] ?> </th>
			<th>  <?php echo $row['club'] ?>  </th>
			<th>  <a href=view.php?id=<?php echo $row['id'] ?> ><button>show</button></a>  </th>
		</tr>
	<?php
}
	?>
	</tbody>





</table>



</body>
</html>