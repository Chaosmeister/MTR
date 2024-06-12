<li>
<?= $this->modal->small('clone', t('Move to project') . ' Release', 'MtrController', 'move', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'plugin' => 'MTR')) ?>
</li>