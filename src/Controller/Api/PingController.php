<?php
declare(strict_types=1);

namespace App\Controller\Api;

final class PingController extends AppController
{
    public function index(): ?\Cake\Http\Response
    {
        $this->set(['ok' => true]);
        $this->viewBuilder()->setOption('serialize', ['ok']);

        return null;
    }
}
