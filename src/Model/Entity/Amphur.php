<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Amphur Entity
 *
 * @property string $id
 * @property string $amphur_code
 * @property string $amphur_name
 * @property string $postcode
 * @property int $geo_id
 * @property string $province_id
 *
 * @property \App\Model\Entity\Geo $geo
 * @property \App\Model\Entity\Province $province
 */
class Amphur extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
