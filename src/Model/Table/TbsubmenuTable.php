<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbsubmenu Model
 *
 * @method \App\Model\Entity\Tbsubmenu newEmptyEntity()
 * @method \App\Model\Entity\Tbsubmenu newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbsubmenu> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tbsubmenu get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tbsubmenu findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tbsubmenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbsubmenu> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tbsubmenu|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tbsubmenu saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tbsubmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbsubmenu>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbsubmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbsubmenu> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbsubmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbsubmenu>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbsubmenu>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbsubmenu> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TbsubmenuTable extends Table
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

        $this->setTable('tbsubmenu');
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
            ->integer('id_menu')
            ->allowEmptyString('id_menu');

        $validator
            ->scalar('submenu')
            ->maxLength('submenu', 255)
            ->allowEmptyString('submenu');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmptyString('url');

        return $validator;
    }

    public function mostra_submenu($id_menu){

        $query = $this->find('all')
                      ->select(['id', 'id_menu', 'submenu', 'url'])
                      ->where(['id_menu' => $id_menu]);
                      //->order(['nm_cliente' => 'ASC']);
                      //->toArray();

                      //echo $query;exit;
              
        return $query;
    } 

    public function pesquisa_submenu(){

        $query = $this->find('all')
                      ->select(['id', 'id_menu', 'submenu']);
                      //->where([$filtro_cliente])
                      //->order(['nm_cliente' => 'ASC']);
                      //->toArray();
              
        return $query;
    }    

}
