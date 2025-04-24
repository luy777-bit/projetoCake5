<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tbcliente Entity
 *
 * @property int $id
 * @property string|null $cnpj
 * @property string|null $nm_cliente
 * @property string|null $cep
 * @property string|null $endereco
 * @property bool|null $ativo
 * @property string|null $observacao
 * @property \Cake\I18n\Date|null $data_vencimento
 * @property \Cake\I18n\DateTime|null $data_criacao
 * @property string|null $user_criacao
 * @property \Cake\I18n\DateTime|null $data_alteracao
 * @property string|null $user_alteracao
 */
class Tbcliente extends Entity
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
        'cnpj' => true,
        'nm_cliente' => true,
        'cep' => true,
        'endereco' => true,
        'ativo' => true,
        'observacao' => true,
        'data_vencimento' => true,
        'data_criacao' => true,
        'user_criacao' => true,
        'data_alteracao' => true,
        'user_alteracao' => true,
    ];
}
