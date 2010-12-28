<td colspan="3">
  <?php echo __('%%id%% - %%title%% - %%description%%', array('%%id%%' => link_to($shits_me_list->getId(), 'shits_me_list_edit', $shits_me_list), '%%title%%' => $shits_me_list->getTitle(), '%%description%%' => $shits_me_list->getDescription()), 'messages') ?>
</td>
