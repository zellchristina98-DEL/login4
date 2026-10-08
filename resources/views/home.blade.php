<!DOCTYPE html>
<html lang="en">

<head>
    <title>DASHBOARD</title>
</head>

<body>

    <h1>Welcome to the dashboard <?php echo session('u')?></h1>
    <form action="/home" method="GET">
        <label>Dari Tanggal:</label>
        <input type="date" name="tgl_awal" value="<?= request('tgl_awal') ?>">

        <label>Sampai Tanggal:</label>
        <input type="date" name="tgl_akhir" value="<?= request('tgl_akhir') ?>">

        <button type="submit">Filter</button>
        <a href="/home"><button type="button">Reset</button></a>
    </form>
    <br>

    <button onclick="window.print()">Cetak Window</button>
    <a href="/excel"><button type="button">Export Excel</button></a>
    <a href="/pdf"><button type="button">Export PDF</button></a>

    <table border='1' width='550'>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Tanggal buat</th>
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
            <td><?= date('d-m-Y', strtotime($value->created_at)) ?></td>
        </tr>

        <?php
        }
        ?>

    </table>

    <button><a href="/logout">Logout</a></button>

</body>

</html>