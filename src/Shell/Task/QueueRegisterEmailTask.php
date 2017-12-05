<?php
/**
 * @author eddyokemwa@gmail.com
 * @link http://github.com/zipate
 */

namespace App\Shell\Task;

use Cake\Mailer\Email;
use Queue\Shell\Task\QueueTask;
use Cake\Log\Log;

/**
 * Send registration emails.
 */
class QueueRegisterEmailTask extends QueueTask {

    /* Timeout for run, after which the Task is reassigned to a new worker.     */
    public $timeout = 10;

    /* Number of times a failed instance of this task should be restarted before giving up. */
    public $retries = 1;

    /**
     * @param array $data The array passed to QueuedJobsTable::createJob()
     * @param int $jobId The id of the QueuedJob entity
     * @return bool Success
     */
    public function run(array $data, $jobId) {
        Log::write('debug', 'Mail to ::: '.$data['vars']['user']['email']);
        // Log::write('debug', $data['vars']['user']);
        $this->Email = new Email();
        $this->Email
            ->template('register_email')
            ->emailFormat('html')
            ->to($data['vars']['user']['email'])
            ->setFrom('intellisoftkenya@mail.com')
            ->subject('Registration to MCAZ PV');
        // ...
        if (!empty($data['vars'])) {
            $this->Email->viewVars($data['vars']);
        }

        return (bool)$this->Email->send();
    }

}
