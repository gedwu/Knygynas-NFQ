<h2>Paieska</h2>
<form method="post" action="">
    <input type="text" name="key">
    <input type="submit" name="search" value="Search"><br>
    <input type="radio" name="search_type" value="name_search"> By book name
    <input type="radio" name="search_type" value="author_search"> By author
</form>

<?php
    if(isset($_POST['search'])) {
        $showresult = true;
        if(empty($_POST['key'])) {
            echo 'Iveskite paieskos fraze<br />';
            $showresult = false;
        }
        if(!isset($_POST['search_type'])){
            echo 'Pasirinkite paieskos tipa<br />';
            $showresult = false;
        }
    }
?>

<?php if($showresult === true): ?>
    <?php if($_POST['search_type'] === 'name_search'):
        $result = searchName($pdo, $_POST['key']);
        ?>
    <?php elseif($_POST['search_type'] === 'author_search'):
        $result = searchAuthor($pdo, $_POST['key']);
        ?>
    <?php else:
        $result = [];
        ?>
    <?php endif; ?>

    <?php if(empty($result)):
        echo 'No results<br />';?>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nr</th>
                <th>Book</th>
                <th>Author</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($result as $knyga):  ?>
                <tr>
                    <th scope="row"><?php echo $knyga['id']; ?></th>
                    <td><a href="index.php?page=knyga&id=<?php echo $knyga['id']; ?>"><?php echo $knyga['name']; ?></a></td>
                    <td><?php echo $knyga['author']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>