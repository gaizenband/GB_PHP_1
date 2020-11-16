<link rel="stylesheet" href="./css/style.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<aside class="load_form">
    <form action="server.php?action=load" method="post" enctype="multipart/form-data">
    <h3>Add your image here</h3>
    <input type="file" accept="image/*" name="image" required>
    <input type="submit" value="Load" name="upload">
    </form>
</aside>

<aside class="comments">
    <form action="server.php?action=comment" method="post">
    <h3>Your comment about this site</h3>
    <div class="comment_txt">
        <input type="text" name="userName" placeholder="Your name" required>
        <textarea name="comment"></textarea>
    </div>
    <input type="submit" value="Load" name="upload">
    </form>
</aside>

<aside class="user_comments">
    <?php
    include("server.php");
    $comments = loadComments();
    foreach ($comments as $key => $value) {
    ?>
    <div class="comment_area">
        <h4 class="user_comments_name"><?=$value['userName']?></h4>
        <p class="user_comments_coment"><?=$value['comment']?></p>
        <p class="user_comments_date"><?=$value['upload_date']?></p>
    </div>
    <?php
            }
    ?>
</aside>

<div class="wrapper">
    <div class="img_container">
        <?php
            // include("server.php");
            $data = loadPage();
            foreach ($data as $key => $value) {
                    ?>
                        <div class="img_box">
                            <a href="<?= $value['path'] ?>" data-fancybox="images" data-caption="Preview" class="link" id="<?= $value['id'] ?>" onclick="countClick(<?= $value['id'] ?>)">
                                <img width="350px" src=<?= $value['path'] ?>>
                            </a>
                            <p style='text-align:center'>Просмотрено <?= $value['click_count'] ?> раз</p>
                        </div>
                    <?php
            }
        ?>
    </div>
</div>
<script src="main.js"></script>