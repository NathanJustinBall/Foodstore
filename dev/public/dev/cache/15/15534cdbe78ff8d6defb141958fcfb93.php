<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* product.twig */
class __TwigTemplate_219325b701e557a77541075f84950686 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!-- using prodcut.php -->

";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["allProdcuts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
            // line 4
            echo "<div class=\"product\">
    <h1>Item name: ";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "get_name", [], "any", false, false, false, 5), "html", null, true);
            echo " </h1>
    <p2> Vendor ";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "get_vendor", [], "any", false, false, false, 6), "html", null, true);
            echo " </p2>
    <p2>Price ";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "get_price", [], "any", false, false, false, 7), "html", null, true);
            echo " </p2>
    <p2>Weight ";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "get_weight", [], "any", false, false, false, 8), "html", null, true);
            echo " </p2>
    <img id=\"image\" src=";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "img_adr", [], "any", false, false, false, 9), "html", null, true);
            echo ">
    <p2> Date added ";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "date_bought", [], "any", false, false, false, 10), "html", null, true);
            echo "</p2>
    <p2> Date of expiry ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "date_expiry", [], "any", false, false, false, 11), "html", null, true);
            echo "</p2>
    <p2> Remaining days ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Product"], "shelf_life", [], "any", false, false, false, 12), "html", null, true);
            echo "</p2>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 12,  72 => 11,  68 => 10,  64 => 9,  60 => 8,  56 => 7,  52 => 6,  48 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "product.twig", "/foodstore/dev/public/twigs/product.twig");
    }
}
