<?php

/* @frontadvert/advertaddform.html */
class __TwigTemplate_0b2412761e42b662d19c28b2bd2859d54c4c8364bcad1e2776d06837e4d1129b extends Twig_Template
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
    body {
        height: initial !important;
    }

    form md-select-value .md-container {
        display: inline-block !important;
    }

    .selectdemoSelectHeader {
        /* Please note: All these selectors are only applied to children of elements with the 'selectdemoSelectHeader' class */
    }

    .selectdemoSelectHeader .demo-header-searchbox {
        border: none;
        outline: none;
        height: 100%;
        width: 97%;
        padding: 0px;
        padding-left: 14px;
    }

    .selectdemoSelectHeader .demo-select-header {
        box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.1), 0 0 0 0 rgba(0, 0, 0, 0.14), 0 0 0 0 rgba(0, 0, 0, 0.12);
        height: 48px;
        cursor: pointer;
        position: relative;
        display: flex;
        align-items: center;
        width: auto;
    }

    .selectdemoSelectHeader md-content._md {
        max-height: 240px;
    }
</style>

<div ng-app=\"AdvertApp\" ng-controller=\"AdvertFormAddCtrl as afc\" layout-gt-sm=\"row\" layout=\"column\">
    <div flex-gt-sm=\"50\" flex>
        <div>
            <md-list flex>
                <md-subheader class=\"md-no-sticky\">REGLES GENERALES DE DIFFUSION</md-subheader>
                <md-list-item class=\"md-3-line\" ng-repeat=\"item in todos\" ng-click=\"null\">
                    <div class=\"md-list-item-text\" layout=\"column\">
                    </div>
                </md-list-item>
                <md-divider></md-divider>
            </md-list>

            <md-content flex layout-padding style=\"font-size: small\">
            ";
        // line 51
        echo (isset($context["terms"]) ? $context["terms"] : null);
        echo "
            <div layout-gt-sm=\"row\" layout-align=\"center center\">
                <md-button style=\"display: block\" class=\"md-primary\" ng-href=\"";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["register_link"]) ? $context["register_link"] : null), "html", null, true);
        echo "\" target=\"_blank\">VOIR LE REGLES GENERALES DE DIFFUSION</md-button>
            </div>
            </md-content>
        </div>
    </div>

    <div flex-gt-sm=\"50\" flex style=\"
        -webkit-box-shadow: 0px 0px 5px 0px #ddd;
        -o-box-shadow: 0px 0px 5px 0px #ddd;
        -moz-box-shadow: 0px 0px 5px 0px #ddd;
        box-shadow: 0px 0px 5px 0px #ddd;
        margin-left: 15px;
        padding: 10px;
    \">
        <md-content style=\"padding-left:10px\">
            <md-list flex>
                <md-subheader class=\"md-no-sticky\" style=\"
                    background: #2a4b80;
                    color: #fff;
                \">VOTRE ANNONCE</md-subheader>
                <md-divider></md-divider>
            </md-list>
            <form name=\"setAdvertForm\" ng-submit=\"subscribSubmit(setAdvertForm.\$valid)\" novalidate>
                <div layout=\"row\" layout-sm=\"column\" layout-align=\"space-around\">
                    <md-progress-circular md-mode=\"indeterminate\" ng-show=\"progressbar\"
                                          md-diameter=\"40\"></md-progress-circular>
                </div>
                <md-subheader ng-show=\"messages.fr.warn.show\" class=\"md-warn\" style=\"text-align:center\">
                    ";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "fr", array()), "warn", array()), "msg", array()), "html", null, true);
        echo "
                </md-subheader>
                <md-subheader ng-show=\"messages.fr.success.show\" style=\"text-align:center\">";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "fr", array()), "success", array()), "msg", array()), "html", null, true);
        echo "
                </md-subheader>
                <md-subheader ng-show=\"messages.fr.exist.show\" class=\"md-warn\" style=\"text-align:center\">
                    ";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["messages"]) ? $context["messages"] : null), "fr", array()), "exist", array()), "msg", array()), "html", null, true);
        echo "
                </md-subheader>
                ";
        // line 88
        echo (isset($context["nonce"]) ? $context["nonce"] : null);
        echo "

                <div layout-gt-sm=\"row\">
                    <md-input-container class=\"md-block\" flex-gt-sm>
                        <label>Titre de l'annonce</label>
                        <input ng-cust required name=\"title\" ng-model=\"advertPost.title\">
                        <div ng-messages=\"setAdvertForm.title.\$error\">
                            <div ng-message=\"required\">Veuillez donner un titre à votre annonce.</div>
                        </div>
                    </md-input-container>

                    <md-input-container class=\"md-block\" flex-gt-sm>
                        <label>Catégorie</label>
                        <md-select ng-model=\"advertPost.selectedCat\" required>
                            <md-option ng-value=\"cat.slug\" ng-repeat=\"cat in product_cat\" ng-disabled=\"cat.parent == 0\">
                                [[cat.name]]
                            </md-option>
                        </md-select>
                    </md-input-container>
                </div>
                <!-- Directive Template -->
                <immobilier></immobilier>
                <!-- /end Directive -->

                <md-input-container class=\"md-block\">
                    <label>Texte de l'annonce</label>
                    <textarea ng-model=\"advertPost.description\" name=\"description\" md-maxlength=\"500\" rows=\"5\"
                              md-select-on-focus required></textarea>
                    <div ng-messages=\"setAdvertForm.description.\$error\">
                        <div ng-message=\"required\">Veuillez rédiger un texte d'annonce.</div>
                    </div>
                </md-input-container>

                <md-input-container flex=\"50\" class=\"md-block\" flex-gt-sm>
                    <label>Prix</label>
                    <input type=\"number\" name=\"cost\" ng-model=\"advertPost.cost\" ng-pattern=\"/^[0-9]/\"/>
                    <div class=\"hint\" ng-if=\"showHints\"><p style=\"font-size:12px;\">Le champ prix doit contenir des
                        nombres entiers en Ar (pas de point, de virgule ou d'espace).</p></div>
                    <div ng-messages=\"setAdvertForm.cost.\$error\" role=\"alert\">
                        <div ng-message-exp=\"['number']\">

                        </div>
                    </div>
                </md-input-container>

                <md-input-container flex=\"50\">
                    <label>Ville ou code postal</label>
                    <input ng-cust required name=\"state\" ng-model=\"advertPost.state\">
                    <div ng-messages=\"setAdvertForm.state.\$error\">
                        <div ng-message=\"required\">This is required.</div>
                    </div>
                </md-input-container>
                <md-input-container flex=\"90\">
                    <label>Adresse de l'annonce</label>
                    <input ng-cust required name=\"adress\" ng-model=\"advertPost.adress\">
                    <div ng-messages=\"setAdvertForm.adress.\$error\" role=\"alertdialog\">
                        <div ng-message=\"required\">This is required.</div>
                    </div>
                </md-input-container>
                <div>
                    <p style=\"font-size:12px; padding:1rem; background:#dff7d9\">Complétez votre adresse et les personnes
                        utilisant la recherche autour de soi trouveront plus facilement votre annonce.
                        Si vous ne souhaitez pas renseigner votre adresse exacte, indiquez votre rue sans donner le
                        numéro. Cette information ne sera conservée que le temps de la publication de votre annonce.</p>
                </div>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Téléphone (+261)</label>
                    <input name=\"phone\" ng-model=\"advertPost.phone\"
                           ng-pattern=\"/^[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{2}\$/\"/>

                    <div class=\"hint\" ng-if=\"showHints\">3#-##-###-##</div>

                    <div ng-messages=\"setAdvertForm.phone.\$error\" role=\"alertdialog\">
                        <div ng-message=\"pattern\">##-##-###-## - Please enter a valid phone number (ex: 32-26-XXX-XX).
                        </div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\">
                    <md-checkbox ng-model=\"advertPost.hidephone\" aria-label=\"Checkbox\">
                        Masquer le numéro de téléphone dans l'annonce.
                    </md-checkbox>
                </md-input-container>

                <md-input-container flex=\"50\" class=\"md-block\">
                    <input id=\"fileInput\" ngf-change=\"uploadFile\" name=\"file\" type=\"file\" class=\"ng-hide\">
                    <md-button id=\"uploadButton\" uploadfile class=\"md-raised md-primary\"> Photo</md-button>
                </md-input-container>

                <div class=\"container\">
                    <md-progress-linear md-mode=\"indeterminate\" ng-show=\"picProgress\"></md-progress-linear>
                </div>
                <md-content class=\"md-padding\" layout=\"row\">
                    <div style=\"display:flex\">
                        <md-card ng-repeat=\"thumb in thumbnailGalleryIDs track by thumb.id\" id=\"[[thumb.id]]\">
                            <div class=\"pic-editor\">
                                <a href=\"#onClickDeleteThumb\" title=\"Effacer cette image\"
                                   ng-click=\"onClickDeleteThumb(thumb.id)\"
                                   class=\"event wp-menu-image dashicons-before dashicons-trash\"></a>

                                <a href=\"#onClicksetDefaultThumb\" title=\"Photo principal\"
                                   ng-click=\"onClicksetDefaultThumb(thumb.id, \$event)\"
                                   class=\"event wp-menu-image dashicons-before dashicons-camera\"></a>
                            </div>
                            <img ng-src=\"[[thumb.file]]\" class=\"md-card-image\" alt=\"\">
                        </md-card>
                    </div>
                </md-content>

                <div style=\"margin-top:40px;\" layout-gt-sm=\"row\">
                    <md-button type=\"submit\" ng-disabled=\"setAdvertForm.\$invalid\"
                               class=\"md-raised md-primary md-button\">Valider
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
        return "@frontadvert/advertaddform.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 88,  118 => 86,  112 => 83,  107 => 81,  76 => 53,  71 => 51,  19 => 1,);
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
    body {
        height: initial !important;
    }

    form md-select-value .md-container {
        display: inline-block !important;
    }

    .selectdemoSelectHeader {
        /* Please note: All these selectors are only applied to children of elements with the 'selectdemoSelectHeader' class */
    }

    .selectdemoSelectHeader .demo-header-searchbox {
        border: none;
        outline: none;
        height: 100%;
        width: 97%;
        padding: 0px;
        padding-left: 14px;
    }

    .selectdemoSelectHeader .demo-select-header {
        box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.1), 0 0 0 0 rgba(0, 0, 0, 0.14), 0 0 0 0 rgba(0, 0, 0, 0.12);
        height: 48px;
        cursor: pointer;
        position: relative;
        display: flex;
        align-items: center;
        width: auto;
    }

    .selectdemoSelectHeader md-content._md {
        max-height: 240px;
    }
</style>

<div ng-app=\"AdvertApp\" ng-controller=\"AdvertFormAddCtrl as afc\" layout-gt-sm=\"row\" layout=\"column\">
    <div flex-gt-sm=\"50\" flex>
        <div>
            <md-list flex>
                <md-subheader class=\"md-no-sticky\">REGLES GENERALES DE DIFFUSION</md-subheader>
                <md-list-item class=\"md-3-line\" ng-repeat=\"item in todos\" ng-click=\"null\">
                    <div class=\"md-list-item-text\" layout=\"column\">
                    </div>
                </md-list-item>
                <md-divider></md-divider>
            </md-list>

            <md-content flex layout-padding style=\"font-size: small\">
            {{terms|raw}}
            <div layout-gt-sm=\"row\" layout-align=\"center center\">
                <md-button style=\"display: block\" class=\"md-primary\" ng-href=\"{{register_link}}\" target=\"_blank\">VOIR LE REGLES GENERALES DE DIFFUSION</md-button>
            </div>
            </md-content>
        </div>
    </div>

    <div flex-gt-sm=\"50\" flex style=\"
        -webkit-box-shadow: 0px 0px 5px 0px #ddd;
        -o-box-shadow: 0px 0px 5px 0px #ddd;
        -moz-box-shadow: 0px 0px 5px 0px #ddd;
        box-shadow: 0px 0px 5px 0px #ddd;
        margin-left: 15px;
        padding: 10px;
    \">
        <md-content style=\"padding-left:10px\">
            <md-list flex>
                <md-subheader class=\"md-no-sticky\" style=\"
                    background: #2a4b80;
                    color: #fff;
                \">VOTRE ANNONCE</md-subheader>
                <md-divider></md-divider>
            </md-list>
            <form name=\"setAdvertForm\" ng-submit=\"subscribSubmit(setAdvertForm.\$valid)\" novalidate>
                <div layout=\"row\" layout-sm=\"column\" layout-align=\"space-around\">
                    <md-progress-circular md-mode=\"indeterminate\" ng-show=\"progressbar\"
                                          md-diameter=\"40\"></md-progress-circular>
                </div>
                <md-subheader ng-show=\"messages.fr.warn.show\" class=\"md-warn\" style=\"text-align:center\">
                    {{messages.fr.warn.msg}}
                </md-subheader>
                <md-subheader ng-show=\"messages.fr.success.show\" style=\"text-align:center\">{{messages.fr.success.msg}}
                </md-subheader>
                <md-subheader ng-show=\"messages.fr.exist.show\" class=\"md-warn\" style=\"text-align:center\">
                    {{messages.fr.exist.msg}}
                </md-subheader>
                {{nonce|raw}}

                <div layout-gt-sm=\"row\">
                    <md-input-container class=\"md-block\" flex-gt-sm>
                        <label>Titre de l'annonce</label>
                        <input ng-cust required name=\"title\" ng-model=\"advertPost.title\">
                        <div ng-messages=\"setAdvertForm.title.\$error\">
                            <div ng-message=\"required\">Veuillez donner un titre à votre annonce.</div>
                        </div>
                    </md-input-container>

                    <md-input-container class=\"md-block\" flex-gt-sm>
                        <label>Catégorie</label>
                        <md-select ng-model=\"advertPost.selectedCat\" required>
                            <md-option ng-value=\"cat.slug\" ng-repeat=\"cat in product_cat\" ng-disabled=\"cat.parent == 0\">
                                [[cat.name]]
                            </md-option>
                        </md-select>
                    </md-input-container>
                </div>
                <!-- Directive Template -->
                <immobilier></immobilier>
                <!-- /end Directive -->

                <md-input-container class=\"md-block\">
                    <label>Texte de l'annonce</label>
                    <textarea ng-model=\"advertPost.description\" name=\"description\" md-maxlength=\"500\" rows=\"5\"
                              md-select-on-focus required></textarea>
                    <div ng-messages=\"setAdvertForm.description.\$error\">
                        <div ng-message=\"required\">Veuillez rédiger un texte d'annonce.</div>
                    </div>
                </md-input-container>

                <md-input-container flex=\"50\" class=\"md-block\" flex-gt-sm>
                    <label>Prix</label>
                    <input type=\"number\" name=\"cost\" ng-model=\"advertPost.cost\" ng-pattern=\"/^[0-9]/\"/>
                    <div class=\"hint\" ng-if=\"showHints\"><p style=\"font-size:12px;\">Le champ prix doit contenir des
                        nombres entiers en Ar (pas de point, de virgule ou d'espace).</p></div>
                    <div ng-messages=\"setAdvertForm.cost.\$error\" role=\"alert\">
                        <div ng-message-exp=\"['number']\">

                        </div>
                    </div>
                </md-input-container>

                <md-input-container flex=\"50\">
                    <label>Ville ou code postal</label>
                    <input ng-cust required name=\"state\" ng-model=\"advertPost.state\">
                    <div ng-messages=\"setAdvertForm.state.\$error\">
                        <div ng-message=\"required\">This is required.</div>
                    </div>
                </md-input-container>
                <md-input-container flex=\"90\">
                    <label>Adresse de l'annonce</label>
                    <input ng-cust required name=\"adress\" ng-model=\"advertPost.adress\">
                    <div ng-messages=\"setAdvertForm.adress.\$error\" role=\"alertdialog\">
                        <div ng-message=\"required\">This is required.</div>
                    </div>
                </md-input-container>
                <div>
                    <p style=\"font-size:12px; padding:1rem; background:#dff7d9\">Complétez votre adresse et les personnes
                        utilisant la recherche autour de soi trouveront plus facilement votre annonce.
                        Si vous ne souhaitez pas renseigner votre adresse exacte, indiquez votre rue sans donner le
                        numéro. Cette information ne sera conservée que le temps de la publication de votre annonce.</p>
                </div>

                <md-input-container class=\"md-block\" flex-gt-sm>
                    <label>Téléphone (+261)</label>
                    <input name=\"phone\" ng-model=\"advertPost.phone\"
                           ng-pattern=\"/^[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{2}\$/\"/>

                    <div class=\"hint\" ng-if=\"showHints\">3#-##-###-##</div>

                    <div ng-messages=\"setAdvertForm.phone.\$error\" role=\"alertdialog\">
                        <div ng-message=\"pattern\">##-##-###-## - Please enter a valid phone number (ex: 32-26-XXX-XX).
                        </div>
                    </div>
                </md-input-container>

                <md-input-container class=\"md-block\">
                    <md-checkbox ng-model=\"advertPost.hidephone\" aria-label=\"Checkbox\">
                        Masquer le numéro de téléphone dans l'annonce.
                    </md-checkbox>
                </md-input-container>

                <md-input-container flex=\"50\" class=\"md-block\">
                    <input id=\"fileInput\" ngf-change=\"uploadFile\" name=\"file\" type=\"file\" class=\"ng-hide\">
                    <md-button id=\"uploadButton\" uploadfile class=\"md-raised md-primary\"> Photo</md-button>
                </md-input-container>

                <div class=\"container\">
                    <md-progress-linear md-mode=\"indeterminate\" ng-show=\"picProgress\"></md-progress-linear>
                </div>
                <md-content class=\"md-padding\" layout=\"row\">
                    <div style=\"display:flex\">
                        <md-card ng-repeat=\"thumb in thumbnailGalleryIDs track by thumb.id\" id=\"[[thumb.id]]\">
                            <div class=\"pic-editor\">
                                <a href=\"#onClickDeleteThumb\" title=\"Effacer cette image\"
                                   ng-click=\"onClickDeleteThumb(thumb.id)\"
                                   class=\"event wp-menu-image dashicons-before dashicons-trash\"></a>

                                <a href=\"#onClicksetDefaultThumb\" title=\"Photo principal\"
                                   ng-click=\"onClicksetDefaultThumb(thumb.id, \$event)\"
                                   class=\"event wp-menu-image dashicons-before dashicons-camera\"></a>
                            </div>
                            <img ng-src=\"[[thumb.file]]\" class=\"md-card-image\" alt=\"\">
                        </md-card>
                    </div>
                </md-content>

                <div style=\"margin-top:40px;\" layout-gt-sm=\"row\">
                    <md-button type=\"submit\" ng-disabled=\"setAdvertForm.\$invalid\"
                               class=\"md-raised md-primary md-button\">Valider
                    </md-button>
                    <md-progress-circular ng-show=\"activated\" md-mode='indeterminate' class=\"md-hue-2\"
                                          md-diameter=\"40px\" style=\"margin-top: 5px;\"></md-progress-circular>
                </div>
            </form>
        </md-content>
    </div>
</div>
", "@frontadvert/advertaddform.html", "D:\\server\\htdocs\\netpositiveimpact\\wp-content\\plugins\\atomisy-advert\\engine\\Twig\\templates\\front\\advertaddform.html");
    }
}
