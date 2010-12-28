<td colspan="6">
  <?php echo __('%%id%% - %%name%% - %%level%% - %%email%% - %%created_at%% - %%updated_at%%', array('%%id%%' => link_to($members->getId(), 'members_edit', $members), '%%name%%' => $members->getName(), '%%level%%' => $members->getLevel(), '%%email%%' => $members->getEmail(), '%%created_at%%' => false !== strtotime($members->getCreatedAt()) ? format_date($members->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($members->getUpdatedAt()) ? format_date($members->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>
