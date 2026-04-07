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

/* client/compte/index.html.twig */
class __TwigTemplate_b6c1763e724a1bca1632afc75858c438 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/compte/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/compte/index.html.twig"));

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

        yield "Mon Compte - UniBank+";
        
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

        yield "Mon Compte";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "<style>
.field-error {
    display: none;
    color: #dc2626;
    font-size: 12px;
    margin-top: 6px;
    font-weight: 600;
}

.field-error.is-visible {
    display: block;
}

.form-control.input-error,
textarea.input-error,
select.input-error {
    border-color: #dc2626 !important;
    box-shadow: 0 0 0 0.12rem rgba(220, 38, 38, 0.12);
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 28
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

        // line 29
        if ((($tmp = (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 29, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 30
            yield "<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-wallet mr-2\" style=\"color:var(--primary);\"></i>Mon compte bancaire</h5>
        ";
            // line 33
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 33, $this->source); })()), "estActif", [], "any", false, false, false, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 34
                yield "        <button type=\"button\" class=\"btn-admin outline\" style=\"padding:6px 16px;font-size:13px;\" onclick=\"\$('#typeModal').modal('show')\">
            <i class=\"fas fa-pen mr-1\"></i>Modifier le type
        </button>
        ";
            }
            // line 38
            yield "    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        <div class=\"row\">
            <div class=\"col-md-6 mb-3\">
                <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);border-radius:14px;padding:25px;color:#fff;\">
                    <small style=\"opacity:0.8;\">Solde actuel</small>
                    <div style=\"font-size:28px;font-weight:800;margin:8px 0;\">";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 44, $this->source); })()), "solde", [], "any", false, false, false, 44), 2, ",", " "), "html", null, true);
            yield " DT</div>
                    <div style=\"font-size:13px;opacity:0.7;\">";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 45, $this->source); })()), "numeroCompte", [], "any", false, false, false, 45), "html", null, true);
            yield "</div>
                </div>
            </div>
            <div class=\"col-md-6 mb-3\">
                <div class=\"row\" style=\"height:100%;\">
                    <div class=\"col-6 mb-3\">
                        <div style=\"background:var(--bg);border-radius:12px;padding:18px;height:100%;\">
                            <small style=\"color:var(--text-secondary);font-weight:600;\">Type</small>
                            <div style=\"font-weight:700;color:var(--primary-dark);margin-top:4px;\">
                                ";
            // line 54
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 54, $this->source); })()), "typeCompte", [], "any", false, false, false, 54), "value", [], "any", false, false, false, 54) == "EPARGNE")) {
                // line 55
                yield "                                    <i class=\"fas fa-piggy-bank mr-1\" style=\"color:var(--success);\"></i>Epargne
                                ";
            } else {
                // line 57
                yield "                                    <i class=\"fas fa-wallet mr-1\" style=\"color:var(--primary);\"></i>Courant
                                ";
            }
            // line 59
            yield "                            </div>
                        </div>
                    </div>
                    <div class=\"col-6 mb-3\">
                        <div style=\"background:var(--bg);border-radius:12px;padding:18px;height:100%;\">
                            <small style=\"color:var(--text-secondary);font-weight:600;\">Statut</small>
                            <div style=\"margin-top:4px;\">
                                ";
            // line 66
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 66, $this->source); })()), "estActif", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 67
                yield "                                    <span class=\"badge-status active\">Actif</span>
                                ";
            } else {
                // line 69
                yield "                                    <span class=\"badge-status banned\">Inactif</span>
                                ";
            }
            // line 71
            yield "                            </div>
                        </div>
                    </div>
                    <div class=\"col-12\">
                        <div style=\"background:var(--bg);border-radius:12px;padding:18px;\">
                            <small style=\"color:var(--text-secondary);font-weight:600;\">Ouvert le</small>
                            <div style=\"font-weight:600;color:var(--primary-dark);margin-top:4px;\">";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 77, $this->source); })()), "dateCreation", [], "any", false, false, false, 77), "d/m/Y"), "html", null, true);
            yield "</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

";
            // line 86
            if ((($tmp = (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 86, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 87
                yield "<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-arrow-down\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Depots</div><div class=\"stat-value\">";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 89, $this->source); })()), "depots", [], "any", false, false, false, 89), "html", null, true);
                yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon red\"><i class=\"fas fa-arrow-up\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Retraits</div><div class=\"stat-value\">";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 92, $this->source); })()), "retraits", [], "any", false, false, false, 92), "html", null, true);
                yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-exchange-alt\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Virements</div><div class=\"stat-value\">";
                // line 95
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 95, $this->source); })()), "virements", [], "any", false, false, false, 95), "html", null, true);
                yield "</div></div></div>
    </div>
</div>
";
            }
            // line 99
            yield "
";
            // line 100
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recentTransactions"]) || array_key_exists("recentTransactions", $context) ? $context["recentTransactions"] : (function () { throw new RuntimeError('Variable "recentTransactions" does not exist.', 100, $this->source); })())) > 0)) {
                // line 101
                yield "<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-history mr-2\" style=\"color:var(--primary);\"></i>Dernieres transactions</h5>
        <a href=\"";
                // line 104
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_transactions");
                yield "\" class=\"btn-admin outline\" style=\"padding:6px 16px;font-size:13px;\">Voir tout</a>
    </div>
    <div class=\"card-body\">
        <table class=\"admin-table\">
            <thead><tr><th>Transaction</th><th>Description</th><th>Date</th><th style=\"text-align:right;\">Montant</th></tr></thead>
            <tbody>
                ";
                // line 110
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentTransactions"]) || array_key_exists("recentTransactions", $context) ? $context["recentTransactions"] : (function () { throw new RuntimeError('Variable "recentTransactions" does not exist.', 110, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                    // line 111
                    yield "                ";
                    $context["isOut"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 111), "value", [], "any", false, false, false, 111) == "RETRAIT") || (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 111), "value", [], "any", false, false, false, 111) == "VIREMENT") && CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 111)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 111), "idCompte", [], "any", false, false, false, 111) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 111, $this->source); })()), "idCompte", [], "any", false, false, false, 111))));
                    // line 112
                    yield "                <tr>
                    <td>
                        <div class=\"d-flex align-items-center\" style=\"gap:8px;\">
                            <div style=\"width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;
                                ";
                    // line 116
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 116), "value", [], "any", false, false, false, 116) == "VIREMENT")) {
                        yield "background:#E7EDFF;color:var(--primary);
                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                     // line 117
$context["t"], "type", [], "any", false, false, false, 117), "value", [], "any", false, false, false, 117) == "RETRAIT")) {
                        yield "background:#FFE8EB;color:#dc2626;
                                ";
                    } else {
                        // line 118
                        yield "background:#E0F8EF;color:#16a34a;";
                    }
                    yield "\">
                                ";
                    // line 119
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 119), "value", [], "any", false, false, false, 119) == "VIREMENT")) {
                        yield "<i class=\"fas fa-exchange-alt\"></i>
                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                     // line 120
$context["t"], "type", [], "any", false, false, false, 120), "value", [], "any", false, false, false, 120) == "RETRAIT")) {
                        yield "<i class=\"fas fa-arrow-up\"></i>
                                ";
                    } else {
                        // line 121
                        yield "<i class=\"fas fa-arrow-down\"></i>";
                    }
                    // line 122
                    yield "                            </div>
                            <span style=\"font-weight:600;font-size:13px;\">";
                    // line 123
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 123), "value", [], "any", false, false, false, 123), "html", null, true);
                    yield "</span>
                        </div>
                    </td>
                    <td style=\"color:var(--text-secondary);font-size:13px;\">";
                    // line 126
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", true, true, false, 126) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 126)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 126), "html", null, true)) : ("-"));
                    yield "</td>
                    <td style=\"font-size:13px;\">";
                    // line 127
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "dateCreation", [], "any", false, false, false, 127), "d/m/Y H:i"), "html", null, true);
                    yield "</td>
                    <td style=\"text-align:right;font-weight:700;font-size:14px;color:";
                    // line 128
                    yield (((($tmp = (isset($context["isOut"]) || array_key_exists("isOut", $context) ? $context["isOut"] : (function () { throw new RuntimeError('Variable "isOut" does not exist.', 128, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("#dc2626") : ("#16a34a"));
                    yield ";\">
                        ";
                    // line 129
                    yield (((($tmp = (isset($context["isOut"]) || array_key_exists("isOut", $context) ? $context["isOut"] : (function () { throw new RuntimeError('Variable "isOut" does not exist.', 129, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("-") : ("+"));
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "montant", [], "any", false, false, false, 129), 2, ",", " "), "html", null, true);
                    yield " DT
                    </td>
                </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 133
                yield "            </tbody>
        </table>
    </div>
</div>
";
            }
            // line 138
            yield "
<div class=\"modal fade modal-admin\" id=\"typeModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:400px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-pen mr-2\"></i>Modifier le type de compte</h5>
            </div>
            <form method=\"post\" action=\"";
            // line 145
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_compte_type");
            yield "\" id=\"compteTypeForm\" novalidate data-inline-validate>
                <div class=\"modal-body\" style=\"padding:25px;\">
                    <p style=\"color:var(--text-secondary);font-size:14px;\">Type actuel: <strong style=\"color:var(--primary-dark);\">";
            // line 147
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 147, $this->source); })()), "typeCompte", [], "any", false, false, false, 147), "value", [], "any", false, false, false, 147), "html", null, true);
            yield "</strong></p>
                    <div class=\"form-group\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Nouveau type</label>
                        <select name=\"type\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <option value=\"COURANT\" ";
            // line 151
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 151, $this->source); })()), "typeCompte", [], "any", false, false, false, 151), "value", [], "any", false, false, false, 151) == "COURANT")) ? ("selected") : (""));
            yield ">Compte Courant</option>
                            <option value=\"EPARGNE\" ";
            // line 152
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 152, $this->source); })()), "typeCompte", [], "any", false, false, false, 152), "value", [], "any", false, false, false, 152) == "EPARGNE")) ? ("selected") : (""));
            yield ">Compte Epargne</option>
                        </select>
                        <div class=\"field-error\" data-error-for=\"type\"></div>
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin primary\">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

";
        } else {
            // line 167
            yield "<div class=\"admin-card\">
    <div class=\"card-body\" style=\"padding:50px;\">
        <div class=\"empty-state\">
            <i class=\"fas fa-university\" style=\"color:var(--text-secondary);\"></i>
            <p>Aucun compte bancaire</p>
            <small style=\"color:var(--text-secondary);\">Votre compte sera cree automatiquement apres approbation par l'administration.</small>
        </div>
    </div>
</div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 179
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

        // line 180
        yield "<script>
var compteTypeForm = document.getElementById('compteTypeForm');

if (compteTypeForm) {
    var typeField = compteTypeForm.querySelector('[name=\"type\"]');
    var errorEl = compteTypeForm.querySelector('[data-error-for=\"type\"]');

    function validateCompteTypeField() {
        var isValid = typeField.checkValidity();
        typeField.classList.toggle('input-error', !isValid);
        errorEl.textContent = isValid ? '' : 'Veuillez choisir un type de compte.';
        errorEl.classList.toggle('is-visible', !isValid);
        return isValid;
    }

    typeField.addEventListener('change', validateCompteTypeField);

    compteTypeForm.addEventListener('submit', function(event) {
        if (!validateCompteTypeField()) {
            event.preventDefault();
            typeField.focus();
        }
    });
}
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
        return "client/compte/index.html.twig";
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
        return array (  457 => 180,  444 => 179,  423 => 167,  405 => 152,  401 => 151,  394 => 147,  389 => 145,  380 => 138,  373 => 133,  362 => 129,  358 => 128,  354 => 127,  350 => 126,  344 => 123,  341 => 122,  338 => 121,  333 => 120,  329 => 119,  324 => 118,  319 => 117,  315 => 116,  309 => 112,  306 => 111,  302 => 110,  293 => 104,  288 => 101,  286 => 100,  283 => 99,  276 => 95,  270 => 92,  264 => 89,  260 => 87,  258 => 86,  246 => 77,  238 => 71,  234 => 69,  230 => 67,  228 => 66,  219 => 59,  215 => 57,  211 => 55,  209 => 54,  197 => 45,  193 => 44,  185 => 38,  179 => 34,  177 => 33,  172 => 30,  170 => 29,  157 => 28,  126 => 6,  113 => 5,  90 => 3,  67 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'client/base.html.twig' %}
{% block title %}Mon Compte - UniBank+{% endblock %}
{% block page_title %}Mon Compte{% endblock %}

{% block stylesheets %}
<style>
.field-error {
    display: none;
    color: #dc2626;
    font-size: 12px;
    margin-top: 6px;
    font-weight: 600;
}

.field-error.is-visible {
    display: block;
}

.form-control.input-error,
textarea.input-error,
select.input-error {
    border-color: #dc2626 !important;
    box-shadow: 0 0 0 0.12rem rgba(220, 38, 38, 0.12);
}
</style>
{% endblock %}

{% block body %}
{% if compte %}
<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-wallet mr-2\" style=\"color:var(--primary);\"></i>Mon compte bancaire</h5>
        {% if compte.estActif %}
        <button type=\"button\" class=\"btn-admin outline\" style=\"padding:6px 16px;font-size:13px;\" onclick=\"\$('#typeModal').modal('show')\">
            <i class=\"fas fa-pen mr-1\"></i>Modifier le type
        </button>
        {% endif %}
    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        <div class=\"row\">
            <div class=\"col-md-6 mb-3\">
                <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);border-radius:14px;padding:25px;color:#fff;\">
                    <small style=\"opacity:0.8;\">Solde actuel</small>
                    <div style=\"font-size:28px;font-weight:800;margin:8px 0;\">{{ compte.solde|number_format(2, ',', ' ') }} DT</div>
                    <div style=\"font-size:13px;opacity:0.7;\">{{ compte.numeroCompte }}</div>
                </div>
            </div>
            <div class=\"col-md-6 mb-3\">
                <div class=\"row\" style=\"height:100%;\">
                    <div class=\"col-6 mb-3\">
                        <div style=\"background:var(--bg);border-radius:12px;padding:18px;height:100%;\">
                            <small style=\"color:var(--text-secondary);font-weight:600;\">Type</small>
                            <div style=\"font-weight:700;color:var(--primary-dark);margin-top:4px;\">
                                {% if compte.typeCompte.value == 'EPARGNE' %}
                                    <i class=\"fas fa-piggy-bank mr-1\" style=\"color:var(--success);\"></i>Epargne
                                {% else %}
                                    <i class=\"fas fa-wallet mr-1\" style=\"color:var(--primary);\"></i>Courant
                                {% endif %}
                            </div>
                        </div>
                    </div>
                    <div class=\"col-6 mb-3\">
                        <div style=\"background:var(--bg);border-radius:12px;padding:18px;height:100%;\">
                            <small style=\"color:var(--text-secondary);font-weight:600;\">Statut</small>
                            <div style=\"margin-top:4px;\">
                                {% if compte.estActif %}
                                    <span class=\"badge-status active\">Actif</span>
                                {% else %}
                                    <span class=\"badge-status banned\">Inactif</span>
                                {% endif %}
                            </div>
                        </div>
                    </div>
                    <div class=\"col-12\">
                        <div style=\"background:var(--bg);border-radius:12px;padding:18px;\">
                            <small style=\"color:var(--text-secondary);font-weight:600;\">Ouvert le</small>
                            <div style=\"font-weight:600;color:var(--primary-dark);margin-top:4px;\">{{ compte.dateCreation|date('d/m/Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{% if stats %}
<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-arrow-down\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Depots</div><div class=\"stat-value\">{{ stats.depots }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon red\"><i class=\"fas fa-arrow-up\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Retraits</div><div class=\"stat-value\">{{ stats.retraits }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-exchange-alt\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Virements</div><div class=\"stat-value\">{{ stats.virements }}</div></div></div>
    </div>
</div>
{% endif %}

{% if recentTransactions|length > 0 %}
<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-history mr-2\" style=\"color:var(--primary);\"></i>Dernieres transactions</h5>
        <a href=\"{{ path('app_client_transactions') }}\" class=\"btn-admin outline\" style=\"padding:6px 16px;font-size:13px;\">Voir tout</a>
    </div>
    <div class=\"card-body\">
        <table class=\"admin-table\">
            <thead><tr><th>Transaction</th><th>Description</th><th>Date</th><th style=\"text-align:right;\">Montant</th></tr></thead>
            <tbody>
                {% for t in recentTransactions %}
                {% set isOut = (t.type.value == 'RETRAIT') or (t.type.value == 'VIREMENT' and t.compteSource and t.compteSource.idCompte == compte.idCompte) %}
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
                    <td style=\"color:var(--text-secondary);font-size:13px;\">{{ t.description ?? '-' }}</td>
                    <td style=\"font-size:13px;\">{{ t.dateCreation|date('d/m/Y H:i') }}</td>
                    <td style=\"text-align:right;font-weight:700;font-size:14px;color:{{ isOut ? '#dc2626' : '#16a34a' }};\">
                        {{ isOut ? '-' : '+' }}{{ t.montant|number_format(2, ',', ' ') }} DT
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endif %}

<div class=\"modal fade modal-admin\" id=\"typeModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:400px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-pen mr-2\"></i>Modifier le type de compte</h5>
            </div>
            <form method=\"post\" action=\"{{ path('app_client_compte_type') }}\" id=\"compteTypeForm\" novalidate data-inline-validate>
                <div class=\"modal-body\" style=\"padding:25px;\">
                    <p style=\"color:var(--text-secondary);font-size:14px;\">Type actuel: <strong style=\"color:var(--primary-dark);\">{{ compte.typeCompte.value }}</strong></p>
                    <div class=\"form-group\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Nouveau type</label>
                        <select name=\"type\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <option value=\"COURANT\" {{ compte.typeCompte.value == 'COURANT' ? 'selected' : '' }}>Compte Courant</option>
                            <option value=\"EPARGNE\" {{ compte.typeCompte.value == 'EPARGNE' ? 'selected' : '' }}>Compte Epargne</option>
                        </select>
                        <div class=\"field-error\" data-error-for=\"type\"></div>
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin primary\">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

{% else %}
<div class=\"admin-card\">
    <div class=\"card-body\" style=\"padding:50px;\">
        <div class=\"empty-state\">
            <i class=\"fas fa-university\" style=\"color:var(--text-secondary);\"></i>
            <p>Aucun compte bancaire</p>
            <small style=\"color:var(--text-secondary);\">Votre compte sera cree automatiquement apres approbation par l'administration.</small>
        </div>
    </div>
</div>
{% endif %}
{% endblock %}

{% block javascripts %}
<script>
var compteTypeForm = document.getElementById('compteTypeForm');

if (compteTypeForm) {
    var typeField = compteTypeForm.querySelector('[name=\"type\"]');
    var errorEl = compteTypeForm.querySelector('[data-error-for=\"type\"]');

    function validateCompteTypeField() {
        var isValid = typeField.checkValidity();
        typeField.classList.toggle('input-error', !isValid);
        errorEl.textContent = isValid ? '' : 'Veuillez choisir un type de compte.';
        errorEl.classList.toggle('is-visible', !isValid);
        return isValid;
    }

    typeField.addEventListener('change', validateCompteTypeField);

    compteTypeForm.addEventListener('submit', function(event) {
        if (!validateCompteTypeField()) {
            event.preventDefault();
            typeField.focus();
        }
    });
}
</script>
{% endblock %}
", "client/compte/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\client\\compte\\index.html.twig");
    }
}
