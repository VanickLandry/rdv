<?php

class CrdmgrParameterTable extends Doctrine_Table
{

	// liste personnalisée
	static public $typeParametres = array(
		'titre' => 'Titre',
		'sexe' => 'Sexe',
		'type_institution' => 'Type institution',
		'ville' => 'Ville',
		'statut_marital' => 'Statut marital',
		'categorie_revenu_mensuel' => 'Categorie revenu mensuel',
		'categorie_professionnelle' => 'Categorie professionnelle',
		'type_piece_identite' => 'Type piece identite',
		'loan_type' => 'Nature de pret',
		'nbre_annee_professionel' => "Nombre d'annees professionnelles",
		'question_medical_b_adhesion' => "Questionnaire medical pour bulletin d'adhesion",
		'question_medical_f_consentement' => "Questionnaire medical pour fiche de consentement",
		'workflow_status' => "Statut du workflow de traitement",
		'prime_type' => "Type de prime",
		'validation_status' => "Statut de validation",
		);

	public static function getInstance()
	{
    return Doctrine_Core::getTable('CrdmgrParameter');
	}

	// obtenir la liste typeParametres
	public function getTypeParametres()
	{
		return self::$typeParametres;
	}

}