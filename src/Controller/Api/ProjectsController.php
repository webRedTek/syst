<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Http\Exception\BadRequestException;

final class ProjectsController extends AppController
{
    public function upsert(): ?\Cake\Http\Response
    {
        $this->request->allowMethod(['post']);
        $data = (array)$this->request->getData();

        if (empty($data['external_id'])) {
            throw new BadRequestException('external_id is required');
        }
        if (empty($data['name'])) {
            throw new BadRequestException('name is required');
        }

        $projects = $this->fetchTable('Projects');

        $existing = $projects->find()
            ->where(['external_id' => (string)$data['external_id']])
            ->first();

        $entity = $existing ?? $projects->newEmptyEntity();

        if (!isset($data['status'])) {
            $data['status'] = 'active';
        }

        $entity = $projects->patchEntity($entity, $data);

        if ($entity->hasErrors()) {
            $this->response = $this->response->withStatus(422);
            $this->set([
                'ok' => false,
                'errors' => $entity->getErrors(),
            ]);
            $this->viewBuilder()->setOption('serialize', ['ok', 'errors']);
            return null;
        }

        $projects->saveOrFail($entity);

        $this->set([
            'ok' => true,
            'project' => [
                'id' => $entity->id,
                'external_id' => $entity->external_id,
                'name' => $entity->name,
                'status' => $entity->status,
            ],
        ]);
        $this->viewBuilder()->setOption('serialize', ['ok', 'project']);
        return null;
    }
}
