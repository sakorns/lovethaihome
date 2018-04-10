<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssetOptionsFixture
 *
 */
class AssetOptionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'asset_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'option_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'asset_id' => ['type' => 'index', 'columns' => ['asset_id'], 'length' => []],
            'option_id' => ['type' => 'index', 'columns' => ['option_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'asset_options_ibfk_1' => ['type' => 'foreign', 'columns' => ['asset_id'], 'references' => ['assets', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'asset_options_ibfk_2' => ['type' => 'foreign', 'columns' => ['option_id'], 'references' => ['options', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '0cad22dc-1619-452b-a0ea-664059f29581',
            'asset_id' => 'f5715f15-96a5-4d0a-89a5-03aaf3034286',
            'option_id' => '628af373-b299-412c-8ece-59073c8e748f'
        ],
    ];
}
