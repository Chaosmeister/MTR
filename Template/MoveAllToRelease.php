<?php if ($column['id'] == 4) : ?>
    <?= $this->url->icon('files-o', '', 'MtrController', 'moveall', array('column' => $column, 'project_id' => $column['project_id'], 'plugin' => 'MTR'),false,'', 'Move all tasks to Release' ) ?>
<?php endif ?>