<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UseimagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UseimagesTable Test Case
 */
class UseimagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UseimagesTable
     */
    public $Useimages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.useimages',
        'app.images',
        'app.asset_images',
        'app.assets',
        'app.asset_types',
        'app.users',
        'app.user_addresses',
        'app.addresses',
        'app.provinces'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Useimages') ? [] : ['className' => 'App\Model\Table\UseimagesTable'];
        $this->Useimages = TableRegistry::get('Useimages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Useimages);

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
