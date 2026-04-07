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

/* client/dashboard.html.twig */
class __TwigTemplate_1472ef75b47b9251e8e3d29a0a7f360f extends Template
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
            'page_title' => [$this, 'block_page_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "client/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/dashboard.html.twig"));

        $this->parent = $this->load("client/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        yield "Tableau de bord - UniBank+";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Accueil";
        
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
        yield "<div style=\"margin-bottom:25px;\">
    <h4 style=\"font-weight:700;color:var(--primary-dark);margin:0;\">Bonjour, ";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "user", [], "any", false, false, false, 7), "prenom", [], "any", false, false, false, 7), "html", null, true);
        yield " !</h4>
    <p style=\"color:var(--text-secondary);margin:0;\">Bienvenue sur votre espace client UniBank+</p>
</div>

<div class=\"row mb-4\" style=\"display:flex;gap:20px;flex-wrap:wrap;\">
    ";
        // line 12
        if ((($tmp = (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 12, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 13
            yield "    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon blue\"><i class=\"fas fa-wallet\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Solde</div>
                <div class=\"stat-value\">";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 18, $this->source); })()), "solde", [], "any", false, false, false, 18), 2, ",", " "), "html", null, true);
            yield " DT</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon green\"><i class=\"fas fa-university\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Type de compte</div>
                <div class=\"stat-value\">";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 27, $this->source); })()), "typeCompte", [], "any", false, false, false, 27), "value", [], "any", false, false, false, 27), "html", null, true);
            yield "</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon orange\"><i class=\"fas fa-hashtag\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">N° Compte</div>
                <div class=\"stat-value\" style=\"font-size:16px;\">";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 36, $this->source); })()), "numeroCompte", [], "any", false, false, false, 36), "html", null, true);
            yield "</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon red\"><i class=\"fas fa-calendar-alt\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Ouvert le</div>
                <div class=\"stat-value\" style=\"font-size:16px;\">";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 45, $this->source); })()), "dateCreation", [], "any", false, false, false, 45), "d/m/Y"), "html", null, true);
            yield "</div>
            </div>
        </div>
    </div>
    ";
        } else {
            // line 50
            yield "    <div class=\"col-12\">
        <div class=\"admin-card\">
            <div class=\"card-body\" style=\"padding:40px;\">
                <div class=\"empty-state\">
                    <i class=\"fas fa-exclamation-triangle\" style=\"color:var(--warning);\"></i>
                    <p>Aucun compte bancaire trouve. Contactez le support.</p>
                </div>
            </div>
        </div>
    </div>
    ";
        }
        // line 61
        yield "</div>

<div class=\"row\" style=\"display:flex;gap:20px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_compte");
        yield "\" class=\"admin-card d-block text-decoration-none\" style=\"padding:30px;text-align:center;\">
            <img src=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/001-wallet.svg"), "html", null, true);
        yield "\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Mon Compte</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Details de votre compte bancaire</p>
        </a>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <a href=\"";
        // line 72
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_profile");
        yield "\" class=\"admin-card d-block text-decoration-none\" style=\"padding:30px;text-align:center;\">
            <img src=\"";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/003-notes.svg"), "html", null, true);
        yield "\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Mon Profil</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Modifier vos informations personnelles</p>
        </a>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <div class=\"admin-card\" style=\"padding:30px;text-align:center;opacity:0.5;\">
            <img src=\"";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/006-credit-card.svg"), "html", null, true);
        yield "\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Cartes</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Bientot disponible</p>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <div class=\"admin-card\" style=\"padding:30px;text-align:center;opacity:0.5;\">
            <img src=\"";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/005-megaphone.svg"), "html", null, true);
        yield "\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Reclamations</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Bientot disponible</p>
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
        return "client/dashboard.html.twig";
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
        return array (  244 => 87,  234 => 80,  224 => 73,  220 => 72,  211 => 66,  207 => 65,  201 => 61,  188 => 50,  180 => 45,  168 => 36,  156 => 27,  144 => 18,  137 => 13,  135 => 12,  127 => 7,  124 => 6,  111 => 5,  88 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'client/base.html.twig' %}
{% block title %}Tableau de bord - UniBank+{% endblock %}
{% block page_title %}Accueil{% endblock %}

{% block body %}
<div style=\"margin-bottom:25px;\">
    <h4 style=\"font-weight:700;color:var(--primary-dark);margin:0;\">Bonjour, {{ app.user.prenom }} !</h4>
    <p style=\"color:var(--text-secondary);margin:0;\">Bienvenue sur votre espace client UniBank+</p>
</div>

<div class=\"row mb-4\" style=\"display:flex;gap:20px;flex-wrap:wrap;\">
    {% if compte %}
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon blue\"><i class=\"fas fa-wallet\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Solde</div>
                <div class=\"stat-value\">{{ compte.solde|number_format(2, ',', ' ') }} DT</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon green\"><i class=\"fas fa-university\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Type de compte</div>
                <div class=\"stat-value\">{{ compte.typeCompte.value }}</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon orange\"><i class=\"fas fa-hashtag\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">N° Compte</div>
                <div class=\"stat-value\" style=\"font-size:16px;\">{{ compte.numeroCompte }}</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon red\"><i class=\"fas fa-calendar-alt\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Ouvert le</div>
                <div class=\"stat-value\" style=\"font-size:16px;\">{{ compte.dateCreation|date('d/m/Y') }}</div>
            </div>
        </div>
    </div>
    {% else %}
    <div class=\"col-12\">
        <div class=\"admin-card\">
            <div class=\"card-body\" style=\"padding:40px;\">
                <div class=\"empty-state\">
                    <i class=\"fas fa-exclamation-triangle\" style=\"color:var(--warning);\"></i>
                    <p>Aucun compte bancaire trouve. Contactez le support.</p>
                </div>
            </div>
        </div>
    </div>
    {% endif %}
</div>

<div class=\"row\" style=\"display:flex;gap:20px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <a href=\"{{ path('app_client_compte') }}\" class=\"admin-card d-block text-decoration-none\" style=\"padding:30px;text-align:center;\">
            <img src=\"{{ asset('images/flaticon-svg/svg/001-wallet.svg') }}\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Mon Compte</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Details de votre compte bancaire</p>
        </a>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <a href=\"{{ path('app_client_profile') }}\" class=\"admin-card d-block text-decoration-none\" style=\"padding:30px;text-align:center;\">
            <img src=\"{{ asset('images/flaticon-svg/svg/003-notes.svg') }}\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Mon Profil</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Modifier vos informations personnelles</p>
        </a>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <div class=\"admin-card\" style=\"padding:30px;text-align:center;opacity:0.5;\">
            <img src=\"{{ asset('images/flaticon-svg/svg/006-credit-card.svg') }}\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Cartes</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Bientot disponible</p>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:250px;\">
        <div class=\"admin-card\" style=\"padding:30px;text-align:center;opacity:0.5;\">
            <img src=\"{{ asset('images/flaticon-svg/svg/005-megaphone.svg') }}\" style=\"width:50px;margin-bottom:15px;\">
            <h6 style=\"color:var(--primary-dark);font-weight:600;\">Reclamations</h6>
            <p style=\"color:var(--text-secondary);font-size:13px;margin:0;\">Bientot disponible</p>
        </div>
    </div>
</div>
{% endblock %}
", "client/dashboard.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\client\\dashboard.html.twig");
    }
}
