<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $title
 * @property string $email
 * @property string $content
 * @property int $no_apply
 * @property int $no_impression
 * @property int $no_views
 * @property \Cake\I18n\FrozenDate $date_created
 * @property \Cake\I18n\FrozenDate $start
 * @property \Cake\I18n\FrozenDate $expire
 * @property string $status
 */
class Job extends Entity
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
        'title' => true,
        'email' => true,
        'content' => true,
        'no_apply' => true,
        'no_impression' => true,
        'no_views' => true,
        'date_created' => true,
        'start' => true,
        'expire' => true,
        'status' => true
    ];
}
