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

/* error/403.html.twig */
class __TwigTemplate_f1ce3c66a4c9940243becb5fde1b4c49 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "error/403.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "error/403.html.twig"));

        // line 1
        yield from $this->load("error/_showcase.html.twig", 1)->unwrap()->yield(CoreExtension::merge($context, ["page_title" => "Acces refuse - UniBank+", "eyebrow" => "Zone protegee", "code" => "403", "title" => "Vous n'avez pas acces a cette page", "message" => "Cette section est reservee a un autre type de compte ou demande une autorisation supplementaire. Si cela vous semble anormal, contactez l'administrateur.", "accent" => "#ff9a8c", "accent_strong" => "#ff5c8a", "accent_soft" => "rgba(255, 92, 138, 0.15)", "bg_one" => "#190b14", "bg_two" => "#321226", "bg_three" => "#5b1937", "tips" => [["title" => "Verifier votre role", "text" => "Assurez-vous d'etre connecte avec le bon compte avant de reessayer."], ["title" => "Retour securise", "text" => "Vous pouvez revenir a la page precedente sans perdre votre session actuelle."], ["title" => "Besoin d'aide", "text" => "Si vous deviez voir cette page, le support pourra verifier vos permissions."]]]));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "error/403.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
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
        return new Source("{% include 'error/_showcase.html.twig' with {
    page_title: 'Acces refuse - UniBank+',
    eyebrow: 'Zone protegee',
    code: '403',
    title: \"Vous n'avez pas acces a cette page\",
    message: \"Cette section est reservee a un autre type de compte ou demande une autorisation supplementaire. Si cela vous semble anormal, contactez l'administrateur.\",
    accent: '#ff9a8c',
    accent_strong: '#ff5c8a',
    accent_soft: 'rgba(255, 92, 138, 0.15)',
    bg_one: '#190b14',
    bg_two: '#321226',
    bg_three: '#5b1937',
    tips: [
        { title: \"Verifier votre role\", text: \"Assurez-vous d'etre connecte avec le bon compte avant de reessayer.\" },
        { title: \"Retour securise\", text: \"Vous pouvez revenir a la page precedente sans perdre votre session actuelle.\" },
        { title: \"Besoin d'aide\", text: \"Si vous deviez voir cette page, le support pourra verifier vos permissions.\" }
    ]
} %}
", "error/403.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\error\\403.html.twig");
    }
}
