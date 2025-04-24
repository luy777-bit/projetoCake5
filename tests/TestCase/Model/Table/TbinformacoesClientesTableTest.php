<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbinformacoesclientesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbinformacoesclientesTable Test Case
 */
class TbinformacoesclientesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TbinformacoesclientesTable
     */
    protected $Tbinformacoesclientes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tbinformacoesclientes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tbinformacoesclientes') ? [] : ['className' => TbinformacoesclientesTable::class];
        $this->Tbinformacoesclientes = $this->getTableLocator()->get('Tbinformacoesclientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tbinformacoesclientes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TbinformacoesclientesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
