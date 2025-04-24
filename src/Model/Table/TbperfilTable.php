<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbperfil Model
 *
 * @method \App\Model\Entity\Tbperfil newEmptyEntity()
 * @method \App\Model\Entity\Tbperfil newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbperfil> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tbperfil get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tbperfil findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tbperfil patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbperfil> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tbperfil|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tbperfil saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tbperfil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbperfil>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbperfil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbperfil> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbperfil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbperfil>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbperfil>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbperfil> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TbperfilTable extends Table
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

        $this->setTable('tbperfil');
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
            ->scalar('perfil')
            ->maxLength('perfil', 255)
            ->allowEmptyString('perfil');

        return $validator;
    }

    public function mostra_perfil(){

        $query = $this->find('all')
                      ->select(['id', 'perfil']);
                      //->where([$filtro_cliente])
                      //->order(['nm_cliente' => 'ASC']);
                      //->toArray();
              
        return $query;
    }

    public function pesquisa_perfil(){

        $query = $this->find('all')
                      ->select(['id', 'perfil']);
                      //->where([$filtro_cliente])
                      //->order(['nm_cliente' => 'ASC']);
                      //->toArray();
              
        return $query;
    }

}
