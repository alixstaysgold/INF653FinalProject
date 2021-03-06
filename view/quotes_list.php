<?php include ('header.php'); 
?>

<div id=search>
<section id="dropdowns">
 <form action="." method="get" id="select_author" class="filter_quotes">
        <select style="width:250px" name="authorId" id="dropdown">
            <option value="0">Author</option>
            <?php foreach ($authors as $author) : ?>
                <option value="<?= $author['id'] ?>">
                <?= $author['author'] ?>
                </option> 
                <?php endforeach; ?>
        </select>
        
    
    <br>
    
    
    <select style="width:250px" name="categoryId" id="dropdown">
            <option value="0">Category</option>
            <?php foreach ($categories as $category) : ?>           
                <option value="<?= $category['id'] ?>">
                <?= $category['category'] ?>
                </option> 
                <?php endforeach; ?>
        </select> 
        <br>
        <div id= buttons>
        <button class ="btn" type="submit" id="submitbutton">Search</button>
        <div class="divider"></div>
        <button class="btn" onclick="location.href='.'" type="button">
         Reset List</button> <hr>
            </div>
    </form>   
            </div>
</section> 
</div>


<div id="list_quotes">
<?php if ($quotes) { ?>
    <?php foreach ($quotes as $quote) : ?>
    <div class="row">
        <div class="list_quotes">
        <?= $quote['quote'] ?> 
        <div id="author_list">    &emsp;  - <?= $quote['author'] ?>, <?= $quote['category'] ?>  </div> 
        </div><br><br>
    </div>
    <?php endforeach; ?>
<?php } else { ?> 
    <p> No quotes exist. </p>
<?php } ?>
</div>


























<?php include ('footer.php'); 
?>