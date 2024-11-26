<?php

/**
 * BaseCrdmgrBulletinAdhesionDetail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $bulletin_adhesion_id
 * @property integer $question_id
 * @property boolean $bool_answer
 * @property string $string_answer
 * @property CrdmgrBulletinAdhesion $CtrBulletinAdhesion
 * @property CrdmgrParameter $CtrQuestion
 * 
 * @method integer                      getBulletinAdhesionId()   Returns the current record's "bulletin_adhesion_id" value
 * @method integer                      getQuestionId()           Returns the current record's "question_id" value
 * @method boolean                      getBoolAnswer()           Returns the current record's "bool_answer" value
 * @method string                       getStringAnswer()         Returns the current record's "string_answer" value
 * @method CrdmgrBulletinAdhesion       getCtrBulletinAdhesion()  Returns the current record's "CtrBulletinAdhesion" value
 * @method CrdmgrParameter              getCtrQuestion()          Returns the current record's "CtrQuestion" value
 * @method CrdmgrBulletinAdhesionDetail setBulletinAdhesionId()   Sets the current record's "bulletin_adhesion_id" value
 * @method CrdmgrBulletinAdhesionDetail setQuestionId()           Sets the current record's "question_id" value
 * @method CrdmgrBulletinAdhesionDetail setBoolAnswer()           Sets the current record's "bool_answer" value
 * @method CrdmgrBulletinAdhesionDetail setStringAnswer()         Sets the current record's "string_answer" value
 * @method CrdmgrBulletinAdhesionDetail setCtrBulletinAdhesion()  Sets the current record's "CtrBulletinAdhesion" value
 * @method CrdmgrBulletinAdhesionDetail setCtrQuestion()          Sets the current record's "CtrQuestion" value
 * 
 * @package    credit_mng
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrdmgrBulletinAdhesionDetail extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('crdmgr_bulletin_adhesion_detail');
        $this->hasColumn('bulletin_adhesion_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('question_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('bool_answer', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('string_answer', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CrdmgrBulletinAdhesion as CtrBulletinAdhesion', array(
             'local' => 'bulletin_adhesion_id',
             'foreign' => 'id'));

        $this->hasOne('CrdmgrParameter as CtrQuestion', array(
             'local' => 'question_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}