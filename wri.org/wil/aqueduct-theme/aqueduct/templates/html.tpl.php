<?php
  // Define the themename for drupal_get_path calls.
  $themename = 'aqueduct';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="<?php print $grddl_profile; ?>">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- favicon -->
  <link rel="shortcut icon" href="<?php print base_path() ?><?php print drupal_get_path('theme', $themename); ?>/favicon.ico" type="image/x-icon" />

  <!-- stylesheets -->
  <?php print $styles; ?>

  <!-- typekit -->
  <script type="text/javascript" src="//use.typekit.net/ezo4zbn.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php print base_path() ?><?php print drupal_get_path('theme', $themename); ?>/css/style-ie.css" type="text/css" media="screen" />
  <![endif]-->

  <!-- javascript -->
  <?php print $scripts; ?>

</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

</body>

</html>
