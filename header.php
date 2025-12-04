<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        /* 动态注入自定义强调色 */
        :root { --accent-color: <?php echo get_theme_mod('azure_accent_color', '#06b6d4'); ?>; }
    </style>
</head>

<body <?php body_class( 'antialiased bg-slate-50 text-slate-800 dark:bg-deep-900 dark:text-slate-100 transition-colors duration-500' ); ?>
    x-data="{ 
        dark: localStorage.getItem('theme') === 'dark',
        toggleTheme() { 
            this.dark = !this.dark; 
            localStorage.setItem('theme', this.dark ? 'dark' : 'light'); 
            if(this.dark) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
        }
    }" 
    x-init="if(dark) document.documentElement.classList.add('dark')"
>

    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-[20%] -right-[10%] w-[800px] h-[800px] bg-blue-500/20 rounded-full blur-[120px] mix-blend-screen dark:bg-blue-500/10"></div>
        <div class="absolute top-[40%] -left-[10%] w-[600px] h-[600px] bg-cyan-400/20 rounded-full blur-[100px] mix-blend-screen dark:bg-cyan-500/10"></div>
    </div>

    <nav class="fixed w-full z-50 glass">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="<?php echo home_url(); ?>" class="text-2xl font-bold tracking-tight flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-400 to-blue-600"></div>
                <span><?php echo get_theme_mod('azure_logo_text', 'Azure Future'); ?></span>
            </a>

            <div class="flex items-center gap-6">
                <div class="hidden md:block">
                    <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex space-x-6 text-sm font-medium text-slate-600 dark:text-slate-300',
                        'fallback_cb'    => false,
                    ) ); 
                    ?>
                </div>

                <button @click="toggleTheme()" class="p-2 rounded-full hover:bg-black/5 dark:hover:bg-white/10 transition">
                    <span x-show="!dark">🌙</span><span x-show="dark">☀️</span>
                </button>
            </div>
        </div>
    </nav>
    
    <div class="h-24"></div>