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

/* admin/credit/index.html.twig */
class __TwigTemplate_dd3cb3aa53a241605165af75f48d5de8 extends Template
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
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/credit/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/credit/index.html.twig"));

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

        yield "Gestion Credits - Admin UniBank+";
        
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

        yield "Gestion Credits";
        
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
        yield "<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-clock\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">En attente</div><div class=\"stat-value\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 31, $this->source); })()), "pending", [], "any", false, false, false, 31), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-list\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total credits</div><div class=\"stat-value\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 34, $this->source); })()), "total", [], "any", false, false, false, 34), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-coins\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Montant approuve</div><div class=\"stat-value\" style=\"font-size:16px;\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 37, $this->source); })()), "totalAmount", [], "any", false, false, false, 37), 2, ",", " "), "html", null, true);
        yield " DT</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-hand-holding-usd mr-2\" style=\"color:var(--primary);\"></i>Credits (";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 43, $this->source); })())), "html", null, true);
        yield ")</h5>
        <form method=\"get\" action=\"";
        // line 44
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credits");
        yield "\" class=\"filter-bar\">
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" ";
        // line 46
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 46, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les statuts</option>
                <option value=\"PENDING\" ";
        // line 47
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 47, $this->source); })()) == "PENDING")) ? ("selected") : (""));
        yield ">En attente</option>
                <option value=\"APPROVED\" ";
        // line 48
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 48, $this->source); })()) == "APPROVED")) ? ("selected") : (""));
        yield ">Approuve</option>
                <option value=\"CONTRACT_PENDING\" ";
        // line 49
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 49, $this->source); })()) == "CONTRACT_PENDING")) ? ("selected") : (""));
        yield ">Contrat en attente</option>
                <option value=\"REJECTED\" ";
        // line 50
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 50, $this->source); })()) == "REJECTED")) ? ("selected") : (""));
        yield ">Rejete</option>
                <option value=\"ACTIVE\" ";
        // line 51
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 51, $this->source); })()) == "ACTIVE")) ? ("selected") : (""));
        yield ">Actif</option>
                <option value=\"COMPLETED\" ";
        // line 52
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 52, $this->source); })()) == "COMPLETED")) ? ("selected") : (""));
        yield ">Termine</option>
                <option value=\"CANCELLED\" ";
        // line 53
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 53, $this->source); })()) == "CANCELLED")) ? ("selected") : (""));
        yield ">Annule</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher client, montant...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:200px;\">
            ";
        // line 56
        if ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 56, $this->source); })()) != "all") || (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 56, $this->source); })()))) {
            // line 57
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credits");
            yield "\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            ";
        }
        // line 59
        yield "        </form>
    </div>
    <div class=\"card-body\">
        ";
        // line 62
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 62, $this->source); })())) > 0)) {
            // line 63
            yield "        <table class=\"admin-table\">
            <thead>
                <tr><th>Client</th><th>Montant</th><th>Duree</th><th>Mensualite</th><th>Salaire</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                ";
            // line 68
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 68, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 69
                yield "                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">";
                // line 72
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 72), "prenom", [], "any", false, false, false, 72)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 72), "nom", [], "any", false, false, false, 72)), "html", null, true);
                yield "</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">";
                // line 74
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 74), "prenom", [], "any", false, false, false, 74), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 74), "nom", [], "any", false, false, false, 74), "html", null, true);
                yield "</div>
                                <div class=\"user-email\">";
                // line 75
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 75), "email", [], "any", false, false, false, 75), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"font-weight:700;\">";
                // line 79
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 79), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td>";
                // line 80
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dureeEnMois", [], "any", false, false, false, 80), "html", null, true);
                yield " mois</td>
                    <td style=\"color:var(--success);font-weight:600;\">";
                // line 81
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "mensualite", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "mensualite", [], "any", false, false, false, 81), 2, ",", " "), "html", null, true)) : ("-"));
                yield " DT</td>
                    <td>";
                // line 82
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "salaireMensuel", [], "any", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "salaireMensuel", [], "any", false, false, false, 82), 2, ",", " "), "html", null, true)) : ("-"));
                yield " DT</td>
                    <td>
                        ";
                // line 84
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 84), "value", [], "any", false, false, false, 84) == "PENDING")) {
                    // line 85
                    yield "                            <span class=\"badge-status pending\">En attente</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 86
$context["c"], "statut", [], "any", false, false, false, 86), "value", [], "any", false, false, false, 86) == "APPROVED")) {
                    // line 87
                    yield "                            <span class=\"badge-status approved\">Approuve</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 88
$context["c"], "statut", [], "any", false, false, false, 88), "value", [], "any", false, false, false, 88) == "CONTRACT_PENDING")) {
                    // line 89
                    yield "                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">Contrat en cours</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 90
$context["c"], "statut", [], "any", false, false, false, 90), "value", [], "any", false, false, false, 90) == "REJECTED")) {
                    // line 91
                    yield "                            <span class=\"badge-status rejected\">Rejete</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 92
$context["c"], "statut", [], "any", false, false, false, 92), "value", [], "any", false, false, false, 92) == "ACTIVE")) {
                    // line 93
                    yield "                            <span class=\"badge-status active\">Actif</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 94
$context["c"], "statut", [], "any", false, false, false, 94), "value", [], "any", false, false, false, 94) == "COMPLETED")) {
                    // line 95
                    yield "                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Termine</span>
                        ";
                } else {
                    // line 97
                    yield "                            <span class=\"badge-status suspended\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 97), "value", [], "any", false, false, false, 97), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 99
                yield "                    </td>
                    <td style=\"font-size:13px;\">";
                // line 100
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCreation", [], "any", false, false, false, 100), "d/m/Y"), "html", null, true);
                yield "</td>
                    <td style=\"white-space:nowrap;\">
                        ";
                // line 102
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 102), "value", [], "any", false, false, false, 102) == "PENDING")) {
                    // line 103
                    yield "                            <button type=\"button\" class=\"btn-action approve\" title=\"Approuver\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_approve", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 103)]), "html", null, true);
                    yield "', {type:'approve', title:'Approuver le credit', message:'Approuver le credit de ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 103), 2, ",", " "), "html", null, true);
                    yield " DT pour ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 103), "prenom", [], "any", false, false, false, 103), "js"), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 103), "nom", [], "any", false, false, false, 103), "js"), "html", null, true);
                    yield " ?', btnText:'Approuver'})\">
                                <i class=\"fas fa-check\"></i>
                            </button>
                            <button type=\"button\" class=\"btn-action reject\" title=\"Rejeter\" onclick=\"\$('#rejectModal";
                    // line 106
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 106), "html", null, true);
                    yield "').modal('show')\">
                                <i class=\"fas fa-times\"></i>
                            </button>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 109
$context["c"], "statut", [], "any", false, false, false, 109), "value", [], "any", false, false, false, 109) == "CONTRACT_PENDING")) {
                    // line 110
                    yield "                            <button type=\"button\" class=\"btn-action approve\" title=\"Finaliser contrat\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_finalize", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 110)]), "html", null, true);
                    yield "', {type:'approve', title:'Finaliser le contrat', message:'Generer le contrat et activer le credit ?', btnText:'Finaliser'})\">
                                <i class=\"fas fa-file-contract\"></i>
                            </button>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 113
$context["c"], "statut", [], "any", false, false, false, 113), "value", [], "any", false, false, false, 113) == "ACTIVE")) {
                    // line 114
                    yield "                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 114)]), "html", null, true);
                    yield "\" class=\"btn-action\" title=\"Telecharger contrat PDF\" style=\"color:var(--primary);\">
                                <i class=\"fas fa-file-pdf\"></i>
                            </a>
                        ";
                }
                // line 118
                yield "                    </td>
                </tr>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 122
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 125
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucun credit trouve</p>
        </div>
        ";
        }
        // line 130
        yield "    </div>
</div>

";
        // line 133
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 133, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 134
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 134), "value", [], "any", false, false, false, 134) == "PENDING")) {
                // line 135
                yield "<div class=\"modal fade modal-admin\" id=\"rejectModal";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 135), "html", null, true);
                yield "\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:#dc2626;padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-times-circle mr-2\"></i>Rejeter le credit</h5>
            </div>
            <form method=\"post\" action=\"";
                // line 141
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_reject", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 141)]), "html", null, true);
                yield "\" novalidate data-reject-form>
                <div style=\"padding:25px;\">
                    <p style=\"color:var(--text-secondary);font-size:14px;\">Credit de <strong>";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 143), 2, ",", " "), "html", null, true);
                yield " DT</strong> pour ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 143), "prenom", [], "any", false, false, false, 143), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 143), "nom", [], "any", false, false, false, 143), "html", null, true);
                yield "</p>
                    <div class=\"form-group\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif du rejet (obligatoire)</label>
                        <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"3\" required placeholder=\"Expliquez la raison du rejet...\"></textarea>
                        <div class=\"field-error\" data-error-for=\"motif\"></div>
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin danger\">Rejeter</button>
                </div>
            </form>
        </div>
    </div>
</div>
";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 162
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

        // line 163
        yield "<script>
document.querySelectorAll('form[data-reject-form]').forEach(function(form) {
    var motifField = form.querySelector('[name=\"motif\"]');
    var errorEl = form.querySelector('[data-error-for=\"motif\"]');

    function validateRejectField() {
        var isValid = motifField.checkValidity();
        var message = '';

        if (!isValid) {
            if (motifField.validity.valueMissing) {
                message = 'Le motif du rejet est obligatoire.';
            } else {
                message = 'Le motif saisi est invalide.';
            }
        }

        motifField.classList.toggle('input-error', !isValid);
        errorEl.textContent = message;
        errorEl.classList.toggle('is-visible', !isValid);

        return isValid;
    }

    motifField.addEventListener('input', validateRejectField);

    form.addEventListener('submit', function(event) {
        if (!validateRejectField()) {
            event.preventDefault();
            motifField.focus();
        }
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
        return "admin/credit/index.html.twig";
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
        return array (  489 => 163,  476 => 162,  440 => 143,  435 => 141,  425 => 135,  423 => 134,  419 => 133,  414 => 130,  407 => 125,  402 => 122,  393 => 118,  385 => 114,  383 => 113,  376 => 110,  374 => 109,  368 => 106,  355 => 103,  353 => 102,  348 => 100,  345 => 99,  339 => 97,  335 => 95,  333 => 94,  330 => 93,  328 => 92,  325 => 91,  323 => 90,  320 => 89,  318 => 88,  315 => 87,  313 => 86,  310 => 85,  308 => 84,  303 => 82,  299 => 81,  295 => 80,  291 => 79,  284 => 75,  278 => 74,  272 => 72,  267 => 69,  263 => 68,  256 => 63,  254 => 62,  249 => 59,  243 => 57,  241 => 56,  237 => 55,  232 => 53,  228 => 52,  224 => 51,  220 => 50,  216 => 49,  212 => 48,  208 => 47,  204 => 46,  199 => 44,  195 => 43,  186 => 37,  180 => 34,  174 => 31,  170 => 29,  157 => 28,  126 => 6,  113 => 5,  90 => 3,  67 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block title %}Gestion Credits - Admin UniBank+{% endblock %}
{% block page_title %}Gestion Credits{% endblock %}

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
<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-clock\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">En attente</div><div class=\"stat-value\">{{ stats.pending }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-list\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total credits</div><div class=\"stat-value\">{{ stats.total }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-coins\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Montant approuve</div><div class=\"stat-value\" style=\"font-size:16px;\">{{ stats.totalAmount|number_format(2, ',', ' ') }} DT</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-hand-holding-usd mr-2\" style=\"color:var(--primary);\"></i>Credits ({{ credits|length }})</h5>
        <form method=\"get\" action=\"{{ path('app_admin_credits') }}\" class=\"filter-bar\">
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" {{ status == 'all' ? 'selected' : '' }}>Tous les statuts</option>
                <option value=\"PENDING\" {{ status == 'PENDING' ? 'selected' : '' }}>En attente</option>
                <option value=\"APPROVED\" {{ status == 'APPROVED' ? 'selected' : '' }}>Approuve</option>
                <option value=\"CONTRACT_PENDING\" {{ status == 'CONTRACT_PENDING' ? 'selected' : '' }}>Contrat en attente</option>
                <option value=\"REJECTED\" {{ status == 'REJECTED' ? 'selected' : '' }}>Rejete</option>
                <option value=\"ACTIVE\" {{ status == 'ACTIVE' ? 'selected' : '' }}>Actif</option>
                <option value=\"COMPLETED\" {{ status == 'COMPLETED' ? 'selected' : '' }}>Termine</option>
                <option value=\"CANCELLED\" {{ status == 'CANCELLED' ? 'selected' : '' }}>Annule</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher client, montant...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:200px;\">
            {% if status != 'all' or search %}
                <a href=\"{{ path('app_admin_credits') }}\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            {% endif %}
        </form>
    </div>
    <div class=\"card-body\">
        {% if credits|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr><th>Client</th><th>Montant</th><th>Duree</th><th>Mensualite</th><th>Salaire</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                {% for c in credits %}
                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">{{ c.client.prenom|first }}{{ c.client.nom|first }}</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">{{ c.client.prenom }} {{ c.client.nom }}</div>
                                <div class=\"user-email\">{{ c.client.email }}</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"font-weight:700;\">{{ c.montant|number_format(2, ',', ' ') }} DT</td>
                    <td>{{ c.dureeEnMois }} mois</td>
                    <td style=\"color:var(--success);font-weight:600;\">{{ c.mensualite ? c.mensualite|number_format(2, ',', ' ') : '-' }} DT</td>
                    <td>{{ c.salaireMensuel ? c.salaireMensuel|number_format(2, ',', ' ') : '-' }} DT</td>
                    <td>
                        {% if c.statut.value == 'PENDING' %}
                            <span class=\"badge-status pending\">En attente</span>
                        {% elseif c.statut.value == 'APPROVED' %}
                            <span class=\"badge-status approved\">Approuve</span>
                        {% elseif c.statut.value == 'CONTRACT_PENDING' %}
                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">Contrat en cours</span>
                        {% elseif c.statut.value == 'REJECTED' %}
                            <span class=\"badge-status rejected\">Rejete</span>
                        {% elseif c.statut.value == 'ACTIVE' %}
                            <span class=\"badge-status active\">Actif</span>
                        {% elseif c.statut.value == 'COMPLETED' %}
                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Termine</span>
                        {% else %}
                            <span class=\"badge-status suspended\">{{ c.statut.value }}</span>
                        {% endif %}
                    </td>
                    <td style=\"font-size:13px;\">{{ c.dateCreation|date('d/m/Y') }}</td>
                    <td style=\"white-space:nowrap;\">
                        {% if c.statut.value == 'PENDING' %}
                            <button type=\"button\" class=\"btn-action approve\" title=\"Approuver\" onclick=\"confirmSubmit('{{ path('app_admin_credit_approve', {id: c.idCredit}) }}', {type:'approve', title:'Approuver le credit', message:'Approuver le credit de {{ c.montant|number_format(2, ',', ' ') }} DT pour {{ c.client.prenom|e('js') }} {{ c.client.nom|e('js') }} ?', btnText:'Approuver'})\">
                                <i class=\"fas fa-check\"></i>
                            </button>
                            <button type=\"button\" class=\"btn-action reject\" title=\"Rejeter\" onclick=\"\$('#rejectModal{{ c.idCredit }}').modal('show')\">
                                <i class=\"fas fa-times\"></i>
                            </button>
                        {% elseif c.statut.value == 'CONTRACT_PENDING' %}
                            <button type=\"button\" class=\"btn-action approve\" title=\"Finaliser contrat\" onclick=\"confirmSubmit('{{ path('app_admin_credit_finalize', {id: c.idCredit}) }}', {type:'approve', title:'Finaliser le contrat', message:'Generer le contrat et activer le credit ?', btnText:'Finaliser'})\">
                                <i class=\"fas fa-file-contract\"></i>
                            </button>
                        {% elseif c.statut.value == 'ACTIVE' %}
                            <a href=\"{{ path('app_admin_credit_pdf', {id: c.idCredit}) }}\" class=\"btn-action\" title=\"Telecharger contrat PDF\" style=\"color:var(--primary);\">
                                <i class=\"fas fa-file-pdf\"></i>
                            </a>
                        {% endif %}
                    </td>
                </tr>

                {% endfor %}
            </tbody>
        </table>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucun credit trouve</p>
        </div>
        {% endif %}
    </div>
</div>

{% for c in credits %}
{% if c.statut.value == 'PENDING' %}
<div class=\"modal fade modal-admin\" id=\"rejectModal{{ c.idCredit }}\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:#dc2626;padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-times-circle mr-2\"></i>Rejeter le credit</h5>
            </div>
            <form method=\"post\" action=\"{{ path('app_admin_credit_reject', {id: c.idCredit}) }}\" novalidate data-reject-form>
                <div style=\"padding:25px;\">
                    <p style=\"color:var(--text-secondary);font-size:14px;\">Credit de <strong>{{ c.montant|number_format(2, ',', ' ') }} DT</strong> pour {{ c.client.prenom }} {{ c.client.nom }}</p>
                    <div class=\"form-group\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif du rejet (obligatoire)</label>
                        <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"3\" required placeholder=\"Expliquez la raison du rejet...\"></textarea>
                        <div class=\"field-error\" data-error-for=\"motif\"></div>
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin danger\">Rejeter</button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endif %}
{% endfor %}
{% endblock %}

{% block javascripts %}
<script>
document.querySelectorAll('form[data-reject-form]').forEach(function(form) {
    var motifField = form.querySelector('[name=\"motif\"]');
    var errorEl = form.querySelector('[data-error-for=\"motif\"]');

    function validateRejectField() {
        var isValid = motifField.checkValidity();
        var message = '';

        if (!isValid) {
            if (motifField.validity.valueMissing) {
                message = 'Le motif du rejet est obligatoire.';
            } else {
                message = 'Le motif saisi est invalide.';
            }
        }

        motifField.classList.toggle('input-error', !isValid);
        errorEl.textContent = message;
        errorEl.classList.toggle('is-visible', !isValid);

        return isValid;
    }

    motifField.addEventListener('input', validateRejectField);

    form.addEventListener('submit', function(event) {
        if (!validateRejectField()) {
            event.preventDefault();
            motifField.focus();
        }
    });
});
</script>
{% endblock %}
", "admin/credit/index.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/admin/credit/index.html.twig");
    }
}
