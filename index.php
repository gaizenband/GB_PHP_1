<link rel="stylesheet" href="./css/style.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<aside class="load_form">
    <form action="load.php" method="post" enctype="multipart/form-data">
    <h3>Add your image here</h3>
    <input type="file" accept="image/*" name="image">
    <input type="submit" value="Load">
    </form>
</aside>

<div class="wrapper">
    <div class="img_container">
        <?php
            $images = scandir("img");
            foreach ($images as $key => $value) {
                if($key != 0 && $key != 1){
                    ?>
                        <a href="<?= "img/".$value ?>" data-fancybox="images" data-caption="Preview" class="link">
                            <img width="350px" src=<?= "img/".$value ?>>
                        </a>
                    <?php
                }
            }
        ?>
    </div>
</div>
