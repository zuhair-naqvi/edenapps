<td colspan="6">
  <?php echo __('%%id%% - %%name%% - %%title%% - %%description%% - %%picture%% - %%parent_id%%', array('%%id%%' => link_to($menu_item->getId(), 'menu_item_edit', $menu_item), '%%name%%' => $menu_item->getName(), '%%title%%' => $menu_item->getTitle(), '%%description%%' => $menu_item->getDescription(), '%%picture%%' => $menu_item->getPicture(), '%%parent_id%%' => $menu_item->getParentId()), 'messages') ?>
</td>
