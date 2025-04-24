<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbclientesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbclientesTable Test Case
 */
class TbclientesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TbclientesTable
     */
    protected $Tbclientes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tbclientes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tbclientes') ? [] : ['className' => TbclientesTable::class];
        $this->Tbclientes = $this->getTableLocator()->get('Tbclientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tbclientes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TbclientesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
