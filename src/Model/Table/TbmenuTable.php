<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbmenu Model
 *
 * @method \App\Model\Entity\Tbmenu newEmptyEntity()
 * @method \App\Model\Entity\Tbmenu newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbmenu> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tbmenu get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tbmenu findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tbmenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbmenu> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tbmenu|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tbmenu saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tbmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbmenu>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbmenu> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbmenu>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbmenu> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TbmenuTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tbmenu');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->scalar('menu')
            ->maxLength('menu', 255)
            ->allowEmptyString('menu');

        return $validator;
    }

    public function mostra_menu(){

        $query = $this->find('all')
                      ->select(['id', 'menu']);
                      //->where([$filtro_cliente])
                      //->order(['nm_cliente' => 'ASC']);
                      //->toArray();
              
        return $query;
    }

    public function pesquisa_menu(){

        $query = $this->find('all')
                      ->select(['id', 'menu']);
                      //->where([$filtro_cliente])
                      //->order(['nm_cliente' => 'ASC']);
                      //->toArray();
              
        return $query;
    }        
}
