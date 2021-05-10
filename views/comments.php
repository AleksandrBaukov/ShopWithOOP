<?php
if ($comments) {
    //die(print_r($comments));
    foreach ($comments as $comment) {
        ?>
        <div class="comments-blocks">
            <p class="comments-fio">Name: <?= $comment['fio'] ?></p>
            <p class="comments-text">Text: <?= $comment['text'] ?></p>
            <p class="comments-time">Time: <?= $comment['time'] ?></p>
        </div>
        <hr>
    <?
    }
} else echo 'No comments for this good.<br>Become first !'
?>
<hr>
<?= $message ?>
<form method="post" action="index.php?c=comm&id=<?= $_GET['id'] ?>" class="reviews-form">
    <h2>Write your comment:</h2>
    <span>Write your name:</span><input type="text" name="fio" maxlength="30" required><br>
    <span>Write text:</span><textarea name="text" rows="10" required></textarea><br>
    <input type="submit" name="submit" value="send">
</form>