<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Controller\Controller;
use Cake\View\JsonView;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        // Force JSON for all /api controllers (CakePHP 5 data view)
        $this->viewBuilder()->setClassName(JsonView::class);
    }
}
