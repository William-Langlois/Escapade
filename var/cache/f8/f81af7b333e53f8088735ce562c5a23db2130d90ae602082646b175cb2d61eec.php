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

/* User/list.html.twig */
class __TwigTemplate_c3103617187f52e8a5b7c0910e43ad06daa8edfbf0fe8ca1d0a796a1fc09fe54 extends Template
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
        $this->parent = $this->loadTemplate("BasicLayout.html.twig", "User/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " Liste des utilisateurs - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Liste des utilisateurs</h1>
    </div>
    <div class=\"container\">
    <table class=\"table table-striped\">
        <thead>
        <tr>
            <th scope=\"col\">ID</th>
            <th scope=\"col\">Nom</th>
            <th scope=\"col\">Prenom</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["userList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 20
            echo "            <tr>
                <th scope=\"row\"><a href=\"/User/Show/";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 21), "html", null, true);
            echo "\">#";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 21), "html", null, true);
            echo "</a></th>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 22), "html", null, true);
            echo " </td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>


            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "
        </tbody>
    </table>
    </div>


";
    }

    public function getTemplateName()
    {
        return "User/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 28,  92 => 23,  88 => 22,  82 => 21,  79 => 20,  75 => 19,  59 => 5,  55 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"BasicLayout.html.twig\" %}
{% block title %} Liste des utilisateurs - {{ parent() }}{% endblock %}

{% block body %}

    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Liste des utilisateurs</h1>
    </div>
    <div class=\"container\">
    <table class=\"table table-striped\">
        <thead>
        <tr>
            <th scope=\"col\">ID</th>
            <th scope=\"col\">Nom</th>
            <th scope=\"col\">Prenom</th>
        </tr>
        </thead>
        <tbody>
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


{% endblock %}", "User/list.html.twig", "C:\\Users\\langl\\Desktop\\Cours\\Projets\\eDating\\Code\\Site\\templates\\User\\list.html.twig");
    }
}
