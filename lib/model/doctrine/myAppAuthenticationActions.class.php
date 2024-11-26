<?php

/**
 * myAppAuthenticationActions actions.
 *
 * @package    credit_mng
 * @subpackage welcome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myAppAuthenticationActions extends sfActions
{
    /**
    * Executes new action
    *
    * @param sfRequest $request A request object
    */
    public function executenew(sfWebRequest $request)
    {
        // $this->forward('default', 'module');

        // redirection vers page d'accueil par defaut
        $this->forwardToDefaultHome();
    }

    protected function forwardToDefaultHome($use_redirect = 0)
    {
        // redirection vers page d'accueil par defaut
        $default_module = '';
        $default_action = 'new';

        // si backend
        if (sfConfig::get('app_webapp_name') == 'simuce-backend' )
        {
            // $default_module = 'sfGuardUser'; 
            $default_module = 'mlparameter';
        } 
		elseif (sfConfig::get('app_webapp_name') == 'simuce-frontend')
        {
            $default_module = 'mirroir';
        } else
        {
            // aucune correspondance
            echo "AUCUNE CORRESPONDANCE APPLICATIVE ! [forwardToDefaultHome]";
            exit ();
        }
    
        // fin
        if ($use_redirect)
        {
            $this->redirect($default_module, $default_action);
        }
        else
        {
            $this->forward($default_module, $default_action);
        }
    }


    public function executeSignout(sfWebRequest $request)
    {
        # empêcher la boucle infini lorsque la connexion renvoi à la page de referer  contenant "/welcome/signout"
        $s_forbiden_referer_regex = "/welcome/signout";
        if (count (split ($s_forbiden_referer_regex, $_SERVER['HTTP_REFERER'])) == 2 )
        {
            # rediriger vers la page d'accueil par defaut        
            $this->forwardToDefaultHome(1);
            return;
        }

        # supprimer les infos perso dispo en session
        // $this->getUser()->setSaltAppLicenceFromFileSystem("NULL");
        $this->getUser()->resetCurrentUserSession();

        // fin de deconnexion par sfGuardAuth
        $this->forward('sfGuardAuth', 'signout');
    }

    /**
    * Executes new action
    * @desc : activer desactiver la corbeille
    * @param sfRequest $request A request object
    */
    public function executeBindtoggle(sfWebRequest $request)
    {
        // bascule on / off pour activer / desactiver le mode corbeille
        if ($this->getUser()->getIsBindToggleActivated() == 0)
        {
            $this->getUser()->setIsBindToggleActivated(1);
            $this->getUser()->setMyFlash('notice', "Activation du Mode corbeille, vous ne verrez que les elements qui ont ete supprimes.");
        } else 
        {
            $this->getUser()->setIsBindToggleActivated(0);
            $this->getUser()->setMyFlash('notice', "Desactivation du Mode corbeille, vous ne verrez que les elements non supprimes.");
        }

        // redirection vers page d'accueil par defaut
        $this->forwardToDefaultHome();
    }

    /*
    public function executeHideinactifobjecttoggle(sfWebRequest $request)
    {
        // bascule on / off pour activer / desactiver le mode corbeille
        if ($this->getUser()->getIsHideinactifobjecttoggleActivated() == 0)
        {
          $this->getUser()->setIsHideinactifobjecttoggleActivated(1);
          $this->getUser()->setFlash('notice', "Activation ok pour le Mode cacher les objets inactifs, vous ne verrez plus les objets inactifs.");
        } else 
        {
          $this->getUser()->setIsHideinactifobjecttoggleActivated(0);
          $this->getUser()->setFlash('notice', "Desactivation ok pour le Mode cacher les objets inactifs, vous verrez les objets inactifs.");
        }

        // $this->forward('default', 'module');
        // redirection vers la gestion des clients par defaut    
        $this->forward('mdlpatient', 'new');
    }
    */

}
