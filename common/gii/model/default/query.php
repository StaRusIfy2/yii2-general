<?php
/**
 * This is the template for generating the ActiveQuery class.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */
/* @var $className string class name */
/* @var $modelClassName string related model class name */

$modelFullClassName = $modelClassName;
if ($generator->ns !== $generator->queryNs) {
    $modelFullClassName = '\\' . $generator->ns . '\\' . $modelFullClassName;
}

echo "<?php\n";
?>

namespace <?= $generator->queryNs ?>;

/**
 * <?= ucfirst($generator->generateTableName($tableName)) ?> (ActiveQuery)
 *
 * @see <?= $modelFullClassName . "\n" ?>
 */
class <?= $className ?> extends \rusbeldoor\yii2-general\common\models\ActiveQuery
{
    /*
    // Example
    public function active()
    {
        return $this->andWhere('active=1');
    }
    */
}
