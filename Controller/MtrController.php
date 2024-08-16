<?php

namespace Kanboard\Plugin\MTR\Controller;

use Kanboard\Controller\BaseController;


class MtrController extends BaseController
{
    const SourceProjectId = 1;
    const TargetProjectId = 11;
    const Column = 4;

    public function move()
    {
        if (!$this->projectPermissionModel->isUserAllowed(self::SourceProjectId, $this->userSession->getId())) {
            throw new AccessForbiddenException();
        }

        if (!$this->projectPermissionModel->isUserAllowed(self::TargetProjectId, $this->userSession->getId())) {
            throw new AccessForbiddenException();
        }

        $task = $this->getTask();

        if ($this->taskProjectMoveModel->moveToProject($task['id'], self::TargetProjectId)) {
            return $this->response->redirect($this->helper->url->to('BoardViewController', 'show', array('project_id' => $task['project_id'])));
        }
    }

    public function moveall()
    {
        if (!$this->projectPermissionModel->isUserAllowed(self::SourceProjectId, $this->userSession->getId())) {
            throw new AccessForbiddenException();
        }

        if (!$this->projectPermissionModel->isUserAllowed(self::TargetProjectId, $this->userSession->getId())) {
            throw new AccessForbiddenException();
        }

        $tasks = $this->taskFinderModel->getAll(self::SourceProjectId);

        foreach ($tasks as $task) {
            if ($task['column_id'] == self::Column) {
                if ($task['id'] != 482)
                $this->taskProjectMoveModel->moveToProject($task['id'], self::TargetProjectId);
            }
        }

        return $this->response->redirect($this->helper->url->to('BoardViewController', 'show', array('project_id' => self::SourceProjectId)));
    }
}
