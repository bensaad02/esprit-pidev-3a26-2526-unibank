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

/* client/transaction/index.html.twig */
class __TwigTemplate_da9f96aeb1495742bf7b28da57f3c524 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/transaction/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/transaction/index.html.twig"));

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

        yield "Mes Transactions - UniBank+";
        
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

        yield "Mes Transactions";
        
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
        yield "<div class=\"d-flex align-items-center justify-content-between mb-4\" style=\"flex-wrap:wrap;gap:15px;\">
    <div>
        <h4 style=\"font-weight:700;color:var(--primary-dark);margin:0;\">Solde: <span style=\"color:var(--success);\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 31, $this->source); })()), "solde", [], "any", false, false, false, 31), 2, ",", " "), "html", null, true);
        yield " DT</span></h4>
        <small style=\"color:var(--text-secondary);\">";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 32, $this->source); })()), "numeroCompte", [], "any", false, false, false, 32), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 32, $this->source); })()), "typeCompte", [], "any", false, false, false, 32), "value", [], "any", false, false, false, 32), "html", null, true);
        yield "</small>
    </div>
</div>

<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-exchange-alt\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Virements</div><div class=\"stat-value\">";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 38, $this->source); })()), "virements", [], "any", false, false, false, 38), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon red\"><i class=\"fas fa-arrow-up\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Retraits</div><div class=\"stat-value\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 41, $this->source); })()), "retraits", [], "any", false, false, false, 41), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-arrow-down\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Depots</div><div class=\"stat-value\">";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 44, $this->source); })()), "depots", [], "any", false, false, false, 44), "html", null, true);
        yield "</div></div></div>
    </div>
</div>

";
        // line 48
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 48, $this->source); })()), "estActif", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "<div class=\"admin-card mb-4\">
    <div class=\"card-body\" style=\"padding:30px;\">
        <div style=\"background:#FFF5E6;border-radius:12px;padding:20px;display:flex;align-items:center;gap:15px;\">
            <i class=\"fas fa-exclamation-triangle\" style=\"font-size:24px;color:var(--warning);\"></i>
            <div>
                <div style=\"font-weight:700;color:var(--primary-dark);\">Compte desactive</div>
                <div style=\"color:var(--text-secondary);font-size:13px;\">Votre compte est actuellement desactive. Vous ne pouvez pas effectuer de transactions. Contactez le support.</div>
            </div>
        </div>
    </div>
</div>
";
        } else {
            // line 61
            yield "<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-plus-circle mr-2\" style=\"color:var(--primary);\"></i>Nouvelle transaction</h5>
    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        <form method=\"post\" action=\"";
            // line 66
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_transaction_submit");
            yield "\" id=\"transactionForm\" novalidate data-inline-validate>
            <div class=\"row\" style=\"display:flex;gap:15px;flex-wrap:wrap;align-items:flex-end;\">
                <div style=\"flex:1;min-width:150px;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Type</label>
                    <select name=\"type\" id=\"txnType\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                        <option value=\"\">Choisir...</option>
                        <option value=\"VIREMENT\">Virement</option>
                        <option value=\"RETRAIT\">Retrait</option>
                    </select>
                    <div class=\"field-error\" data-error-for=\"type\"></div>
                </div>
                <div style=\"flex:1;min-width:150px;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant (DT)</label>
                    <input type=\"number\" name=\"montant\" step=\"0.01\" min=\"0.01\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"0.00\">
                    <div class=\"field-error\" data-error-for=\"montant\"></div>
                </div>
                <div id=\"destBox\" style=\"flex:1;min-width:180px;display:none;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Compte destinataire</label>
                    <input type=\"text\" name=\"destination\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"UB...\">
                    <div class=\"field-error\" data-error-for=\"destination\"></div>
                </div>
                <div style=\"flex:1;min-width:180px;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Description</label>
                    <input type=\"text\" name=\"description\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"Motif (optionnel)\">
                </div>
                <div>
                    <button type=\"submit\" class=\"btn-admin primary\" style=\"height:44px;\">Effectuer</button>
                </div>
            </div>
        </form>
    </div>
</div>
";
        }
        // line 99
        yield "
<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-history mr-2\" style=\"color:var(--primary);\"></i>Historique</h5>
        <form method=\"get\" action=\"";
        // line 103
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_transactions");
        yield "\" id=\"filterForm\" class=\"filter-bar\">
            <input type=\"date\" name=\"from\" value=\"";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["dateFrom"]) || array_key_exists("dateFrom", $context) ? $context["dateFrom"] : (function () { throw new RuntimeError('Variable "dateFrom" does not exist.', 104, $this->source); })()), "html", null, true);
        yield "\" onchange=\"this.form.submit()\" style=\"width:140px;\">
            <input type=\"date\" name=\"to\" value=\"";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["dateTo"]) || array_key_exists("dateTo", $context) ? $context["dateTo"] : (function () { throw new RuntimeError('Variable "dateTo" does not exist.', 105, $this->source); })()), "html", null, true);
        yield "\" onchange=\"this.form.submit()\" style=\"width:140px;\">
            <select name=\"type\" onchange=\"this.form.submit()\">
                <option value=\"all\" ";
        // line 107
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 107, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous</option>
                <option value=\"VIREMENT\" ";
        // line 108
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 108, $this->source); })()) == "VIREMENT")) ? ("selected") : (""));
        yield ">Virements</option>
                <option value=\"RETRAIT\" ";
        // line 109
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 109, $this->source); })()) == "RETRAIT")) ? ("selected") : (""));
        yield ">Retraits</option>
                <option value=\"DEPOT\" ";
        // line 110
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 110, $this->source); })()) == "DEPOT")) ? ("selected") : (""));
        yield ">Depots</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 112, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:180px;\">
            <a href=\"";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_extrait", ["from" => (isset($context["dateFrom"]) || array_key_exists("dateFrom", $context) ? $context["dateFrom"] : (function () { throw new RuntimeError('Variable "dateFrom" does not exist.', 113, $this->source); })()), "to" => (isset($context["dateTo"]) || array_key_exists("dateTo", $context) ? $context["dateTo"] : (function () { throw new RuntimeError('Variable "dateTo" does not exist.', 113, $this->source); })())]), "html", null, true);
        yield "\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\" title=\"Telecharger l'extrait PDF\">
                <i class=\"fas fa-file-pdf mr-1\"></i>Extrait PDF
            </a>
        </form>
    </div>
    <div class=\"card-body\">
        ";
        // line 119
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["transactions"]) || array_key_exists("transactions", $context) ? $context["transactions"] : (function () { throw new RuntimeError('Variable "transactions" does not exist.', 119, $this->source); })())) > 0)) {
            // line 120
            yield "        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th style=\"text-align:right;\">Montant</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 131
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["transactions"]) || array_key_exists("transactions", $context) ? $context["transactions"] : (function () { throw new RuntimeError('Variable "transactions" does not exist.', 131, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 132
                yield "                ";
                $context["isOut"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 132), "value", [], "any", false, false, false, 132) == "RETRAIT") || (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 132), "value", [], "any", false, false, false, 132) == "VIREMENT") && CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 132)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 132), "idCompte", [], "any", false, false, false, 132) == CoreExtension::getAttribute($this->env, $this->source, (isset($context["compte"]) || array_key_exists("compte", $context) ? $context["compte"] : (function () { throw new RuntimeError('Variable "compte" does not exist.', 132, $this->source); })()), "idCompte", [], "any", false, false, false, 132))));
                // line 133
                yield "                <tr>
                    <td>
                        <div class=\"d-flex align-items-center\" style=\"gap:10px;\">
                            <div style=\"width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;
                                ";
                // line 137
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 137), "value", [], "any", false, false, false, 137) == "VIREMENT")) {
                    yield "background:#E7EDFF;color:var(--primary);
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 138
$context["t"], "type", [], "any", false, false, false, 138), "value", [], "any", false, false, false, 138) == "RETRAIT")) {
                    yield "background:#FFE8EB;color:#dc2626;
                                ";
                } else {
                    // line 139
                    yield "background:#E0F8EF;color:#16a34a;";
                }
                yield "\">
                                ";
                // line 140
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 140), "value", [], "any", false, false, false, 140) == "VIREMENT")) {
                    yield "<i class=\"fas fa-exchange-alt\"></i>
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 141
$context["t"], "type", [], "any", false, false, false, 141), "value", [], "any", false, false, false, 141) == "RETRAIT")) {
                    yield "<i class=\"fas fa-arrow-up\"></i>
                                ";
                } else {
                    // line 142
                    yield "<i class=\"fas fa-arrow-down\"></i>";
                }
                // line 143
                yield "                            </div>
                            <div>
                                <div style=\"font-weight:600;font-size:13px;\">";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 145), "value", [], "any", false, false, false, 145), "html", null, true);
                yield "</div>
                                ";
                // line 146
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "type", [], "any", false, false, false, 146), "value", [], "any", false, false, false, 146) == "VIREMENT")) {
                    // line 147
                    yield "                                    <div style=\"font-size:11px;color:var(--text-secondary);\">
                                        ";
                    // line 148
                    if ((($tmp = (isset($context["isOut"]) || array_key_exists("isOut", $context) ? $context["isOut"] : (function () { throw new RuntimeError('Variable "isOut" does not exist.', 148, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 149
                        yield "                                            Vers ";
                        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteDestination", [], "any", false, false, false, 149)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteDestination", [], "any", false, false, false, 149), "numeroCompte", [], "any", false, false, false, 149), "html", null, true)) : ("-"));
                        yield "
                                        ";
                    } else {
                        // line 151
                        yield "                                            De ";
                        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 151)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["t"], "compteSource", [], "any", false, false, false, 151), "numeroCompte", [], "any", false, false, false, 151), "html", null, true)) : ("-"));
                        yield "
                                        ";
                    }
                    // line 153
                    yield "                                    </div>
                                ";
                }
                // line 155
                yield "                            </div>
                        </div>
                    </td>
                    <td style=\"color:var(--text-secondary);font-size:13px;\">";
                // line 158
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", true, true, false, 158) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 158)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "description", [], "any", false, false, false, 158), "html", null, true)) : ("-"));
                yield "</td>
                    <td style=\"font-size:13px;white-space:nowrap;\">";
                // line 159
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "dateCreation", [], "any", false, false, false, 159), "d/m/Y"), "html", null, true);
                yield "<br><small style=\"color:var(--text-secondary);\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "dateCreation", [], "any", false, false, false, 159), "H:i"), "html", null, true);
                yield "</small></td>
                    <td style=\"text-align:right;font-weight:700;font-size:14px;color:";
                // line 160
                yield (((($tmp = (isset($context["isOut"]) || array_key_exists("isOut", $context) ? $context["isOut"] : (function () { throw new RuntimeError('Variable "isOut" does not exist.', 160, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("#dc2626") : ("#16a34a"));
                yield ";\">
                        ";
                // line 161
                yield (((($tmp = (isset($context["isOut"]) || array_key_exists("isOut", $context) ? $context["isOut"] : (function () { throw new RuntimeError('Variable "isOut" does not exist.', 161, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("-") : ("+"));
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "montant", [], "any", false, false, false, 161), 2, ",", " "), "html", null, true);
                yield " DT
                    </td>
                    <td>
                        <a href=\"";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_receipt", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["t"], "idTransaction", [], "any", false, false, false, 164)]), "html", null, true);
                yield "\" class=\"btn-action\" title=\"Telecharger le recu\" style=\"color:var(--primary);\">
                            <i class=\"fas fa-file-pdf\"></i>
                        </a>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['t'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 173
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucune transaction trouvee</p>
        </div>
        ";
        }
        // line 178
        yield "    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 182
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

        // line 183
        yield "<script>
function toggleDestinationField() {
    var typeField = document.getElementById('txnType');
    var destinationBox = document.getElementById('destBox');
    var destinationInput = document.querySelector('#transactionForm [name=\"destination\"]');

    if (!typeField || !destinationBox || !destinationInput) {
        return;
    }

    var isTransfer = typeField.value === 'VIREMENT';
    destinationBox.style.display = isTransfer ? 'block' : 'none';
    destinationInput.required = isTransfer;

    if (!isTransfer) {
        destinationInput.classList.remove('input-error');
        var errorEl = document.querySelector('#transactionForm [data-error-for=\"destination\"]');
        if (errorEl) {
            errorEl.textContent = '';
            errorEl.classList.remove('is-visible');
        }
    }
}

function getTransactionValidationMessage(field) {
    if (field.validity.valueMissing) {
        if (field.name === 'destination') {
            return 'Le compte destinataire est obligatoire.';
        }
        return 'Ce champ est obligatoire.';
    }
    if (field.validity.rangeUnderflow) {
        return 'Le montant doit etre positif.';
    }
    return '';
}

function validateTransactionField(field, form) {
    var errorEl = form.querySelector('[data-error-for=\"' + field.name + '\"]');
    if (!errorEl) {
        return true;
    }

    var isValid = field.checkValidity();
    var message = isValid ? '' : getTransactionValidationMessage(field);

    field.classList.toggle('input-error', !isValid);
    errorEl.textContent = message;
    errorEl.classList.toggle('is-visible', !isValid);

    return isValid;
}

var transactionForm = document.getElementById('transactionForm');
var transactionFields = transactionForm ? transactionForm.querySelectorAll('input[name], select[name]') : [];

if (transactionForm) {
    transactionFields.forEach(function(field) {
        field.addEventListener(field.tagName === 'SELECT' ? 'change' : 'input', function() {
            validateTransactionField(field, transactionForm);
        });
    });

    transactionForm.addEventListener('submit', function(event) {
        var firstInvalid = null;
        var valid = true;

        transactionFields.forEach(function(field) {
            if (!validateTransactionField(field, transactionForm)) {
                valid = false;
                if (!firstInvalid) {
                    firstInvalid = field;
                }
            }
        });

        if (!valid) {
            event.preventDefault();
            if (firstInvalid) {
                firstInvalid.focus();
            }
        }
    });
}

document.getElementById('txnType').addEventListener('change', function() {
    toggleDestinationField();
    if (transactionForm) {
        validateTransactionField(this, transactionForm);
    }
});

toggleDestinationField();
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
        return "client/transaction/index.html.twig";
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
        return array (  477 => 183,  464 => 182,  451 => 178,  444 => 173,  439 => 170,  427 => 164,  420 => 161,  416 => 160,  410 => 159,  406 => 158,  401 => 155,  397 => 153,  391 => 151,  385 => 149,  383 => 148,  380 => 147,  378 => 146,  374 => 145,  370 => 143,  367 => 142,  362 => 141,  358 => 140,  353 => 139,  348 => 138,  344 => 137,  338 => 133,  335 => 132,  331 => 131,  318 => 120,  316 => 119,  307 => 113,  303 => 112,  298 => 110,  294 => 109,  290 => 108,  286 => 107,  281 => 105,  277 => 104,  273 => 103,  267 => 99,  231 => 66,  224 => 61,  210 => 49,  208 => 48,  201 => 44,  195 => 41,  189 => 38,  178 => 32,  174 => 31,  170 => 29,  157 => 28,  126 => 6,  113 => 5,  90 => 3,  67 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'client/base.html.twig' %}
{% block title %}Mes Transactions - UniBank+{% endblock %}
{% block page_title %}Mes Transactions{% endblock %}

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
<div class=\"d-flex align-items-center justify-content-between mb-4\" style=\"flex-wrap:wrap;gap:15px;\">
    <div>
        <h4 style=\"font-weight:700;color:var(--primary-dark);margin:0;\">Solde: <span style=\"color:var(--success);\">{{ compte.solde|number_format(2, ',', ' ') }} DT</span></h4>
        <small style=\"color:var(--text-secondary);\">{{ compte.numeroCompte }} - {{ compte.typeCompte.value }}</small>
    </div>
</div>

<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-exchange-alt\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Virements</div><div class=\"stat-value\">{{ stats.virements }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon red\"><i class=\"fas fa-arrow-up\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Retraits</div><div class=\"stat-value\">{{ stats.retraits }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-arrow-down\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Depots</div><div class=\"stat-value\">{{ stats.depots }}</div></div></div>
    </div>
</div>

{% if not compte.estActif %}
<div class=\"admin-card mb-4\">
    <div class=\"card-body\" style=\"padding:30px;\">
        <div style=\"background:#FFF5E6;border-radius:12px;padding:20px;display:flex;align-items:center;gap:15px;\">
            <i class=\"fas fa-exclamation-triangle\" style=\"font-size:24px;color:var(--warning);\"></i>
            <div>
                <div style=\"font-weight:700;color:var(--primary-dark);\">Compte desactive</div>
                <div style=\"color:var(--text-secondary);font-size:13px;\">Votre compte est actuellement desactive. Vous ne pouvez pas effectuer de transactions. Contactez le support.</div>
            </div>
        </div>
    </div>
</div>
{% else %}
<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-plus-circle mr-2\" style=\"color:var(--primary);\"></i>Nouvelle transaction</h5>
    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        <form method=\"post\" action=\"{{ path('app_client_transaction_submit') }}\" id=\"transactionForm\" novalidate data-inline-validate>
            <div class=\"row\" style=\"display:flex;gap:15px;flex-wrap:wrap;align-items:flex-end;\">
                <div style=\"flex:1;min-width:150px;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Type</label>
                    <select name=\"type\" id=\"txnType\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                        <option value=\"\">Choisir...</option>
                        <option value=\"VIREMENT\">Virement</option>
                        <option value=\"RETRAIT\">Retrait</option>
                    </select>
                    <div class=\"field-error\" data-error-for=\"type\"></div>
                </div>
                <div style=\"flex:1;min-width:150px;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant (DT)</label>
                    <input type=\"number\" name=\"montant\" step=\"0.01\" min=\"0.01\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"0.00\">
                    <div class=\"field-error\" data-error-for=\"montant\"></div>
                </div>
                <div id=\"destBox\" style=\"flex:1;min-width:180px;display:none;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Compte destinataire</label>
                    <input type=\"text\" name=\"destination\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"UB...\">
                    <div class=\"field-error\" data-error-for=\"destination\"></div>
                </div>
                <div style=\"flex:1;min-width:180px;\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Description</label>
                    <input type=\"text\" name=\"description\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"Motif (optionnel)\">
                </div>
                <div>
                    <button type=\"submit\" class=\"btn-admin primary\" style=\"height:44px;\">Effectuer</button>
                </div>
            </div>
        </form>
    </div>
</div>
{% endif %}

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-history mr-2\" style=\"color:var(--primary);\"></i>Historique</h5>
        <form method=\"get\" action=\"{{ path('app_client_transactions') }}\" id=\"filterForm\" class=\"filter-bar\">
            <input type=\"date\" name=\"from\" value=\"{{ dateFrom }}\" onchange=\"this.form.submit()\" style=\"width:140px;\">
            <input type=\"date\" name=\"to\" value=\"{{ dateTo }}\" onchange=\"this.form.submit()\" style=\"width:140px;\">
            <select name=\"type\" onchange=\"this.form.submit()\">
                <option value=\"all\" {{ type == 'all' ? 'selected' : '' }}>Tous</option>
                <option value=\"VIREMENT\" {{ type == 'VIREMENT' ? 'selected' : '' }}>Virements</option>
                <option value=\"RETRAIT\" {{ type == 'RETRAIT' ? 'selected' : '' }}>Retraits</option>
                <option value=\"DEPOT\" {{ type == 'DEPOT' ? 'selected' : '' }}>Depots</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:180px;\">
            <a href=\"{{ path('app_client_extrait', {from: dateFrom, to: dateTo}) }}\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\" title=\"Telecharger l'extrait PDF\">
                <i class=\"fas fa-file-pdf mr-1\"></i>Extrait PDF
            </a>
        </form>
    </div>
    <div class=\"card-body\">
        {% if transactions|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th style=\"text-align:right;\">Montant</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {% for t in transactions %}
                {% set isOut = (t.type.value == 'RETRAIT') or (t.type.value == 'VIREMENT' and t.compteSource and t.compteSource.idCompte == compte.idCompte) %}
                <tr>
                    <td>
                        <div class=\"d-flex align-items-center\" style=\"gap:10px;\">
                            <div style=\"width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;
                                {% if t.type.value == 'VIREMENT' %}background:#E7EDFF;color:var(--primary);
                                {% elseif t.type.value == 'RETRAIT' %}background:#FFE8EB;color:#dc2626;
                                {% else %}background:#E0F8EF;color:#16a34a;{% endif %}\">
                                {% if t.type.value == 'VIREMENT' %}<i class=\"fas fa-exchange-alt\"></i>
                                {% elseif t.type.value == 'RETRAIT' %}<i class=\"fas fa-arrow-up\"></i>
                                {% else %}<i class=\"fas fa-arrow-down\"></i>{% endif %}
                            </div>
                            <div>
                                <div style=\"font-weight:600;font-size:13px;\">{{ t.type.value }}</div>
                                {% if t.type.value == 'VIREMENT' %}
                                    <div style=\"font-size:11px;color:var(--text-secondary);\">
                                        {% if isOut %}
                                            Vers {{ t.compteDestination ? t.compteDestination.numeroCompte : '-' }}
                                        {% else %}
                                            De {{ t.compteSource ? t.compteSource.numeroCompte : '-' }}
                                        {% endif %}
                                    </div>
                                {% endif %}
                            </div>
                        </div>
                    </td>
                    <td style=\"color:var(--text-secondary);font-size:13px;\">{{ t.description ?? '-' }}</td>
                    <td style=\"font-size:13px;white-space:nowrap;\">{{ t.dateCreation|date('d/m/Y') }}<br><small style=\"color:var(--text-secondary);\">{{ t.dateCreation|date('H:i') }}</small></td>
                    <td style=\"text-align:right;font-weight:700;font-size:14px;color:{{ isOut ? '#dc2626' : '#16a34a' }};\">
                        {{ isOut ? '-' : '+' }}{{ t.montant|number_format(2, ',', ' ') }} DT
                    </td>
                    <td>
                        <a href=\"{{ path('app_client_receipt', {id: t.idTransaction}) }}\" class=\"btn-action\" title=\"Telecharger le recu\" style=\"color:var(--primary);\">
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
            <p>Aucune transaction trouvee</p>
        </div>
        {% endif %}
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
function toggleDestinationField() {
    var typeField = document.getElementById('txnType');
    var destinationBox = document.getElementById('destBox');
    var destinationInput = document.querySelector('#transactionForm [name=\"destination\"]');

    if (!typeField || !destinationBox || !destinationInput) {
        return;
    }

    var isTransfer = typeField.value === 'VIREMENT';
    destinationBox.style.display = isTransfer ? 'block' : 'none';
    destinationInput.required = isTransfer;

    if (!isTransfer) {
        destinationInput.classList.remove('input-error');
        var errorEl = document.querySelector('#transactionForm [data-error-for=\"destination\"]');
        if (errorEl) {
            errorEl.textContent = '';
            errorEl.classList.remove('is-visible');
        }
    }
}

function getTransactionValidationMessage(field) {
    if (field.validity.valueMissing) {
        if (field.name === 'destination') {
            return 'Le compte destinataire est obligatoire.';
        }
        return 'Ce champ est obligatoire.';
    }
    if (field.validity.rangeUnderflow) {
        return 'Le montant doit etre positif.';
    }
    return '';
}

function validateTransactionField(field, form) {
    var errorEl = form.querySelector('[data-error-for=\"' + field.name + '\"]');
    if (!errorEl) {
        return true;
    }

    var isValid = field.checkValidity();
    var message = isValid ? '' : getTransactionValidationMessage(field);

    field.classList.toggle('input-error', !isValid);
    errorEl.textContent = message;
    errorEl.classList.toggle('is-visible', !isValid);

    return isValid;
}

var transactionForm = document.getElementById('transactionForm');
var transactionFields = transactionForm ? transactionForm.querySelectorAll('input[name], select[name]') : [];

if (transactionForm) {
    transactionFields.forEach(function(field) {
        field.addEventListener(field.tagName === 'SELECT' ? 'change' : 'input', function() {
            validateTransactionField(field, transactionForm);
        });
    });

    transactionForm.addEventListener('submit', function(event) {
        var firstInvalid = null;
        var valid = true;

        transactionFields.forEach(function(field) {
            if (!validateTransactionField(field, transactionForm)) {
                valid = false;
                if (!firstInvalid) {
                    firstInvalid = field;
                }
            }
        });

        if (!valid) {
            event.preventDefault();
            if (firstInvalid) {
                firstInvalid.focus();
            }
        }
    });
}

document.getElementById('txnType').addEventListener('change', function() {
    toggleDestinationField();
    if (transactionForm) {
        validateTransactionField(this, transactionForm);
    }
});

toggleDestinationField();
</script>
{% endblock %}
", "client/transaction/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\client\\transaction\\index.html.twig");
    }
}
