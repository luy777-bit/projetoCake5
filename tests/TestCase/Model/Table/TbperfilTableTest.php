<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbperfilTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbperfilTable Test Case
 */
class TbperfilTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TbperfilTable
     */
    protected $Tbperfil;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tbperfil',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tbperfil') ? [] : ['className' => TbperfilTable::class];
        $this->Tbperfil = $this->getTableLocator()->get('Tbperfil', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tbperfil);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TbperfilTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
