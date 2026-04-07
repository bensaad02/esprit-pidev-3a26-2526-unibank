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

/* admin/user/pending.html.twig */
class __TwigTemplate_5381aec4bbfde3bee68ad03a36346b76 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/pending.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/pending.html.twig"));

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

        yield "Demandes en attente - Admin UniBank+";
        
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

        yield "Demandes en attente";
        
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
        yield "<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-clock mr-2\" style=\"color:var(--warning);\"></i>Clients en attente d'approbation (";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["clients"]) || array_key_exists("clients", $context) ? $context["clients"] : (function () { throw new RuntimeError('Variable "clients" does not exist.', 8, $this->source); })())), "html", null, true);
        yield ")</h5>
    </div>
    <div class=\"card-body\">
        ";
        // line 11
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["clients"]) || array_key_exists("clients", $context) ? $context["clients"] : (function () { throw new RuntimeError('Variable "clients" does not exist.', 11, $this->source); })())) > 0)) {
            // line 12
            yield "        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>CIN</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Offre choisie</th>
                    <th>Date inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["clients"]) || array_key_exists("clients", $context) ? $context["clients"] : (function () { throw new RuntimeError('Variable "clients" does not exist.', 25, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                // line 26
                yield "                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 29)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 29)), "html", null, true);
                yield "</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">";
                // line 31
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 31), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 31), "html", null, true);
                yield "</div>
                                <div class=\"user-email\">";
                // line 32
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "email", [], "any", false, false, false, 32), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>
                    <td>";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "cin", [], "any", false, false, false, 36), "html", null, true);
                yield "</td>
                    <td>";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "telephone", [], "any", false, false, false, 37), "html", null, true);
                yield "</td>
                    <td style=\"max-width:200px;\">";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "adresse", [], "any", false, false, false, 38), "html", null, true);
                yield "</td>
                    <td>
                        ";
                // line 40
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["client"], "selectedOffer", [], "any", false, false, false, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 41
                    yield "                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "selectedOffer", [], "any", false, false, false, 41), "html", null, true);
                    yield "</span>
                        ";
                } else {
                    // line 43
                    yield "                            <span style=\"color:var(--text-secondary);\">-</span>
                        ";
                }
                // line 45
                yield "                    </td>
                    <td>";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "dateCreation", [], "any", false, false, false, 46), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                    <td style=\"white-space:nowrap;\">
                        <button type=\"button\" class=\"btn-admin success\" style=\"padding:6px 16px;font-size:13px;\" onclick=\"confirmSubmit('";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_approve", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 48)]), "html", null, true);
                yield "', {type:'approve', title:'Approuver le client', message:'Approuver ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 48), "js"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 48), "js"), "html", null, true);
                yield " et creer son compte bancaire ?', btnText:'Approuver'})\">
                            <i class=\"fas fa-check mr-1\"></i>Approuver
                        </button>
                        <button type=\"button\" class=\"btn-admin danger\" style=\"padding:6px 16px;font-size:13px;\" onclick=\"confirmSubmit('";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_reject", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 51)]), "html", null, true);
                yield "', {type:'reject', title:'Rejeter la demande', message:'Rejeter la demande de ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 51), "js"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 51), "js"), "html", null, true);
                yield " ?', btnText:'Rejeter'})\">
                            <i class=\"fas fa-times mr-1\"></i>Rejeter
                        </button>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['client'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 60
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucune demande en attente</p>
        </div>
        ";
        }
        // line 65
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
        return "admin/user/pending.html.twig";
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
        return array (  250 => 65,  243 => 60,  238 => 57,  222 => 51,  212 => 48,  207 => 46,  204 => 45,  200 => 43,  194 => 41,  192 => 40,  187 => 38,  183 => 37,  179 => 36,  172 => 32,  166 => 31,  160 => 29,  155 => 26,  151 => 25,  136 => 12,  134 => 11,  128 => 8,  124 => 6,  111 => 5,  88 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block title %}Demandes en attente - Admin UniBank+{% endblock %}
{% block page_title %}Demandes en attente{% endblock %}

{% block body %}
<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-clock mr-2\" style=\"color:var(--warning);\"></i>Clients en attente d'approbation ({{ clients|length }})</h5>
    </div>
    <div class=\"card-body\">
        {% if clients|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>CIN</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Offre choisie</th>
                    <th>Date inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for client in clients %}
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
                    <td>{{ client.telephone }}</td>
                    <td style=\"max-width:200px;\">{{ client.adresse }}</td>
                    <td>
                        {% if client.selectedOffer %}
                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">{{ client.selectedOffer }}</span>
                        {% else %}
                            <span style=\"color:var(--text-secondary);\">-</span>
                        {% endif %}
                    </td>
                    <td>{{ client.dateCreation|date('d/m/Y H:i') }}</td>
                    <td style=\"white-space:nowrap;\">
                        <button type=\"button\" class=\"btn-admin success\" style=\"padding:6px 16px;font-size:13px;\" onclick=\"confirmSubmit('{{ path('app_admin_user_approve', {id: client.idUtilisateur}) }}', {type:'approve', title:'Approuver le client', message:'Approuver {{ client.prenom|e('js') }} {{ client.nom|e('js') }} et creer son compte bancaire ?', btnText:'Approuver'})\">
                            <i class=\"fas fa-check mr-1\"></i>Approuver
                        </button>
                        <button type=\"button\" class=\"btn-admin danger\" style=\"padding:6px 16px;font-size:13px;\" onclick=\"confirmSubmit('{{ path('app_admin_user_reject', {id: client.idUtilisateur}) }}', {type:'reject', title:'Rejeter la demande', message:'Rejeter la demande de {{ client.prenom|e('js') }} {{ client.nom|e('js') }} ?', btnText:'Rejeter'})\">
                            <i class=\"fas fa-times mr-1\"></i>Rejeter
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
", "admin/user/pending.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/admin/user/pending.html.twig");
    }
}
