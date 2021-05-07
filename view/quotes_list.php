<?php include ('header.php'); 
?>


<section id="dropdowns">
 <form action="." method="get" id="select_author" class="filter_quotes">
        <select name="authorId" id="dropdown">
            <option value="0">Author</option>
            <?php foreach ($authors as $author) : ?>
                <option value="<?= $author['id'] ?>">
                <?= $author['author'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
    
    <select name="categoryId" id="dropdown">
            <option value="0">Category</option>
            <?php foreach ($categories as $category) : ?>           
                <option value="<?= $category['id'] ?>">
                <?= $category['category'] ?>
                </option> 
                <?php endforeach; ?>
        </select> 
        <br>
        
        <button type="submit" id="submitbutton">Search</button>
        <a href=".">Reset List </a>  <hr>

    </form>   
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