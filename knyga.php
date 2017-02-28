<h2>Knygos informacija</h2>
<?php $item = getBooksById($pdo, $id); ?>
<?php if(empty($item)): ?>
    Knyga nerasta.
<?php else: ?>
    <p>
       Book:  <?php echo $item['name']; ?></br>
       By:  <?php echo $item['author']; ?></br>
        Published: <?php echo $item['published']; ?></br>
       Genre:  <?php echo $item['genre']; ?>
    </p>
    <p>
        <a href="index.php?page=knygos">
            Grizti i knygu sarasa
        </a>
    </p>

<?php endif; ?>
