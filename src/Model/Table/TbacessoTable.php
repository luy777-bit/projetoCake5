<?php
//declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbacesso Model
 *
 * @method \App\Model\Entity\Tbacesso newEmptyEntity()
 * @method \App\Model\Entity\Tbacesso newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbacesso> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tbacesso get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tbacesso findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tbacesso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbacesso> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tbacesso|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tbacesso saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tbacesso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbacesso>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbacesso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbacesso> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbacesso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbacesso>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbacesso>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbacesso> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TbacessoTable extends Table
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

        $this->setTable('tbacesso');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');         
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
            ->integer('id_perfil')
            ->requirePresence('id_perfil', 'create')
            ->notEmptyString('id_perfil');

        $validator
            ->integer('id_menu')
            ->requirePresence('id_menu', 'create')
            ->notEmptyString('id_menu');

        $validator
            ->integer('id_submenu')
            ->requirePresence('id_submenu', 'create')
            ->notEmptyString('id_submenu');

        return $validator;
    }

    public function pesquisa_acessos($id_perfil){

        $query = $this->find('all')
                      ->select(['id', 'id_perfil', 'id_menu', 'id_submenu'])
                      ->where(['id_perfil' => $id_perfil]);
                      //->toArray();
              
        return $query;
    }    

    public function insere_acessos($acessos_insert){

        $this->save($acessos_insert);
    }

    public function delete_acessos($id){

        $this->deleteQuery()
             ->where(['id' => $id])
             ->execute();
    }      
}
