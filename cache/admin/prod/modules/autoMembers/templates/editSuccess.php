<?php use_helper('I18N', 'Date') ?>
<?php include_partial('members/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Members', array(), 'messages') ?></h1>

  <?php include_partial('members/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('members/form_header', array('members' => $members, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('members/form', array('members' => $members, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('members/form_footer', array('members' => $members, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
