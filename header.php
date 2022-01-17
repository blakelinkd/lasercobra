<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header>

    <div id="header" class="bootstrap-wrapper">
        <div id="nav" class="container-fluid">
            <div class="row">
                <div id="logo" class="col-md-2">
                    <h1>Logo</h1>
                </div>
                <!-- <div id="menu" class="col-md-6">
                    <ul class="row">
                        <li class="col-md-6">one</li>
                        <li class="col-md-6">two</li>
                    </ul>
                </div> -->
                
                
                <div id="nav-search" class="col-md-6">
                <?php get_template_part('header-search'); ?>
                </div>
                <div id="nav-user" class="col-md-4">
                    <a href="/wordpress/wp-admin">
                    <?php 
                    if(is_user_logged_in()): 
                        $current_user = wp_get_current_user();
                        echo $current_user->user;
                    else:
                        echo "Login";
                    endif;
                    ?></a>
                <h1>User Stuff</h1></div>
                </div>

            </div>
        </div>

    </div>
</header>