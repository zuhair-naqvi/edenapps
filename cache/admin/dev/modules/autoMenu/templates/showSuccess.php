<?php use_helper('I18N', 'Date') ?>
<?php include_partial('menu/assets') ?>

<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?php echo __('View Menu', array(), 'messages') ?></h1>
  </div>

  <div class="sf_admin_actions_block ui-widget">
      <?php include_partial('menu/show_actions', array('form' => $form, 'menu_item' => $menu_item, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div class="ui-helper-clearfix"></div>

  <?php include_partial('show', array('form' => $form, 'menu_item' => $menu_item, 'configuration' => $configuration)) ?>

  <?php include_partial('menu/themeswitcher') ?>
</div>
