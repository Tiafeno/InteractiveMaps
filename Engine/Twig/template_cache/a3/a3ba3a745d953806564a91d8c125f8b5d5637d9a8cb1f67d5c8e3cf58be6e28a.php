<?php

/* @frontadvert/search.advert.html */
class __TwigTemplate_9381d362b9cf812a6b7379319d95f68627bd61eebad7f65c1007f2ddcf881483 extends Twig_Template
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
        echo "<form action=\"\" method=\"post\">
    <p>
        <label for=\"newsletter_email\">Votre email :</label>
        <input id=\"newsletter_email\" name=\"newsletter_email\" type=\"email\">
        ";
        // line 5
        echo (isset($context["nonce"]) ? $context["nonce"] : null);
        echo "
    </p>
    <input type=\"submit\">
</form>
";
    }

    public function getTemplateName()
    {
        return "@frontadvert/search.advert.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<form action=\"\" method=\"post\">
    <p>
        <label for=\"newsletter_email\">Votre email :</label>
        <input id=\"newsletter_email\" name=\"newsletter_email\" type=\"email\">
        {{nonce|raw}}
    </p>
    <input type=\"submit\">
</form>
", "@frontadvert/search.advert.html", "D:\\server\\htdocs\\netpositiveimpact\\wp-content\\plugins\\atomisy-advert\\engine\\Twig\\templates\\front\\search.advert.html");
    }
}
