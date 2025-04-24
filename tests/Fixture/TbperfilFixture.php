<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TbperfilFixture
 */
class TbperfilFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'tbperfil';
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
                'perfil' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
