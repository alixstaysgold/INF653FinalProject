<?php include ('header.php'); 
?>


<section id="dropdowns">
 <form action="." method="get" id="select_author" class="select_author">
        <input type="hidden" name="action" value="search_quotes">
        <select name="authorId" id="dropdown">
            <option value="0">Author</option>
            <?php foreach ($authors as $author) : ?>
            <?php if ($authorId == $author['id']) { ?>
                <option value="<?= $authorId['id'] ?>">
                    <?php } else { ?>
                <option value="<?= $author['id'] ?>">
                    <?php } ?>
                    <?= $author['author'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
    
        <select name="class_id" id="dropdown">
            <option value="0">Category</option>
            <?php foreach ($categories as $category) : ?>
            <?php if ($categoryId == $category['$id']) { ?>
                <option value="<?= $categoryId['$id'] ?>">
                    <?php } else { ?>
                <option value="<?= $category['$id'] ?>">
                    <?php } ?>
                    <?= $category['category'] ?>
                </option> 
                <?php endforeach; ?>
        </select>   
        <br>
        
        <button type="submit" id="submitbutton">Search</button><hr>

    </form>     
            <br>
            </div>
</section> 



<div class = "quotes">
                <section>
                <?php if($quotes) { ?>
                
                <table id="quotest">
                <tr>
                    <th>Quote</th>
                    <th>Author</th>
                    <th>Category</th>
                    
                </tr><br>
                <?php foreach ($quotes as $quote) : ?>
                <tr>
                    <td>"<?php echo $quote['quote']; ?>"</td>
                    <td><?php echo $quote['author']; ?></td>
                    <td><?php echo $quote['category']; ?></td>
                    <br>
                    
                    
                </tr>
                
                <?php endforeach; ?>
                </table>
                </section>
                    </div>
                    <?php }  ?>

                   



























<?php include ('footer.php'); 
?>