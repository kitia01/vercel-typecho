<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="pt-10 px-4 mx-auto <?php $this->options->viewWidth() ?>">
    <h3 class="text-black dark:text-zinc-200 text-opacity-80 pb-2"><?php $this->archiveTitle([
                                                                        'category' => _t('分类 「%s」 下的文章'),
                                                                        'search'   => _t('包含关键字 「%s」 的文章'),
                                                                        'tag'      => _t('标签 「%s」 下的文章'),
                                                                        'author'   => _t('「%s」 发布的文章')
                                                                    ], '', ''); ?></h3>

    <p class="break-all pb-12 text-sm text-gray-500"><?php echo $this->getDescription(); ?></p>

    <?php if ($this->have()) : ?>
        <?php while ($this->next()) : ?>
            <article class="posts-in-category mb-12" itemscope itemtype="http://schema.org/BlogPosting">
                <a class="block mb-8 hvr-forward" itemprop="url" href="<?php $this->permalink() ?>">
                    <h2 class="pb-3 font-bold text-black dark:text-zinc-200" itemprop="name headline">
                        <span><?php echo analyzePostContent($this->content) ?></span>
                        <span class="align-middle"><?php $this->title() ?></span>
                    </h2>
                    <div class="tracking-wider w-full post-content bg-gray-100 dark:bg-zinc-800 cursor-pointer p-4 rounded-tl-lg rounded-tr-2xl rounded-br-2xl rounded-bl-2xl" itemprop="articleBody">
                        <p class="break-all text-sm text-zinc-700 leading-6 dark:text-zinc-400"><?php $this->excerpt(80, '...') ?></p>
                        <div class="pt-3 text-xs text-zinc-500 flex items-center">
                            <time class="flex-shrink-0" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                            <div class="flex-grow text-right">
                                <span class="inline-flex items-center">
                                    阅读 <?php get_post_view($this) ?>
                                </span>
                                <span class="inline-flex items-center">
                                    评论 <?php $this->commentsNum('%d'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <article class="my-12">
            <h2 class="text-center"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>

    <?php
    $this->pageNav(
        '<svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/></svg>',
        '<svg class="w-3.5 h-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>',
        1,
        '...',
        array(
            'wrapTag' => 'ul',
            'wrapClass' => 'pagination',
            'itemTag' => 'li',
            'textTag' => 'a',
            'currentClass' => 'active',
            'prevClass' => 'prev',
            'nextClass' => 'next'
        )
    );
    ?>
</div>

<script src="<?php $this->options->themeUrl('1821c136_v1.0.0.js'); ?>" ></script>