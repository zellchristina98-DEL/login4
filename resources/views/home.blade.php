<!DOCTYPE html>
<html lang="en">

<head>
    <title>DASHBOARD</title>
</head>

<body>

    <h1>Welcome to the dashboard <?php echo session('u')?></h1>

    <table border='1' width='550'>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $no=1;
        foreach ($hai as $key => $value) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value->name ?></td>
            <td><?= $value->email ?></td>
            <td>
            <button><a href="/edit/<?= $value->id ?>">Edit</a></button>
            </td>
            <td>
    <form action="/delete/<?= $value->id ?>" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
</td>
        </tr>

        <?php
        }
        ?>

    </table>

    <button><a href="/logout">Logout</a></button>

</body>

</html>
