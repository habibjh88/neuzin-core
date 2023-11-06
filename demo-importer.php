<?php
/**
 * @author  DevOfWP
 * @since   1.0
 * @version 1.0
 */

namespace devofwp\Neuzin_Core;

use \FW_Ext_Backups_Demo;
use \WPCF7_ContactFormTemplate;

if (! defined('ABSPATH')) {
    exit;
}

class Demo_Importer
{

    public function __construct()
    {
        add_filter('plugin_action_links_rt-demo-importer/rt-demo-importer.php', array( $this, 'add_action_links' )); // Link from plugins page
        add_filter('rt_demo_installer_warning', array( $this, 'data_loss_warning' ));
        add_filter('fw:ext:backups-demo:demos', array( $this, 'demo_config' ));
        add_action('fw:ext:backups:tasks:success:id:demo-content-install', array( $this, 'after_demo_install' ));
    }

    public function add_action_links($links)
    {
        $mylinks = array(
            '<a href="' . esc_url(admin_url('tools.php?page=fw-backups-demo-content')) . '">'.__('Install Demo Contents', 'neuzin-core').'</a>',
        );
        return array_merge($links, $mylinks);
    }

    public function data_loss_warning($links)
    {
        $html  = '<div style="margin-top:20px;color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
        $html .= __('Warning: All your old data will be lost if you install One Click demo data from here, so it is suitable only for a new website.', 'neuzin-core');
        $html .= '</div>';
        return $html;
    }

    public function demo_config($demos)
    {
        $demos_array = array(
            'demo1' => array(
                'title' => __('Home 1', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot1.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/',
            ),       
            'demo2' => array(
                'title' => __('Home 2', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot2.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-2/',
            ),
            'demo3' => array(
                'title' => __('Home 3', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot3.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-3/',
            ),
            'demo4' => array(
                'title' => __('Home 4', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot4.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-4/',
            ),
            'demo5' => array(
                'title' => __('Home 5', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot5.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-5/',
            ),
            'demo6' => array(
                'title' => __('Home 6', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot6.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-6/',
            ),
            'demo7' => array(
                'title' => __('Home 7', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot7.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-7/',
            ),
            'demo8' => array(
                'title' => __('Home 8', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot8.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-8/',
            ),
            'demo9' => array(
                'title' => __('Home 9', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot9.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-9/',
            ),
            'demo10' => array(
                'title' => __('Home 10', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot10.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-10/',
            ),
            'demo11' => array(
                'title' => __('Home 11', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot11.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-11/',
            ),
            'demo12' => array(
                'title' => __('Home 12', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot12.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-12/',
            ), 
            'demo13' => array(
                'title' => __('Home 13', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot13.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-13/',
            ),
            'demo14' => array(
                'title' => __('Home 14', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot14.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-14/',
            ),
            'demo15' => array(
                'title' => __('Home 15', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot15.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-15/',
            ),
            'demo16' => array(
                'title' => __('Home 16', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot16.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home-16/',
            ),
            'demo17' => array(
                'title' => __('Home 1 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot1.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home1-one-page/',
            ),
            'demo18' => array(
                'title' => __('Home 2 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot2.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home2-one-page/',
            ),
            'demo19' => array(
                'title' => __('Home 3 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot3.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home3-one-page/',
            ),
            'demo20' => array(
                'title' => __('Home 4 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot4.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home4-one-page/',
            ),
            'demo21' => array(
                'title' => __('Home 6 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot6.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home6-one-page/',
            ),
            'demo22' => array(
                'title' => __('Home 7 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot7.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home7-one-page/',
            ),
            'demo23' => array(
                'title' => __('Home 8 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot8.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home8-one-page/',
            ),
            'demo24' => array(
                'title' => __('Home 9 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot9.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home9-one-page/',
            ),
            'demo25' => array(
                'title' => __('Home 10 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot10.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home10-one-page/',
            ),
            'demo26' => array(
                'title' => __('Home 11 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot11.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home11-one-page/',
            ),
            'demo27' => array(
                'title' => __('Home 12 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot12.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home12-one-page/',
            ),
            'demo28' => array(
                'title' => __('Home 13 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot13.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home13-one-page/',
            ),
            'demo29' => array(
                'title' => __('Home 14 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot14.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home14-one-page/',
            ),
            'demo30' => array(
                'title' => __('Home 15 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot15.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home15-one-page/',
            ),
            'demo31' => array(
                'title' => __('Home 16 ( One Page )', 'neuzin-core'),
                'screenshot' => plugins_url('screenshots/screenshot16.jpg', __FILE__),
                'preview_link' => 'https://devofwp.com/demo/wordpress/themes/neuzin/home16-one-page/',
            ),
 
        );

        $download_url = 'http://demo.devofwp.com/wordpress/demo-content/neuzin/';

        foreach ($demos_array as $id => $data) {
            $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
                'url' => $download_url,
                'file_id' => $id,
            ));

            $demo->set_title($data['title']);
            $demo->set_screenshot($data['screenshot']);
            $demo->set_preview_link($data['preview_link']);

            $demos[ $demo->get_id() ] = $demo;

            unset($demo);
        }

        return $demos;
    }

    public function after_demo_install($collection)
    {
        // Update front page id
        $demos = array(
            'demo1'  => 126,
            'demo2'  => 128,
            'demo3'  => 130,
            'demo4'  => 132,
            'demo5'  => 134,
            'demo6'  => 2862,
            'demo7'  => 2958,
            'demo8'  => 3019,
            'demo9'  => 3045,
            'demo10'  => 3054,
            'demo11'  => 3174,
            'demo12'  => 3250,
            'demo13'  => 3412,
            'demo14'  => 3948,
            'demo15'  => 3964,
            'demo16'  => 3979,
            'demo17'  => 2771,
            'demo18'  => 2787,
            'demo19'  => 2805,
            'demo20'  => 2821,
            'demo21'  => 2873,
            'demo22'  => 2960,
            'demo23'  => 3112,
            'demo24'  => 3113,
            'demo25'  => 3116,
            'demo26'  => 3177,
            'demo27'  => 3289,
            'demo28'  => 3735,
            'demo29'  => 4064,
            'demo30'  => 4065,
            'demo31'  => 4066,
        );

        $data = $collection->to_array();

        foreach ($data['tasks'] as $task) {
            if ($task['id'] == 'demo:demo-download') {
                $demo_id = $task['args']['demo_id'];
                $page_id = $demos[$demo_id];
                update_option('page_on_front', $page_id);
                flush_rewrite_rules();
                break;
            }
        }

        // Update contact form 7 email
        $cf7ids = array( 1680, 1711 );
        foreach ($cf7ids as $cf7id) {
            $mail = get_post_meta($cf7id, '_mail', true);
            $mail['recipient'] = get_option('admin_email');
            if ( empty( $mail ) ) {
               $mail = [];
            }

            if (class_exists('WPCF7_ContactFormTemplate')) {
                $pattern = "/<[^@\s]*@[^@\s]*\.[^@\s]*>/"; // <email@email.com>
                $replacement = '<'. WPCF7_ContactFormTemplate::from_email().'>';
                $mail['sender'] = preg_replace($pattern, $replacement, $mail['sender']);
            }
            
            update_post_meta($cf7id, '_mail', $mail);
        }

        // Update WooCommerce emails
        $admin_email = get_option('admin_email');
        update_option('woocommerce_email_from_address', $admin_email);
        update_option('woocommerce_stock_email_recipient', $admin_email);
    }
}

new Demo_Importer;
