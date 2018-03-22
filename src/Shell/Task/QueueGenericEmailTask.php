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
use Cake\Filesystem\File;
use Exception;

/**
 * Send registration emails.
 */
class QueueGenericEmailTask extends QueueTask {

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Messages');
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

            Log::write('debug', 'Mail to ::: '.$data['email_address']);
            // Log::write('debug', $data['vars']);
            $message = $this->Messages->findByName($data['type'])->first();
            //$this->out(print_r($message, true));

            $this->Email = new Email();
            if(!empty($data['email_address'])) {
            $this->Email
                ->emailFormat('html')
                ->to($data['email_address'])
                ->subject(Text::insert($message['subject'], $data['vars']));
            // ...
            // if (!empty($data['vars'])) {
            //     $this->Email->viewVars($data['vars']);
            // }

            $file = new File(WWW_ROOT. 'img' . DS . 'html' . DS . 'mcaz_logo.html');
            $data['vars']['mcaz_logo'] = $file->read();

            return (bool)$this->Email->send(Text::insert($message['content'], $data['vars']));
            } else {
                Log::write('debug', "Null email");
                return;
            }
    }

}
