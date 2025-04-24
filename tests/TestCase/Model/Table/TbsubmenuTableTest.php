<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbsubmenuTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbsubmenuTable Test Case
 */
class TbsubmenuTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TbsubmenuTable
     */
    protected $Tbsubmenu;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tbsubmenu',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tbsubmenu') ? [] : ['className' => TbsubmenuTable::class];
        $this->Tbsubmenu = $this->getTableLocator()->get('Tbsubmenu', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tbsubmenu);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TbsubmenuTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
