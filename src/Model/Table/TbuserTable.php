<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbuser Model
 *
 * @method \App\Model\Entity\Tbuser newEmptyEntity()
 * @method \App\Model\Entity\Tbuser newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbuser> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tbuser get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tbuser findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tbuser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbuser> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tbuser|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tbuser saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tbuser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbuser>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbuser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbuser> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbuser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbuser>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbuser>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbuser> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TbuserTable extends Table
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

        $this->setTable('tbuser');
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
            ->scalar('nm_user')
            ->maxLength('nm_user', 255)
            ->allowEmptyString('nm_user');

        $validator
            ->scalar('login')
            ->maxLength('login', 10)
            ->allowEmptyString('login');

        $validator
            ->scalar('senha')
            ->maxLength('senha', 10)
            ->allowEmptyString('senha');

        $validator
            ->integer('id_perfil')
            ->allowEmptyString('id_perfil');

        $validator
            ->boolean('ativo')
            ->allowEmptyString('ativo');

        $validator
            ->dateTime('data_criacao')
            ->allowEmptyDateTime('data_criacao');

        $validator
            ->scalar('user_criacao')
            ->maxLength('user_criacao', 10)
            ->allowEmptyString('user_criacao');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmptyDateTime('data_alteracao');

        $validator
            ->scalar('user_alteracao')
            ->maxLength('user_alteracao', 10)
            ->allowEmptyString('user_alteracao');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['login']), ['errorField' => 'login']);

        return $rules;
    }

    public function autentica_user($login, $senha){

        if(isset($login) && isset($senha)){

            $filtro = ['login'=> $login, 
                       'senha'=> $senha
                      ];
        }
        else{
            return false;
        }

        $verifica_user = $this->find('all')
                              ->select(['login', 'senha', 'nm_user', 'id_perfil'])
                              ->where([$filtro, 
                                      'ativo'=> 1])
                              ->toArray();

        if(count($verifica_user) > 0){
            session_start();
            $_SESSION['login']      = $verifica_user[0]['login'];
            $_SESSION['senha']      = $verifica_user[0]['senha'];
            $_SESSION['id_perfil']  = $verifica_user[0]['id_perfil'];

            return true;
        }
        else{
            return false;
        }
    }

    public function pesquisa_usuario(){

        $query = $this->find('all')
                      ->select(['id', 'nm_user', 'login']);
                      //->where([$filtro_cliente])
                      //->order(['nm_cliente' => 'ASC']);
                      //->toArray();
              
        return $query;
    }      
}
