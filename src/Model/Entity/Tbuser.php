<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tbuser Entity
 *
 * @property int $id
 * @property string|null $nm_user
 * @property string|null $login
 * @property string|null $senha
 * @property int|null $id_perfil
 * @property bool|null $ativo
 * @property \Cake\I18n\DateTime|null $data_criacao
 * @property string|null $user_criacao
 * @property \Cake\I18n\DateTime|null $data_alteracao
 * @property string|null $user_alteracao
 */
class Tbuser extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'id' => true,
        'nm_user' => true,
        'login' => true,
        'senha' => true,
        'id_perfil' => true,
        'ativo' => true,
        'data_criacao' => true,
        'user_criacao' => true,
        'data_alteracao' => true,
        'user_alteracao' => true,
    ];
}
