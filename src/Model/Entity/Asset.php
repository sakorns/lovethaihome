<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asset Entity
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $asset_type_id
 * @property string $asset_type_des
 * @property string $user_id
 * @property \Cake\I18n\Time $created
 * @property string $createdby
 * @property float $floor_total
 * @property int $bedroom
 * @property int $bathroom
 * @property int $kitchen_room
 * @property int $reception_room
 * @property int $dining_room
 * @property int $maid_room
 * @property int $parking
 * @property float $area_rai
 * @property float $area_ngan
 * @property float $area_wah
 * @property float $area_meter
 * @property float $area_width
 * @property float $area_long
 * @property float $price_per_wah
 * @property float $price_amounnt
 * @property float $price_amounnt_lower
 * @property string $option
 * @property string $address_id
 * @property string $zone_id
 * @property string $latitude
 * @property string $longitude
 * @property string $isspecial_marketprice
 * @property string $isspecial_appraised
 * @property string $iscovering
 * @property string $isdweller
 * @property string $direction
 * @property string $issale
 * @property string $isrent
 * @property string $issalerent
 * @property string $issellout
 * @property string $issaledown
 * @property float $floor
 * @property float $price_rent
 *
 * @property \App\Model\Entity\AssetType $asset_type
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Zone $zone
 * @property \App\Model\Entity\AssetImage[] $asset_images
 * @property \App\Model\Entity\AssetOption[] $asset_options
 */
class Asset extends Entity
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
