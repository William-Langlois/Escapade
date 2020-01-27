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

/* User/Show.html.twig */
class __TwigTemplate_902c6205a01329e4c7f10722a497c62a80ae4fb7b57f4639cf29ea0199f80ab9 extends Template
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
        $this->parent = $this->loadTemplate("BasicLayout.html.twig", "User/Show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " utilisateur : ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, false, 2), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Utilisateur : ";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_ID", [], "any", false, false, false, 7), "html", null, true);
        echo " => ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_NOM", [], "any", false, false, false, 7), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_PRENOM", [], "any", false, false, false, 7), "html", null, true);
        echo " </h1>
    </div>
    <div class=\"container\">
        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th scope=\"col\">Type D'information</th>
                <th scope=\"col\">Valeur</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_ID", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_NOM", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Prenom</th>
                    <td>";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_PRENOM", [], "any", false, false, false, 28), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_DESCRIPTION", [], "any", false, false, false, 32), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_EMAIL", [], "any", false, false, false, 36), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Date de naissance</th>
                    <td>";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_BIRTHDATE", [], "any", false, false, false, 40), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Latitude,Longitude</th>
                    <td>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_POS_X", [], "any", false, false, false, 44), "html", null, true);
        echo " , ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_POS_Y", [], "any", false, false, false, 44), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Pays</th>
                    <td>";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_PAYS", [], "any", false, false, false, 48), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Ville</th>
                    <td>";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_VILLE", [], "any", false, false, false, 52), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Date d'incription</th>
                    <td>";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_DATE_INSCRIPTION", [], "any", false, false, false, 56), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Derniere connection</th>
                    <td>";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_LAST_CONNECTION", [], "any", false, false, false, 60), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Sexe</th>
                    <td>";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_SEXE", [], "any", false, false, false, 64), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_PHOTO", [], "any", false, false, false, 68), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Rencontre dans sa région activée</th>
                    <td>";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_WANNADATEATHOME", [], "any", false, false, false, 72), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Administrateur</th>
                    <td>";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_ISADMIN", [], "any", false, false, false, 76), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Reception d'email active</th>
                    <td>";
        // line 80
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_ACCEPT_EMAIL", [], "any", false, false, false, 80), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Reception de message privés active</th>
                    <td>";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_ACCEPT_MESSAGE", [], "any", false, false, false, 84), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Notification activées</th>
                    <td>";
        // line 88
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_ACTIVE_NOTIF", [], "any", false, false, false, 88), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Premium</th>
                    <td>";
        // line 92
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_ISPREMIUM", [], "any", false, false, false, 92), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <th>Galerie Publique</th>
                    <td>";
        // line 96
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["infoUser"] ?? null), "USER_GALERIEISPUBLIC", [], "any", false, false, false, 96), "html", null, true);
        echo "</td>
                </tr>
            </tbody>
        </table>
    </div>


";
    }

    public function getTemplateName()
    {
        return "User/Show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 96,  213 => 92,  206 => 88,  199 => 84,  192 => 80,  185 => 76,  178 => 72,  171 => 68,  164 => 64,  157 => 60,  150 => 56,  143 => 52,  136 => 48,  127 => 44,  120 => 40,  113 => 36,  106 => 32,  99 => 28,  92 => 24,  85 => 20,  65 => 7,  61 => 5,  57 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"BasicLayout.html.twig\" %}
{% block title %} utilisateur : {{ user.id }} - {{ parent() }}{% endblock %}

{% block body %}

    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Utilisateur : {{ infoUser.USER_ID }} => {{ infoUser.USER_NOM }} {{ infoUser.USER_PRENOM }} </h1>
    </div>
    <div class=\"container\">
        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th scope=\"col\">Type D'information</th>
                <th scope=\"col\">Valeur</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ infoUser.USER_ID }}</td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td>{{ infoUser.USER_NOM }}</td>
                </tr>
                <tr>
                    <th>Prenom</th>
                    <td>{{ infoUser.USER_PRENOM }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ infoUser.USER_DESCRIPTION }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ infoUser.USER_EMAIL }}</td>
                </tr>
                <tr>
                    <th>Date de naissance</th>
                    <td>{{ infoUser.USER_BIRTHDATE }}</td>
                </tr>
                <tr>
                    <th>Latitude,Longitude</th>
                    <td>{{ infoUser.USER_POS_X }} , {{ infoUser.USER_POS_Y }}</td>
                </tr>
                <tr>
                    <th>Pays</th>
                    <td>{{ infoUser.USER_PAYS }}</td>
                </tr>
                <tr>
                    <th>Ville</th>
                    <td>{{ infoUser.USER_VILLE }}</td>
                </tr>
                <tr>
                    <th>Date d'incription</th>
                    <td>{{ infoUser.USER_DATE_INSCRIPTION }}</td>
                </tr>
                <tr>
                    <th>Derniere connection</th>
                    <td>{{ infoUser.USER_LAST_CONNECTION }}</td>
                </tr>
                <tr>
                    <th>Sexe</th>
                    <td>{{ infoUser.USER_SEXE }}</td>
                </tr>
                <tr>
                    <th>Photo</th>
                    <td>{{ infoUser.USER_PHOTO }}</td>
                </tr>
                <tr>
                    <th>Rencontre dans sa région activée</th>
                    <td>{{ infoUser.USER_WANNADATEATHOME }}</td>
                </tr>
                <tr>
                    <th>Administrateur</th>
                    <td>{{ infoUser.USER_ISADMIN }}</td>
                </tr>
                <tr>
                    <th>Reception d'email active</th>
                    <td>{{ infoUser.USER_ACCEPT_EMAIL }}</td>
                </tr>
                <tr>
                    <th>Reception de message privés active</th>
                    <td>{{ infoUser.USER_ACCEPT_MESSAGE }}</td>
                </tr>
                <tr>
                    <th>Notification activées</th>
                    <td>{{ infoUser.USER_ACTIVE_NOTIF }}</td>
                </tr>
                <tr>
                    <th>Premium</th>
                    <td>{{ infoUser.USER_ISPREMIUM }}</td>
                </tr>
                <tr>
                    <th>Galerie Publique</th>
                    <td>{{ infoUser.USER_GALERIEISPUBLIC }}</td>
                </tr>
            </tbody>
        </table>
    </div>


{% endblock %}", "User/Show.html.twig", "C:\\Users\\langl\\Desktop\\Cours\\Projets\\eDating\\Code\\Site\\templates\\User\\show.html.twig");
    }
}
