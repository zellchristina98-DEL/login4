<!DOCTYPE html>
<html lang="en">
<head>
    <title>DASHBOARD</title>
</head>
<body>

    <h1>Welcome to the dashboard <?php echo session('u')?> </h1>
    <table border='1' width='550'>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>email</th>
</tr>
<tr>

<?php
    $no=1;
    foreach ($hai as $key => $value) {
    
?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value->name ?></td>
        <td><?= $value->email ?></td>
</tr>
<?php
    }
?>
</table>

    <button><a href="/logout">Logout</a></button>
    <button><a href="/inputdata">Inputdata</a></button>
 
</body>
</html>