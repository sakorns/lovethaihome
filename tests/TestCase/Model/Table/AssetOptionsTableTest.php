<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssetOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssetOptionsTable Test Case
 */
class AssetOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssetOptionsTable
     */
    public $AssetOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.asset_options',
        'app.assets',
        'app.asset_types',
        'app.customer_assets',
        'app.zones',
        'app.customers',
        'app.users',
        'app.useimages',
        'app.images',
        'app.asset_images',
        'app.user_addresses',
        'app.addresses',
        'app.provinces',
        'app.options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AssetOptions') ? [] : ['className' => 'App\Model\Table\AssetOptionsTable'];
        $this->AssetOptions = TableRegistry::get('AssetOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AssetOptions);

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
