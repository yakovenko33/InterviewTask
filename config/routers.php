<?php

    function routersConfig()
    {
        return array(
            '/' => 'default/home',
            '/article/([0-9]+)' => 'default/home/$1'
        );
    }

