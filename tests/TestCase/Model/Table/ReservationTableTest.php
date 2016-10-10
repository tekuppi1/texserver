<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservationTable Test Case
 */
class ReservationTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ReservationTable     */
    public $Reservation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reservation',
        'app.books',
        'app.cats',
        'app.fairs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reservation') ? [] : ['className' => 'App\Model\Table\ReservationTable'];        $this->Reservation = TableRegistry::get('Reservation', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reservation);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
