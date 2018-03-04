<?php
/**
 * @author eddyokemwa@gmail.com
 * @link http://github.com/zipate
 */

namespace App\Shell\Task;

use Cake\Mailer\Email;
use Queue\Shell\Task\QueueTask;
use Cake\Log\Log;
use Cake\Utility\Text;

/**
 * Send registration emails.
 */
class QueueGenericNotificationTask extends QueueTask {

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Messages');
        $this->loadModel('Notifications');
    }

    /* Timeout for run, after which the Task is reassigned to a new worker.     */
    public $timeout = 10;

    /* Number of times a failed instance of this task should be restarted before giving up. */
    public $retries = 3;

    /**
     * @param array $data The array passed to QueuedJobsTable::createJob()
     * @param int $jobId The id of the QueuedJob entity
     * @return bool Success
     */
    public function run(array $data, $jobId) {
        //Log::write('debug', 'Notification to ::: '.$data['email_address']);
        // Log::write('debug', $data['vars']['user']);
        $message = $this->Messages->findByName($data['type'])->first();
        $notification = $this->Notifications->newEntity();
        $notification = $this->Notifications->patchEntity($notification, $data);
        $notification->system_message = Text::insert($message['content'], $data['vars']);
        if($notification->type == 'message') {
            $notification->user_message = $data['user_message'];
        }
        if ($this->Notifications->save($notification)) {
            Log::write('debug', 'Notification ::: '.$notification);
            return true;
        }
    }

}
