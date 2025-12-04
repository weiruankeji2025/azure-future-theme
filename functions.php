<?php
/**
 * Azure Future Theme Functions
 * Author: 威软科技制作
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 1. 加载资源 (Tailwind CSS, Alpine JS, Google Fonts)
function azure_enqueue_scripts() {
    // 加载 Tailwind CSS (CDN版，仅用于快速开发/演示)
    wp_enqueue_script( 'tailwind-cdn', 'https://cdn.tailwindcss.com', array(), '3.3.0', false );
    
    // 配置 Tailwind (注入到头部)
    wp_add_inline_script( 'tailwind-cdn', "
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: {
                        azure: { 400: '#22d3ee', 500: '#06b6d4', 600: '#0891b2', 900: '#164e63' },
                        deep: { 800: '#0f172a', 900: '#020617' }
                    }
                }
            }
        }
    ", 'after' );

    // 加载 Alpine.js (用于交互)
    wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', array(), '3.0', true );

    // 加载 Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap', array(), null );

    // 加载主样式表
    wp_enqueue_style( 'azure-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'azure_enqueue_scripts' );

// 2. 主题基础支持
function azure_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' ); // 支持特色图片
    register_nav_menus( array(
        'primary' => __( '主导航菜单', 'azure-future' ),
    ) );
}
add_action( 'after_setup_theme', 'azure_setup' );

// 3. 注册自定义设置 (Customizer)
function azure_customize_register( $wp_customize ) {
    // 添加 "主题设置" 面板
    $wp_customize->add_section( 'azure_theme_options', array(
        'title'    => __( 'Azure 主题设置 (威软科技)', 'azure-future' ),
        'priority' => 30,
    ));

    // 设置：强调色
    $wp_customize->add_setting( 'azure_accent_color', array(
        'default'   => '#06b6d4',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'azure_accent_color', array(
        'label'    => __( '全局强调色', 'azure-future' ),
        'section'  => 'azure_theme_options',
        'settings' => 'azure_accent_color',
    )));
    
    // 设置：Logo文字
    $wp_customize->add_setting( 'azure_logo_text', array(
        'default'   => 'Azure Future',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'azure_logo_text', array(
        'label'    => __( 'Logo 文字', 'azure-future' ),
        'section'  => 'azure_theme_options',
        'type'     => 'text',
    ));
}
add_action( 'customize_register', 'azure_customize_register' );
/* =========================================
   威软科技 - 极简站点访问计数器
   ========================================= */
function azure_get_site_views() {
    // 获取当前存储的访问量，如果没有则为 0
    $count_key = 'azure_site_total_views';
    $count = get_option($count_key);
    if($count == '') {
        $count = 0;
        delete_option($count_key);
        add_option($count_key, '0');
    }
    
    // 如果不是管理员在后台，且不是机器爬虫，则计数+1
    if(!is_admin() && !is_user_logged_in()) {
        $count++;
        update_option($count_key, $count);
    }
    
    // 格式化数字（比如 1000 显示为 1k）- 这里的逻辑先简单返回数字
    return number_format($count); 
}