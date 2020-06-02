<?php
  // Define the themename for drupal_get_path calls.
  $themename = 'aqueduct';
?>

<?php // header ?>

<?php // navigation ?>
<nav id="main-navigation">
<a href="/aqueduct"><img src="/sites/all/themes/aqueduct/images/aqueduct-logo.png" class="aqueduct-logo"></a>
  <?php print render($page['navbar']); ?>
<span class="aqueduct-responsive-menu">&#9776;</span>
</nav>

<header id="main-header">

  <div class="center-content">
    <div id="logo">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
        <!--<img src="<?php print base_path() ?><?php print drupal_get_path('theme', $themename); ?>/images/site-title.png" alt="<?php print $site_name; ?>" />-->
        <span class="element-invisible element-focusable"><?php print $site_name; ?></span>
      </a>
    </div>

    <?php print render($page['header']); ?>
    <h1 class="title"><?php print $title; ?></h1>
    <?php print render($page['subnav']); ?>
  </div>

</header>

<div class="main-container center-content">

  <article id="content-container">
    <a id="main-content"></a>
    <?php if ($tabs): ?><div class="tabs mobile-hide"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print $messages; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

    <?php if(!drupal_is_front_page()): ?>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    <?php endif; ?>

    <div class="primary-content">
      <?php print render($page['content_top']); ?>
      <?php print render($page['content']); ?>
      <?php if(drupal_is_front_page()): ?>

        <?php // Front page content goes here. In some case you might just want have an include instead. ?>

        <?php // This is just a clear all div. ?>
        <div class="clear"></div>
      <?php endif; ?>
      <?php print render($page['content_bottom']); ?>
    </div>
    <?php print $feed_icons; ?>
  </article>

  <?php if ($page['sidebar']): ?>
  <aside id="main-sidebar">
    <?php print render($page['sidebar']); ?>
  </aside>
  <?php endif; ?>

  <div class="clear"></div>

</div>

<div class="clear"></div>

<footer id="footer">
  <div class="footer-content center-content">
    <a href="https://aqueduct-wriorg.pantheonsite.io/aqueduct"><img src="/sites/all/themes/aqueduct/images/aqueduct-logo.png" class="aqueduct-logo-footer"></a>
    <?php print render($page['footer']); ?>
    <div class="clear"></div>
  </div>
</footer>

