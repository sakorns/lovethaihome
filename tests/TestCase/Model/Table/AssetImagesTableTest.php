<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssetImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssetImagesTable Test Case
 */
class AssetImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AssetImagesTable
     */
    public $AssetImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.asset_images',
        'app.assets',
        'app.asset_types',
        'app.customer_assets',
        'app.zones',
        'app.customers',
        'app.users',
        'app.useimages',
        'app.images',
        'app.user_addresses',
        'app.addresses',
        'app.provinces',
        'app.asset_options',
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
        $config = TableRegistry::exists('AssetImages') ? [] : ['className' => 'App\Model\Table\AssetImagesTable'];
        $this->AssetImages = TableRegistry::get('AssetImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AssetImages);

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
