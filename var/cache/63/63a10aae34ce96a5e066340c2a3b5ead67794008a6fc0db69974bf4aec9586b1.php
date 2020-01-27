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

/* Database/dispall.html.twig */
class __TwigTemplate_e8fdf5c620e5bf08a114a8e12a9e4a8998f5ee7486cc570d5ab05b504ddca2b3 extends Template
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
        return "./Database/DatabaseLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("./Database/DatabaseLayout.html.twig", "Database/dispall.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " Base de données - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Base de données</h1>
    </div>
    <div class=\"container\">
        <table class=\"table table-striped\">
            <tbody>
            <tr>
                <th scope=\"row\"><a href=\"/User/ListAll\">[";
        // line 13
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["userList"] ?? null)), "html", null, true);
        echo "] Utilisateurs</a></th>
            </tr>
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["userList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 16
            echo "                <tr>
                    <th scope=\"row\"><a href=\"/User/Show/";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 17), "html", null, true);
            echo "\">#";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 17), "html", null, true);
            echo "</a></th>
                    <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 18), "html", null, true);
            echo " </td>
                    <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 19), "html", null, true);
            echo "</td>


                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
            </tbody>
        </table>
    </div>


";
    }

    public function getTemplateName()
    {
        return "Database/dispall.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 24,  91 => 19,  87 => 18,  81 => 17,  78 => 16,  74 => 15,  69 => 13,  59 => 5,  55 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"./Database/DatabaseLayout.html.twig\" %}
{% block title %} Base de données - {{ parent() }}{% endblock %}

{% block body %}

    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Base de données</h1>
    </div>
    <div class=\"container\">
        <table class=\"table table-striped\">
            <tbody>
            <tr>
                <th scope=\"row\"><a href=\"/User/ListAll\">[{{ userList|length }}] Utilisateurs</a></th>
            </tr>
            {% for user in userList %}
                <tr>
                    <th scope=\"row\"><a href=\"/User/Show/{{ user.id }}\">#{{ user.id }}</a></th>
                    <td>{{ user.nom }} </td>
                    <td>{{ user.prenom }}</td>


                </tr>
            {% endfor %}

            </tbody>
        </table>
    </div>


{% endblock %}", "Database/dispall.html.twig", "C:\\Users\\langl\\Desktop\\Cours\\Projets\\eDating\\Code\\Site\\templates\\Database\\dispall.html.twig");
    }
}
