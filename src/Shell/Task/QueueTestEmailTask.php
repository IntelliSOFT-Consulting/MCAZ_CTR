<?php
/**
 * @author MGriesbach@gmail.com
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link http://github.com/MSeven/cakephp_queue
 */

namespace App\Shell\Task;

use Cake\Mailer\Email;
use Queue\Shell\Task\QueueTask;

/**
 * A Simple QueueTask example.
 */
class QueueTestEmailTask extends QueueTask {

	/**
	 * Timeout for run, after which the Task is reassigned to a new worker.
	 *
	 * @var int
	 */
	public $timeout = 10;

	/**
	 * Number of times a failed instance of this task should be restarted before giving up.
	 *
	 * @var int
	 */
	public $retries = 1;

	/**
	 * Example add functionality.
	 * Will create one example job in the queue, which later will be executed using run();
	 *
	 * @return void
	 */
	public function add() {
		$this->out('CakePHP Queue Example task.');
		$this->hr();
		$this->out('This is a very simple example of a QueueTask.');
		$this->out('I will now add an example Job into the Queue.');
		$this->out('This job will only produce some console output on the worker that it runs on.');
		$this->out(' ');
		$this->out('To run a Worker use:');
		$this->out('	bin/cake queue runworker');
		$this->out(' ');
		$this->out('You can find the sourcecode of this task in: ');
		$this->out(__FILE__);
		$this->out(' ');
		/*
		 * Adding a task of type 'example' with no additionally passed data
		 */
		if ($this->QueuedJobs->createJob('Example', null)) {
			$this->out('OK, job created, now run the worker');
		} else {
			$this->err('Could not create Job');
		}
	}

	/**
	 * Example run function.
	 * This function is executed, when a worker is executing a task.
	 * The return parameter will determine, if the task will be marked completed, or be requeued.
	 *
	 * @param array $data The array passed to QueuedJobsTable::createJob()
	 * @param int $jobId The id of the QueuedJob entity
	 * @return bool Success
	 */
	public function run(array $data, $jobId) {
		/*$this->Email = new Email();
		$this->Email
			->template('test_email')
			->emailFormat('html')
			->to('eddieokemwa@gmail.com')
			->setFrom('intellisoftkenya@mail.com');
		// ...
		if (!empty($data['vars'])) {
		    $this->Email->viewVars($data['vars']);
		}

		return (bool)$this->Email->send();*/
		
		Log::write('debug', 'Mail to ::: '.$data['email_address']);
        // Log::write('debug', $data['vars']['user']);
        $message = $this->Messages->findByName($data['type'])->first();
        //$this->out(print_r($message, true));

        $this->Email = new Email();
        $this->Email
            ->emailFormat('html')
            ->to($data['email_address'])
            ->subject(Text::insert($message['subject'], $data['vars']));
            // ->message(Text::insert('Are we to honestly believe that content is not showing :reference_number', $data['vars']));
            // ->message(Text::insert($message['content'], $data['vars']));
        // ...
        // if (!empty($data['vars'])) {
        //     $this->Email->viewVars($data['vars']);
        // }

        return (bool)$this->Email->send(Text::insert($message['content'], $data['vars']));
	}

}
