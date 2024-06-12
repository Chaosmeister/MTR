<?php

namespace Kanboard\Plugin\MTR\Controller;

use Kanboard\Controller\BaseController;

class MtrController extends BaseController
{
    public function move()
    {
        $task = $this->getTask();
        $values = $this->request->getValues();
        
        if (!$this->projectPermissionModel->isUserAllowed($values['project_id'], $this->userSession->getId())) {
            throw new AccessForbiddenException();
        }

        if ($this->taskProjectMoveModel->moveToProject($task['id'], 11)) {
            $this->flash->success(t('Task updated successfully.'));
            return $this->response->redirect($this->helper->url->to('TaskViewController', 'show', array('task_id' => $task['id'])));
        }
    }
}
