<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($members->getId(), 'members_edit', $members) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $members->getName() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_level">
  <?php echo $members->getLevel() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email">
  <?php echo $members->getEmail() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_last_login">
  <?php echo false !== strtotime($members->getLastLogin()) ? format_date($members->getLastLogin(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($members->getCreatedAt()) ? format_date($members->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($members->getUpdatedAt()) ? format_date($members->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
