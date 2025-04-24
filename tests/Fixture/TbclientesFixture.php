<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TbclientesFixture
 */
class TbclientesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'cnpj' => 'Lorem ipsum ',
                'nm_cliente' => 'Lorem ipsum dolor sit amet',
                'cep' => 'Lorem ',
                'endereco' => 'Lorem ipsum dolor sit amet',
                'ativo' => 1,
                'observacao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'data_vencimento' => '2025-01-29',
                'data_criacao' => '2025-01-29 01:25:00',
                'user_criacao' => 'Lorem ipsum dolor sit amet',
                'data_alteracao' => '2025-01-29 01:25:00',
                'user_alteracao' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
