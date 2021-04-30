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
        
        <section id="add_quote_inputs">
        <label>Quote:</label>
        <input type="text" name="quote_text" maxLength="500" placeholder="Quote Text" required><br>

        </div>
        <div class="add">
            <button class="add_button">Add</button>
        </div>

    </form>     
            <br>
            </div>
</section> 
