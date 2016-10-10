<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FairTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FairTable Test Case
 */
class FairTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\FairTable     */
    public $Fair;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fair',
        'app.reservation'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fair') ? [] : ['className' => 'App\Model\Table\FairTable'];        $this->Fair = TableRegistry::get('Fair', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fair);

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
}
