<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbclientes Model
 *
 * @method \App\Model\Entity\Tbcliente newEmptyEntity()
 * @method \App\Model\Entity\Tbcliente newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbcliente> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tbcliente get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tbcliente findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tbcliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbcliente> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tbcliente|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tbcliente saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tbcliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbcliente>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbcliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbcliente> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbcliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbcliente>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbcliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbcliente> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TbclientesTable extends Table
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

        $this->setTable('tbclientes');
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
            ->scalar('nm_cliente')
            ->maxLength('nm_cliente', 255)
            ->allowEmptyString('nm_cliente');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 8)
            ->allowEmptyString('cep');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 255)
            ->allowEmptyString('endereco');

        $validator
            ->boolean('ativo')
            ->allowEmptyString('ativo');

        $validator
            ->scalar('observacao')
            ->allowEmptyString('observacao');

        $validator
            ->date('data_vencimento')
            ->allowEmptyDate('data_vencimento');

        $validator
            ->dateTime('data_criacao')
            ->allowEmptyDateTime('data_criacao');

        $validator
            ->scalar('user_criacao')
            ->maxLength('user_criacao', 255)
            ->allowEmptyString('user_criacao');

        $validator
            ->dateTime('data_alteracao')
            ->allowEmptyDateTime('data_alteracao');

        $validator
            ->scalar('user_alteracao')
            ->maxLength('user_alteracao', 255)
            ->allowEmptyString('user_alteracao');

        return $validator;
    }

    public function pesquisa_cliente($dados_filtro){

        if($dados_filtro <> 0){
            $dados_filtro = str_replace(['.', '-', '/'], "", trim($dados_filtro));

            $filtro_cliente = ['OR'=> ['cnpj like' => $dados_filtro.'%',
                                       'nm_cliente'=> '%'.$dados_filtro.'%'
                                      ]
                              ];
        }
        else{
            $filtro_cliente = "";
        }

        $query = $this->find('all')
                      ->select(['id', 'cnpj', 'nm_cliente', 'cep', 'endereco', 'ativo', 'observacao', 'data_vencimento',
                                'data_criacao'
                              ])
                      ->where([$filtro_cliente])
                      ->order(['nm_cliente' => 'ASC']);
                      //->toArray();
              
        return $query;
    }

    public function insere_cliente($cliente_insert){
        $this->save($cliente_insert);
    } 

    public function altera_cliente($cliente_update, $cnpj){

        $this->updateQuery()
             ->set($cliente_update->toArray() )
             ->where(['cnpj' => $cnpj])
             ->execute();
    }

    public function deleta_cliente($cnpj){

        $this->deleteQuery()
             ->where(['cnpj' => $cnpj])
             ->execute();
    }         
}
