<?php

/* @frontmaps/maps.in.page.html */
class __TwigTemplate_a833c20b1a1e8fdbc1e3c7dce8e42da773535d7a5b96190d831c37933414c28d extends Twig_Template
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
<div ng-app=\"MapsApp\" ng-controller=\"AppCtrl\">
<section layout=\"row\" layout-sm=\"column\" layout-align=\"left left\" layout-wrap
         style=\"position:absolute; z-index: 9; background: #fff; padding: 4px; border-radius: 2px;\">
    <md-button ng-click=\"toggleLeft()\" class=\"md-primary\">
        <i class=\"material-icons\">menu</i>
    </md-button>
    <md-button class=\"\" ng-click=\"__init__()\">Start Again</md-button>

</section>


<div layout=\"row\" flex >
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
        </md-content>
    </md-sidenav>

</div>
<div id=\"map\" style=\"width:100%; height:480px\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@frontmaps/maps.in.page.html";
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
<div ng-app=\"MapsApp\" ng-controller=\"AppCtrl\">
<section layout=\"row\" layout-sm=\"column\" layout-align=\"left left\" layout-wrap
         style=\"position:absolute; z-index: 9; background: #fff; padding: 4px; border-radius: 2px;\">
    <md-button ng-click=\"toggleLeft()\" class=\"md-primary\">
        <i class=\"material-icons\">menu</i>
    </md-button>
    <md-button class=\"\" ng-click=\"__init__()\">Start Again</md-button>

</section>


<div layout=\"row\" flex >
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
        </md-content>
    </md-sidenav>

</div>
<div id=\"map\" style=\"width:100%; height:480px\"></div>
</div>
", "@frontmaps/maps.in.page.html", "/home/netpositds/netpositiveimpact.earth/wp-content/plugins/atomisy_maps/Engine/Twig/templates/front/maps.in.page.html");
    }
}
