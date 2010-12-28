<?php use_helper('I18N', 'Date') ?>
<?php include_partial('box/assets') ?>

<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?php echo __('New Box', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('box/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('box/form_header', array('box' => $box, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('box/form', array('box' => $box, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('box/form_footer', array('box' => $box, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <?php include_partial('box/themeswitcher') ?>
</div>
