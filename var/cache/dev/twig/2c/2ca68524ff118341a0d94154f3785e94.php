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
class __TwigTemplate_df884cbe44938b25707fe4b20f040154 extends Template
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

        // line 30
        yield "<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        ";
        // line 33
        yield "        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-clock\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">En attente</div><div class=\"stat-value\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 33, $this->source); })()), "pending", [], "any", false, false, false, 33), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        ";
        // line 37
        yield "        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-list\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total credits</div><div class=\"stat-value\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 37, $this->source); })()), "total", [], "any", false, false, false, 37), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        ";
        // line 41
        yield "        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-coins\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Montant approuve</div><div class=\"stat-value\" style=\"font-size:16px;\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 41, $this->source); })()), "totalAmount", [], "any", false, false, false, 41), 2, ",", " "), "html", null, true);
        yield " DT</div></div></div>
    </div>
</div>

";
        // line 46
        yield "

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-hand-holding-usd mr-2\" style=\"color:var(--primary);\"></i>Credits (";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 50, $this->source); })())), "html", null, true);
        yield ")</h5>
        ";
        // line 52
        yield "        <form method=\"get\" action=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credits");
        yield "\" class=\"filter-bar\">
            ";
        // line 54
        yield "            <select name=\"status\" onchange=\"this.form.submit()\">
                ";
        // line 56
        yield "                <option value=\"all\" ";
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 56, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les statuts</option>
                <option value=\"PENDING\" ";
        // line 57
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 57, $this->source); })()) == "PENDING")) ? ("selected") : (""));
        yield ">En attente</option>
                <option value=\"APPROVED\" ";
        // line 58
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 58, $this->source); })()) == "APPROVED")) ? ("selected") : (""));
        yield ">Approuve</option>
                <option value=\"CONTRACT_PENDING\" ";
        // line 59
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 59, $this->source); })()) == "CONTRACT_PENDING")) ? ("selected") : (""));
        yield ">Contrat en attente</option>
                <option value=\"REJECTED\" ";
        // line 60
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 60, $this->source); })()) == "REJECTED")) ? ("selected") : (""));
        yield ">Rejete</option>
                <option value=\"ACTIVE\" ";
        // line 61
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 61, $this->source); })()) == "ACTIVE")) ? ("selected") : (""));
        yield ">Actif</option>
                <option value=\"COMPLETED\" ";
        // line 62
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 62, $this->source); })()) == "COMPLETED")) ? ("selected") : (""));
        yield ">Termine</option>
                ";
        // line 64
        yield "                <option value=\"CANCELLED\" ";
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 64, $this->source); })()) == "CANCELLED")) ? ("selected") : (""));
        yield ">Annule</option>
            </select>
            ";
        // line 67
        yield "            <input type=\"text\" name=\"q\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 67, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher client, montant...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:200px;\">
            ";
        // line 69
        yield "            ";
        if ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 69, $this->source); })()) != "all") || (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 69, $this->source); })()))) {
            // line 70
            yield "                ";
            // line 71
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credits");
            yield "\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            ";
        }
        // line 73
        yield "        </form>
    </div>

    ";
        // line 77
        yield "


    <div class=\"card-body\">
        ";
        // line 82
        yield "        ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 82, $this->source); })())) > 0)) {
            // line 83
            yield "        ";
            // line 84
            yield "        <table class=\"admin-table\">
            ";
            // line 86
            yield "            <thead>
                <tr><th>Client</th><th>Montant</th><th>Duree</th><th>Mensualite</th><th>Salaire</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                ";
            // line 90
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 90, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 91
                yield "                <tr>
                    ";
                // line 93
                yield "                    <td>
                        <div class=\"user-cell\">
                            ";
                // line 96
                yield "                            <div class=\"user-avatar\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 96), "prenom", [], "any", false, false, false, 96)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 96), "nom", [], "any", false, false, false, 96)), "html", null, true);
                yield "</div>
                            ";
                // line 98
                yield "                            <div class=\"user-details\">
                                ";
                // line 100
                yield "                                <div class=\"user-name\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 100), "prenom", [], "any", false, false, false, 100), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 100), "nom", [], "any", false, false, false, 100), "html", null, true);
                yield "</div>
                                ";
                // line 102
                yield "                                <div class=\"user-email\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 102), "email", [], "any", false, false, false, 102), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>

                    ";
                // line 108
                yield "                    <td style=\"font-weight:700;\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 108), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    ";
                // line 110
                yield "                    <td>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dureeEnMois", [], "any", false, false, false, 110), "html", null, true);
                yield " mois</td>
                    ";
                // line 112
                yield "                    <td style=\"color:var(--success);font-weight:600;\">";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "mensualite", [], "any", false, false, false, 112)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "mensualite", [], "any", false, false, false, 112), 2, ",", " "), "html", null, true)) : ("-"));
                yield " DT</td>
                    ";
                // line 114
                yield "                    <td>";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "salaireMensuel", [], "any", false, false, false, 114)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "salaireMensuel", [], "any", false, false, false, 114), 2, ",", " "), "html", null, true)) : ("-"));
                yield " DT</td>
                    ";
                // line 116
                yield "                    <td>
                        ";
                // line 117
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 117), "value", [], "any", false, false, false, 117) == "PENDING")) {
                    // line 118
                    yield "                            <span class=\"badge-status pending\">En attente</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 119
$context["c"], "statut", [], "any", false, false, false, 119), "value", [], "any", false, false, false, 119) == "APPROVED")) {
                    // line 120
                    yield "                            <span class=\"badge-status approved\">Approuve</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 121
$context["c"], "statut", [], "any", false, false, false, 121), "value", [], "any", false, false, false, 121) == "CONTRACT_PENDING")) {
                    // line 122
                    yield "                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">Contrat en cours</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 123
$context["c"], "statut", [], "any", false, false, false, 123), "value", [], "any", false, false, false, 123) == "REJECTED")) {
                    // line 124
                    yield "                            <span class=\"badge-status rejected\">Rejete</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 125
$context["c"], "statut", [], "any", false, false, false, 125), "value", [], "any", false, false, false, 125) == "ACTIVE")) {
                    // line 126
                    yield "                            <span class=\"badge-status active\">Actif</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 127
$context["c"], "statut", [], "any", false, false, false, 127), "value", [], "any", false, false, false, 127) == "COMPLETED")) {
                    // line 128
                    yield "                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Termine</span>
                        ";
                } else {
                    // line 130
                    yield "                            <span class=\"badge-status suspended\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 130), "value", [], "any", false, false, false, 130), "html", null, true);
                    yield "</span>
                        ";
                }
                // line 132
                yield "                    </td>
                    ";
                // line 134
                yield "                    <td style=\"font-size:13px;\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCreation", [], "any", false, false, false, 134), "d/m/Y"), "html", null, true);
                yield "</td>
                    ";
                // line 136
                yield "                    <td style=\"white-space:nowrap;\">
                        ";
                // line 137
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 137), "value", [], "any", false, false, false, 137) == "PENDING")) {
                    // line 138
                    yield "                            ";
                    // line 139
                    yield "                            <button type=\"button\" class=\"btn-action approve\" title=\"Approuver\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_approve", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 139)]), "html", null, true);
                    yield "', {type:'approve', title:'Approuver le credit', message:'Approuver le credit de ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 139), 2, ",", " "), "html", null, true);
                    yield " DT pour ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 139), "prenom", [], "any", false, false, false, 139), "js"), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 139), "nom", [], "any", false, false, false, 139), "js"), "html", null, true);
                    yield " ?', btnText:'Approuver'})\">
                                <i class=\"fas fa-check\"></i>
                            </button>
                            ";
                    // line 143
                    yield "                            <button type=\"button\" class=\"btn-action reject\" title=\"Rejeter\" onclick=\"\$('#rejectModal";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 143), "html", null, true);
                    yield "').modal('show')\">
                                <i class=\"fas fa-times\"></i>
                            </button>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 146
$context["c"], "statut", [], "any", false, false, false, 146), "value", [], "any", false, false, false, 146) == "CONTRACT_PENDING")) {
                    // line 147
                    yield "                            ";
                    // line 148
                    yield "                            <button type=\"button\" class=\"btn-action approve\" title=\"Finaliser contrat\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_finalize", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 148)]), "html", null, true);
                    yield "', {type:'approve', title:'Finaliser le contrat', message:'Generer le contrat et activer le credit ?', btnText:'Finaliser'})\">
                                <i class=\"fas fa-file-contract\"></i>
                            </button>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 151
$context["c"], "statut", [], "any", false, false, false, 151), "value", [], "any", false, false, false, 151) == "ACTIVE")) {
                    // line 152
                    yield "                            ";
                    // line 153
                    yield "                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 153)]), "html", null, true);
                    yield "\" class=\"btn-action\" title=\"Telecharger contrat PDF\" style=\"color:var(--primary);\">
                                <i class=\"fas fa-file-pdf\"></i>
                            </a>
                        ";
                }
                // line 157
                yield "                    </td>
                </tr>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 164
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-inbox\"></i>
            <p>Aucun credit trouve</p>
        </div>
        ";
        }
        // line 169
        yield "    </div>
</div>



";
        // line 175
        yield "


";
        // line 178
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 178, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 179
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 179), "value", [], "any", false, false, false, 179) == "PENDING")) {
                // line 180
                yield "<div class=\"modal fade modal-admin\" id=\"rejectModal";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 180), "html", null, true);
                yield "\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:#dc2626;padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-times-circle mr-2\"></i>Rejeter le credit</h5>
            </div>
            ";
                // line 187
                yield "            <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credit_reject", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 187)]), "html", null, true);
                yield "\" novalidate data-reject-form>
                <div style=\"padding:25px;\">
                    ";
                // line 190
                yield "                    <p style=\"color:var(--text-secondary);font-size:14px;\">Credit de <strong>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 190), 2, ",", " "), "html", null, true);
                yield " DT</strong> pour ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 190), "prenom", [], "any", false, false, false, 190), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "client", [], "any", false, false, false, 190), "nom", [], "any", false, false, false, 190), "html", null, true);
                yield "</p>
                    <div class=\"form-group\">
                        ";
                // line 193
                yield "                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif du rejet (obligatoire)</label>
                        ";
                // line 195
                yield "                        <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"3\" required placeholder=\"Expliquez la raison du rejet...\"></textarea>
                        ";
                // line 197
                yield "                        <div class=\"field-error\" data-error-for=\"motif\"></div>
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    ";
                // line 202
                yield "                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    ";
                // line 204
                yield "                    <button type=\"submit\" class=\"btn-admin danger\">Rejeter</button>
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

    // line 214
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

        // line 215
        yield "<script>
// Lorsque l'admin saisit ou envoie le motif de rejet, ce script verifie le champ avant l'envoi
// Cherche tous les formulaires de rejet presents sur la page
document.querySelectorAll('form[data-reject-form]').forEach(function(form) {
    // Recupere le champ motif dans le formulaire courant
    var motifField = form.querySelector('[name=\"motif\"]');
    // Recupere la zone ou afficher le message d'erreur
    var errorEl = form.querySelector('[data-error-for=\"motif\"]');

    // verifie si le champ motif est valide
    function validateRejectField() {
        // Utilise la validation HTML native du champ
        var isValid = motifField.checkValidity();
        // Message vide par defaut
        var message = '';

        // Si le champ n'est pas valide, on choisit le bon message
        if (!isValid) {
            // Cas ou le champ obligatoire est vide
            if (motifField.validity.valueMissing) {
                message = 'Le motif du rejet est obligatoire.';
            } else {
                // Cas d'une autre erreur de validation
                message = 'Le motif saisi est invalide.';
            }
        }

        // Ajoute ou retire la classe d'erreur sur le champ
        motifField.classList.toggle('input-error', !isValid);
        // Place le texte de l'erreur dans la zone prevue
        errorEl.textContent = message;
        // Affiche ou cache le bloc d'erreur selon l'etat du champ
        errorEl.classList.toggle('is-visible', !isValid);

        // Retourne true si le champ est valide, sinon false
        return isValid;
    }

    // Relance la validation pendant la saisie de l'admin
    motifField.addEventListener('input', validateRejectField);

    // Verifie le champ au moment de l'envoi du formulaire
    form.addEventListener('submit', function(event) {
        // Si le champ est invalide, on bloque l'envoi
        if (!validateRejectField()) {
            event.preventDefault();
            // Replace le curseur dans le champ motif
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
        return array (  559 => 215,  546 => 214,  524 => 204,  521 => 202,  515 => 197,  512 => 195,  509 => 193,  499 => 190,  493 => 187,  483 => 180,  481 => 179,  477 => 178,  472 => 175,  465 => 169,  458 => 164,  453 => 161,  444 => 157,  436 => 153,  434 => 152,  432 => 151,  425 => 148,  423 => 147,  421 => 146,  414 => 143,  401 => 139,  399 => 138,  397 => 137,  394 => 136,  389 => 134,  386 => 132,  380 => 130,  376 => 128,  374 => 127,  371 => 126,  369 => 125,  366 => 124,  364 => 123,  361 => 122,  359 => 121,  356 => 120,  354 => 119,  351 => 118,  349 => 117,  346 => 116,  341 => 114,  336 => 112,  331 => 110,  326 => 108,  317 => 102,  310 => 100,  307 => 98,  301 => 96,  297 => 93,  294 => 91,  290 => 90,  284 => 86,  281 => 84,  279 => 83,  276 => 82,  270 => 77,  265 => 73,  259 => 71,  257 => 70,  254 => 69,  249 => 67,  243 => 64,  239 => 62,  235 => 61,  231 => 60,  227 => 59,  223 => 58,  219 => 57,  214 => 56,  211 => 54,  206 => 52,  202 => 50,  196 => 46,  188 => 41,  181 => 37,  174 => 33,  170 => 30,  157 => 28,  126 => 6,  113 => 5,  90 => 3,  67 => 2,  44 => 1,);
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
{# Lorsque l'admin consulte la page, ce bloc affiche les statistiques principales des credits #}
<div class=\"row mb-4\" style=\"display:flex;gap:15px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        {# Nombre de credits en attente app controle w calc f repo #}
        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-clock\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">En attente</div><div class=\"stat-value\">{{ stats.pending }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        {# Nombre total de credits appl controle w calc f repo  #}
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-list\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total credits</div><div class=\"stat-value\">{{ stats.total }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:160px;\">
        {# Montant total des credits approuves appl controle w calc f repo  #}
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-coins\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Montant approuve</div><div class=\"stat-value\" style=\"font-size:16px;\">{{ stats.totalAmount|number_format(2, ',', ' ') }} DT</div></div></div>
    </div>
</div>

{# Lorsque l'admin veut filtrer ou rechercher des credits, il utilise ce bloc #}


<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-hand-holding-usd mr-2\" style=\"color:var(--primary);\"></i>Credits ({{ credits|length }})</h5>
        {# Formulaire GET pour filtrer et rechercher les credits aapl par path au controle #}
        <form method=\"get\" action=\"{{ path('app_admin_credits') }}\" class=\"filter-bar\">
            {# Liste des statuts disponibles pour le filtre #}
            <select name=\"status\" onchange=\"this.form.submit()\">
                {# Option pour afficher tous les statuts #}
                <option value=\"all\" {{ status == 'all' ? 'selected' : '' }}>Tous les statuts</option>
                <option value=\"PENDING\" {{ status == 'PENDING' ? 'selected' : '' }}>En attente</option>
                <option value=\"APPROVED\" {{ status == 'APPROVED' ? 'selected' : '' }}>Approuve</option>
                <option value=\"CONTRACT_PENDING\" {{ status == 'CONTRACT_PENDING' ? 'selected' : '' }}>Contrat en attente</option>
                <option value=\"REJECTED\" {{ status == 'REJECTED' ? 'selected' : '' }}>Rejete</option>
                <option value=\"ACTIVE\" {{ status == 'ACTIVE' ? 'selected' : '' }}>Actif</option>
                <option value=\"COMPLETED\" {{ status == 'COMPLETED' ? 'selected' : '' }}>Termine</option>
                {# Option pour filtrer les credits annules #}
                <option value=\"CANCELLED\" {{ status == 'CANCELLED' ? 'selected' : '' }}>Annule</option>
            </select>
            {# Champ texte pour rechercher un client ou un montant change lorsque utilise chang montant #}
            <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher client, montant...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:200px;\">
            {# Affiche le bouton reset seulement s'il y a un filtre ou une recherche #}
            {% if status != 'all' or search %}
                {# Lien pour revenir a la liste complete des credits #}
                <a href=\"{{ path('app_admin_credits') }}\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            {% endif %}
        </form>
    </div>

    {# Lorsque l'admin consulte les resultats, ce bloc affiche le tableau des credits ou un message vide #}



    <div class=\"card-body\">
        {# Affiche le tableau seulement s'il existe au moins un credit #}
        {% if credits|length > 0 %}
        {# Tableau principal des credits #}
        <table class=\"admin-table\">
            {# Entete des colonnes du tableau #}
            <thead>
                <tr><th>Client</th><th>Montant</th><th>Duree</th><th>Mensualite</th><th>Salaire</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                {% for c in credits %}
                <tr>
                    {# Colonne des informations client #}
                    <td>
                        <div class=\"user-cell\">
                            {# Avatar du client avec les initiales prenom/nom #}
                            <div class=\"user-avatar\">{{ c.client.prenom|first }}{{ c.client.nom|first }}</div>
                            {# Bloc texte des informations du client #}
                            <div class=\"user-details\">
                                {# Nom complet du client #}
                                <div class=\"user-name\">{{ c.client.prenom }} {{ c.client.nom }}</div>
                                {# Email du client #}
                                <div class=\"user-email\">{{ c.client.email }}</div>
                            </div>
                        </div>
                    </td>

                    {# Montant du credit avec formatage numerique #}
                    <td style=\"font-weight:700;\">{{ c.montant|number_format(2, ',', ' ') }} DT</td>
                    {# Duree du credit en mois #}
                    <td>{{ c.dureeEnMois }} mois</td>
                    {# Mensualite du credit ou tiret si absente #}
                    <td style=\"color:var(--success);font-weight:600;\">{{ c.mensualite ? c.mensualite|number_format(2, ',', ' ') : '-' }} DT</td>
                    {# Salaire mensuel du client ou tiret si absent #}
                    <td>{{ c.salaireMensuel ? c.salaireMensuel|number_format(2, ',', ' ') : '-' }} DT</td>
                    {# de statut selon l'etat actuel du credit #}
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
                    {# Date de creation du credit #}
                    <td style=\"font-size:13px;\">{{ c.dateCreation|date('d/m/Y') }}</td>
                    {# Lorsque l'admin clique sur une action, il peut approuver, rejeter, finaliser ou telecharger le credit selon son statut #}
                    <td style=\"white-space:nowrap;\">
                        {% if c.statut.value == 'PENDING' %}
                            {# Bouton pour approuver le credit apres confirmation #}
                            <button type=\"button\" class=\"btn-action approve\" title=\"Approuver\" onclick=\"confirmSubmit('{{ path('app_admin_credit_approve', {id: c.idCredit}) }}', {type:'approve', title:'Approuver le credit', message:'Approuver le credit de {{ c.montant|number_format(2, ',', ' ') }} DT pour {{ c.client.prenom|e('js') }} {{ c.client.nom|e('js') }} ?', btnText:'Approuver'})\">
                                <i class=\"fas fa-check\"></i>
                            </button>
                            {# Bouton pour ouvrir la modale de rejet #}
                            <button type=\"button\" class=\"btn-action reject\" title=\"Rejeter\" onclick=\"\$('#rejectModal{{ c.idCredit }}').modal('show')\">
                                <i class=\"fas fa-times\"></i>
                            </button>
                        {% elseif c.statut.value == 'CONTRACT_PENDING' %}
                            {# Bouton pour finaliser le contrat et activer le credit #}
                            <button type=\"button\" class=\"btn-action approve\" title=\"Finaliser contrat\" onclick=\"confirmSubmit('{{ path('app_admin_credit_finalize', {id: c.idCredit}) }}', {type:'approve', title:'Finaliser le contrat', message:'Generer le contrat et activer le credit ?', btnText:'Finaliser'})\">
                                <i class=\"fas fa-file-contract\"></i>
                            </button>
                        {% elseif c.statut.value == 'ACTIVE' %}
                            {# Lien pour telecharger le contrat PDF #}
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



{# Lorsque l'admin clique sur Rejeter pour un credit pending, cette modale s'affiche pour saisir le motif #}



{% for c in credits %}
{% if c.statut.value == 'PENDING' %}
<div class=\"modal fade modal-admin\" id=\"rejectModal{{ c.idCredit }}\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:#dc2626;padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-times-circle mr-2\"></i>Rejeter le credit</h5>
            </div>
            {# Lorsque l'admin confirme le rejet, ce formulaire envoie la demande au controller avec l'id du credit #}
            <form method=\"post\" action=\"{{ path('app_admin_credit_reject', {id: c.idCredit}) }}\" novalidate data-reject-form>
                <div style=\"padding:25px;\">
                    {# Lorsque la modale s'affiche, ce texte rappelle le montant du credit et le nom du client #}
                    <p style=\"color:var(--text-secondary);font-size:14px;\">Credit de <strong>{{ c.montant|number_format(2, ',', ' ') }} DT</strong> pour {{ c.client.prenom }} {{ c.client.nom }}</p>
                    <div class=\"form-group\">
                        {# Lorsque l'admin saisit le motif,  #}
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif du rejet (obligatoire)</label>
                        {# Lorsque l'admin ecrit ici, il donne la raison du rejet avant l'envoi du formulaire #}
                        <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"3\" required placeholder=\"Expliquez la raison du rejet...\"></textarea>
                        {# Lorsque le champ est invalide, le message d'erreur s'affiche ici #}
                        <div class=\"field-error\" data-error-for=\"motif\"></div>
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    {# Lorsque l'admin clique sur Annuler, la modale se ferme sans envoyer le formulaire #}
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    {# Lorsque l'admin clique sur Rejeter, le formulaire est envoye pour rejeter le credit #}
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
// Lorsque l'admin saisit ou envoie le motif de rejet, ce script verifie le champ avant l'envoi
// Cherche tous les formulaires de rejet presents sur la page
document.querySelectorAll('form[data-reject-form]').forEach(function(form) {
    // Recupere le champ motif dans le formulaire courant
    var motifField = form.querySelector('[name=\"motif\"]');
    // Recupere la zone ou afficher le message d'erreur
    var errorEl = form.querySelector('[data-error-for=\"motif\"]');

    // verifie si le champ motif est valide
    function validateRejectField() {
        // Utilise la validation HTML native du champ
        var isValid = motifField.checkValidity();
        // Message vide par defaut
        var message = '';

        // Si le champ n'est pas valide, on choisit le bon message
        if (!isValid) {
            // Cas ou le champ obligatoire est vide
            if (motifField.validity.valueMissing) {
                message = 'Le motif du rejet est obligatoire.';
            } else {
                // Cas d'une autre erreur de validation
                message = 'Le motif saisi est invalide.';
            }
        }

        // Ajoute ou retire la classe d'erreur sur le champ
        motifField.classList.toggle('input-error', !isValid);
        // Place le texte de l'erreur dans la zone prevue
        errorEl.textContent = message;
        // Affiche ou cache le bloc d'erreur selon l'etat du champ
        errorEl.classList.toggle('is-visible', !isValid);

        // Retourne true si le champ est valide, sinon false
        return isValid;
    }

    // Relance la validation pendant la saisie de l'admin
    motifField.addEventListener('input', validateRejectField);

    // Verifie le champ au moment de l'envoi du formulaire
    form.addEventListener('submit', function(event) {
        // Si le champ est invalide, on bloque l'envoi
        if (!validateRejectField()) {
            event.preventDefault();
            // Replace le curseur dans le champ motif
            motifField.focus();
        }
    });
});
</script>
{% endblock %}
", "admin/credit/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\admin\\credit\\index.html.twig");
    }
}
