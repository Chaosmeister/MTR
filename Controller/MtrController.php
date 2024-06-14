<?php

namespace Kanboard\Plugin\MTR\Controller;

use Kanboard\Controller\BaseController;


class MtrController extends BaseController
{
    const TargetProjectId = 11;

    public function move()
    {
        $task = $this->getTask();
        $currentproject = $task['project_id'];

        if (!$this->projectPermissionModel->isUserAllowed(self::TargetProjectId, $this->userSession->getId())) {
            throw new AccessForbiddenException();
        }

        if ($this->taskProjectMoveModel->moveToProject($task['id'], self::TargetProjectId)) {
            return $this->response->redirect($this->helper->url->to('BoardViewController', 'show', array('project_id' => $currentproject)));
        }
    }
}
