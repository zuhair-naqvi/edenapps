<?php use_helper('I18N', 'Date') ?>
<?php include_partial('menu/assets') ?>
<pre><?php if(isset($menuItems)) print_r($menuItems); ?></pre>
<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?php echo __('Import Food and Drinks Items', array(), 'messages') ?></h1>
  </div>

  <?php include_partial('menu/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('menu/form_header', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_stylesheets_for_form($form) ?>
    <?php include_javascripts_for_form($form) ?>

    <div class="sf_admin_form">
        <form action="<?php echo url_for('menu/import') ?>" method="POST" enctype="multipart/form-data">

        <div class="sf_admin_actions_block ui-widget">
          <?php include_partial('menu/form_actions', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>

        <div class="ui-helper-clearfix"></div>

        <?php echo $form->renderHiddenFields() ?>

        <?php if ($form->hasGlobalErrors()): ?>
          <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>


            <?php 
                    $count = 0;
                    foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): 
                            $count++;
        endforeach; 
                    ?>


            <div id="sf_admin_form_tab_menu">
                            <?php if ($count > 1): ?>
                            <ul>
                <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
                                    <?php $count++ ?>
                                    <li><a href="#sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>"><?php echo __($fieldset, array(), 'messages') ?></a></li>
                <?php endforeach; ?>
                            </ul>
                            <?php endif ?>

                <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
                  <?php include_partial('menu/form_fieldset', array('menu_item' => $menu_item, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
                <?php endforeach; ?>
                    </div>


        <div class="sf_admin_actions_block ui-widget ui-helper-clearfix">
          <?php include_partial('menu/form_actions', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>

      </form>
    </div>

  </div>

  <div id="sf_admin_footer">
    <?php include_partial('menu/form_footer', array('menu_item' => $menu_item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <?php include_partial('menu/themeswitcher') ?>
</div>
