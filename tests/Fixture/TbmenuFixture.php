<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TbmenuFixture
 */
class TbmenuFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'tbmenu';
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
                'menu' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
