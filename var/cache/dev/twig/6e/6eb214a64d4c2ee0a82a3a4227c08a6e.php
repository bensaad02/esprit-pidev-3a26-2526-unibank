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

/* admin/dashboard.html.twig */
class __TwigTemplate_84c9543753a0725380663e3055a47223 extends Template
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
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
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

        yield "Tableau de bord - Admin UniBank+";
        
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

        yield "Tableau de bord";
        
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
        yield "<div class=\"row mb-4\" style=\"display:flex;gap:20px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon blue\"><i class=\"fas fa-users\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Total Clients</div>
                <div class=\"stat-value\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalClients"]) || array_key_exists("totalClients", $context) ? $context["totalClients"] : (function () { throw new RuntimeError('Variable "totalClients" does not exist.', 12, $this->source); })()), "html", null, true);
        yield "</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon orange\"><i class=\"fas fa-clock\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">En attente</div>
                <div class=\"stat-value\">";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pendingClients"]) || array_key_exists("pendingClients", $context) ? $context["pendingClients"] : (function () { throw new RuntimeError('Variable "pendingClients" does not exist.', 21, $this->source); })()), "html", null, true);
        yield "</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon green\"><i class=\"fas fa-check-circle\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Approuves</div>
                <div class=\"stat-value\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["approvedClients"]) || array_key_exists("approvedClients", $context) ? $context["approvedClients"] : (function () { throw new RuntimeError('Variable "approvedClients" does not exist.', 30, $this->source); })()), "html", null, true);
        yield "</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon red\"><i class=\"fas fa-times-circle\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Rejetes</div>
                <div class=\"stat-value\">";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["rejectedClients"]) || array_key_exists("rejectedClients", $context) ? $context["rejectedClients"] : (function () { throw new RuntimeError('Variable "rejectedClients" does not exist.', 39, $this->source); })()), "html", null, true);
        yield "</div>
            </div>
        </div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-clock mr-2\" style=\"color:var(--warning);\"></i>Demandes recentes en attente</h5>
        <a href=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_pending");
        yield "\" class=\"btn-admin primary\" style=\"font-size:13px;padding:8px 18px;\">Voir tout</a>
    </div>
    <div class=\"card-body\">
        ";
        // line 51
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recentPending"]) || array_key_exists("recentPending", $context) ? $context["recentPending"] : (function () { throw new RuntimeError('Variable "recentPending" does not exist.', 51, $this->source); })())) > 0)) {
            // line 52
            yield "        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>CIN</th>
                    <th>Offre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["recentPending"]) || array_key_exists("recentPending", $context) ? $context["recentPending"] : (function () { throw new RuntimeError('Variable "recentPending" does not exist.', 63, $this->source); })()), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                // line 64
                yield "                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 67)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 67)), "html", null, true);
                yield "</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">";
                // line 69
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 69), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 69), "html", null, true);
                yield "</div>
                                <div class=\"user-email\">";
                // line 70
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "email", [], "any", false, false, false, 70), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>
                    <td>";
                // line 74
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "cin", [], "any", false, false, false, 74), "html", null, true);
                yield "</td>
                    <td>";
                // line 75
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["client"], "selectedOffer", [], "any", true, true, false, 75) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["client"], "selectedOffer", [], "any", false, false, false, 75)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "selectedOffer", [], "any", false, false, false, 75), "html", null, true)) : ("-"));
                yield "</td>
                    <td>";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "dateCreation", [], "any", false, false, false, 76), "d/m/Y"), "html", null, true);
                yield "</td>
                    <td>
                        <button type=\"button\" class=\"btn-action approve\" title=\"Approuver\" onclick=\"confirmSubmit('";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_approve", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 78)]), "html", null, true);
                yield "', {type:'approve', title:'Approuver le client', message:'Approuver ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 78), "js"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 78), "js"), "html", null, true);
                yield " et creer son compte bancaire ?', btnText:'Approuver'})\">
                            <i class=\"fas fa-check\"></i>
                        </button>
                        <button type=\"button\" class=\"btn-action reject\" title=\"Rejeter\" onclick=\"confirmSubmit('";
                // line 81
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_reject", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 81)]), "html", null, true);
                yield "', {type:'reject', title:'Rejeter la demande', message:'Rejeter la demande de ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 81), "js"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 81), "js"), "html", null, true);
                yield " ?', btnText:'Rejeter'})\">
                            <i class=\"fas fa-times\"></i>
                        </button>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['client'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 90
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucune demande en attente</p>
        </div>
        ";
        }
        // line 95
        yield "    </div>
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
        return "admin/dashboard.html.twig";
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
        return array (  280 => 95,  273 => 90,  268 => 87,  252 => 81,  242 => 78,  237 => 76,  233 => 75,  229 => 74,  222 => 70,  216 => 69,  210 => 67,  205 => 64,  201 => 63,  188 => 52,  186 => 51,  180 => 48,  168 => 39,  156 => 30,  144 => 21,  132 => 12,  124 => 6,  111 => 5,  88 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block title %}Tableau de bord - Admin UniBank+{% endblock %}
{% block page_title %}Tableau de bord{% endblock %}

{% block body %}
<div class=\"row mb-4\" style=\"display:flex;gap:20px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon blue\"><i class=\"fas fa-users\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Total Clients</div>
                <div class=\"stat-value\">{{ totalClients }}</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon orange\"><i class=\"fas fa-clock\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">En attente</div>
                <div class=\"stat-value\">{{ pendingClients }}</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon green\"><i class=\"fas fa-check-circle\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Approuves</div>
                <div class=\"stat-value\">{{ approvedClients }}</div>
            </div>
        </div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:200px;\">
        <div class=\"stat-card\">
            <div class=\"stat-icon red\"><i class=\"fas fa-times-circle\"></i></div>
            <div class=\"stat-info\">
                <div class=\"stat-label\">Rejetes</div>
                <div class=\"stat-value\">{{ rejectedClients }}</div>
            </div>
        </div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-clock mr-2\" style=\"color:var(--warning);\"></i>Demandes recentes en attente</h5>
        <a href=\"{{ path('app_admin_pending') }}\" class=\"btn-admin primary\" style=\"font-size:13px;padding:8px 18px;\">Voir tout</a>
    </div>
    <div class=\"card-body\">
        {% if recentPending|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>CIN</th>
                    <th>Offre</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for client in recentPending|slice(0, 5) %}
                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">{{ client.prenom|first }}{{ client.nom|first }}</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">{{ client.prenom }} {{ client.nom }}</div>
                                <div class=\"user-email\">{{ client.email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ client.cin }}</td>
                    <td>{{ client.selectedOffer ?? '-' }}</td>
                    <td>{{ client.dateCreation|date('d/m/Y') }}</td>
                    <td>
                        <button type=\"button\" class=\"btn-action approve\" title=\"Approuver\" onclick=\"confirmSubmit('{{ path('app_admin_user_approve', {id: client.idUtilisateur}) }}', {type:'approve', title:'Approuver le client', message:'Approuver {{ client.prenom|e('js') }} {{ client.nom|e('js') }} et creer son compte bancaire ?', btnText:'Approuver'})\">
                            <i class=\"fas fa-check\"></i>
                        </button>
                        <button type=\"button\" class=\"btn-action reject\" title=\"Rejeter\" onclick=\"confirmSubmit('{{ path('app_admin_user_reject', {id: client.idUtilisateur}) }}', {type:'reject', title:'Rejeter la demande', message:'Rejeter la demande de {{ client.prenom|e('js') }} {{ client.nom|e('js') }} ?', btnText:'Rejeter'})\">
                            <i class=\"fas fa-times\"></i>
                        </button>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucune demande en attente</p>
        </div>
        {% endif %}
    </div>
</div>
{% endblock %}
", "admin/dashboard.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\admin\\dashboard.html.twig");
    }
}
