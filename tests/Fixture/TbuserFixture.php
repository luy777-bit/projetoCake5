<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TbuserFixture
 */
class TbuserFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'tbuser';
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
                'nm_user' => 'Lorem ipsum dolor sit amet',
                'login' => 'Lorem ip',
                'senha' => 'Lorem ip',
                'id_perfil' => 1,
                'ativo' => 1,
                'data_criacao' => '2025-02-12 01:07:27',
                'user_criacao' => 'Lorem ip',
                'data_alteracao' => '2025-02-12 01:07:27',
                'user_alteracao' => 'Lorem ip',
            ],
        ];
        parent::init();
    }
}
