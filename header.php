<!Doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=-100%, user-scalable=yes" />
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $GLOBALS['title']; ?></title>
    <link rel="icon" href="<?php echo get_theme_file_uri('/images/favicon.png');?>" type="image/png" sizes="16x16" />
    <meta name="keywords" content="<?php echo $GLOBALS['keywords']; ?>" />
    <meta name="description" content="<?php echo $GLOBALS['description']; ?>" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <?php include('includes/markup_json.php') ?>
    <?php wp_head(); ?>
</head>

<body id="<?php echo $GLOBALS['bodyID']; ?>" class="<?php echo $GLOBALS['bodyClass']; ?>">
    <div id="wrapper">
        <div id="header">
            <div class="box-header idx-fixed">
                <div class="h-information">
                    <h1 class="logo">
                       <a href="#"><img src="<?php echo get_theme_file_uri('/images/logo.png'); ?>" alt="<?php echo $GLOBALS['h1']; ?>" width="50" /></a>
                    </h1>
                    <div id="gnavi" class="main-nav">
                        <!-- adđ -->
                        <a href="<?php echo home_url('/company/about/'); ?>"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end #header-->

