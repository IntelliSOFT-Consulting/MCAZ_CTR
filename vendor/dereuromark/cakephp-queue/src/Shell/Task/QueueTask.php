<?php
/**
 * @author Andy Carter
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace Queue\Shell\Task;

use Cake\Console\ConsoleIo;
use Cake\Console\Shell;

/**
 * Queue Task.
 *
 * Common Queue plugin tasks properties and methods to be extended by custom
 * tasks.
 */
class QueueTask extends Shell {

	/**
	 * @var string
	 */
	public $queueModelClass = 'Queue.QueuedJobs';

	/**
	 * @var \Queue\Model\Table\QueuedJobsTable
	 */
	public $QueuedJobs;

	/**
	 * Timeout for run, after which the Task is reassigned to a new worker.
	 *
	 * @var int
	 */
	public $timeout = 120;

	/**
	 * Number of times a failed instance of this task should be restarted before giving up.
	 *
	 * @var int
	 */
	public $retries = 1;

	/**
	 * Stores any failure messages triggered during run()
	 *
	 * @deprecated Use Exception throwing with a clear message instead.
	 *
	 * @var string|null
	 */
	public $failureMessage = null;

	/**
	 * @param \Cake\Console\ConsoleIo|null $io IO
	 */
	public function __construct(ConsoleIo $io = null) {
		parent::__construct($io);

		$this->loadModel($this->queueModelClass);
	}

	/**
	 * Add functionality.
	 *
	 * @return void
	 */
	public function add() {
	}

	/**
	 * Run functionality.
	 *
	 * This function is executed, when a worker is executing a task.
	 * The return parameter will determine if the task will be marked completed, or be re-queued.
	 *
	 * @param array $data The array passed to QueuedJobsTable::createJob()
	 * @param int $jobId The id of the QueuedJob entity
	 * @return bool Success
	 */
	public function run(array $data, $jobId) {
		return true;
	}

}
