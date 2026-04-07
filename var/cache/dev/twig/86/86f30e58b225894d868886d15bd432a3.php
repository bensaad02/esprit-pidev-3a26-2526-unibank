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

/* error/404.html.twig */
class __TwigTemplate_1a46affc084cde2548f87813d5836640 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "error/404.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "error/404.html.twig"));

        // line 1
        yield from $this->load("error/_showcase.html.twig", 1)->unwrap()->yield(CoreExtension::merge($context, ["page_title" => "Page introuvable - UniBank+", "eyebrow" => "Navigation interrompue", "code" => "404", "title" => "La route demandee est introuvable", "message" => "La page que vous cherchez n'existe plus, a change d'adresse ou l'URL contient une erreur. Nous vous aidons a repartir dans la bonne direction.", "accent" => "#79f0ff", "accent_strong" => "#5b7cff", "accent_soft" => "rgba(121, 240, 255, 0.16)", "bg_one" => "#07111f", "bg_two" => "#102b4a", "bg_three" => "#1c3f73", "tips" => [["title" => "Verifier le lien", "text" => "Controlez l'URL, surtout les tirets, slashs et fautes de frappe."], ["title" => "Revenir a l'accueil", "text" => "Repartez depuis la page principale pour retrouver rapidement la bonne section."], ["title" => "Reprendre la navigation", "text" => "Le bouton precedent vous renvoie a votre derniere page utile."]]]));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "error/404.html.twig";
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
    page_title: 'Page introuvable - UniBank+',
    eyebrow: 'Navigation interrompue',
    code: '404',
    title: 'La route demandee est introuvable',
    message: \"La page que vous cherchez n'existe plus, a change d'adresse ou l'URL contient une erreur. Nous vous aidons a repartir dans la bonne direction.\",
    accent: '#79f0ff',
    accent_strong: '#5b7cff',
    accent_soft: 'rgba(121, 240, 255, 0.16)',
    bg_one: '#07111f',
    bg_two: '#102b4a',
    bg_three: '#1c3f73',
    tips: [
        { title: \"Verifier le lien\", text: \"Controlez l'URL, surtout les tirets, slashs et fautes de frappe.\" },
        { title: \"Revenir a l'accueil\", text: \"Repartez depuis la page principale pour retrouver rapidement la bonne section.\" },
        { title: \"Reprendre la navigation\", text: \"Le bouton precedent vous renvoie a votre derniere page utile.\" }
    ]
} %}
", "error/404.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\error\\404.html.twig");
    }
}
