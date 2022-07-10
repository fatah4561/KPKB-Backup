<?php
namespace AdminPanel\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Slides Model
 *
 * @method \AdminPanel\Model\Entity\Slide get($primaryKey, $options = [])
 * @method \AdminPanel\Model\Entity\Slide newEntity($data = null, array $options = [])
 * @method \AdminPanel\Model\Entity\Slide[] newEntities(array $data, array $options = [])
 * @method \AdminPanel\Model\Entity\Slide|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminPanel\Model\Entity\Slide saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AdminPanel\Model\Entity\Slide patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AdminPanel\Model\Entity\Slide[] patchEntities($entities, array $data, array $options = [])
 * @method \AdminPanel\Model\Entity\Slide findOrCreate($search, callable $callback = null, $options = [])
 */
class SlidesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('slides');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'image' => []
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
//            ->scalar('image')
            ->requirePresence('image', 'create')
            ->allowEmptyFile('image', true);

        return $validator;
    }
}
