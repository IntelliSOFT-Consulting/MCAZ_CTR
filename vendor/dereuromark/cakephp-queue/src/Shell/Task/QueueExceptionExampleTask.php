<?php

namespace Queue\Shell\Task;

use RuntimeException;

/**
 * A Simple QueueTask example.
 */
class QueueExceptionExampleTask extends QueueTask {

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
	public $retries = 2;

	/**
	 * Example add functionality.
	 * Will create one example job in the queue, which later will be executed using run();
	 *
	 * @return void
	 */
	public function add() {
		$this->out('CakePHP Queue Exception Example task.');
		$this->hr();
		$this->out('This is a very simple example of a QueueTask and how exceptions are handled.');
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
		$this->QueuedJobs->createJob('ExceptionExample');
		$this->success('OK, job created, now run the worker');
	}

	/**
	 * Example run function.
	 * This function is executed, when a worker is executing a task.
	 * The return parameter will determine, if the task will be marked completed, or be requeued.
	 *
	 * @param array $data The array passed to QueuedJobsTable::createJob()
	 * @param int $jobId The id of the QueuedJob entity
	 * @return bool Success
	 * @throws \RuntimeException
	 */
	public function run(array $data, $jobId) {
		$this->hr();
		$this->out('CakePHP Queue Exception Example task.');
		$this->hr();

		throw new RuntimeException('Exception demo :-)');
	}

}
