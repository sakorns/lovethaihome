<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CustomerAssetsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CustomerAssetsController Test Case
 */
class CustomerAssetsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customer_assets',
        'app.customers',
        'app.asset_types',
        'app.assets',
        'app.users',
        'app.useimages',
        'app.images',
        'app.asset_images',
        'app.user_addresses',
        'app.addresses',
        'app.provinces',
        'app.zones'
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
