<footer class="border-t border-slate-200 dark:border-slate-800 py-10 text-center relative z-10 glass mt-10">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-slate-500 dark:text-slate-500 text-sm">
                &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
            </p>
            
<div class="mt-8 mb-4 inline-flex items-center gap-3 px-4 py-2 rounded-full glass border border-blue-200/20 dark:border-blue-500/20 shadow-[0_0_15px_rgba(6,182,212,0.15)] group transition-all hover:scale-105 cursor-default">
    
    <span class="relative flex h-2.5 w-2.5">
      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
    </span>

    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
        System Access
    </span>

    <span class="text-sm font-bold font-mono bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 dark:from-cyan-400 dark:to-blue-400">
        <?php echo azure_get_site_views(); ?>
    </span>
</div>            
            <p class="text-xs mt-4 font-mono text-slate-400 dark:text-slate-600">
                Theme Design by <a href="#" class="text-blue-500 font-semibold hover:underline">威软科技制作</a>
            </p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>