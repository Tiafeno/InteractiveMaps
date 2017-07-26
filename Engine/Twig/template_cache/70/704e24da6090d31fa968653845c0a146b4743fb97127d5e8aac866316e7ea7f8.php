<?php

/* @frontmaps/maps.html */
class __TwigTemplate_262e832ba0ffeaad310787aae282e0030e01554533609f17bc352710472a4172 extends Twig_Template
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
    md-backdrop.md-opaque.md-default-theme, md-backdrop.md-opaque {
        background-color: transparent !important;
    }
    #bodyContent p {
         font-weight: 400;
     }

</style>

<section layout=\"row\" layout-sm=\"column\" layout-align=\"left left\" layout-wrap
         style=\"position:absolute; z-index: 9; background: #fff; padding: 4px; border-radius: 2px;\">
    <md-button ng-click=\"toggleLeft()\" class=\"md-primary\">
        <i class=\"material-icons\">menu</i>
    </md-button>
    <md-button class=\"\" ng-click=\"__init__()\">Start Again</md-button>

</section>


<div layout=\"row\" flex >
    <md-sidenav class=\"md-sidenav-left\" md-whiteframe=\"4\" md-component-id=\"left\"
                md-disable-backdrop=\"\" >
        <md-toolbar class=\"md-theme-indigo\" style=\"background-color: rgb(36, 47, 62);\">
            <h1 class=\"md-toolbar-tools\">[[title.geojson]]</h1>
        </md-toolbar>

        <md-content layout-margin>
            <p class=\"md-subhead\" style=\"text-align:center\">Please select from below or use the map to zoom or select</p>
            <div layout=\"row\" style=\"margin-top:40px\">
                <md-input-container class=\"md-block\" flex style=\"margin:0 auto\">
                    <label>State</label>
                    <md-select ng-model=\"state\">
                        <md-option ng-repeat=\"state in states\" ng-value=\"state.slug\">
                            [[state.name]]
                        </md-option>
                    </md-select>
                </md-input-container>
            </div>
            <h2 ng-show=\"products\" style=\"color: #23282d; padding: 10px;position: static;margin: 0;text-align: center;\" class=\"md-title\">PRODUITS</h2>
            <section layout=\"row\">
                <md-list layout=\"column\" layout-padding >
                    <md-list-item class=\"md-3-line\" ng-repeat=\"product in products\" style=\"background: #cbe6a3; padding-top: 10px; padding-bottom: 10px\">
                        <img ng-src=\"[[product.thumb_url]]\" class=\"md-avatar\" alt=\"[[product.title]]\">
                        <div class=\"md-list-item-text\">
                            <a href=\"[[product.link]]\" title=\"[[product.title]]\" target=\"_blank\">
                                <h3>[[product.title]]</h3>
                            </a>
                            <h6 style=\"font-size: 12px; margin: 4px 0px\">[[product.city[0].name]]</h6>
                            <p ng-bind-html=\"product.content | limitTo:88\" >...</p>
                        </div>
                    </md-list-item>
                </md-list>
            </section>

            <!-- <md-button ng-click=\"toggleRight()\" class=\"md-accent\">
               Close
             </md-button> -->
        </md-content>
    </md-sidenav>

    <md-sidenav class=\"md-sidenav-right\" md-whiteframe=\"4\" md-component-id=\"right\"
                md-disable-backdrop >
        <md-toolbar class=\"md-theme-indigo\" >
            <h1 class=\"md-toolbar-tools\">[[title.marker]]</h1>
        </md-toolbar>

        <md-content layout-margin>
            <section layout=\"row\">
                <md-list layout=\"column\" layout-padding >
                    <md-list-item class=\"md-3-line\" ng-repeat=\"project in MarkerProjects track by project.id\" style=\" padding-top: 10px; padding-bottom: 10px\">
                        <img ng-src=\"[[project.thumbnail]]\" class=\"md-avatar\" alt=\"[[project.title]]\">
                        <div class=\"md-list-item-text\">
                            <a href=\"[[project.permalink]]\" title=\"[[project.title]]\" target=\"_blank\">
                                <h3 style=\"white-space: pre-wrap;\" ng-bind-html=\"project.title\"></h3>
                            </a>
                            <p ng-bind-html=\"project.content\" ></p>
                        </div>
                    </md-list-item>
                </md-list>
            </section>

            <!-- <md-button ng-click=\"toggleRight()\" class=\"md-accent\">
               Close
             </md-button> -->
        </md-content>
    </md-sidenav>

</div>
<div id=\"map\" ></div>
";
    }

    public function getTemplateName()
    {
        return "@frontmaps/maps.html";
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
    md-backdrop.md-opaque.md-default-theme, md-backdrop.md-opaque {
        background-color: transparent !important;
    }
    #bodyContent p {
         font-weight: 400;
     }

</style>

<section layout=\"row\" layout-sm=\"column\" layout-align=\"left left\" layout-wrap
         style=\"position:absolute; z-index: 9; background: #fff; padding: 4px; border-radius: 2px;\">
    <md-button ng-click=\"toggleLeft()\" class=\"md-primary\">
        <i class=\"material-icons\">menu</i>
    </md-button>
    <md-button class=\"\" ng-click=\"__init__()\">Start Again</md-button>

</section>


<div layout=\"row\" flex >
    <md-sidenav class=\"md-sidenav-left\" md-whiteframe=\"4\" md-component-id=\"left\"
                md-disable-backdrop=\"\" >
        <md-toolbar class=\"md-theme-indigo\" style=\"background-color: rgb(36, 47, 62);\">
            <h1 class=\"md-toolbar-tools\">[[title.geojson]]</h1>
        </md-toolbar>

        <md-content layout-margin>
            <p class=\"md-subhead\" style=\"text-align:center\">Please select from below or use the map to zoom or select</p>
            <div layout=\"row\" style=\"margin-top:40px\">
                <md-input-container class=\"md-block\" flex style=\"margin:0 auto\">
                    <label>State</label>
                    <md-select ng-model=\"state\">
                        <md-option ng-repeat=\"state in states\" ng-value=\"state.slug\">
                            [[state.name]]
                        </md-option>
                    </md-select>
                </md-input-container>
            </div>
            <h2 ng-show=\"products\" style=\"color: #23282d; padding: 10px;position: static;margin: 0;text-align: center;\" class=\"md-title\">PRODUITS</h2>
            <section layout=\"row\">
                <md-list layout=\"column\" layout-padding >
                    <md-list-item class=\"md-3-line\" ng-repeat=\"product in products\" style=\"background: #cbe6a3; padding-top: 10px; padding-bottom: 10px\">
                        <img ng-src=\"[[product.thumb_url]]\" class=\"md-avatar\" alt=\"[[product.title]]\">
                        <div class=\"md-list-item-text\">
                            <a href=\"[[product.link]]\" title=\"[[product.title]]\" target=\"_blank\">
                                <h3>[[product.title]]</h3>
                            </a>
                            <h6 style=\"font-size: 12px; margin: 4px 0px\">[[product.city[0].name]]</h6>
                            <p ng-bind-html=\"product.content | limitTo:88\" >...</p>
                        </div>
                    </md-list-item>
                </md-list>
            </section>

            <!-- <md-button ng-click=\"toggleRight()\" class=\"md-accent\">
               Close
             </md-button> -->
        </md-content>
    </md-sidenav>

    <md-sidenav class=\"md-sidenav-right\" md-whiteframe=\"4\" md-component-id=\"right\"
                md-disable-backdrop >
        <md-toolbar class=\"md-theme-indigo\" >
            <h1 class=\"md-toolbar-tools\">[[title.marker]]</h1>
        </md-toolbar>

        <md-content layout-margin>
            <section layout=\"row\">
                <md-list layout=\"column\" layout-padding >
                    <md-list-item class=\"md-3-line\" ng-repeat=\"project in MarkerProjects track by project.id\" style=\" padding-top: 10px; padding-bottom: 10px\">
                        <img ng-src=\"[[project.thumbnail]]\" class=\"md-avatar\" alt=\"[[project.title]]\">
                        <div class=\"md-list-item-text\">
                            <a href=\"[[project.permalink]]\" title=\"[[project.title]]\" target=\"_blank\">
                                <h3 style=\"white-space: pre-wrap;\" ng-bind-html=\"project.title\"></h3>
                            </a>
                            <p ng-bind-html=\"project.content\" ></p>
                        </div>
                    </md-list-item>
                </md-list>
            </section>

            <!-- <md-button ng-click=\"toggleRight()\" class=\"md-accent\">
               Close
             </md-button> -->
        </md-content>
    </md-sidenav>

</div>
<div id=\"map\" ></div>
", "@frontmaps/maps.html", "/home/netpositds/netpositiveimpact.earth/wp-content/plugins/atomisy_maps/Engine/Twig/templates/front/maps.html");
    }
}
