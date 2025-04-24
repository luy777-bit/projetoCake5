<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TbacessoFixture
 */
class TbacessoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'tbacesso';
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
                'id_perfil' => 1,
                'id_menu' => 1,
                'id_submenu' => 1,
            ],
        ];
        parent::init();
    }
}
