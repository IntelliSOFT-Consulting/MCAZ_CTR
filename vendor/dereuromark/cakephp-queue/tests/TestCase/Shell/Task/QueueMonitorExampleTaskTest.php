<?php

namespace Queue\Test\TestCase\Shell;

use Cake\Console\ConsoleIo;
use Cake\TestSuite\TestCase;
use Queue\Shell\Task\QueueMonitorExampleTask;
use Tools\TestSuite\ConsoleOutput;
use Tools\TestSuite\ToolsTestTrait;

class QueueMonitorExampleTaskTest extends TestCase {

	use ToolsTestTrait;

	/**
	 * @var \Queue\Shell\Task\QueueMonitorExampleTask|\PHPUnit_Framework_MockObject_MockObject
	 */
	public $Task;

	/**
	 * @var \Tools\TestSuite\ConsoleOutput
	 */
	public $out;

	/**
	 * @var \Tools\TestSuite\ConsoleOutput
	 */
	public $err;

	/**
	 * Setup Defaults
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();

		$this->out = new ConsoleOutput();
		$this->err = new ConsoleOutput();
		$io = new ConsoleIo($this->out, $this->err);

		$this->Task = new QueueMonitorExampleTask($io);
	}

	/**
	 * @return void
	 */
	public function testRun() {
		$result = $this->Task->run([], null);

		$this->assertTrue($result);

		$this->assertTextContains('Success, the MonitorExample Job was run', $this->out->output());
	}

}
