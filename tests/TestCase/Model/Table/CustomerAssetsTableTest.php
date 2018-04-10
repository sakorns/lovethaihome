<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomerAssetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerAssetsTable Test Case
 */
class CustomerAssetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomerAssetsTable
     */
    public $CustomerAssets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customer_assets',
        'app.zones',
        'app.assets',
        'app.asset_types',
        'app.users',
        'app.useimages',
        'app.images',
        'app.asset_images',
        'app.user_addresses',
        'app.addresses',
        'app.provinces',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomerAssets') ? [] : ['className' => 'App\Model\Table\CustomerAssetsTable'];
        $this->CustomerAssets = TableRegistry::get('CustomerAssets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerAssets);

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
