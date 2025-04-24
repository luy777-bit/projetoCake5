<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TbmenuTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TbmenuTable Test Case
 */
class TbmenuTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TbmenuTable
     */
    protected $Tbmenu;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tbmenu',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tbmenu') ? [] : ['className' => TbmenuTable::class];
        $this->Tbmenu = $this->getTableLocator()->get('Tbmenu', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tbmenu);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TbmenuTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
