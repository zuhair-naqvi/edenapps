<td colspan="4">
  <?php echo __('%%id%% - %%title%% - %%description%% - %%picture%%', array('%%id%%' => link_to($box->getId(), 'box_edit', $box), '%%title%%' => $box->getTitle(), '%%description%%' => $box->getDescription(), '%%picture%%' => $box->getPicture()), 'messages') ?>
</td>
