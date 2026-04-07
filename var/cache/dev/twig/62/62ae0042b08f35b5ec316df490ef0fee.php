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

/* client/waiting.html.twig */
class __TwigTemplate_7394cc78d45c3e2fdedceac977a002f2 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/waiting.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/waiting.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "En attente d'approbation - UniBank+";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"site-section bg-light\" style=\"min-height:80vh;display:flex;align-items:center;\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-6 col-lg-5\">
                <div class=\"bg-white p-5 rounded shadow text-center\">
                    <div class=\"text-center mb-3\">
                        <img src=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/unibank-plus.png"), "html", null, true);
        yield "\" alt=\"UniBank+\" style=\"height:80px;\">
                    </div>

                    <div style=\"width:80px;height:80px;border-radius:50%;background:#FFF5E6;display:flex;align-items:center;justify-content:center;margin:20px auto;font-size:36px;\">
                        <i class=\"fas fa-hourglass-half\" style=\"color:#f59e0b;\"></i>
                    </div>

                    <h2 class=\"h4 text-black mb-3\">Demande en cours de traitement</h2>
                    <p class=\"text-muted mb-4\">Votre demande d'ouverture de compte est en attente d'approbation par notre equipe.</p>

                    ";
        // line 22
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "user", [], "any", false, false, false, 22), "selectedOffer", [], "any", false, false, false, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "                    <div style=\"background:#F5F7FA;border-radius:10px;padding:15px;margin-bottom:20px;\">
                        <small class=\"text-muted d-block mb-1\">Offre selectionnee</small>
                        <span style=\"font-weight:600;color:#2259d6;font-size:16px;\">
                            ";
            // line 26
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "user", [], "any", false, false, false, 26), "selectedOffer", [], "any", false, false, false, 26) == "EPARGNE")) {
                // line 27
                yield "                                <i class=\"fas fa-piggy-bank mr-1\"></i>Compte Epargne
                            ";
            } else {
                // line 29
                yield "                                <i class=\"fas fa-wallet mr-1\"></i>Compte Courant
                            ";
            }
            // line 31
            yield "                        </span>
                    </div>
                    ";
        }
        // line 34
        yield "
                    <form method=\"post\" action=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_waiting_check");
        yield "\">
                        <button type=\"submit\" class=\"btn btn-primary btn-block py-2\" style=\"border-radius:10px;\">
                            <i class=\"fas fa-sync-alt mr-1\"></i>Verifier mon statut
                        </button>
                    </form>

                    <div class=\"mt-4\">
                        <a href=\"";
        // line 42
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"text-muted\"><i class=\"fas fa-sign-out-alt mr-1\"></i>Deconnexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/waiting.html.twig";
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
        return array (  156 => 42,  146 => 35,  143 => 34,  138 => 31,  134 => 29,  130 => 27,  128 => 26,  123 => 23,  121 => 22,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}En attente d'approbation - UniBank+{% endblock %}

{% block body %}
<div class=\"site-section bg-light\" style=\"min-height:80vh;display:flex;align-items:center;\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-6 col-lg-5\">
                <div class=\"bg-white p-5 rounded shadow text-center\">
                    <div class=\"text-center mb-3\">
                        <img src=\"{{ asset('images/unibank-plus.png') }}\" alt=\"UniBank+\" style=\"height:80px;\">
                    </div>

                    <div style=\"width:80px;height:80px;border-radius:50%;background:#FFF5E6;display:flex;align-items:center;justify-content:center;margin:20px auto;font-size:36px;\">
                        <i class=\"fas fa-hourglass-half\" style=\"color:#f59e0b;\"></i>
                    </div>

                    <h2 class=\"h4 text-black mb-3\">Demande en cours de traitement</h2>
                    <p class=\"text-muted mb-4\">Votre demande d'ouverture de compte est en attente d'approbation par notre equipe.</p>

                    {% if app.user.selectedOffer %}
                    <div style=\"background:#F5F7FA;border-radius:10px;padding:15px;margin-bottom:20px;\">
                        <small class=\"text-muted d-block mb-1\">Offre selectionnee</small>
                        <span style=\"font-weight:600;color:#2259d6;font-size:16px;\">
                            {% if app.user.selectedOffer == 'EPARGNE' %}
                                <i class=\"fas fa-piggy-bank mr-1\"></i>Compte Epargne
                            {% else %}
                                <i class=\"fas fa-wallet mr-1\"></i>Compte Courant
                            {% endif %}
                        </span>
                    </div>
                    {% endif %}

                    <form method=\"post\" action=\"{{ path('app_waiting_check') }}\">
                        <button type=\"submit\" class=\"btn btn-primary btn-block py-2\" style=\"border-radius:10px;\">
                            <i class=\"fas fa-sync-alt mr-1\"></i>Verifier mon statut
                        </button>
                    </form>

                    <div class=\"mt-4\">
                        <a href=\"{{ path('app_logout') }}\" class=\"text-muted\"><i class=\"fas fa-sign-out-alt mr-1\"></i>Deconnexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "client/waiting.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/client/waiting.html.twig");
    }
}
