<?php

/* @adminmaps/adminAddMaps.html */
class __TwigTemplate_e6d7684ce6fe3a8bc07df4b19a9e4a251e38c439d6065251666e570ca4a79152 extends Twig_Template
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
  md-select-menu.md-docs-dark-theme md-option:focus:not([disabled]):not([selected]) {
    background: rgb(33, 150, 243);
    color: #ffffff;
  }
</style>
<div ng-app=\"AdminMaps\" ng-controller=\"AdminMapsCtrl\"  class=\"ng-scope\">
  <div id=\"adminmaps\" style=\"width: 100%; height: 500px;\"></div>

  <div layout-gt-lg=\"row\">
    <md-content layout-padding md-theme=\"docs-dark\" style=\"background-color: rgb(35, 40, 45);\" ng-repeat=\"item in LayerContent track by item.ID\">
      <md-toolbar class=\"md-theme-light\">
        <h5 class=\"md-toolbar-tools\">
          <span style=\"    border: 1px solid #ffffff;
          color: #ffffff;
          font-size: 14px;
          border-radius: 12px;
          padding: 12px;
          margin-right: 25px;\">[[\$index + 1]]</span>
          <span><i class=\"material-icons\" style=\"font-size:34px; display:block\">terrain</i> KML Layer Content</span>

        </h5>
      </md-toolbar>
      <form name=\"LayerForm-[[\$index]]\">

        <div layout-gt-sm=\"row\">
          <md-input-container  flex=\"50\">
            <label>Titre</label>
            <input ng-model=\"item.title\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Pays</label>
            <md-select name=\"type\" ng-model=\"item.state\" required>
              <md-option value=\"[[state.slug]]\" ng-repeat='state in states'>[[state.name]]</md-option>
            </md-select>
          </md-input-container>
        </div>
        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-block\">
            <label>Description</label>
            <textarea md-maxlength=\"350\" name=\"description\" ng-model=\"item.description\" rows=\"4\" > </textarea>
          </md-input-container>
        </div>

        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-icon-float md-block\">
            <label><i class=\"material-icons\">share</i> </label>
            <input name=\"link\" ng-model=\"item.link\" placeholder=\"\">
          </md-input-container>
        </div>

        <div layout=\"row\">
          <md-input-container flex=\"50\">
            <label>Zoom</label>
            <input type=\"number\" name=\"zoom\" ng-model=\"item.zoom\">
            <div ng-messages=\"LayerForm.zoom.\$error\">
              <div ng-message=\"required\">This is required.</div>
            </div>
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Latitude</label>
            <input  name=\"lat\" ng-model=\"item.lat\">
            <div ng-messages=\"LayerForm.lat.\$error\">
              <div ng-message=\"required\">This is required.</div>
            </div>
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Longitude</label>
            <input require name=\"longitude\" ng-model=\"item.lng\">
            <div ng-messages=\"LayerForm.longitude.\$error\">
              <div ng-message=\"required\">This is required.</div>
            </div>
          </md-input-container>

        </div>
        <div layout=\"row\" class=\"md-block\">
          <md-button class=\"md-raised md-primary\" ng-click=\"saveLayer(\$index, item.ID)\">Save</md-button>
          <md-button class=\"md-raised md-primary\" ng-click=\"deleteLayer(\$index)\">Cancel</md-button>
        </div>

      </form>
    </md-content>

    <md-content layout-padding md-theme=\"docs-dark\" style=\"background-color: rgb(35, 40, 45);\" ng-repeat=\"geojson in ObjectGeoJSON track by geojson.ID\">
      <md-toolbar class=\"md-theme-light\">
        <h5 class=\"md-toolbar-tools\">
          <span style=\"    border: 1px solid #ffffff;
          color: #ffffff;
          font-size: 14px;
          border-radius: 12px;
          padding: 12px;
          margin-right: 25px;\">[[\$index + 1]]</span>
          <span><i class=\"material-icons\" style=\"font-size:34px; display:block\">terrain</i> GeoJson Content</span>

        </h5>
      </md-toolbar>
      <form name=\"GeojsonForm-[[\$index]]\">

        <div layout-gt-sm=\"row\">
          <md-input-container  flex=\"50\">
            <label>Titre</label>
            <input ng-model=\"geojson.Title\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Pays</label>
            <md-select name=\"type\" ng-model=\"geojson.State\" required>
              <md-option value=\"[[state.slug]]\" ng-repeat='state in states'>[[state.name]]</md-option>
            </md-select>
          </md-input-container>
        </div>

        <div layout=\"row\">
          <md-input-container flex=\"50\">
            <label>Zoom</label>
            <input type=\"number\" name=\"zoom\" ng-model=\"geojson.Zoom\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Latitude</label>
            <input  name=\"lat\" ng-model=\"geojson.Lat\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Longitude</label>
            <input name=\"longitude\" ng-model=\"geojson.Lng\">
          </md-input-container>

        </div>
        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-block\">
            <label>*.json</label>
            <input type=\"file\" name=\"file\" data-upload-Directive __id=\"[[geojson.ID]]\" ng-model=\"geojson.Content\">

            </textarea>
          </md-input-container>
        </div>
        <div layout=\"row\" class=\"md-block\">
          <md-button class=\"md-raised md-primary\" ng-click=\"geojson.Event.Save(\$index, geojson.ID)\">Save</md-button>
          <md-button class=\"md-raised md-primary\" ng-click=\"geojson.Event.Cancel()\">Cancel</md-button>
        </div>

      </form>
    </md-content>

    <md-content layout-padding md-theme=\"docs-dark\" style=\"background-color: rgb(35, 40, 45);\" ng-repeat=\"marker in UIMarkers track by marker.ID\">
      <md-toolbar class=\"md-theme-light\">
        <h5 class=\"md-toolbar-tools\">
          <span style=\"    border: 1px solid #ffffff;
          color: #ffffff;
          font-size: 14px;
          border-radius: 12px;
          padding: 12px;
          margin-right: 25px;\">[[\$index + 1]]</span>
          <span><i class=\"material-icons\" style=\"font-size:34px; display:block\">terrain</i> Marker</span>

        </h5>
      </md-toolbar>
      <form name=\"MarkerForm-[[\$index]]\">

        <div layout-gt-sm=\"row\">
          <md-input-container  flex=\"50\">
            <label>Titre</label>
            <input ng-model=\"marker.Title\">
          </md-input-container>
          <md-input-container class=\"md-block\">
            <label>Project</label>
            <md-select placeholder=\"Project\" ng-model=\"marker.project_id\" style=\"min-width: 200px;\">
              <md-option  ng-repeat=\"project in projects track by project.id\" ng-bind-html=\"project.name\" value=\"[[project.id]]\"></md-option>
            </md-select>
          </md-input-container>
        </div>
        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-block\">
            <label>Description</label>
            <textarea md-maxlength=\"350\" name=\"description\" ng-model=\"marker.Description\" rows=\"4\" > </textarea>
          </md-input-container>

        </div>

        <div layout=\"row\">
          <md-input-container flex=\"50\">
            <label>Latitude</label>
            <input  name=\"lat\" ng-model=\"marker.Lat\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Longitude</label>
            <input name=\"longitude\" ng-model=\"marker.Lng\">
          </md-input-container>

        </div>
        <div layout=\"row\" class=\"md-block\">
          <md-button class=\"md-raised md-primary\" ng-click=\"marker.Event.Save(\$index, marker.ID)\">Save</md-button>
          <md-button class=\"md-raised md-primary\" ng-click=\"marker.Event.Cancel()\">Cancel</md-button>
        </div>

      </form>
    </md-content>



    <md-content md-theme=\"docs-dark\" layout-padding style=\"background : #32373c !important\">
      <!-- <md-divider></md-divider> -->
      <div layout=\"row\" class=\"md-block\" flex=\"50\" style=\"float:right\">
        <md-button class=\"md-primary\" ng-click=\"addLayer()\">+ KML</md-button>
        <md-button class=\"md-primary\" ng-click=\"addGeoJson()\">+ GeoJSON</md-button>
        <md-button class=\"md-primary\" ng-click=\"addMarker()\">+ MARKER</md-button>
      </div>
    </md-content>

    <md-content>
      <md-list flex>
        <md-subheader class=\"md-no-sticky\">3 line item (with hover)</md-subheader>
        <md-list-item ng-repeat=\"person in people\" ng-click=\"goToPerson(person.name, \$event)\" class=\"noright\">

        </md-list-item>
        <md-divider ></md-divider>
      </md-content>

    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@adminmaps/adminAddMaps.html";
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
  md-select-menu.md-docs-dark-theme md-option:focus:not([disabled]):not([selected]) {
    background: rgb(33, 150, 243);
    color: #ffffff;
  }
</style>
<div ng-app=\"AdminMaps\" ng-controller=\"AdminMapsCtrl\"  class=\"ng-scope\">
  <div id=\"adminmaps\" style=\"width: 100%; height: 500px;\"></div>

  <div layout-gt-lg=\"row\">
    <md-content layout-padding md-theme=\"docs-dark\" style=\"background-color: rgb(35, 40, 45);\" ng-repeat=\"item in LayerContent track by item.ID\">
      <md-toolbar class=\"md-theme-light\">
        <h5 class=\"md-toolbar-tools\">
          <span style=\"    border: 1px solid #ffffff;
          color: #ffffff;
          font-size: 14px;
          border-radius: 12px;
          padding: 12px;
          margin-right: 25px;\">[[\$index + 1]]</span>
          <span><i class=\"material-icons\" style=\"font-size:34px; display:block\">terrain</i> KML Layer Content</span>

        </h5>
      </md-toolbar>
      <form name=\"LayerForm-[[\$index]]\">

        <div layout-gt-sm=\"row\">
          <md-input-container  flex=\"50\">
            <label>Titre</label>
            <input ng-model=\"item.title\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Pays</label>
            <md-select name=\"type\" ng-model=\"item.state\" required>
              <md-option value=\"[[state.slug]]\" ng-repeat='state in states'>[[state.name]]</md-option>
            </md-select>
          </md-input-container>
        </div>
        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-block\">
            <label>Description</label>
            <textarea md-maxlength=\"350\" name=\"description\" ng-model=\"item.description\" rows=\"4\" > </textarea>
          </md-input-container>
        </div>

        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-icon-float md-block\">
            <label><i class=\"material-icons\">share</i> </label>
            <input name=\"link\" ng-model=\"item.link\" placeholder=\"\">
          </md-input-container>
        </div>

        <div layout=\"row\">
          <md-input-container flex=\"50\">
            <label>Zoom</label>
            <input type=\"number\" name=\"zoom\" ng-model=\"item.zoom\">
            <div ng-messages=\"LayerForm.zoom.\$error\">
              <div ng-message=\"required\">This is required.</div>
            </div>
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Latitude</label>
            <input  name=\"lat\" ng-model=\"item.lat\">
            <div ng-messages=\"LayerForm.lat.\$error\">
              <div ng-message=\"required\">This is required.</div>
            </div>
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Longitude</label>
            <input require name=\"longitude\" ng-model=\"item.lng\">
            <div ng-messages=\"LayerForm.longitude.\$error\">
              <div ng-message=\"required\">This is required.</div>
            </div>
          </md-input-container>

        </div>
        <div layout=\"row\" class=\"md-block\">
          <md-button class=\"md-raised md-primary\" ng-click=\"saveLayer(\$index, item.ID)\">Save</md-button>
          <md-button class=\"md-raised md-primary\" ng-click=\"deleteLayer(\$index)\">Cancel</md-button>
        </div>

      </form>
    </md-content>

    <md-content layout-padding md-theme=\"docs-dark\" style=\"background-color: rgb(35, 40, 45);\" ng-repeat=\"geojson in ObjectGeoJSON track by geojson.ID\">
      <md-toolbar class=\"md-theme-light\">
        <h5 class=\"md-toolbar-tools\">
          <span style=\"    border: 1px solid #ffffff;
          color: #ffffff;
          font-size: 14px;
          border-radius: 12px;
          padding: 12px;
          margin-right: 25px;\">[[\$index + 1]]</span>
          <span><i class=\"material-icons\" style=\"font-size:34px; display:block\">terrain</i> GeoJson Content</span>

        </h5>
      </md-toolbar>
      <form name=\"GeojsonForm-[[\$index]]\">

        <div layout-gt-sm=\"row\">
          <md-input-container  flex=\"50\">
            <label>Titre</label>
            <input ng-model=\"geojson.Title\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Pays</label>
            <md-select name=\"type\" ng-model=\"geojson.State\" required>
              <md-option value=\"[[state.slug]]\" ng-repeat='state in states'>[[state.name]]</md-option>
            </md-select>
          </md-input-container>
        </div>

        <div layout=\"row\">
          <md-input-container flex=\"50\">
            <label>Zoom</label>
            <input type=\"number\" name=\"zoom\" ng-model=\"geojson.Zoom\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Latitude</label>
            <input  name=\"lat\" ng-model=\"geojson.Lat\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Longitude</label>
            <input name=\"longitude\" ng-model=\"geojson.Lng\">
          </md-input-container>

        </div>
        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-block\">
            <label>*.json</label>
            <input type=\"file\" name=\"file\" data-upload-Directive __id=\"[[geojson.ID]]\" ng-model=\"geojson.Content\">

            </textarea>
          </md-input-container>
        </div>
        <div layout=\"row\" class=\"md-block\">
          <md-button class=\"md-raised md-primary\" ng-click=\"geojson.Event.Save(\$index, geojson.ID)\">Save</md-button>
          <md-button class=\"md-raised md-primary\" ng-click=\"geojson.Event.Cancel()\">Cancel</md-button>
        </div>

      </form>
    </md-content>

    <md-content layout-padding md-theme=\"docs-dark\" style=\"background-color: rgb(35, 40, 45);\" ng-repeat=\"marker in UIMarkers track by marker.ID\">
      <md-toolbar class=\"md-theme-light\">
        <h5 class=\"md-toolbar-tools\">
          <span style=\"    border: 1px solid #ffffff;
          color: #ffffff;
          font-size: 14px;
          border-radius: 12px;
          padding: 12px;
          margin-right: 25px;\">[[\$index + 1]]</span>
          <span><i class=\"material-icons\" style=\"font-size:34px; display:block\">terrain</i> Marker</span>

        </h5>
      </md-toolbar>
      <form name=\"MarkerForm-[[\$index]]\">

        <div layout-gt-sm=\"row\">
          <md-input-container  flex=\"50\">
            <label>Titre</label>
            <input ng-model=\"marker.Title\">
          </md-input-container>
          <md-input-container class=\"md-block\">
            <label>Project</label>
            <md-select placeholder=\"Project\" ng-model=\"marker.project_id\" style=\"min-width: 200px;\">
              <md-option  ng-repeat=\"project in projects track by project.id\" ng-bind-html=\"project.name\" value=\"[[project.id]]\"></md-option>
            </md-select>
          </md-input-container>
        </div>
        <div layout-gt-lg=\"row\">
          <md-input-container class=\"md-block\">
            <label>Description</label>
            <textarea md-maxlength=\"350\" name=\"description\" ng-model=\"marker.Description\" rows=\"4\" > </textarea>
          </md-input-container>

        </div>

        <div layout=\"row\">
          <md-input-container flex=\"50\">
            <label>Latitude</label>
            <input  name=\"lat\" ng-model=\"marker.Lat\">
          </md-input-container>
          <md-input-container flex=\"50\">
            <label>Longitude</label>
            <input name=\"longitude\" ng-model=\"marker.Lng\">
          </md-input-container>

        </div>
        <div layout=\"row\" class=\"md-block\">
          <md-button class=\"md-raised md-primary\" ng-click=\"marker.Event.Save(\$index, marker.ID)\">Save</md-button>
          <md-button class=\"md-raised md-primary\" ng-click=\"marker.Event.Cancel()\">Cancel</md-button>
        </div>

      </form>
    </md-content>



    <md-content md-theme=\"docs-dark\" layout-padding style=\"background : #32373c !important\">
      <!-- <md-divider></md-divider> -->
      <div layout=\"row\" class=\"md-block\" flex=\"50\" style=\"float:right\">
        <md-button class=\"md-primary\" ng-click=\"addLayer()\">+ KML</md-button>
        <md-button class=\"md-primary\" ng-click=\"addGeoJson()\">+ GeoJSON</md-button>
        <md-button class=\"md-primary\" ng-click=\"addMarker()\">+ MARKER</md-button>
      </div>
    </md-content>

    <md-content>
      <md-list flex>
        <md-subheader class=\"md-no-sticky\">3 line item (with hover)</md-subheader>
        <md-list-item ng-repeat=\"person in people\" ng-click=\"goToPerson(person.name, \$event)\" class=\"noright\">

        </md-list-item>
        <md-divider ></md-divider>
      </md-content>

    </div>
  </div>
", "@adminmaps/adminAddMaps.html", "D:\\server\\htdocs\\netpositiveimpact\\wp-content\\plugins\\atomisy_maps\\Engine\\Twig\\templates\\admin\\adminAddMaps.html");
    }
}
