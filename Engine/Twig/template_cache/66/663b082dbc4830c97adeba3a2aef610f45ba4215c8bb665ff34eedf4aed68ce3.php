<?php

/* @frontadvert/loginform.advert.html */
class __TwigTemplate_197649d549c6e1c0412eae01ec8cc7518e04e442ad7cb39fb9b3e4c24c127c23 extends Twig_Template
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
    .input-text, input[type=text],
    input[type=email], input[type=url],
    input[type=password], input[type=search], textarea {
        box-shadow: inset 0 -1px 0px rgba(0,0,0,.125) !important;
    }
    md-input-container{
        margin : 0 !important;
    }
</style>
<form name=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["form_id"]) ? $context["form_id"] : null), "html", null, true);
        echo "\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["form_id"]) ? $context["form_id"] : null), "html", null, true);
        echo "\"
      action=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : null), "html", null, true);
        echo "\" method=\"post\" ng-app=\"LoginAdvertApp\" ng-controller=\"LoginAdvertCtrl as lfc\"
        style=\"
        width:59%;
        margin: auto;
        -moz-box-shadow: 0px 0px 5px 0px #ddd;
        -o-box-shadow: 0px 0px 5px 0px #ddd;
        -webkit-box-shadow: 0px 0px 5px 0px #ddd;
        box-shadow: 0px 0px 5px 0px #ddd;
        padding: 37px 10px 42px 10px;
        \">
    ";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["login_form_top"]) ? $context["login_form_top"] : null), "html", null, true);
        echo "

    <div layout-gt-sm=\"row\" layout-align=\"center center\">
        <md-input-container class=\"md-block\" flex=\"35\" >
            <label>";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["label_username"]) ? $context["label_username"] : null), "html", null, true);
        echo "</label>
            <input ng-cust required type=\"text\"   name=\"log\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["value_username"]) ? $context["value_username"] : null), "html", null, true);
        echo "\" >
        </md-input-container>
    </div>
    <div layout-gt-sm=\"row\" layout-align=\"center center\">
        <md-input-container class=\"md-block\" flex=\"35\" >
            <label>";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["label_password"]) ? $context["label_password"] : null), "html", null, true);
        echo "</label>
            <input ng-cust required  type=\"password\"  name=\"pwd\" value=\"\">
        </md-input-container>
    </div>
    ";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["login_form_middle"]) ? $context["login_form_middle"] : null), "html", null, true);
        echo "
    ";
        // line 37
        if ((isset($context["remember"]) ? $context["remember"] : null)) {
            // line 38
            echo "        <div layout-gt-sm=\"row\" layout-align=\"center center\">
            <md-input-container class=\"md-block\">
                <md-checkbox name=\"rememberme\" value=\"forever\" ";
            // line 40
            if ((isset($context["value_remember"]) ? $context["value_remember"] : null)) {
                echo " ng-checked=\"true\" ";
            }
            echo " />
                ";
            // line 41
            echo twig_escape_filter($this->env, (isset($context["label_remember"]) ? $context["label_remember"] : null), "html", null, true);
            echo "
                </md-checkbox>
            </md-input-container>

        </div>
    ";
        }
        // line 47
        echo "    <section layout=\"row\" layout-sm=\"column\" layout-align=\"center center\" layout-wrap>
        <md-button type=\"submit\" name=\"wp-submit\"  class=\"md-raised md-primary\">";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["label_log_in"]) ? $context["label_log_in"] : null), "html", null, true);
        echo "</md-button>
        <input type=\"hidden\" name=\"redirect_to\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["redirect"]) ? $context["redirect"] : null), "html", null, true);
        echo "\" />

    </section>
    <div layout-gt-sm=\"row\" layout-align=\"center center\">
        <span style=\"display: block;\">Vous n'avez pas de compte?</span>
        <md-button style=\"display: block\" class=\"md-primary\" ng-href=\"";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["register_link"]) ? $context["register_link"] : null), "html", null, true);
        echo "\" target=\"_blank\">Crée un compte</md-button>
    </div>


    <!--<p class=\"login-username\">-->
        <!--<label for=\"";
        // line 59
        echo twig_escape_filter($this->env, (isset($context["id_username"]) ? $context["id_username"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["label_username"]) ? $context["label_username"] : null), "html", null, true);
        echo "</label>-->
        <!--<input type=\"text\" name=\"log\" id=\"' . esc_attr( \$args['id_username'] ) . '\" class=\"input\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, (isset($context["value_username"]) ? $context["value_username"] : null), "html", null, true);
        echo "\" size=\"20\" />-->
    <!--</p>-->
    <!--<p class=\"login-password\">-->
        <!--<label for=\"";
        // line 63
        echo twig_escape_filter($this->env, (isset($context["id_password"]) ? $context["id_password"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["label_password"]) ? $context["label_password"] : null), "html", null, true);
        echo "</label>-->
        <!--<input type=\"password\" name=\"pwd\" id=\"";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["id_password"]) ? $context["id_password"] : null), "html", null, true);
        echo "\" class=\"input\" value=\"\" size=\"20\" />-->
    <!--</p>-->

    <!--";
        // line 67
        if ((isset($context["remember"]) ? $context["remember"] : null)) {
            echo "-->
    <!--<p class=\"login-remember\"><label>-->
        <!--<input name=\"rememberme\" type=\"checkbox\" id=\"";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["id_remember"]) ? $context["id_remember"] : null), "html", null, true);
            echo "\"-->
                                            <!--value=\"forever\" ";
            // line 70
            if ((isset($context["value_remember"]) ? $context["value_remember"] : null)) {
                echo " checked=\"checked\" ";
            }
            echo " /> ";
            echo twig_escape_filter($this->env, (isset($context["label_remember"]) ? $context["label_remember"] : null), "html", null, true);
            echo "</label></p>-->
    <!--";
        }
        // line 71
        echo "-->
    <!--<p class=\"login-submit\">-->
        <!--<input type=\"submit\" name=\"wp-submit\" id=\"";
        // line 73
        echo twig_escape_filter($this->env, (isset($context["id_submit"]) ? $context["id_submit"] : null), "html", null, true);
        echo "\" class=\"button button-primary\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["label_log_in"]) ? $context["label_log_in"] : null), "html", null, true);
        echo "\" />-->
        <!--<input type=\"hidden\" name=\"redirect_to\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, (isset($context["redirect"]) ? $context["redirect"] : null), "html", null, true);
        echo "\" />-->
    <!--</p>-->
    ";
        // line 76
        echo twig_escape_filter($this->env, (isset($context["login_form_bottom"]) ? $context["login_form_bottom"] : null), "html", null, true);
        echo "
</form>";
    }

    public function getTemplateName()
    {
        return "@frontadvert/loginform.advert.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 76,  176 => 74,  170 => 73,  166 => 71,  157 => 70,  153 => 69,  148 => 67,  142 => 64,  136 => 63,  130 => 60,  124 => 59,  116 => 54,  108 => 49,  104 => 48,  101 => 47,  92 => 41,  86 => 40,  82 => 38,  80 => 37,  76 => 36,  69 => 32,  61 => 27,  57 => 26,  50 => 22,  37 => 12,  31 => 11,  19 => 1,);
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
    .input-text, input[type=text],
    input[type=email], input[type=url],
    input[type=password], input[type=search], textarea {
        box-shadow: inset 0 -1px 0px rgba(0,0,0,.125) !important;
    }
    md-input-container{
        margin : 0 !important;
    }
</style>
<form name=\"{{form_id}}\" id=\"{{form_id}}\"
      action=\"{{action}}\" method=\"post\" ng-app=\"LoginAdvertApp\" ng-controller=\"LoginAdvertCtrl as lfc\"
        style=\"
        width:59%;
        margin: auto;
        -moz-box-shadow: 0px 0px 5px 0px #ddd;
        -o-box-shadow: 0px 0px 5px 0px #ddd;
        -webkit-box-shadow: 0px 0px 5px 0px #ddd;
        box-shadow: 0px 0px 5px 0px #ddd;
        padding: 37px 10px 42px 10px;
        \">
    {{login_form_top}}

    <div layout-gt-sm=\"row\" layout-align=\"center center\">
        <md-input-container class=\"md-block\" flex=\"35\" >
            <label>{{label_username}}</label>
            <input ng-cust required type=\"text\"   name=\"log\" value=\"{{value_username}}\" >
        </md-input-container>
    </div>
    <div layout-gt-sm=\"row\" layout-align=\"center center\">
        <md-input-container class=\"md-block\" flex=\"35\" >
            <label>{{label_password}}</label>
            <input ng-cust required  type=\"password\"  name=\"pwd\" value=\"\">
        </md-input-container>
    </div>
    {{login_form_middle}}
    {% if remember %}
        <div layout-gt-sm=\"row\" layout-align=\"center center\">
            <md-input-container class=\"md-block\">
                <md-checkbox name=\"rememberme\" value=\"forever\" {%if value_remember %} ng-checked=\"true\" {% endif %} />
                {{label_remember}}
                </md-checkbox>
            </md-input-container>

        </div>
    {% endif %}
    <section layout=\"row\" layout-sm=\"column\" layout-align=\"center center\" layout-wrap>
        <md-button type=\"submit\" name=\"wp-submit\"  class=\"md-raised md-primary\">{{label_log_in}}</md-button>
        <input type=\"hidden\" name=\"redirect_to\" value=\"{{redirect}}\" />

    </section>
    <div layout-gt-sm=\"row\" layout-align=\"center center\">
        <span style=\"display: block;\">Vous n'avez pas de compte?</span>
        <md-button style=\"display: block\" class=\"md-primary\" ng-href=\"{{register_link}}\" target=\"_blank\">Crée un compte</md-button>
    </div>


    <!--<p class=\"login-username\">-->
        <!--<label for=\"{{id_username}}\">{{label_username}}</label>-->
        <!--<input type=\"text\" name=\"log\" id=\"' . esc_attr( \$args['id_username'] ) . '\" class=\"input\" value=\"{{value_username}}\" size=\"20\" />-->
    <!--</p>-->
    <!--<p class=\"login-password\">-->
        <!--<label for=\"{{id_password}}\">{{label_password}}</label>-->
        <!--<input type=\"password\" name=\"pwd\" id=\"{{id_password}}\" class=\"input\" value=\"\" size=\"20\" />-->
    <!--</p>-->

    <!--{% if remember %}-->
    <!--<p class=\"login-remember\"><label>-->
        <!--<input name=\"rememberme\" type=\"checkbox\" id=\"{{id_remember}}\"-->
                                            <!--value=\"forever\" {%if value_remember %} checked=\"checked\" {% endif %} /> {{label_remember}}</label></p>-->
    <!--{% endif %}-->
    <!--<p class=\"login-submit\">-->
        <!--<input type=\"submit\" name=\"wp-submit\" id=\"{{id_submit}}\" class=\"button button-primary\" value=\"{{label_log_in}}\" />-->
        <!--<input type=\"hidden\" name=\"redirect_to\" value=\"{{redirect}}\" />-->
    <!--</p>-->
    {{login_form_bottom}}
</form>", "@frontadvert/loginform.advert.html", "D:\\server\\htdocs\\netpositiveimpact\\wp-content\\plugins\\atomisy-advert\\engine\\Twig\\templates\\front\\loginform.advert.html");
    }
}
