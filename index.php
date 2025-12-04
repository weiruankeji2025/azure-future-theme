<?php get_header(); ?>

<main class="relative pt-12 pb-20 px-6 max-w-7xl mx-auto z-10">
    <div class="text-center mb-20 animate-fade-in-up">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight">
            <?php bloginfo( 'name' ); ?> <br>
            <span class="gradient-text"><?php bloginfo( 'description' ); ?></span>
        </h1>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('group glass rounded-2xl overflow-hidden hover:-translate-y-2 transition-transform duration-300 shadow-lg shadow-blue-900/5 flex flex-col'); ?>>
                
                <a href="<?php the_permalink(); ?>" class="block h-48 bg-slate-200 dark:bg-slate-800 relative overflow-hidden">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700' ) ); ?>
                    <?php else : ?>
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-cyan-400 opacity-80"></div>
                    <?php endif; ?>
                </a>

                <div class="p-6 flex-1 flex flex-col">
                    <div class="text-xs font-bold text-cyan-600 dark:text-cyan-400 mb-2 uppercase tracking-wide">
                        <?php the_category( ', ' ); ?>
                    </div>
                    
                    <h2 class="text-xl font-bold mb-3 group-hover:text-blue-500 transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-4 flex-1">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <div class="flex items-center justify-between text-xs text-slate-400 border-t border-slate-100 dark:border-slate-800 pt-4 mt-auto">
                        <span><?php echo get_the_date(); ?></span>
                        <span><?php comments_number( '0 评论', '1 评论', '% 评论' ); ?></span>
                    </div>
                </div>
            </article>

        <?php endwhile; else : ?>
            <p class="text-center col-span-3 text-slate-500">暂无文章</p>
        <?php endif; ?>
    </div>

    <div class="mt-12 flex justify-center gap-2">
        <?php 
        the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => __( '上一页', 'azure-future' ),
            'next_text' => __( '下一页', 'azure-future' ),
            'class'     => 'flex gap-2'
        ) ); 
        ?>
    </div>
</main>

<?php get_footer(); ?>