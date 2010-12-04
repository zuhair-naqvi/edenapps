<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($menu_item->getId(), 'menu_item_edit', $menu_item) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $menu_item->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $menu_item->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $menu_item->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_picture">
  <?php echo $menu_item->getPicture() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_parent_id">
  <?php echo $menu_item->getParentId() ?>
</td>
