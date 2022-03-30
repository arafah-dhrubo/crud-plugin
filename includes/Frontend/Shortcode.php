<?php

class Shortcode{
    function __construct()
    {
        add_shortcode('crud-plugin', [$this, 'render_shortcode']);
    }

    public function render_shortcode($atts, $content=''){
        return 'Hello From Shortcode';
    }
}