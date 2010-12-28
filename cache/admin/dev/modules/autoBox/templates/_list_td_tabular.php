<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($box->getId(), 'box_edit', $box) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $box->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $box->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_picture">
  <?php echo $box->getPicture() ?>
</td>
