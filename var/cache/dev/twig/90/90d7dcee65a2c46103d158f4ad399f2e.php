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

/* admin/contrat/index.html.twig */
class __TwigTemplate_a467fc577a736cc2881e4e39dc39cc6c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/contrat/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/contrat/index.html.twig"));

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

        yield "Gestion Contrats - Admin UniBank+";
        
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

        yield "Gestion Contrats";
        
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
        yield "<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-file-contract\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total contrats</div><div class=\"stat-value\">";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalContrats"]) || array_key_exists("totalContrats", $context) ? $context["totalContrats"] : (function () { throw new RuntimeError('Variable "totalContrats" does not exist.', 8, $this->source); })()), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-check-circle\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Contrats actifs</div><div class=\"stat-value\">";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["activeContrats"]) || array_key_exists("activeContrats", $context) ? $context["activeContrats"] : (function () { throw new RuntimeError('Variable "activeContrats" does not exist.', 11, $this->source); })()), "html", null, true);
        yield "</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-file-contract mr-2\" style=\"color:var(--primary);\"></i>Contrats (";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["contrats"]) || array_key_exists("contrats", $context) ? $context["contrats"] : (function () { throw new RuntimeError('Variable "contrats" does not exist.', 17, $this->source); })())), "html", null, true);
        yield ")</h5>
        <form method=\"get\" action=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_contrats");
        yield "\" class=\"filter-bar\">
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" ";
        // line 20
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 20, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les statuts</option>
                <option value=\"ACTIVE\" ";
        // line 21
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 21, $this->source); })()) == "ACTIVE")) ? ("selected") : (""));
        yield ">Actif</option>
                <option value=\"COMPLETED\" ";
        // line 22
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 22, $this->source); })()) == "COMPLETED")) ? ("selected") : (""));
        yield ">Termine</option>
                <option value=\"CANCELLED\" ";
        // line 23
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 23, $this->source); })()) == "CANCELLED")) ? ("selected") : (""));
        yield ">Annule</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 25, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher client, N contrat...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:220px;\">
            ";
        // line 26
        if ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 26, $this->source); })()) != "all") || (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 26, $this->source); })()))) {
            // line 27
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_contrats");
            yield "\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            ";
        }
        // line 29
        yield "        </form>
    </div>
    <div class=\"card-body\">
        ";
        // line 32
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["contrats"]) || array_key_exists("contrats", $context) ? $context["contrats"] : (function () { throw new RuntimeError('Variable "contrats" does not exist.', 32, $this->source); })())) > 0)) {
            // line 33
            yield "        <table class=\"admin-table\">
            <thead>
                <tr><th>N Contrat</th><th>Client</th><th>Montant</th><th>Mensualite</th><th>Duree</th><th>Periode</th><th>Statut</th><th></th></tr>
            </thead>
            <tbody>
                ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["contrats"]) || array_key_exists("contrats", $context) ? $context["contrats"] : (function () { throw new RuntimeError('Variable "contrats" does not exist.', 38, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 39
                yield "                <tr>
                    <td style=\"font-weight:700;color:var(--primary);font-family:monospace;\">";
                // line 40
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "numeroContrat", [], "any", false, false, false, 40), "html", null, true);
                yield "</td>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 43), "prenom", [], "any", false, false, false, 43)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 43), "nom", [], "any", false, false, false, 43)), "html", null, true);
                yield "</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 45), "prenom", [], "any", false, false, false, 45), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 45), "nom", [], "any", false, false, false, 45), "html", null, true);
                yield "</div>
                                <div class=\"user-email\">";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 46), "email", [], "any", false, false, false, 46), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"font-weight:700;\">";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montantCredit", [], "any", false, false, false, 50), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td style=\"color:var(--success);font-weight:600;\">";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "mensualite", [], "any", false, false, false, 51), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td>";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dureeEnMois", [], "any", false, false, false, 52), "html", null, true);
                yield " mois</td>
                    <td style=\"font-size:13px;\">";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateDebut", [], "any", false, false, false, 53), "d/m/Y"), "html", null, true);
                yield "<br><small style=\"color:var(--text-secondary);\">au ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateFin", [], "any", false, false, false, 53), "d/m/Y"), "html", null, true);
                yield "</small></td>
                    <td>
                        ";
                // line 55
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 55) == "ACTIVE")) {
                    // line 56
                    yield "                            <span class=\"badge-status active\">Actif</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 57
$context["c"], "statut", [], "any", false, false, false, 57) == "COMPLETED")) {
                    // line 58
                    yield "                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Termine</span>
                        ";
                } else {
                    // line 60
                    yield "                            <span class=\"badge-status suspended\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 60), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 62
                yield "                    </td>
                    <td>
                        <a href=\"";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_contrat_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idContrat", [], "any", false, false, false, 64)]), "html", null, true);
                yield "\" class=\"btn-action\" title=\"Telecharger PDF\" style=\"color:var(--primary);\">
                            <i class=\"fas fa-file-pdf\"></i>
                        </a>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 73
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucun contrat trouve</p>
        </div>
        ";
        }
        // line 78
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
        return "admin/contrat/index.html.twig";
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
        return array (  291 => 78,  284 => 73,  279 => 70,  267 => 64,  263 => 62,  257 => 60,  253 => 58,  251 => 57,  248 => 56,  246 => 55,  239 => 53,  235 => 52,  231 => 51,  227 => 50,  220 => 46,  214 => 45,  208 => 43,  202 => 40,  199 => 39,  195 => 38,  188 => 33,  186 => 32,  181 => 29,  175 => 27,  173 => 26,  169 => 25,  164 => 23,  160 => 22,  156 => 21,  152 => 20,  147 => 18,  143 => 17,  134 => 11,  128 => 8,  124 => 6,  111 => 5,  88 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block title %}Gestion Contrats - Admin UniBank+{% endblock %}
{% block page_title %}Gestion Contrats{% endblock %}

{% block body %}
<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-file-contract\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total contrats</div><div class=\"stat-value\">{{ totalContrats }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-check-circle\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Contrats actifs</div><div class=\"stat-value\">{{ activeContrats }}</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-file-contract mr-2\" style=\"color:var(--primary);\"></i>Contrats ({{ contrats|length }})</h5>
        <form method=\"get\" action=\"{{ path('app_admin_contrats') }}\" class=\"filter-bar\">
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" {{ status == 'all' ? 'selected' : '' }}>Tous les statuts</option>
                <option value=\"ACTIVE\" {{ status == 'ACTIVE' ? 'selected' : '' }}>Actif</option>
                <option value=\"COMPLETED\" {{ status == 'COMPLETED' ? 'selected' : '' }}>Termine</option>
                <option value=\"CANCELLED\" {{ status == 'CANCELLED' ? 'selected' : '' }}>Annule</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher client, N contrat...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:220px;\">
            {% if status != 'all' or search %}
                <a href=\"{{ path('app_admin_contrats') }}\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            {% endif %}
        </form>
    </div>
    <div class=\"card-body\">
        {% if contrats|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr><th>N Contrat</th><th>Client</th><th>Montant</th><th>Mensualite</th><th>Duree</th><th>Periode</th><th>Statut</th><th></th></tr>
            </thead>
            <tbody>
                {% for c in contrats %}
                <tr>
                    <td style=\"font-weight:700;color:var(--primary);font-family:monospace;\">{{ c.numeroContrat }}</td>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">{{ c.client.prenom|first }}{{ c.client.nom|first }}</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">{{ c.client.prenom }} {{ c.client.nom }}</div>
                                <div class=\"user-email\">{{ c.client.email }}</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"font-weight:700;\">{{ c.montantCredit|number_format(2, ',', ' ') }} DT</td>
                    <td style=\"color:var(--success);font-weight:600;\">{{ c.mensualite|number_format(2, ',', ' ') }} DT</td>
                    <td>{{ c.dureeEnMois }} mois</td>
                    <td style=\"font-size:13px;\">{{ c.dateDebut|date('d/m/Y') }}<br><small style=\"color:var(--text-secondary);\">au {{ c.dateFin|date('d/m/Y') }}</small></td>
                    <td>
                        {% if c.statut == 'ACTIVE' %}
                            <span class=\"badge-status active\">Actif</span>
                        {% elseif c.statut == 'COMPLETED' %}
                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Termine</span>
                        {% else %}
                            <span class=\"badge-status suspended\">{{ c.statut }}</span>
                        {% endif %}
                    </td>
                    <td>
                        <a href=\"{{ path('app_admin_contrat_pdf', {id: c.idContrat}) }}\" class=\"btn-action\" title=\"Telecharger PDF\" style=\"color:var(--primary);\">
                            <i class=\"fas fa-file-pdf\"></i>
                        </a>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucun contrat trouve</p>
        </div>
        {% endif %}
    </div>
</div>
{% endblock %}
", "admin/contrat/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\admin\\contrat\\index.html.twig");
    }
}
