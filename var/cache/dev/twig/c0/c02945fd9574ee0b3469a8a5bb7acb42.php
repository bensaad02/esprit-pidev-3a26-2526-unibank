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

/* client/offers.html.twig */
class __TwigTemplate_8194bdfe5429f586fa981d86788d4434 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/offers.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/offers.html.twig"));

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

        yield "Choisir votre offre - UniBank+";
        
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
        <div class=\"text-center mb-5\">
            <div class=\"text-center mb-3\">
                <img src=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/unibank-plus.png"), "html", null, true);
        yield "\" alt=\"UniBank+\" style=\"height:80px;\">
            </div>
            <h2 class=\"h3 text-black\">Choisissez votre type de compte</h2>
            <p class=\"text-muted\">Selectionnez l'offre qui correspond le mieux a vos besoins</p>
        </div>

        <div class=\"row justify-content-center\">
            <div class=\"col-md-5 mb-4\">
                <div class=\"bg-white p-5 rounded shadow text-center\" style=\"border-top:4px solid #2259d6;\">
                    <div style=\"width:70px;height:70px;border-radius:50%;background:#E7EDFF;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;\">
                        <img src=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/001-wallet.svg"), "html", null, true);
        yield "\" style=\"width:35px;\">
                    </div>
                    <h3 class=\"h4 text-black mb-3\">Compte Courant</h3>
                    <ul class=\"list-unstyled text-left mb-4\" style=\"max-width:250px;margin:0 auto;\">
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Carte bancaire gratuite</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Virements illimites</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Decouvert autorise</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Gestion en ligne 24h/24</li>
                    </ul>
                    <form method=\"post\" action=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offers_select");
        yield "\">
                        <input type=\"hidden\" name=\"offer\" value=\"COURANT\">
                        <button type=\"submit\" class=\"btn btn-primary btn-block py-2\" style=\"border-radius:10px;\">Choisir Courant</button>
                    </form>
                </div>
            </div>

            <div class=\"col-md-5 mb-4\">
                <div class=\"bg-white p-5 rounded shadow text-center\" style=\"border-top:4px solid #10b981;\">
                    <div style=\"width:70px;height:70px;border-radius:50%;background:#E0F8EF;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;\">
                        <img src=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/007-piggy-bank.svg"), "html", null, true);
        yield "\" style=\"width:35px;\">
                    </div>
                    <h3 class=\"h4 text-black mb-3\">Compte Epargne</h3>
                    <ul class=\"list-unstyled text-left mb-4\" style=\"max-width:250px;margin:0 auto;\">
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Taux d'interet 4.5%/an</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Capital garanti</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Retraits flexibles</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Gestion en ligne 24h/24</li>
                    </ul>
                    <form method=\"post\" action=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offers_select");
        yield "\">
                        <input type=\"hidden\" name=\"offer\" value=\"EPARGNE\">
                        <button type=\"submit\" class=\"btn btn-block py-2\" style=\"border-radius:10px;background:#10b981;color:#fff;border:none;\">Choisir Epargne</button>
                    </form>
                </div>
            </div>
        </div>

        <div class=\"text-center mt-3\">
            <a href=\"";
        // line 57
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"text-muted\"><i class=\"fas fa-sign-out-alt mr-1\"></i>Deconnexion</a>
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
        return "client/offers.html.twig";
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
        return array (  168 => 57,  156 => 48,  144 => 39,  131 => 29,  119 => 20,  106 => 10,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Choisir votre offre - UniBank+{% endblock %}

{% block body %}
<div class=\"site-section bg-light\" style=\"min-height:80vh;display:flex;align-items:center;\">
    <div class=\"container\">
        <div class=\"text-center mb-5\">
            <div class=\"text-center mb-3\">
                <img src=\"{{ asset('images/unibank-plus.png') }}\" alt=\"UniBank+\" style=\"height:80px;\">
            </div>
            <h2 class=\"h3 text-black\">Choisissez votre type de compte</h2>
            <p class=\"text-muted\">Selectionnez l'offre qui correspond le mieux a vos besoins</p>
        </div>

        <div class=\"row justify-content-center\">
            <div class=\"col-md-5 mb-4\">
                <div class=\"bg-white p-5 rounded shadow text-center\" style=\"border-top:4px solid #2259d6;\">
                    <div style=\"width:70px;height:70px;border-radius:50%;background:#E7EDFF;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;\">
                        <img src=\"{{ asset('images/flaticon-svg/svg/001-wallet.svg') }}\" style=\"width:35px;\">
                    </div>
                    <h3 class=\"h4 text-black mb-3\">Compte Courant</h3>
                    <ul class=\"list-unstyled text-left mb-4\" style=\"max-width:250px;margin:0 auto;\">
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Carte bancaire gratuite</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Virements illimites</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Decouvert autorise</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Gestion en ligne 24h/24</li>
                    </ul>
                    <form method=\"post\" action=\"{{ path('app_offers_select') }}\">
                        <input type=\"hidden\" name=\"offer\" value=\"COURANT\">
                        <button type=\"submit\" class=\"btn btn-primary btn-block py-2\" style=\"border-radius:10px;\">Choisir Courant</button>
                    </form>
                </div>
            </div>

            <div class=\"col-md-5 mb-4\">
                <div class=\"bg-white p-5 rounded shadow text-center\" style=\"border-top:4px solid #10b981;\">
                    <div style=\"width:70px;height:70px;border-radius:50%;background:#E0F8EF;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;\">
                        <img src=\"{{ asset('images/flaticon-svg/svg/007-piggy-bank.svg') }}\" style=\"width:35px;\">
                    </div>
                    <h3 class=\"h4 text-black mb-3\">Compte Epargne</h3>
                    <ul class=\"list-unstyled text-left mb-4\" style=\"max-width:250px;margin:0 auto;\">
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Taux d'interet 4.5%/an</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Capital garanti</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Retraits flexibles</li>
                        <li class=\"mb-2\"><i class=\"fas fa-check-circle mr-2\" style=\"color:#10b981;\"></i>Gestion en ligne 24h/24</li>
                    </ul>
                    <form method=\"post\" action=\"{{ path('app_offers_select') }}\">
                        <input type=\"hidden\" name=\"offer\" value=\"EPARGNE\">
                        <button type=\"submit\" class=\"btn btn-block py-2\" style=\"border-radius:10px;background:#10b981;color:#fff;border:none;\">Choisir Epargne</button>
                    </form>
                </div>
            </div>
        </div>

        <div class=\"text-center mt-3\">
            <a href=\"{{ path('app_logout') }}\" class=\"text-muted\"><i class=\"fas fa-sign-out-alt mr-1\"></i>Deconnexion</a>
        </div>
    </div>
</div>
{% endblock %}
", "client/offers.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/client/offers.html.twig");
    }
}
