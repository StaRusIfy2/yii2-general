<?php

namespace rusbeldoor\yii2General\backend\modules\administrator\modules\cron\models;

use yii;

/**
 * Cron_log (ActiveRecord)
 *
 * @property $id int
 * @property $cron_id int
 * @property $duration int
 * @property $datetime_start string
 * @property $datetime_complete string|null
 * @property $pid string|null
 */
class CronLog extends \rusbeldoor\yii2General\models\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    { return 'cron_log'; }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cron_id', 'datetime_start'], 'required'],
            [['cron_id', 'duration'], 'integer'],
            [['datetime_start', 'datetime_complete'], 'safe'],
            [['pid'], 'string', 'max' => 32],
            [['cron_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cron::className(), 'targetAttribute' => ['cron_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'cron_id' => 'Крон',
            'duration' => 'Продолжительность',
            'datetime_start' => 'Дата и время начала',
            'datetime_complete' => 'Дата и время завершения',
            'pid' => 'Ид процесса в Linux',
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return CronLogQuery the active query used by this AR class.
     */
    public static function find()
    { return new CronLogQuery(get_called_class()); }

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
