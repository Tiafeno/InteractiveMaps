<?php
/**
 * 	NPI WordPress Theme
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Trirong:100,100i,200,400" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  ng-app="MapsApp" ng-controller="AppCtrl" >
