<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @Twig/Exception/error500.html.twig */
class __TwigTemplate_57e03307794e80bf2501f38f256d1b00 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Twig/Exception/error500.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Twig/Exception/error500.html.twig"));

        // line 1
        yield "<!doctype html>
<html lang=\"fr\">
<head>
    <title>Erreur serveur - UniBank+</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap\" rel=\"stylesheet\">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #F5F7FA; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .error-container { text-align: center; max-width: 500px; padding: 40px 30px; }
        .error-icon { width: 120px; height: 120px; border-radius: 50%; background: #FFF5E6; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 30px; }
        .error-icon svg { width: 60px; height: 60px; color: #fc7900; }
        .error-code { font-size: 72px; font-weight: 800; color: #343c6a; line-height: 1; margin-bottom: 10px; }
        .error-title { font-size: 24px; font-weight: 700; color: #343c6a; margin-bottom: 12px; }
        .error-message { font-size: 15px; color: #718EBF; line-height: 1.6; margin-bottom: 30px; }
        .error-btn { display: inline-block; padding: 14px 32px; border-radius: 12px; font-size: 15px; font-weight: 600; text-decoration: none; transition: all 0.2s; }
        .error-btn.primary { background: #1814F3; color: #fff; }
        .error-btn.primary:hover { background: #4C49ED; }
        .error-btn.outline { background: transparent; border: 1px solid #E6EFF5; color: #343c6a; margin-left: 10px; }
        .error-btn.outline:hover { background: #E6EFF5; }
        .error-logo { margin-bottom: 20px; }
        .error-logo img { height: 60px; }
    </style>
</head>
<body>
    <div class=\"error-container\">
        <div class=\"error-logo\"><img src=\"/images/unibank-plus.png\" alt=\"UniBank+\"></div>
        <div class=\"error-icon\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\">
                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z\"/>
            </svg>
        </div>
        <div class=\"error-code\">500</div>
        <div class=\"error-title\">Erreur interne du serveur</div>
        <div class=\"error-message\">Une erreur inattendue s'est produite. Notre equipe technique a ete notifiee. Veuillez reessayer dans quelques instants.</div>
        <div>
            <a href=\"/\" class=\"error-btn primary\">Retour a l'accueil</a>
            <a href=\"javascript:location.reload()\" class=\"error-btn outline\">Reessayer</a>
        </div>
    </div>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@Twig/Exception/error500.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
<head>
    <title>Erreur serveur - UniBank+</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap\" rel=\"stylesheet\">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #F5F7FA; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .error-container { text-align: center; max-width: 500px; padding: 40px 30px; }
        .error-icon { width: 120px; height: 120px; border-radius: 50%; background: #FFF5E6; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 30px; }
        .error-icon svg { width: 60px; height: 60px; color: #fc7900; }
        .error-code { font-size: 72px; font-weight: 800; color: #343c6a; line-height: 1; margin-bottom: 10px; }
        .error-title { font-size: 24px; font-weight: 700; color: #343c6a; margin-bottom: 12px; }
        .error-message { font-size: 15px; color: #718EBF; line-height: 1.6; margin-bottom: 30px; }
        .error-btn { display: inline-block; padding: 14px 32px; border-radius: 12px; font-size: 15px; font-weight: 600; text-decoration: none; transition: all 0.2s; }
        .error-btn.primary { background: #1814F3; color: #fff; }
        .error-btn.primary:hover { background: #4C49ED; }
        .error-btn.outline { background: transparent; border: 1px solid #E6EFF5; color: #343c6a; margin-left: 10px; }
        .error-btn.outline:hover { background: #E6EFF5; }
        .error-logo { margin-bottom: 20px; }
        .error-logo img { height: 60px; }
    </style>
</head>
<body>
    <div class=\"error-container\">
        <div class=\"error-logo\"><img src=\"/images/unibank-plus.png\" alt=\"UniBank+\"></div>
        <div class=\"error-icon\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\" stroke-width=\"2\">
                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z\"/>
            </svg>
        </div>
        <div class=\"error-code\">500</div>
        <div class=\"error-title\">Erreur interne du serveur</div>
        <div class=\"error-message\">Une erreur inattendue s'est produite. Notre equipe technique a ete notifiee. Veuillez reessayer dans quelques instants.</div>
        <div>
            <a href=\"/\" class=\"error-btn primary\">Retour a l'accueil</a>
            <a href=\"javascript:location.reload()\" class=\"error-btn outline\">Reessayer</a>
        </div>
    </div>
</body>
</html>
", "@Twig/Exception/error500.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/bundles/TwigBundle/Exception/error500.html.twig");
    }
}
