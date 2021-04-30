<?php include ('header.php'); 
?>


<section id="dropdowns">
 <form action="." method="get" id="select_author" class="select_author">
        <input type="hidden" name="action" value="search_quotes">
        <select name="authorId" id="dropdown">
            <option value="0">Author</option>
            <?php foreach ($authors as $author) : ?>
            <?php if ($authorId == $author['authorId']) { ?>
                <option value="<?= $author['authorId'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $author['authorId'] ?>">
                    <?php } ?>
                    <?= $author['author'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
    
        <select name="class_id" id="dropdown">
            <option value="0">Category</option>
            <?php foreach ($categories as $category) : ?>
            <?php if ($categoryId == $category['$categoryId']) { ?>
                <option value="<?= $category['$categoryId'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $category['$categoryId'] ?>">
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