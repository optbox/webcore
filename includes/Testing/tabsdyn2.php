<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">
        <script src="https://kit.fontawesome.com/6ab5be8f07.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="CSS/styles.css?v=1.1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container site">
            <h1 class="text-logo"><i class="fas fa-utensils"></i> <i class="fas fa-utensils"></i></h1>
            <?php 
            require 'admin/database.php';
            echo ' <ul class="nav nav-tabs" style="border-bottom:none;">';
            $db = Database::connect();
            $statement = $db->query('SELECT * FROM categories');
            $categories = $statement->fetchAll();
            foreach($categories as $category){
                if($category['id'] == '1')
                    echo '<li class="nav-item" id="item"><a class="nav-link active" data-toggle="tab" role="tab" href="#'.$category['id'].'">'.$category['name'].'</a></li>';
                else
                    echo '<li class="nav-item" id="item"><a class="nav-link" data-toggle="tab" role="tab" href="#'.$category["id"].'">'.$category['name'].'</a></li>';
            }
                echo "</ul>";

                echo '<div class="tab-content">';

                foreach($categories as $category){
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id'] . '">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] . '">';

                    echo '<div class="row">';
                    $statement = $db->prepare("SELECT * FROM items WHERE items.category = ?");
                    $statement->execute(array($category['id']));
                    while($item = $statement->fetch())
                    {
                        echo '<div class="col-sm-6 col-md-4 box">
                                <div class="img-thumbnail" >
                                    <img src="images/' . $item["image"] . '" alt="..." style="border:none; " class="img-thumbnail">
                                    <div class="price">' . number_format($item['price'], 2, '.','') . '</div>
                                    <div id="caption">
                                        <h4>' . $item['name'] . '</h4>
                                        <p>' . $item['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><i class="fas fa-shopping-cart"></i> Commander</a>
                                    </div>
                                </div>
                            </div>';
                    }
                    echo '</div>
                    </div>';
                    Database::disconnect();
                    echo '</div>';


                }



            ?>
        </div>  
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>