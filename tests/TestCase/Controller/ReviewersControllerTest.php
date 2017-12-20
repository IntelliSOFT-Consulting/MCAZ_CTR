<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReviewersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReviewersController Test Case
 */
class ReviewersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reviewers',
        'app.users',
        'app.applications',
        'app.trial_statuses',
        'app.investigator_contacts',
        'app.organizations',
        'app.placebos',
        'app.previous_dates',
        'app.reviews',
        'app.site_details',
        'app.sponsors'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
