<?php

namespace rusbeldoor\yii2General\backend\modules\administrator\modules\rbac\models;

use yii;

/**
 * Auth_item_child (ActiveRecord)
 *
 * @property $id int
 * @property $parent string
 * @property $child string
 */
class AuthItemChild extends \rusbeldoor\yii2General\models\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    { return 'auth_item_child'; }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            self::getRuleString(['parent', 'child'], ['max' => 96]),
            self::getRuleMatchAlias(['parent', 'child']),
            [['parent', 'child'], 'unique', 'targetAttribute' => ['parent', 'child']],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['parent' => 'name']],
            [['child'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['child' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'parent' => 'Родительская роль',
            'child' => 'Дочерняя роль/операция',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return AuthItemChildQuery the active query used by this AR class.
     */
    public static function find()
    { return new AuthItemChildQuery(get_called_class()); }

    /**
     * Перед удалением
     *
     * @return bool
     */
    public function beforeDelete()
    {
        // if (true) { $this->addError('id', 'Неовзможно удалить #' . $this->id . '.'); }

        return !$this->hasErrors() && parent::beforeDelete();
    }
}
