<div class="grid_full-width">
    <div class="grid color-comment" id="demoHack">
        <div class="row">
            <div class="col col-one">
                <h2 class="title_comment">Hỏi Đáp về <?php echo $each['name']; ?> ??</h2>
                <form class="form_comment" method="post">
                    <?php if (!empty($query)) : ?>
                        <span>Bình luận thành công!!</span>
                    <?php endif ?>
                    <textarea name="content" id="demo_hack" style="width: 100%" rows="4" placeholder="Viết câu hỏi của bạn"></textarea>
                    <?php if (!empty($_SESSION['error'])) : ?>
                        <span>
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']); 
                            ?>
                        </span>
                    <?php endif ?>
                    <?php if (empty($_SESSION['id'])) { ?>
                        <a onclick="return Cmt()" href="login.php" class="">Gửi câu hỏi</a>
                        <?php } else { ?>
                            <button type="submit">Gửi câu hỏi</button>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="row ">
            <?php if (!empty($_GET['id'])) : ?>
                <?php foreach ($result_cm as $value_cm) : ?>
                    <div class="col-one">
                        <div class="wrap_comment">
                            <div class="comment_info">
                                <h3><?php echo $value_cm['name'] ?></h3>
                                <span><?php echo $value_cm['created_at'] ?></span>
                            </div>
                            <p><?php echo $value_cm['content'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
            <?php if (!empty($_GET['lap_id'])) : ?>
                <?php foreach ($result_cm as $value_cm) : ?>
                    <div class="col-one">
                        <div class="wrap_comment">
                            <div class="comment_info">
                                <h3><?php echo $value_cm['name'] ?></h3>
                                <span><?php echo $value_cm['created_at'] ?></span>
                            </div>
                            <p><?php echo $value_cm['content'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>