<div class="pagination">
    <?php if($page != 1): ?>
        <a href="<?php echo "?page=". ($page - 1);?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i=1; $i <= $total_pages; $i++){ 
        if($i == $page):
    ?>
            <a class='active' href="<?php echo "?page=". $i;?>"><?php echo $i ?></a>
        <?php else: ?>
            <a href="<?php echo "?page=". $i;?>"><?php echo $i ?></a>
        <?php endif; ?>
    <?php } ?>

    <?php if($page != $total_pages): ?>
        <a href="<?php echo "?page=". ($page + 1);?>">&raquo;</a>
    <?php endif; ?>
</div>