<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Theme hook suggestions are made based on these factors, listed from the most
 * specific template to the least. Drupal will use the most specific template 
 * it finds:
 *
 * node--nodeid.tpl.php
 * node--type.tpl.php
 * node.tpl.php
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);

    print '<pre>';
    //print_r($content);
    print '</pre>';

    // Get the timezone offset
    $timezone = $field_event_date[0]['timezone'];
    $remote_dtz = new DateTimeZone($timezone);
    $remote_dt = new DateTime("now", $remote_dtz);
    $offset = $remote_dtz->getOffset($remote_dt);

    // Get the date
    $start_date_string = $field_event_date[0]['value'];
    $end_date_string = $field_event_date[0]['value2'];

    // Apply the timezone offset
    $start_date_string = strtotime(date("Y-m-d g:ia", strtotime($field_event_date[0]['value'])) . " " . $offset . " seconds");
    $end_date_string = strtotime(date("Y-m-d g:ia", strtotime($field_event_date[0]['value2'])) . " " . $offset . " seconds");

    // Build the date
    $start_disp_date = date('l, F j, Y', $start_date_string);
    $end_disp_date = date('l, F j, Y', $end_date_string);
    $start_disp_time = date('g:ia', $start_date_string);
    $end_disp_time = date('g:ia', $end_date_string);

    $description = $body[0]['safe_value'];
    $exttitle = $field_event_exttitle[0]['safe_value'];
    $location = $field_event_location[0]['safe_value'];
    $first_name = $field_event_fname[0]['safe_value'];
    $last_name = $field_event_lname[0]['safe_value'];
    $phone = $field_event_phone[0]['safe_value'];
    $email = $field_event_email[0]['email'];
    $event_type = $field_event_type[0]['name'];
    $event_type_url = $field_event_type[0]['path'];
    $url = $field_event_link[0];
    $url_title = $field_event_link[0];

    if ($exttitle == '') {
      $fulltitle = $title;
    }
    else {
      $fulltitle = $title . ' ' . $exttitle;
    }

  ?>

  <div class="content"<?php print $content_attributes; ?>>
    <div id="event-container">
      <h2><?php print $fulltitle; ?></h2>
      <div class="event-date"><strong>When</strong>
        <div class="event-date-wrapper">
      <?php
        if ($start_disp_date == $end_disp_date) {
          print $start_disp_date;
        }
        else {
          print $start_disp_date . ' to ' . $end_disp_date;
        }
        print '<br />' . $start_disp_time . ' - ' . $end_disp_time;
      ?>
        </div>
      </div>
      <div class="event-location"><strong>Where</strong>: <?php print $location; ?></div><br />
      <div class="event-description"><?php print $description; ?></div>
      <div class="event-contact">
        <strong>Contact</strong>
        <div class="event-contact-wrapper">
          <?php print $first_name . ' ' . $last_name ?><br />
          <strong>Phone</strong>: <?php print $phone; ?><br />
          <strong>Email</strong>: <a href="mailto:<?php print $email; ?>" title="Email <?php print $first_name . ' ' . $last_name ?>."><?php print $email; ?></a>
        </div>
      </div>
    </div>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
