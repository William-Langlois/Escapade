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

/* User/inscription.html.twig */
class __TwigTemplate_f828fc90336914303a6eb110bda2c5337d9f30446ea01bf2ba070d41976cb33d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "BasicLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("BasicLayout.html.twig", "User/inscription.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Inscription ";
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <div class=\"container-fluid mt-2\">

        <h2 class=\"display-3\">Inscription</h2>
        <hr class=\"my-4\">
        <form name=\"inscription\" method=\"post\" enctype=\"multipart/form-data\">
            <div class=\"form-group row\">
                <label for=\"Nom\" class=\"col-sm-2 col-form-label\">Nom</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Nom\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <div class=\"form-group row\">
                <label for=\"Prenom\" class=\"col-sm-2 col-form-label\">Prenom</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Prenom\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <div class=\"form-group row\">
                <label for=\"Email\" class=\"col-sm-2 col-form-label\">Email</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Email\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <div class=\"form-group row\">
                <label for=\"Ville\" class=\"col-sm-2 col-form-label\">Ville</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Ville\" class=\"form-control form-control-lg\">
                </div>
            </div>


            <div class=\"form-group row\">
                <label for=\"Password\" class=\"col-sm-2 col-form-label\">Mot de passe</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Password\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <input type=\"submit\" class=\"btn btn-primary my-1\">
        </form>
    </div>

";
    }

    public function getTemplateName()
    {
        return "User/inscription.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 5,  55 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"BasicLayout.html.twig\" %}
{% block title %}{{ parent() }} - Inscription {% endblock %}

{% block body %}

    <div class=\"container-fluid mt-2\">

        <h2 class=\"display-3\">Inscription</h2>
        <hr class=\"my-4\">
        <form name=\"inscription\" method=\"post\" enctype=\"multipart/form-data\">
            <div class=\"form-group row\">
                <label for=\"Nom\" class=\"col-sm-2 col-form-label\">Nom</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Nom\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <div class=\"form-group row\">
                <label for=\"Prenom\" class=\"col-sm-2 col-form-label\">Prenom</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Prenom\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <div class=\"form-group row\">
                <label for=\"Email\" class=\"col-sm-2 col-form-label\">Email</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Email\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <div class=\"form-group row\">
                <label for=\"Ville\" class=\"col-sm-2 col-form-label\">Ville</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Ville\" class=\"form-control form-control-lg\">
                </div>
            </div>


            <div class=\"form-group row\">
                <label for=\"Password\" class=\"col-sm-2 col-form-label\">Mot de passe</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"Password\" class=\"form-control form-control-lg\">
                </div>
            </div>

            <input type=\"submit\" class=\"btn btn-primary my-1\">
        </form>
    </div>

{% endblock %}", "User/inscription.html.twig", "C:\\Users\\langl\\Desktop\\Cours\\Projets\\eDating\\Code\\Site\\templates\\User\\inscription.html.twig");
    }
}
