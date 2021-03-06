
<?php if (empty($post)):?>
    <div class="ac-msg-sorry  am-animation-fade am-animation-delay-2">对不起，这里没有你想要的文章哦，不要失望，看看其它的~</div>
<?php else:?>
    <article class="blog-main">
        <div class="ac-article-license am-animation-shake am-animation-delay-3">
            <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="知识共享许可协议" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
        </div>
        <div class="am-article-hd">
            <h1 class="am-article-title">
                <a href="article/<?=$post['id'];?>.html"><?=$post['title'];?></a>
            </h1>
            <p class="am-article-meta">
                <span class="am-badge am-badge-primary am-radius"><?=$post['source'];?></span>
                by <a href=""><?=$post['author'];?></a>
                posted on <?php echo date('Y/m/d', $post['publish_date']);?> under
                <?php foreach ($catModel->getCategoriesByArticleId($post['id']) as $cat):?>
                    <a href="category/<?=$cat['id'];?>.html"><?=$cat['name']?></a>
                <?php endforeach;?>
            </p>
        </div>

        <div class="am-g">
            <!--<p class="am-article-lead"><?=$post['intro'];?></p>-->
            <div class="am-u-sm-12">
                <?php
                if ($post['model'] == 'markdown') {
                    echo $parsedown->parse($post['content']);
                } else {
                    echo $post['content'];
                }
                ?>
            </div>
            
        </div>

        <p class="am-article-meta">
            标签:
            <?php if (!empty($tags) && is_array($tags)) : ?>
                <?php foreach ($tags as $tag): ?>
                    <a href="tag/<?=$tag['name']?>.html"><?=$tag['name']?></a>
                <?php endforeach;?>

                <span class="related-tags" data-tags="<?php echo implode(',', array_column($tags, 'name'));?>"></span>
            <?php endif;?>
        </p>

    </article>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <wb:share-button appkey="4tg0Ag" addition="full" type="button" ralateUid="2508316741" picture_search="false"></wb:share-button>
    <div class='ds-thread' data-thread-key="art_<?=$post['id'];?>"></div>
<?php endif;?>