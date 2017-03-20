<?php
namespace App;

// Layout Specific
// add_filter('sage/template/home/data', function($data) {
//     $data['menu'] = [
//         'professional'    => 'Professional',
//         'personal'    => 'Personal',
//         'blog'  => 'Blog',
//         'about' => 'About'
//     ];
//     return $data;
// });

add_action('after_setup_theme', function () {
  // Globals
  sage('blade')->share('menu', 
    [
        'professional'    => 'Professional',
        'personal'    => 'Personal',
        'blog'  => 'Blog',
        'about' => 'About'
    ]);
});