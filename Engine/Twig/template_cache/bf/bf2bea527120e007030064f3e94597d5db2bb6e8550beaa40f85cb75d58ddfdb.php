<?php

/* @frontadvert/registerform.advert.html */
class __TwigTemplate_edce4869daf6203c7695144a219339eca578dacd4c5e4afa90d3f27d90a972ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<style type=\"text/css\">
    .md-subheader .md-subheader-inner{
        padding-left: 5px !important;
    }
    md-divider.md-default-theme, md-divider{
        border-top-color: rgb(255, 165, 0) !important;
    }
</style>
<div ng-app=\"RegisterAdvertApp\" ng-controller=\"AdvertFormRegisterCtrl as afrc\" layout-gt-sm=\"row\" layout=\"column\">
<div  style=\"
        -webkit-box-shadow: 0px 0px 5px 0px #ddd;
        -o-box-shadow: 0px 0px 5px 0px #ddd;
        -moz-box-shadow: 0px 0px 5px 0px #ddd;
        box-shadow: 0px 0px 5px 0px #ddd;
        margin: auto;
        padding: 10px;
        width: 65%;
    \">
    <md-content style=\"padding-left:10px\">
        <md-list flex>
            <md-subheader class=\"md-no-sticky\" style=\"
                    font-size: large; font-weight: bold; text-align: center;
                \">Créez votre Compte Professionnel</md-subheader>
            <md-divider></md-divider>
        </md-list>
        <form name=\"setAdvertRegisterForm\" ng-submit=\"registerFormSubmit(setAdvertRegisterForm.\$valid)\" novalidate>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Nom *</label>
                    <input ng-cust required name=\"firstname\" ng-model=\"register.firstname\">
                    <div ng-messages=\"setAdvertRegisterForm.firstname.\$error\">
                        <div ng-message=\"required\">Veuillez saisir un nom.</div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Prénom *</label>
                    <input ng-cust required name=\"lastname\" ng-model=\"register.lastname\">
                    <div ng-messages=\"setAdvertRegisterForm.lastname.\$error\">
                        <div ng-message=\"required\">Veuillez saisir un prénom.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>SIRET *</label>
                    <input ng-cust required name=\"SIRET\" ng-model=\"register.SIRET\">
                    <div ng-messages=\"setAdvertRegisterForm.SIRET.\$error\">
                        <div ng-message=\"required\">Veuillez saisir un numéro de Siret.</div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Nom de la société *</label>
                    <input ng-cust required name=\"society\" ng-model=\"register.society\">
                    <div ng-messages=\"setAdvertRegisterForm.society.\$error\">
                        <div ng-message=\"required\">Veuillez renseigner le nom de la société.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Adresse *</label>
                    <input ng-cust required name=\"adress\" ng-model=\"register.adress\">
                    <div ng-messages=\"setAdvertRegisterForm.adress.\$error\">
                        <div ng-message=\"required\">Saisissez l'adresse de votre société.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Ville ou code postal *</label>
                    <input ng-cust required name=\"postal_code\" ng-model=\"register.postal_code\">
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Téléphone *</label>
                    <input ng-cust required name=\"phone\" ng-model=\"register.phone\">
                    <div ng-messages=\"setAdvertRegisterForm.phone.\$error\">
                        <div ng-message=\"required\">Veuillez insérer un numéro de téléphone.</div>
                    </div>
                </md-input-container>
            </div>
            <md-list flex=\"50\">
                <md-subheader class=\"md-no-sticky\" style=\"font-size: large; font-weight: bold; color:orange\">Votre email et mot de passe</md-subheader>
                <md-divider></md-divider>
            </md-list>

            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Adresse email *</label>
                    <input ng-cust required name=\"email\" ng-model=\"register.email\">
                    <div ng-messages=\"setAdvertRegisterForm.email.\$error\">
                        <div ng-message=\"required\">Veuillez insérer une adresse email.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Mot de passe *</label>
                    <input ng-cust required name=\"password\" minlength=\"8\" type=\"password\" ng-model=\"register.password\">
                    <div class=\"hint\" ng-if=\"true\"><p style=\"font-size:12px;\">Pour plus de sécurité, votre mot de passe
                    doit contenir au moins 8 caractères dont 1 chiffre et 1 lettre</p></div>
                    <div ng-messages=\"setAdvertRegisterForm.password.\$error\">
                        <div ng-message=\"required\">Saisissez un mot de passe.</div>
                        <div ng-message=\"minlength\">Votre mot de passe est trop court. Il doit contenir au moins 8 caractères.</div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Confirmer le mot de passe *</label>
                    <input ng-cust required name=\"rpassword\" type=\"password\" ng-model=\"register.rpassword\">
                    <div ng-messages=\"setAdvertRegisterForm.rpassword.\$error\">
                        <div ng-message=\"required\">Saisissez un mot de passe.</div>
                    </div>
                    <div ng-if=\"CheckPass\" role=\"alert\">
                        <div style=\"color: chocolate; font-size: smaller;\">Les mots de passe saisis sont différents. Veuillez réessayer.</div>
                    </div>

                </md-input-container>
            </div>
            <div style=\"margin-top:40px;\" layout-gt-sm=\"row\">
                <md-button type=\"submit\" ng-disabled=\"setAdvertRegisterForm.\$invalid\"
                           class=\"md-raised md-primary md-button\">Créer mon Compte Professionnel
                </md-button>
                <md-progress-circular ng-show=\"activated\" md-mode='indeterminate' class=\"md-hue-2\"
                                      md-diameter=\"40px\" style=\"margin-top: 5px;\"></md-progress-circular>
            </div>
        </form>
    </md-content>
</div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "@frontadvert/registerform.advert.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<style type=\"text/css\">
    .md-subheader .md-subheader-inner{
        padding-left: 5px !important;
    }
    md-divider.md-default-theme, md-divider{
        border-top-color: rgb(255, 165, 0) !important;
    }
</style>
<div ng-app=\"RegisterAdvertApp\" ng-controller=\"AdvertFormRegisterCtrl as afrc\" layout-gt-sm=\"row\" layout=\"column\">
<div  style=\"
        -webkit-box-shadow: 0px 0px 5px 0px #ddd;
        -o-box-shadow: 0px 0px 5px 0px #ddd;
        -moz-box-shadow: 0px 0px 5px 0px #ddd;
        box-shadow: 0px 0px 5px 0px #ddd;
        margin: auto;
        padding: 10px;
        width: 65%;
    \">
    <md-content style=\"padding-left:10px\">
        <md-list flex>
            <md-subheader class=\"md-no-sticky\" style=\"
                    font-size: large; font-weight: bold; text-align: center;
                \">Créez votre Compte Professionnel</md-subheader>
            <md-divider></md-divider>
        </md-list>
        <form name=\"setAdvertRegisterForm\" ng-submit=\"registerFormSubmit(setAdvertRegisterForm.\$valid)\" novalidate>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Nom *</label>
                    <input ng-cust required name=\"firstname\" ng-model=\"register.firstname\">
                    <div ng-messages=\"setAdvertRegisterForm.firstname.\$error\">
                        <div ng-message=\"required\">Veuillez saisir un nom.</div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Prénom *</label>
                    <input ng-cust required name=\"lastname\" ng-model=\"register.lastname\">
                    <div ng-messages=\"setAdvertRegisterForm.lastname.\$error\">
                        <div ng-message=\"required\">Veuillez saisir un prénom.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>SIRET *</label>
                    <input ng-cust required name=\"SIRET\" ng-model=\"register.SIRET\">
                    <div ng-messages=\"setAdvertRegisterForm.SIRET.\$error\">
                        <div ng-message=\"required\">Veuillez saisir un numéro de Siret.</div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Nom de la société *</label>
                    <input ng-cust required name=\"society\" ng-model=\"register.society\">
                    <div ng-messages=\"setAdvertRegisterForm.society.\$error\">
                        <div ng-message=\"required\">Veuillez renseigner le nom de la société.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Adresse *</label>
                    <input ng-cust required name=\"adress\" ng-model=\"register.adress\">
                    <div ng-messages=\"setAdvertRegisterForm.adress.\$error\">
                        <div ng-message=\"required\">Saisissez l'adresse de votre société.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Ville ou code postal *</label>
                    <input ng-cust required name=\"postal_code\" ng-model=\"register.postal_code\">
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Téléphone *</label>
                    <input ng-cust required name=\"phone\" ng-model=\"register.phone\">
                    <div ng-messages=\"setAdvertRegisterForm.phone.\$error\">
                        <div ng-message=\"required\">Veuillez insérer un numéro de téléphone.</div>
                    </div>
                </md-input-container>
            </div>
            <md-list flex=\"50\">
                <md-subheader class=\"md-no-sticky\" style=\"font-size: large; font-weight: bold; color:orange\">Votre email et mot de passe</md-subheader>
                <md-divider></md-divider>
            </md-list>

            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Adresse email *</label>
                    <input ng-cust required name=\"email\" ng-model=\"register.email\">
                    <div ng-messages=\"setAdvertRegisterForm.email.\$error\">
                        <div ng-message=\"required\">Veuillez insérer une adresse email.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm=\"row\">
                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Mot de passe *</label>
                    <input ng-cust required name=\"password\" minlength=\"8\" type=\"password\" ng-model=\"register.password\">
                    <div class=\"hint\" ng-if=\"true\"><p style=\"font-size:12px;\">Pour plus de sécurité, votre mot de passe
                    doit contenir au moins 8 caractères dont 1 chiffre et 1 lettre</p></div>
                    <div ng-messages=\"setAdvertRegisterForm.password.\$error\">
                        <div ng-message=\"required\">Saisissez un mot de passe.</div>
                        <div ng-message=\"minlength\">Votre mot de passe est trop court. Il doit contenir au moins 8 caractères.</div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Confirmer le mot de passe *</label>
                    <input ng-cust required name=\"rpassword\" type=\"password\" ng-model=\"register.rpassword\">
                    <div ng-messages=\"setAdvertRegisterForm.rpassword.\$error\">
                        <div ng-message=\"required\">Saisissez un mot de passe.</div>
                    </div>
                    <div ng-if=\"CheckPass\" role=\"alert\">
                        <div style=\"color: chocolate; font-size: smaller;\">Les mots de passe saisis sont différents. Veuillez réessayer.</div>
                    </div>

                </md-input-container>
            </div>
            <div style=\"margin-top:40px;\" layout-gt-sm=\"row\">
                <md-button type=\"submit\" ng-disabled=\"setAdvertRegisterForm.\$invalid\"
                           class=\"md-raised md-primary md-button\">Créer mon Compte Professionnel
                </md-button>
                <md-progress-circular ng-show=\"activated\" md-mode='indeterminate' class=\"md-hue-2\"
                                      md-diameter=\"40px\" style=\"margin-top: 5px;\"></md-progress-circular>
            </div>
        </form>
    </md-content>
</div>
    </div>

", "@frontadvert/registerform.advert.html", "D:\\server\\htdocs\\netpositiveimpact\\wp-content\\plugins\\atomisy-advert\\engine\\Twig\\templates\\front\\registerform.advert.html");
    }
}
