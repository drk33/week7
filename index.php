<?php
$dsn = 'mysql:host=mysql01.ucs.njit.edu;dbname=drk33';
$username = 'drk33';
$password = 'uDV0XQgv';
  
try {
    $db = new PDO($dsn, $username, $password);
    echo '<p>Connection Successful</p>' . '<br>';
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>An error occurred while connecting to
             the database: $error_message </p>" . "<br>";
}
$id = 6;
$query = 'SELECT id, email, fName, lName, birthday, gender, password 
          FROM drk33.accounts
          WHERE id < :id;';
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$accountinfo = $statement->fetchAll();
$statement->closeCursor(); 

print count($accountinfo) + 1 . '<br>'; ?>

<html>
<head>
  <title>Week 7 Practice</title>
</head>

<?php foreach ($accountinfo as $account) : ?>
<html>
<body>
<table style="width:100%, border: 1px solid black">
  <tr style="border: 1px solid black">
    <th style="text-align:left">ID</th>
    <th style="text-align:left">E-Mail</th> 
    <th style="text-align:left">First Name</th>
    <th style="text-align:left">Last Name</th>
    <th style="text-align:left">Birthday</th> 
    <th style="text-align:left">Gender</th>
    <th style="text-align:left">Password</th>
  </tr>
  <tr style="border: 1px solid black">
    <td><?php echo $account['id']; ?></td>
    <td><?php echo $account['email']; ?></td>
    <td><?php echo $account['fName']; ?></td>
    <td><?php echo $account['lName']; ?></td>
    <td><?php echo $account['birthday']; ?></td>
    <td><?php echo $account['gender']; ?></td>
    <td><?php echo $account['password']; ?></td>
  </tr>
</table>

<?php endforeach; ?>
