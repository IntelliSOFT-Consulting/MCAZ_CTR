<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Datasource\Paginator;

/**
 * Notification cell
 */
class NotificationCell extends Cell
{
    public $paginate = [
        // 'limit' => 2,
        'Sadrs' => ['scope' => 'sadr'],
        'Adrs' => ['scope' => 'adr'],
        'Aefis' => ['scope' => 'aefi'],
        'Saefis' => ['scope' => 'saefi'],
        'Notifications' => ['scope' => 'notification'],
    ];
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Notifications');

        $prefix = null;
        if($this->request->session()->read('Auth.User.group_id') == 1) {$prefix = 'admin';} 
        if ($this->request->session()->read('Auth.User.group_id') == 2) { $prefix = 'manager'; }
        if ($this->request->session()->read('Auth.User.group_id') == 4) { $prefix = 'evaluator'; }
        
        
        // $notifications = $this->Notifications->find('all');
        // Create a paginator
        // $paginator = new Paginator();
        // // Paginate the model
        // $notifications = $paginator->paginate($this->Notifications->find('all'), ['scope' => 'notification', 'limit' => 5, 'order' => ['Notification.id' => 'desc']]);
        // $paging = $paginator->getPagingParams() + (array)$this->request->getParam('paging');
        // $this->request = $this->request->withParam('paging', $paging);

        // $this->set(compact('notifications', 'prefix'));
        // // $this->set(['prefix'=> $prefix]);

        $this->loadModel('Notifications');

        // Create a paginator
        $paginator = new Paginator();

        // Paginate the model
        $notifications = $paginator->paginate(
            $this->Notifications->find('all', [
                //'order' => ['Notifications.created' => 'DESC'], //affects fron end sort
                'contain' => ['Messages']])
            ->where(['user_id' => $this->request->session()->read('Auth.User.id')]),
            $this->request->getQueryParams(),
            [
                // Use a parameterized custom finder.
                // 'finder' => ['favorites' => [$user]],
                'limit' => 5,
                'order' => ['Notifications.created' => 'DESC'],
                // Use scoped query string parameters.
                'scope' => 'notifications',
            ]
        );

        $paging = $paginator->getPagingParams() + (array)$this->request->getParam('paging');
        $this->request = $this->request->withParam('paging', $paging);

        $this->set(compact('notifications', 'prefix'));
    }

    public function style($name = null)
    {
        $this->loadModel('Messages');

        $query = $this->Messages->find('all')->where(['name' => $name])->first();

        // Paginate the model
        $notifications = $paginator->paginate(
            $this->Notifications->find('all')->where(['user_id' => $this->request->session()->read('Auth.User.id')]),
            $this->request->getQueryParams(),
            [
                // Use a parameterized custom finder.
                // 'finder' => ['favorites' => [$user]],
                'limit' => 5,
                // Use scoped query string parameters.
                'scope' => 'notifications',
            ]
        );

        $paging = $paginator->getPagingParams() + (array)$this->request->getParam('paging');
        $this->request = $this->request->withParam('paging', $paging);

        $this->set(compact('notifications', 'prefix'));
    }
}
