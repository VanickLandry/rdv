<?php

/**
 * BaseCrdmgrClient
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property boolean $is_active
 * @property string $code_client
 * @property string $nom_client
 * @property string $secteuractivite
 * @property string $adresse
 * @property string $telephone
 * @property string $email
 * @property string $lieu_localisation_code
 * @property integer $created_by
 * @property integer $updated_by
 * @property CrdmgrParameter $CtrParamLocalisation
 * @property sfGuardUser $CtrCreatedBy
 * @property sfGuardUser $CtrUpdatedBy
 * 
 * @method boolean         getIsActive()               Returns the current record's "is_active" value
 * @method string          getCodeClient()             Returns the current record's "code_client" value
 * @method string          getNomClient()              Returns the current record's "nom_client" value
 * @method string          getSecteuractivite()        Returns the current record's "secteuractivite" value
 * @method string          getAdresse()                Returns the current record's "adresse" value
 * @method string          getTelephone()              Returns the current record's "telephone" value
 * @method string          getEmail()                  Returns the current record's "email" value
 * @method string          getLieuLocalisationCode()   Returns the current record's "lieu_localisation_code" value
 * @method integer         getCreatedBy()              Returns the current record's "created_by" value
 * @method integer         getUpdatedBy()              Returns the current record's "updated_by" value
 * @method CrdmgrParameter getCtrParamLocalisation()   Returns the current record's "CtrParamLocalisation" value
 * @method sfGuardUser     getCtrCreatedBy()           Returns the current record's "CtrCreatedBy" value
 * @method sfGuardUser     getCtrUpdatedBy()           Returns the current record's "CtrUpdatedBy" value
 * @method CrdmgrClient    setIsActive()               Sets the current record's "is_active" value
 * @method CrdmgrClient    setCodeClient()             Sets the current record's "code_client" value
 * @method CrdmgrClient    setNomClient()              Sets the current record's "nom_client" value
 * @method CrdmgrClient    setSecteuractivite()        Sets the current record's "secteuractivite" value
 * @method CrdmgrClient    setAdresse()                Sets the current record's "adresse" value
 * @method CrdmgrClient    setTelephone()              Sets the current record's "telephone" value
 * @method CrdmgrClient    setEmail()                  Sets the current record's "email" value
 * @method CrdmgrClient    setLieuLocalisationCode()   Sets the current record's "lieu_localisation_code" value
 * @method CrdmgrClient    setCreatedBy()              Sets the current record's "created_by" value
 * @method CrdmgrClient    setUpdatedBy()              Sets the current record's "updated_by" value
 * @method CrdmgrClient    setCtrParamLocalisation()   Sets the current record's "CtrParamLocalisation" value
 * @method CrdmgrClient    setCtrCreatedBy()           Sets the current record's "CtrCreatedBy" value
 * @method CrdmgrClient    setCtrUpdatedBy()           Sets the current record's "CtrUpdatedBy" value
 * 
 * @package    simuce
 * @subpackage model
 * @author     UCE - D�sire Talla Tueguem
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrdmgrClient extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('crdmgr_client');
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('code_client', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('nom_client', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('secteuractivite', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('adresse', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('telephone', 'string', 100, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('lieu_localisation_code', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('created_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('updated_by', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CrdmgrParameter as CtrParamLocalisation', array(
             'local' => 'lieu_localisation_code',
             'foreign' => 'code_parametre'));

        $this->hasOne('sfGuardUser as CtrCreatedBy', array(
             'local' => 'created_by',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as CtrUpdatedBy', array(
             'local' => 'updated_by',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}