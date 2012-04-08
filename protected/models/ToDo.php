<?php

/**
 * This is the model class for table "todos".
 *
 * The followings are the available columns in table 'todos':
 * @property integer $id
 * @property string $toDo
 * @property string $dueDate
 * @property string $createdAt
 */
class ToDo extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ToDos the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'todos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('toDo, createdAt', 'required'),
            array('toDo', 'length', 'max' => 255),
            array('dueDate', 'default', 'value' => null),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, toDo, dueDate, createdAt', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'toDo' => 'To Do',
            'dueDate' => 'Due Date',
            'createdAt' => 'Created At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('toDo',$this->toDo,true);
        $criteria->compare('dueDate',$this->dueDate,true);
        $criteria->compare('createdAt',$this->createdAt,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}