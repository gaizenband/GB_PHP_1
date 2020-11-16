<link rel="stylesheet" href="../css/style.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<div class="wrapper">
    <div class="img_container">
        <?php
            include("server.php");
            $data = loadPage();
            foreach ($data as $key => $value) {
                    ?>
                        <div class="img_box">
                            <a href="<?= $value['img_path'] ?>" data-fancybox="images" data-caption="<?= $value['long_desc'] ?>" class="link" id="<?= $value['id'] ?>" onclick="countClick(<?= $value['id'] ?>)">
                                <img width="350px" src=<?= $value['img_path'] ?>>
                            </a>
                            <h4 style='text-align:center; margin-bottom:2px;margin-top:2px;'><?= $value['item'] ?></h4>
                            <p style='text-align:center; margin-bottom:2px;margin-top:0;'><?= $value['short_desc'] ?></p>
                            <p style='text-align:center; margin-bottom:2px;margin-top:0;'><?= $value['price'] ?> рублей</p>
                        </div>
                    <?php
            }
        ?>
    </div>
</div>