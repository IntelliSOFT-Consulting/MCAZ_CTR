<?php
namespace App\Controller\Admin;

use App\Controller\Base\NotificationsBaseController;

class NotificationsController extends NotificationsBaseController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Messages'],
            'order' => ['Notifications.created' => 'DESC']
        ];
        $withDeleted = ($this->request->getQuery('deleted')) ? 'withDeleted' : '';
        $query = $this->Notifications
            ->find('search', ['search' => $this->request->query, $withDeleted ]);

        $this->set('notifications', $this->paginate($query));
        $this->render('/Base/Notifications/index');
    }
}
