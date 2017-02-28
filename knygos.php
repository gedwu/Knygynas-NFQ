<h2>Knygu sarasas</h2>

<?php
    $order = 'id';
    $sort = 1;
    $rikiuoti = isset($_GET['sort']) ? $_GET['sort'] : 'ASC';
    $sortUrl = ($rikiuoti == 'ASC') ? 'DESC' : 'ASC';
    $orders = array('id', 'name', 'author');;
    if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orders) ) {
        if ($rikiuoti == 'ASC' OR $rikiuoti == 'DESC'){
            $order = $_GET['orderBy']. ' '.$rikiuoti;
        }
    }
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th>
            <a href="index.php?page=knygos&orderBy=id&sort=<?php echo $sortUrl ?>">Nr</a>
        </th>
        <th>
            <a href="index.php?page=knygos&orderBy=name&sort=<?php echo $sortUrl ?>">Book</a>
        </th>
        <th>
            <a href="index.php?page=knygos&orderBy=author&sort=<?php echo $sortUrl ?>">Author</a>
        </th>
    </tr>
    </thead>
    <tbody>
        <?php $knygos = getBooks($pdo, $order);
            foreach($knygos as $knyga):?>
            <tr>
                <th scope="row">
                    <?php echo $knyga['id']; ?>
                </th>
                <td>
                    <a href="index.php?page=knyga&id=<?php echo $knyga['id']; ?>"><?php echo $knyga['name']; ?></a>
                </td>
                <td>
                    <?php echo $knyga['author']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>