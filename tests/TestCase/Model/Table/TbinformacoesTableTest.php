<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbinformacoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbinformacoesTable Test Case
 */
class TbinformacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TbinformacoesTable
     */
    protected $Tbinformacoes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tbinformacoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tbinformacoes') ? [] : ['className' => TbinformacoesTable::class];
        $this->Tbinformacoes = $this->getTableLocator()->get('Tbinformacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tbinformacoes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TbinformacoesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
