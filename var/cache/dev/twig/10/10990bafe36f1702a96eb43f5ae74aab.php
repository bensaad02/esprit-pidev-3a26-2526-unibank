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

/* admin/transaction/index.html.twig */
class __TwigTemplate_9fcd6daee8d95e48a17a695d17df53fe extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/transaction/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/transaction/index.html.twig"));

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

        yield "Transactions - Admin UniBank+";
        
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

        yield "Gestion Transactions";
        
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
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-list\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total</div><div class=\"stat-value\">";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 8, $this->source); })()), "total", [], "any", false, false, false, 8), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-exchange-alt\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Virements</div><div class=\"stat-value\">";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 11, $this->source); })()), "virements", [], "any", false, false, false, 11), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon red\"><i class=\"fas fa-arrow-up\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Retraits</div><div class=\"stat-value\">";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 14, $this->source); })()), "retraits", [], "any", false, false, false, 14), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-arrow-down\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Depots</div><div class=\"stat-value\">";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 17, $this->source); })()), "depots", [], "any", false, false, false, 17), "html", null, true);
        yield "</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-exchange-alt mr-2\" style=\"color:var(--primary);\"></i>Toutes les transactions (";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["transactions"]) || array_key_exists("transactions", $context) ? $context["transactions"] : (function () { throw new RuntimeError('Variable "transactions" does not exist.', 23, $this->source); })())), "html", null, true);
        yield ")</h5>
        <form method=\"get\" action=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_transactions");
        yield "\" id=\"filterForm\" class=\"filter-bar\">
            <select name=\"type\" onchange=\"this.form.submit()\">
                <option value=\"all\" ";
        // line 26
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 26, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les types</option>
                <option value=\"VIREMENT\" ";
        // line 27
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 27, $this->source); })()) == "VIREMENT")) ? ("selected") : (""));
        yield ">Virements</option>
                <option value=\"RETRAIT\" ";
        // line 28
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 28, $this->source); })()) == "RETRAIT")) ? ("selected") : (""));
        yield ">Retraits</option>
                <option value=\"DEPOT\" ";
        // line 29
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 29, $this->source); })()) == "DEPOT")) ? ("selected") : (""));
        yield ">Depots</option>
            </select>
            <input type=\"text\" name=\"client\" value=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["clientFilter"]) || array_key_exists("clientFilter", $context) ? $context["clientFilter"] : (function () { throw new RuntimeError('Variable "clientFilter" does not exist.', 31, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Nom client...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:150px;\">
            <input type=\"text\" name=\"account\" value=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["accountFilter"]) || array_key_exists("accountFilter", $context) ? $context["accountFilter"] : (function () { throw new RuntimeError('Variable "accountFilter" does not exist.', 32, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"N compte...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:140px;\">
            <input type=\"text\" name=\"q\" value=\"";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 33, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:170px;\">
            ";
        // line 34
        if ((((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 34, $this->source); })()) != "all") || (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 34, $this->source); })())) || (isset($context["clientFilter"]) || array_key_exists("clientFilter", $context) ? $context["clientFilter"] : (function () { throw new RuntimeError('Variable "clientFilter" does not exist.', 34, $this->source); })())) || (isset($context["accountFilter"]) || array_key_exists("accountFilter", $context) ? $context["accountFilter"] : (function () { throw new RuntimeError('Variable "accountFilter" does not exist.', 34, $this->source); })()))) {
            // line 35
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_transactions");
            yield "\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            ";
        }
        // line 37
        yield "        </form>
    </div>
    <div class=\"card-body\">
        ";
        // line 40
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["transactions"]) || array_key_exists("transactions", $context) ? $context["transactions"] : (function () { throw new RuntimeError('Variable "transactions" does not exist.', 40, $this->source); })())) > 0)) {
            // line 41
            yield "        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th style=\"text-align:right;\">Montant</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 54
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["transactions"]) || array_key_exists("transactions", $context) ? $context["transactions"] : (function () { throw new RuntimeError('Variable "transactions" does not exist.', 54, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 55
                yield "                <tr>
                    <td>
                        <div class=\"d-flex align-items-center\" style=\"gap:8px;\">
                            <div style=\"width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;
                                ";
                // line 59
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 59), "value", [], "any", false, false, false, 59) == "VIREMENT")) {
                    yield "background:#E7EDFF;color:var(--primary);
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 60
$context["t"], "type", [], "any", false, false, false, 60), "value", [], "any", false, false, false, 60) == "RETRAIT")) {
                    yield "background:#FFE8EB;color:#dc2626;
                                ";
                } else {
                    // line 61
                    yield "background:#E0F8EF;color:#16a34a;";
                }
                yield "\">
                                ";
                // line 62
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 62), "value", [], "any", false, false, false, 62) == "VIREMENT")) {
                    yield "<i class=\"fas fa-exchange-alt\"></i>
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 63
$context["t"], "type", [], "any", false, false, false, 63), "value", [], "any", false, false, false, 63) == "RETRAIT")) {
                    yield "<i class=\"fas fa-arrow-up\"></i>
                                ";
                } else {
                    // line 64
                    yield "<i class=\"fas fa-arrow-down\"></i>";
                }
                // line 65
                yield "                            </div>
                            <span style=\"font-weight:600;font-size:13px;\">";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 66), "value", [], "any", false, false, false, 66), "html", null, true);
                yield "</span>
                        </div>
                    </td>
                    <td>
                        ";
                // line 70
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 71
                    yield "                            <div style=\"font-size:13px;font-weight:600;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 71), "utilisateur", [], "any", false, false, false, 71), "prenom", [], "any", false, false, false, 71), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 71), "utilisateur", [], "any", false, false, false, 71), "nom", [], "any", false, false, false, 71), "html", null, true);
                    yield "</div>
                            <div style=\"font-size:11px;color:var(--text-secondary);\">";
                    // line 72
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 72), "numeroCompte", [], "any", false, false, false, 72), "html", null, true);
                    yield "</div>
                        ";
                } else {
                    // line 73
                    yield "-";
                }
                // line 74
                yield "                    </td>
                    <td>
                        ";
                // line 76
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteDestination", [], "any", false, false, false, 76)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 77
                    yield "                            <div style=\"font-size:13px;font-weight:600;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteDestination", [], "any", false, false, false, 77), "utilisateur", [], "any", false, false, false, 77), "prenom", [], "any", false, false, false, 77), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteDestination", [], "any", false, false, false, 77), "utilisateur", [], "any", false, false, false, 77), "nom", [], "any", false, false, false, 77), "html", null, true);
                    yield "</div>
                            <div style=\"font-size:11px;color:var(--text-secondary);\">";
                    // line 78
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteDestination", [], "any", false, false, false, 78), "numeroCompte", [], "any", false, false, false, 78), "html", null, true);
                    yield "</div>
                        ";
                } else {
                    // line 79
                    yield "<span style=\"color:var(--text-secondary);\">-</span>";
                }
                // line 80
                yield "                    </td>
                    <td style=\"color:var(--text-secondary);font-size:13px;max-width:200px;\">";
                // line 81
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", true, true, false, 81) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 81)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 81), "html", null, true)) : ("-"));
                yield "</td>
                    <td style=\"font-size:13px;white-space:nowrap;\">";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "dateCreation", [], "any", false, false, false, 82), "d/m/Y"), "html", null, true);
                yield "<br><small style=\"color:var(--text-secondary);\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "dateCreation", [], "any", false, false, false, 82), "H:i"), "html", null, true);
                yield "</small></td>
                    <td style=\"text-align:right;font-weight:700;font-size:14px;color:var(--primary-dark);\">
                        ";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "montant", [], "any", false, false, false, 84), 2, ",", " "), "html", null, true);
                yield " DT
                    </td>
                    <td style=\"white-space:nowrap;\">
                        <button
                            type=\"button\"
                            class=\"btn-action delete js-transaction-delete\"
                            title=\"Supprimer\"
                            data-delete-url=\"";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_transaction_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["t"], "idTransaction", [], "any", false, false, false, 91)]), "html", null, true);
                yield "\"
                            data-delete-message=\"Cette action supprimera la transaction et tentera d'annuler son effet sur les soldes. Continuer ?\"
                        >
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 99
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 102
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucune transaction trouvee</p>
        </div>
        ";
        }
        // line 107
        yield "    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 111
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 112
        yield "<script>
document.querySelectorAll('.js-transaction-delete').forEach(function(button) {
    button.addEventListener('click', function() {
        confirmSubmit(button.dataset.deleteUrl, {
            type: 'delete',
            title: 'Supprimer la transaction',
            message: button.dataset.deleteMessage,
            btnText: 'Supprimer'
        });
    });
});
</script>
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
        return "admin/transaction/index.html.twig";
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
        return array (  384 => 112,  371 => 111,  358 => 107,  351 => 102,  346 => 99,  332 => 91,  322 => 84,  315 => 82,  311 => 81,  308 => 80,  305 => 79,  300 => 78,  293 => 77,  291 => 76,  287 => 74,  284 => 73,  279 => 72,  272 => 71,  270 => 70,  263 => 66,  260 => 65,  257 => 64,  252 => 63,  248 => 62,  243 => 61,  238 => 60,  234 => 59,  228 => 55,  224 => 54,  209 => 41,  207 => 40,  202 => 37,  196 => 35,  194 => 34,  190 => 33,  186 => 32,  182 => 31,  177 => 29,  173 => 28,  169 => 27,  165 => 26,  160 => 24,  156 => 23,  147 => 17,  141 => 14,  135 => 11,  129 => 8,  125 => 6,  112 => 5,  89 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block title %}Transactions - Admin UniBank+{% endblock %}
{% block page_title %}Gestion Transactions{% endblock %}

{% block body %}
<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-list\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total</div><div class=\"stat-value\">{{ stats.total }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-exchange-alt\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Virements</div><div class=\"stat-value\">{{ stats.virements }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon red\"><i class=\"fas fa-arrow-up\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Retraits</div><div class=\"stat-value\">{{ stats.retraits }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-arrow-down\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Depots</div><div class=\"stat-value\">{{ stats.depots }}</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-exchange-alt mr-2\" style=\"color:var(--primary);\"></i>Toutes les transactions ({{ transactions|length }})</h5>
        <form method=\"get\" action=\"{{ path('app_admin_transactions') }}\" id=\"filterForm\" class=\"filter-bar\">
            <select name=\"type\" onchange=\"this.form.submit()\">
                <option value=\"all\" {{ type == 'all' ? 'selected' : '' }}>Tous les types</option>
                <option value=\"VIREMENT\" {{ type == 'VIREMENT' ? 'selected' : '' }}>Virements</option>
                <option value=\"RETRAIT\" {{ type == 'RETRAIT' ? 'selected' : '' }}>Retraits</option>
                <option value=\"DEPOT\" {{ type == 'DEPOT' ? 'selected' : '' }}>Depots</option>
            </select>
            <input type=\"text\" name=\"client\" value=\"{{ clientFilter }}\" placeholder=\"Nom client...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:150px;\">
            <input type=\"text\" name=\"account\" value=\"{{ accountFilter }}\" placeholder=\"N compte...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:140px;\">
            <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:170px;\">
            {% if type != 'all' or search or clientFilter or accountFilter %}
                <a href=\"{{ path('app_admin_transactions') }}\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            {% endif %}
        </form>
    </div>
    <div class=\"card-body\">
        {% if transactions|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th style=\"text-align:right;\">Montant</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for t in transactions %}
                <tr>
                    <td>
                        <div class=\"d-flex align-items-center\" style=\"gap:8px;\">
                            <div style=\"width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;
                                {% if t.type.value == 'VIREMENT' %}background:#E7EDFF;color:var(--primary);
                                {% elseif t.type.value == 'RETRAIT' %}background:#FFE8EB;color:#dc2626;
                                {% else %}background:#E0F8EF;color:#16a34a;{% endif %}\">
                                {% if t.type.value == 'VIREMENT' %}<i class=\"fas fa-exchange-alt\"></i>
                                {% elseif t.type.value == 'RETRAIT' %}<i class=\"fas fa-arrow-up\"></i>
                                {% else %}<i class=\"fas fa-arrow-down\"></i>{% endif %}
                            </div>
                            <span style=\"font-weight:600;font-size:13px;\">{{ t.type.value }}</span>
                        </div>
                    </td>
                    <td>
                        {% if t.compteSource %}
                            <div style=\"font-size:13px;font-weight:600;\">{{ t.compteSource.utilisateur.prenom }} {{ t.compteSource.utilisateur.nom }}</div>
                            <div style=\"font-size:11px;color:var(--text-secondary);\">{{ t.compteSource.numeroCompte }}</div>
                        {% else %}-{% endif %}
                    </td>
                    <td>
                        {% if t.compteDestination %}
                            <div style=\"font-size:13px;font-weight:600;\">{{ t.compteDestination.utilisateur.prenom }} {{ t.compteDestination.utilisateur.nom }}</div>
                            <div style=\"font-size:11px;color:var(--text-secondary);\">{{ t.compteDestination.numeroCompte }}</div>
                        {% else %}<span style=\"color:var(--text-secondary);\">-</span>{% endif %}
                    </td>
                    <td style=\"color:var(--text-secondary);font-size:13px;max-width:200px;\">{{ t.description ?? '-' }}</td>
                    <td style=\"font-size:13px;white-space:nowrap;\">{{ t.dateCreation|date('d/m/Y') }}<br><small style=\"color:var(--text-secondary);\">{{ t.dateCreation|date('H:i') }}</small></td>
                    <td style=\"text-align:right;font-weight:700;font-size:14px;color:var(--primary-dark);\">
                        {{ t.montant|number_format(2, ',', ' ') }} DT
                    </td>
                    <td style=\"white-space:nowrap;\">
                        <button
                            type=\"button\"
                            class=\"btn-action delete js-transaction-delete\"
                            title=\"Supprimer\"
                            data-delete-url=\"{{ path('app_admin_transaction_delete', {id: t.idTransaction}) }}\"
                            data-delete-message=\"Cette action supprimera la transaction et tentera d'annuler son effet sur les soldes. Continuer ?\"
                        >
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucune transaction trouvee</p>
        </div>
        {% endif %}
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
document.querySelectorAll('.js-transaction-delete').forEach(function(button) {
    button.addEventListener('click', function() {
        confirmSubmit(button.dataset.deleteUrl, {
            type: 'delete',
            title: 'Supprimer la transaction',
            message: button.dataset.deleteMessage,
            btnText: 'Supprimer'
        });
    });
});
</script>
{% endblock %}
", "admin/transaction/index.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/admin/transaction/index.html.twig");
    }
}
