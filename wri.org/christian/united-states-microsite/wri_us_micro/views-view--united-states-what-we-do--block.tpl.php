<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>

<script src="https://use.fontawesome.com/ff6778ff14.js"></script>

<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>

<?php 
  if (isset($_GET["project"])) {
    $project = $_GET["project"];
  }
  else {
    $project = "smart-infrastructure";
  }
?>

<script>

jQuery(document).ready(function() {
  //on page load do this
  // jQuery("#tab-water").addClass("added-on-load");
  //jQuery(".directory-content").hide();
  //toggle the component with class msg_body
  //jQuery(".directory-expand").click(function()
  //{
  //  jQuery(this).next(".directory-content").slideToggle(600);
  //});
  //toggle tab classes

  var theproject = "<?php echo $project; ?>";

  //jQuery("#tab-infra").click(function() 
  if (theproject === "smart-infrastructure")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-infra").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-infra").addClass("active");
  }
  //});
  //jQuery("#tab-reba").click(function() 
  else if (theproject === "renewable-natural-gas")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-reba").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-reba").addClass("active");
  }
  //});
  //jQuery("#tab-water").click(function() 
  else if (theproject === "science-based-targets")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-water").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-water").addClass("active");
  }
  //});
  //jQuery("#tab-climate").click(function() 
  else if (theproject === "next-project-name")
  {
    jQuery(".project-tab").removeClass("active");
    jQuery("#tab-climate").addClass("active");
    jQuery(".project-link").removeClass("active");
    jQuery("#link-climate").addClass("active");
  }

  console.warn(theproject);

  //});
});

</script>

    <style>
   /* 

    #the-tabs {}

    #the-tabs .project-tab {
    display: inline-block;
    padding: 0.35em 0.8em 0.1em;
    margin: 0 0.1em 0 0;
    border: #ddd solid 1px;
    border-bottom: #ddd solid 1px;
    border-top-left-radius: 0.5em;
    border-top-right-radius: 0.5em;
    font-weight: 300;
    font-size: .8em;
    }

    #the-tabs .project-tab.active {
    font-weight: 700;
    border: none;
    background: #fff;
    padding-bottom: 6px;
    margin-right: 0;
    }

    #block-views-united-states-what-we-do-block .view-content {
      background: #fff;
      padding: .5em;
      height: 370px
    }

    .project-link { display: none; }

    .project-link.active {
      display: block;
      float: right;
      font-size: .9em;
      margin-top: .5em;
      padding-right: .9em;
    }

    */
    </style>

    <div id="the-tabs">
      <a href="united-states?project=smart-infrastructure"><div id="tab-infra" class="project-tab">Smart Infrastructure</div></a>
      <a href="united-states?project=renewable-natural-gas"><div id="tab-reba" class="project-tab">Renewable Natural Gas</div></a>
      <a href="united-states?project=science-based-targets"><div id="tab-water" class="project-tab">Science-Based Targets</div></a>
    </div>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
    <div id="link-infra" class="project-link"><a href="/dev/united-states/smart-infrastructure">See more on the Smart Infrastructure page</a></div>
    <div id="link-reba" class="project-link"><a href="/dev/united-states/renewable-natural-gas">See more on the Renewable Natural Gas page</a></div>
    <div id="link-water" class="project-link"><a href="/dev/united-states/Science-based-targets">See more on the Science-Based Targets page</a></div>
    <!--<div id="link-climate" class="project-link"><a href="/dev/united-states/privte-sector">See more on the Private Sector page</a></div>-->

  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
