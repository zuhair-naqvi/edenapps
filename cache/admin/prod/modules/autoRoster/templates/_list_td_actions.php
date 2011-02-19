<td style="white-space: nowrap;">
  <ul class="sf_admin_td_actions fg-buttonset fg-buttonset-single">
      
          <?php echo $helper->linkToShow($roster, array(  'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'show',  'label' => 'Show',  'ui-icon' => '',)) ?>
          
          <?php echo $helper->linkToEdit($roster, array(  'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'edit',  'label' => 'Edit',  'ui-icon' => '',)) ?>
          
          <?php echo $helper->linkToDelete($roster, array(  'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ',  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',  'ui-icon' => '',)) ?>
        </ul>
</td>
