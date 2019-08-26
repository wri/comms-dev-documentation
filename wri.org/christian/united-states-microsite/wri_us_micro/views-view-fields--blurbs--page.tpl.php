<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<style>
/*
.view-content { font-size: .9em; }
#blurbs-container { 
  width: 100%; 
  border-top: solid #ccc 1px;
  padding-top: 1em;
}
#blurbs-container .blurb-col {
  width: calc(22% - 10px);
  display: inline-block;
  vertical-align: top;
  margin-bottom: 1.5em;
  padding-right: 10px;
}
#blurbs-container .blurb-col.first {
  width: calc(40% - 14px);
  padding-right: 14px;
}
#blurbs-container .blurb-col.last {
  width: 15%;
  padding-right: 0;
}
*/
</style>

<div id="blurbs-container">
  <div class="blurb-col first">
    <?php print $fields['title']->content; ?>
    <?php print $fields['body']->content; ?>
    <?php print $fields['field_blurb_link']->content; ?>
  </div>
  <div class="blurb-col">
    <?php print $fields['field_author']->content; ?>
  </div>
  <div class="blurb-col">
    <?php print $fields['term_node_tid']->content; ?>
  </div>
  <div class="blurb-col last">
    <?php print $fields['created']->content; ?>
  </div>
</div>

<?php //foreach ($fields as $id => $field): ?>
  <?php //if (!empty($field->separator)): ?>
    <?php //print $field->separator; ?>
  <?php //endif; ?>

  <?php //print $field->wrapper_prefix; ?>
    <?php //print $field->label_html; ?>
    <?php //print $field->content; ?>
  <?php //print $field->wrapper_suffix; ?>
<?php //endforeach; ?>

<?php //dsm($fields); ?>
