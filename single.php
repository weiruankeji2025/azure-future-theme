<?php get_header(); ?>

<main class="relative pt-32 pb-20 px-4 sm:px-6 z-10 min-h-screen">
    
    <?php while ( have_posts() ) : the_post(); ?>

        <header class="max-w-4xl mx-auto text-center mb-12 animate-fade-in-up">
            <div class="inline-block px-3 py-1 mb-4 text-xs font-bold tracking-wider text-cyan-600 uppercase bg-cyan-100 rounded-full dark:bg-cyan-900/30 dark:text-cyan-400">
                <?php the_category(', '); ?>
            </div>
            <h1 class="text-3xl md:text-5xl font-bold mb-6 leading-tight text-slate-900 dark:text-white">
                <?php the_title(); ?>
            </h1>
            <div class="flex items-center justify-center gap-4 text-sm text-slate-500 dark:text-slate-400">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <?php echo get_the_date(); ?>
                </span>
                <span>/</span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <?php the_author(); ?>
                </span>
            </div>
        </header>

        <article class="max-w-3xl mx-auto">
            <div class="glass rounded-2xl p-8 md:p-12 shadow-2xl shadow-blue-900/10">
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-10 rounded-xl overflow-hidden shadow-lg -mx-4 md:-mx-8">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content prose prose-lg prose-slate dark:prose-invert max-w-none">
                    <?php the_content(); ?>
                </div>

                <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700">
                    <div class="flex flex-wrap gap-2">
                        <?php the_tags('<span class="text-sm font-semibold text-slate-500 mr-2">Tags:</span>', ' ', ''); ?>
                    </div>
                </div>
            </div>

            <div class="mt-10 flex justify-between text-sm font-medium">
                <div class="w-1/2 pr-4 text-left group">
                    <?php previous_post_link('%link', '<span class="block text-slate-400 text-xs mb-1">← 上一篇</span><span class="group-hover:text-blue-500 transition-colors">%title</span>'); ?>
                </div>
                <div class="w-1/2 pl-4 text-right group">
                    <?php next_post_link('%link', '<span class="block text-slate-400 text-xs mb-1">下一篇 →</span><span class="group-hover:text-blue-500 transition-colors">%title</span>'); ?>
                </div>
            </div>

            <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class="mt-12 glass rounded-2xl p-8">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>

        </article>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>