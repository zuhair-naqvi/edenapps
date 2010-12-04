<?php use_helper('I18N', 'Date') ?>
<?php include_partial('menu/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Menu', array(), 'messages') ?></h1>

  <?php include_partial('menu/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('menu/form_header', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('menu/form', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('menu/form_footer', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
