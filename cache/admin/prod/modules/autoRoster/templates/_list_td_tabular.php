<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($roster->getId(), 'roster_edit', $roster) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_member_id">
  <?php echo $roster->getMemberId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_monday">
  <?php echo $roster->getMonday() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_tuesday">
  <?php echo $roster->getTuesday() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_wednesday">
  <?php echo $roster->getWednesday() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_thursday">
  <?php echo $roster->getThursday() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_friday">
  <?php echo $roster->getFriday() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_saturday">
  <?php echo $roster->getSaturday() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_sunday">
  <?php echo $roster->getSunday() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($roster->getCreatedAt()) ? format_date($roster->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($roster->getUpdatedAt()) ? format_date($roster->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
