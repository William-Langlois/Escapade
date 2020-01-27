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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Inscription</h1>
    </div>

<html>
<head>
    <meta charset=\"utf-8\">
    <title>Inscription</title>
    <link rel=\"stylesheet\" href=\"inscription.css\" media=\"screen\" type=\"text/css\" />
</head>
<body>

<div id=\"container\">
    <?php
\t\t\t\tif(isset(\$errMsg)){
\t\t\t\t\techo '<div style=\"color:#FF0000;text-align:center;font-size:17px;\">'.\$errMsg.'</div>';
}
?>

<form action=\"inscription.php\" method=\"POST\">

    <h1>Inscription</h1>

    <label><b>Nom<b></label>
    <input type=\"text\" placeholder=\"Entre votre nom\" name=\"nom\" value=\"<?php if(isset(\$_POST['nom'])) echo \$_POST['nom'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Prenom<b></label>
    <input type=\"text\" placeholder=\"Entrer votre prenom\" name=\"prenom\" value=\"<?php if(isset(\$_POST['prenom'])) echo \$_POST['prenom'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Ville<b></label>
    <input type=\"text\" placeholder=\"Entrer votre ville de résidence\" name=\"ville\" value=\"<?php if(isset(\$_POST['ville'])) echo \$_POST['ville'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Email<b></label>
    <input type=\"email\" placeholder=\"Entrer l'adresse email\" name=\"email\" required value=\"<?php if(isset(\$_POST['email'])) echo \$_POST['email'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Mot de passe</b></label>
    <input type=\"password\" placeholder=\"Entrer le mot de passe\" name=\"password\" required>

    <label><b>Confirmer Mot de passe</b></label>
    <input type=\"password\" placeholder=\"Confirmer le mot de passe\" name=\"password1\" required>

    <input type=\"submit\" id='submit' name='reg_user' value=\"S'inscrire\" >
    <p>Déja membre ? <a href=\"connexion.php\">Se connecter</a></p>

</form>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "User/inscription.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("    <div class=\"jumbotron\">
        <h1 class=\"display-4\">Inscription</h1>
    </div>

<html>
<head>
    <meta charset=\"utf-8\">
    <title>Inscription</title>
    <link rel=\"stylesheet\" href=\"inscription.css\" media=\"screen\" type=\"text/css\" />
</head>
<body>

<div id=\"container\">
    <?php
\t\t\t\tif(isset(\$errMsg)){
\t\t\t\t\techo '<div style=\"color:#FF0000;text-align:center;font-size:17px;\">'.\$errMsg.'</div>';
}
?>

<form action=\"inscription.php\" method=\"POST\">

    <h1>Inscription</h1>

    <label><b>Nom<b></label>
    <input type=\"text\" placeholder=\"Entre votre nom\" name=\"nom\" value=\"<?php if(isset(\$_POST['nom'])) echo \$_POST['nom'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Prenom<b></label>
    <input type=\"text\" placeholder=\"Entrer votre prenom\" name=\"prenom\" value=\"<?php if(isset(\$_POST['prenom'])) echo \$_POST['prenom'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Ville<b></label>
    <input type=\"text\" placeholder=\"Entrer votre ville de résidence\" name=\"ville\" value=\"<?php if(isset(\$_POST['ville'])) echo \$_POST['ville'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Email<b></label>
    <input type=\"email\" placeholder=\"Entrer l'adresse email\" name=\"email\" required value=\"<?php if(isset(\$_POST['email'])) echo \$_POST['email'] ?>\" autocomplete=\"off\" class=\"box\">

    <label><b>Mot de passe</b></label>
    <input type=\"password\" placeholder=\"Entrer le mot de passe\" name=\"password\" required>

    <label><b>Confirmer Mot de passe</b></label>
    <input type=\"password\" placeholder=\"Confirmer le mot de passe\" name=\"password1\" required>

    <input type=\"submit\" id='submit' name='reg_user' value=\"S'inscrire\" >
    <p>Déja membre ? <a href=\"connexion.php\">Se connecter</a></p>

</form>
</div>
</body>
</html>", "User/inscription.html.twig", "C:\\Users\\langl\\Desktop\\Cours\\Projets\\eDating\\Code\\Site\\templates\\User\\inscription.html.twig");
    }
}
