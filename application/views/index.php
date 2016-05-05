
<?php foreach ($todos as $todo): ?>

    <h2><?php echo $todo['title'] ?></h2>
    <div id="list">
        <?php echo $todo['description'] ?>
    </div>
    	
<a href='#'>View</a>|<a href='edit/<?php echo $todo['id'];?>'>edit</a>|<a href='#'>Delete</a>
<hr> 
 <?php endforeach ?>    


