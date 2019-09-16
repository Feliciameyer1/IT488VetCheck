<a href="form.php"> Add Pet Feature </a>
<?php

try{
	$manager = new MongoDB|Driver\Manager(mondodb://localhost:8080");
	$query = new MongoDB|Driver|Query([]);
	
	$rows = $executeQuery("phpbasics.test", $query);
	
	Echo "<table>
		<thead>
			<th> Pet Name
			
			<th> Type of Pet
			<th> Pet Date of Birth
			<th> Action</th>
			
		<thead>
	foreach($rows as $row){
			"<td>.$row->PetName."</td>".
			"<td>.$row->TypeofPet."</td>".
			"<td>.$row->Pet Date of Birth."</td>".
			"<td><a hred= 'edituser.php?
			id="$row->id">Edit</a> |<a hred= ''>Delete</a></td>".
		"</tr>";
	}
	
	echo"</table>";
