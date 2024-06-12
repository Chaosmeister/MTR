<li>
<?= $this->modal->small('clone', t('Move to project') . ' Release', 'MtrController', 'moveToRelease', array('task_id' => $task['id'], 'project_id' => $task['project_id'], 'plugin' => 'MoveToReleaseProject')) ?>
</li>