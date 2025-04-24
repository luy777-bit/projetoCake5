<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tbinformacoesclientes Model
 *
 * @method \App\Model\Entity\Tbinformacoescliente newEmptyEntity()
 * @method \App\Model\Entity\Tbinformacoescliente newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbinformacoescliente> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tbinformacoescliente get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tbinformacoescliente findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tbinformacoescliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tbinformacoescliente> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tbinformacoescliente|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tbinformacoescliente saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tbinformacoescliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbinformacoescliente>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbinformacoescliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbinformacoescliente> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbinformacoescliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbinformacoescliente>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tbinformacoescliente>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tbinformacoescliente> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TbinformacoesclientesTable extends Table
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

        $this->setTable('tbinformacoesclientes');
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
            ->scalar('cnpj')
            ->maxLength('cnpj', 14)
            ->allowEmptyString('cnpj');

        $validator
            ->scalar('informacao')
            ->allowEmptyString('informacao');

        $validator
            ->dateTime('data_criacao')
            ->allowEmptyDateTime('data_criacao');

        $validator
            ->scalar('user_criacao')
            ->maxLength('user_criacao', 255)
            ->allowEmptyString('user_criacao');

        return $validator;
    }

    public function pesquisa_info($cnpj){

        $query = $this->find('all')
                      ->select(['id', 'cnpj', 'informacao'
                              ])
                      ->where(['cnpj' => $cnpj])
                      ->order(['data_criacao' => 'ASC']);
                      //->toArray();
              
        return $query;        
    }

    public function insere_info_cliente($dados_form_2){
        $this->save($dados_form_2);
    }

    public function deleta_info_cliente($id){

        $this->deleteQuery()
             ->where(['id' => $id])
             ->execute();
    }    
}
