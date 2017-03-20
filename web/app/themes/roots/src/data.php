<?php
namespace App;

add_filter('sage/template/home/data', function() {
    return [
        'menu' => [
            'professional'    => 'Professional',
            'personal'    => 'Personal',
            'blog'  => 'Blog',
            'about' => 'About'
        ]
    ]; 
});
