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

/* admin/compte/index.html.twig */
class __TwigTemplate_713e1e23891f35de28e1dbf64a52bf03 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/compte/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/compte/index.html.twig"));

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

        yield "Gestion Comptes - Admin UniBank+";
        
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

        yield "Gestion Comptes";
        
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
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-wallet\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total comptes</div><div class=\"stat-value\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalComptes"]) || array_key_exists("totalComptes", $context) ? $context["totalComptes"] : (function () { throw new RuntimeError('Variable "totalComptes" does not exist.', 31, $this->source); })()), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-check-circle\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Comptes actifs</div><div class=\"stat-value\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["activeComptes"]) || array_key_exists("activeComptes", $context) ? $context["activeComptes"] : (function () { throw new RuntimeError('Variable "activeComptes" does not exist.', 34, $this->source); })()), "html", null, true);
        yield "</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-coins\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Solde total</div><div class=\"stat-value\" style=\"font-size:18px;\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["totalSolde"]) || array_key_exists("totalSolde", $context) ? $context["totalSolde"] : (function () { throw new RuntimeError('Variable "totalSolde" does not exist.', 37, $this->source); })()), 2, ",", " "), "html", null, true);
        yield " DT</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-wallet mr-2\" style=\"color:var(--primary);\"></i>Comptes bancaires (";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comptes"]) || array_key_exists("comptes", $context) ? $context["comptes"] : (function () { throw new RuntimeError('Variable "comptes" does not exist.', 43, $this->source); })())), "html", null, true);
        yield ")</h5>
        <form method=\"get\" action=\"";
        // line 44
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_comptes");
        yield "\" class=\"filter-bar\">
            <select name=\"type\" onchange=\"this.form.submit()\">
                <option value=\"all\" ";
        // line 46
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 46, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les types</option>
                <option value=\"COURANT\" ";
        // line 47
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 47, $this->source); })()) == "COURANT")) ? ("selected") : (""));
        yield ">Courant</option>
                <option value=\"EPARGNE\" ";
        // line 48
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 48, $this->source); })()) == "EPARGNE")) ? ("selected") : (""));
        yield ">Epargne</option>
            </select>
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" ";
        // line 51
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 51, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les statuts</option>
                <option value=\"active\" ";
        // line 52
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 52, $this->source); })()) == "active")) ? ("selected") : (""));
        yield ">Actif</option>
                <option value=\"inactive\" ";
        // line 53
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 53, $this->source); })()) == "inactive")) ? ("selected") : (""));
        yield ">Inactif</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher client, N compte...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:220px;\">
            ";
        // line 56
        if (((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 56, $this->source); })()) != "all") || ((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 56, $this->source); })()) != "all")) || (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 56, $this->source); })()))) {
            // line 57
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_comptes");
            yield "\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            ";
        }
        // line 59
        yield "        </form>
    </div>
    <div class=\"card-body\">
        ";
        // line 62
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comptes"]) || array_key_exists("comptes", $context) ? $context["comptes"] : (function () { throw new RuntimeError('Variable "comptes" does not exist.', 62, $this->source); })())) > 0)) {
            // line 63
            yield "        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>N Compte</th>
                    <th>Type</th>
                    <th style=\"text-align:right;\">Solde</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 76
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["comptes"]) || array_key_exists("comptes", $context) ? $context["comptes"] : (function () { throw new RuntimeError('Variable "comptes" does not exist.', 76, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 77
                yield "                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">";
                // line 80
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 80), "prenom", [], "any", false, false, false, 80)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 80), "nom", [], "any", false, false, false, 80)), "html", null, true);
                yield "</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 82), "prenom", [], "any", false, false, false, 82), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 82), "nom", [], "any", false, false, false, 82), "html", null, true);
                yield "</div>
                                <div class=\"user-email\">";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 83), "email", [], "any", false, false, false, 83), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"font-weight:600;font-family:monospace;color:var(--primary);\">";
                // line 87
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "numeroCompte", [], "any", false, false, false, 87), "html", null, true);
                yield "</td>
                    <td>
                        ";
                // line 89
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "typeCompte", [], "any", false, false, false, 89), "value", [], "any", false, false, false, 89) == "EPARGNE")) {
                    // line 90
                    yield "                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Epargne</span>
                        ";
                } else {
                    // line 92
                    yield "                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">Courant</span>
                        ";
                }
                // line 94
                yield "                    </td>
                    <td style=\"text-align:right;font-weight:700;color:var(--primary-dark);\">";
                // line 95
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "solde", [], "any", false, false, false, 95), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td>
                        ";
                // line 97
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "estActif", [], "any", false, false, false, 97)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 98
                    yield "                            <span class=\"badge-status active\">Actif</span>
                        ";
                } else {
                    // line 100
                    yield "                            <span class=\"badge-status banned\">Inactif</span>
                        ";
                }
                // line 102
                yield "                    </td>
                    <td style=\"font-size:13px;\">";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCreation", [], "any", false, false, false, 103), "d/m/Y"), "html", null, true);
                yield "</td>
                    <td style=\"white-space:nowrap;\">
                        ";
                // line 105
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["c"], "estActif", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 106
                    yield "                            <button type=\"button\" class=\"btn-action ban\" title=\"Desactiver\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_compte_toggle", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCompte", [], "any", false, false, false, 106)]), "html", null, true);
                    yield "', {type:'ban', title:'Desactiver le compte', message:'Le compte ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "numeroCompte", [], "any", false, false, false, 106), "html", null, true);
                    yield " de ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 106), "prenom", [], "any", false, false, false, 106), "js"), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 106), "nom", [], "any", false, false, false, 106), "js"), "html", null, true);
                    yield " sera desactive.', btnText:'Desactiver'})\">
                                <i class=\"fas fa-ban\"></i>
                            </button>
                        ";
                } else {
                    // line 110
                    yield "                            <button type=\"button\" class=\"btn-action unban\" title=\"Activer\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_compte_toggle", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCompte", [], "any", false, false, false, 110)]), "html", null, true);
                    yield "', {type:'unban', title:'Activer le compte', message:'Le compte ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "numeroCompte", [], "any", false, false, false, 110), "html", null, true);
                    yield " sera reactive.', btnText:'Activer'})\">
                                <i class=\"fas fa-unlock\"></i>
                            </button>
                        ";
                }
                // line 114
                yield "                        <button type=\"button\" class=\"btn-action approve\" title=\"Depot\" onclick=\"openDepotModal(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCompte", [], "any", false, false, false, 114), "html", null, true);
                yield ", '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "numeroCompte", [], "any", false, false, false, 114), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 114), "prenom", [], "any", false, false, false, 114), "js"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 114), "nom", [], "any", false, false, false, 114), "js"), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "solde", [], "any", false, false, false, 114), "html", null, true);
                yield "')\">
                            <i class=\"fas fa-plus\"></i>
                        </button>
                        <button type=\"button\" class=\"btn-action reject\" title=\"Retrait\" onclick=\"openRetraitModal(";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCompte", [], "any", false, false, false, 117), "html", null, true);
                yield ", '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "numeroCompte", [], "any", false, false, false, 117), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 117), "prenom", [], "any", false, false, false, 117), "js"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "utilisateur", [], "any", false, false, false, 117), "nom", [], "any", false, false, false, 117), "js"), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "solde", [], "any", false, false, false, 117), "html", null, true);
                yield "')\">
                            <i class=\"fas fa-minus\"></i>
                        </button>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 126
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-search\"></i>
            <p>Aucun compte trouve</p>
        </div>
        ";
        }
        // line 131
        yield "    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"depotModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),var(--primary-light));padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-plus-circle mr-2\"></i>Depot administratif</h5>
                <small id=\"depot_info\" style=\"color:rgba(255,255,255,0.8);\"></small>
            </div>
            <form id=\"depotForm\" method=\"post\" novalidate>
                <div class=\"modal-body\" style=\"padding:25px;\">
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Solde actuel</label>
                        <div id=\"depot_solde\" style=\"font-size:20px;font-weight:700;color:var(--success);\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Montant du depot (DT)</label>
                        <input type=\"number\" name=\"montant\" step=\"0.01\" min=\"0.01\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"0.00\">
                        <div class=\"field-error\" data-error-for=\"montant\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Description (optionnel)</label>
                        <input type=\"text\" name=\"description\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"Depot administratif\">
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin success\">Effectuer le depot</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"retraitModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,#dc2626,#ef4444);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-minus-circle mr-2\"></i>Retrait administratif</h5>
                <small id=\"retrait_info\" style=\"color:rgba(255,255,255,0.8);\"></small>
            </div>
            <form id=\"retraitForm\" method=\"post\" novalidate>
                <div class=\"modal-body\" style=\"padding:25px;\">
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Solde actuel</label>
                        <div id=\"retrait_solde\" style=\"font-size:20px;font-weight:700;color:#dc2626;\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Montant du retrait (DT)</label>
                        <input type=\"number\" name=\"montant\" step=\"0.01\" min=\"0.01\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"0.00\">
                        <div class=\"field-error\" data-error-for=\"montant\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Description (optionnel)</label>
                        <input type=\"text\" name=\"description\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"Retrait administratif\">
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin danger\">Effectuer le retrait</button>
                </div>
            </form>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 199
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

        // line 200
        yield "<script>
function openDepotModal(id, numero, name, solde) {
    document.getElementById('depotForm').action = '/admin/comptes/' + id + '/depot';
    document.getElementById('depot_info').textContent = name + ' - ' + numero;
    document.getElementById('depot_solde').textContent = parseFloat(solde).toLocaleString('fr-FR', {minimumFractionDigits:2}) + ' DT';
    \$('#depotModal').modal('show');
}

function openRetraitModal(id, numero, name, solde) {
    var form = document.getElementById('retraitForm');
    form.action = '/admin/comptes/' + id + '/retrait';
    form.dataset.currentSolde = solde;
    document.getElementById('retrait_info').textContent = name + ' - ' + numero;
    document.getElementById('retrait_solde').textContent = parseFloat(solde).toLocaleString('fr-FR', {minimumFractionDigits:2}) + ' DT';
    \$('#retraitModal').modal('show');
}

var depotForm = document.getElementById('depotForm');
var retraitForm = document.getElementById('retraitForm');

if (depotForm) {
    var depotMontantField = depotForm.querySelector('[name=\"montant\"]');
    var depotErrorEl = depotForm.querySelector('[data-error-for=\"montant\"]');

    function validateDepotField() {
        var isValid = depotMontantField.checkValidity();
        var message = '';

        if (!isValid) {
            if (depotMontantField.validity.valueMissing) {
                message = 'Le montant du depot est obligatoire.';
            } else if (depotMontantField.validity.rangeUnderflow) {
                message = 'Le montant doit etre positif.';
            } else {
                message = 'Le montant saisi est invalide.';
            }
        }

        depotMontantField.classList.toggle('input-error', !isValid);
        depotErrorEl.textContent = message;
        depotErrorEl.classList.toggle('is-visible', !isValid);

        return isValid;
    }

    depotMontantField.addEventListener('input', validateDepotField);

    depotForm.addEventListener('submit', function(event) {
        if (!validateDepotField()) {
            event.preventDefault();
            depotMontantField.focus();
        }
    });
}

if (retraitForm) {
    var retraitMontantField = retraitForm.querySelector('[name=\"montant\"]');
    var retraitErrorEl = retraitForm.querySelector('[data-error-for=\"montant\"]');

    function validateRetraitField() {
        var isValid = retraitMontantField.checkValidity();
        var message = '';
        var currentSolde = parseFloat(retraitForm.dataset.currentSolde || '0');
        var montant = parseFloat(retraitMontantField.value || '0');

        if (!isValid) {
            if (retraitMontantField.validity.valueMissing) {
                message = 'Le montant du retrait est obligatoire.';
            } else if (retraitMontantField.validity.rangeUnderflow) {
                message = 'Le montant doit etre positif.';
            } else {
                message = 'Le montant saisi est invalide.';
            }
        } else if (montant > currentSolde) {
            isValid = false;
            message = 'Solde insuffisant pour effectuer ce retrait.';
        }

        retraitMontantField.classList.toggle('input-error', !isValid);
        retraitErrorEl.textContent = message;
        retraitErrorEl.classList.toggle('is-visible', !isValid);

        return isValid;
    }

    retraitMontantField.addEventListener('input', validateRetraitField);

    retraitForm.addEventListener('submit', function(event) {
        if (!validateRetraitField()) {
            event.preventDefault();
            retraitMontantField.focus();
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
        return "admin/compte/index.html.twig";
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
        return array (  497 => 200,  484 => 199,  407 => 131,  400 => 126,  395 => 123,  375 => 117,  360 => 114,  350 => 110,  336 => 106,  334 => 105,  329 => 103,  326 => 102,  322 => 100,  318 => 98,  316 => 97,  311 => 95,  308 => 94,  304 => 92,  300 => 90,  298 => 89,  293 => 87,  286 => 83,  280 => 82,  274 => 80,  269 => 77,  265 => 76,  250 => 63,  248 => 62,  243 => 59,  237 => 57,  235 => 56,  231 => 55,  226 => 53,  222 => 52,  218 => 51,  212 => 48,  208 => 47,  204 => 46,  199 => 44,  195 => 43,  186 => 37,  180 => 34,  174 => 31,  170 => 29,  157 => 28,  126 => 6,  113 => 5,  90 => 3,  67 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block title %}Gestion Comptes - Admin UniBank+{% endblock %}
{% block page_title %}Gestion Comptes{% endblock %}

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
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon blue\"><i class=\"fas fa-wallet\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Total comptes</div><div class=\"stat-value\">{{ totalComptes }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon green\"><i class=\"fas fa-check-circle\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Comptes actifs</div><div class=\"stat-value\">{{ activeComptes }}</div></div></div>
    </div>
    <div class=\"col\" style=\"flex:1;min-width:180px;\">
        <div class=\"stat-card\"><div class=\"stat-icon orange\"><i class=\"fas fa-coins\"></i></div><div class=\"stat-info\"><div class=\"stat-label\">Solde total</div><div class=\"stat-value\" style=\"font-size:18px;\">{{ totalSolde|number_format(2, ',', ' ') }} DT</div></div></div>
    </div>
</div>

<div class=\"admin-card\">
    <div class=\"card-header\" style=\"flex-wrap:wrap;gap:10px;\">
        <h5><i class=\"fas fa-wallet mr-2\" style=\"color:var(--primary);\"></i>Comptes bancaires ({{ comptes|length }})</h5>
        <form method=\"get\" action=\"{{ path('app_admin_comptes') }}\" class=\"filter-bar\">
            <select name=\"type\" onchange=\"this.form.submit()\">
                <option value=\"all\" {{ type == 'all' ? 'selected' : '' }}>Tous les types</option>
                <option value=\"COURANT\" {{ type == 'COURANT' ? 'selected' : '' }}>Courant</option>
                <option value=\"EPARGNE\" {{ type == 'EPARGNE' ? 'selected' : '' }}>Epargne</option>
            </select>
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" {{ status == 'all' ? 'selected' : '' }}>Tous les statuts</option>
                <option value=\"active\" {{ status == 'active' ? 'selected' : '' }}>Actif</option>
                <option value=\"inactive\" {{ status == 'inactive' ? 'selected' : '' }}>Inactif</option>
            </select>
            <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher client, N compte...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:220px;\">
            {% if type != 'all' or status != 'all' or search %}
                <a href=\"{{ path('app_admin_comptes') }}\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            {% endif %}
        </form>
    </div>
    <div class=\"card-body\">
        {% if comptes|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>N Compte</th>
                    <th>Type</th>
                    <th style=\"text-align:right;\">Solde</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for c in comptes %}
                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">{{ c.utilisateur.prenom|first }}{{ c.utilisateur.nom|first }}</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">{{ c.utilisateur.prenom }} {{ c.utilisateur.nom }}</div>
                                <div class=\"user-email\">{{ c.utilisateur.email }}</div>
                            </div>
                        </div>
                    </td>
                    <td style=\"font-weight:600;font-family:monospace;color:var(--primary);\">{{ c.numeroCompte }}</td>
                    <td>
                        {% if c.typeCompte.value == 'EPARGNE' %}
                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Epargne</span>
                        {% else %}
                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">Courant</span>
                        {% endif %}
                    </td>
                    <td style=\"text-align:right;font-weight:700;color:var(--primary-dark);\">{{ c.solde|number_format(2, ',', ' ') }} DT</td>
                    <td>
                        {% if c.estActif %}
                            <span class=\"badge-status active\">Actif</span>
                        {% else %}
                            <span class=\"badge-status banned\">Inactif</span>
                        {% endif %}
                    </td>
                    <td style=\"font-size:13px;\">{{ c.dateCreation|date('d/m/Y') }}</td>
                    <td style=\"white-space:nowrap;\">
                        {% if c.estActif %}
                            <button type=\"button\" class=\"btn-action ban\" title=\"Desactiver\" onclick=\"confirmSubmit('{{ path('app_admin_compte_toggle', {id: c.idCompte}) }}', {type:'ban', title:'Desactiver le compte', message:'Le compte {{ c.numeroCompte }} de {{ c.utilisateur.prenom|e('js') }} {{ c.utilisateur.nom|e('js') }} sera desactive.', btnText:'Desactiver'})\">
                                <i class=\"fas fa-ban\"></i>
                            </button>
                        {% else %}
                            <button type=\"button\" class=\"btn-action unban\" title=\"Activer\" onclick=\"confirmSubmit('{{ path('app_admin_compte_toggle', {id: c.idCompte}) }}', {type:'unban', title:'Activer le compte', message:'Le compte {{ c.numeroCompte }} sera reactive.', btnText:'Activer'})\">
                                <i class=\"fas fa-unlock\"></i>
                            </button>
                        {% endif %}
                        <button type=\"button\" class=\"btn-action approve\" title=\"Depot\" onclick=\"openDepotModal({{ c.idCompte }}, '{{ c.numeroCompte }}', '{{ c.utilisateur.prenom|e('js') }} {{ c.utilisateur.nom|e('js') }}', '{{ c.solde }}')\">
                            <i class=\"fas fa-plus\"></i>
                        </button>
                        <button type=\"button\" class=\"btn-action reject\" title=\"Retrait\" onclick=\"openRetraitModal({{ c.idCompte }}, '{{ c.numeroCompte }}', '{{ c.utilisateur.prenom|e('js') }} {{ c.utilisateur.nom|e('js') }}', '{{ c.solde }}')\">
                            <i class=\"fas fa-minus\"></i>
                        </button>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-search\"></i>
            <p>Aucun compte trouve</p>
        </div>
        {% endif %}
    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"depotModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),var(--primary-light));padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-plus-circle mr-2\"></i>Depot administratif</h5>
                <small id=\"depot_info\" style=\"color:rgba(255,255,255,0.8);\"></small>
            </div>
            <form id=\"depotForm\" method=\"post\" novalidate>
                <div class=\"modal-body\" style=\"padding:25px;\">
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Solde actuel</label>
                        <div id=\"depot_solde\" style=\"font-size:20px;font-weight:700;color:var(--success);\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Montant du depot (DT)</label>
                        <input type=\"number\" name=\"montant\" step=\"0.01\" min=\"0.01\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"0.00\">
                        <div class=\"field-error\" data-error-for=\"montant\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Description (optionnel)</label>
                        <input type=\"text\" name=\"description\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"Depot administratif\">
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin success\">Effectuer le depot</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"retraitModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,#dc2626,#ef4444);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-minus-circle mr-2\"></i>Retrait administratif</h5>
                <small id=\"retrait_info\" style=\"color:rgba(255,255,255,0.8);\"></small>
            </div>
            <form id=\"retraitForm\" method=\"post\" novalidate>
                <div class=\"modal-body\" style=\"padding:25px;\">
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Solde actuel</label>
                        <div id=\"retrait_solde\" style=\"font-size:20px;font-weight:700;color:#dc2626;\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Montant du retrait (DT)</label>
                        <input type=\"number\" name=\"montant\" step=\"0.01\" min=\"0.01\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"0.00\">
                        <div class=\"field-error\" data-error-for=\"montant\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Description (optionnel)</label>
                        <input type=\"text\" name=\"description\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" placeholder=\"Retrait administratif\">
                    </div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin danger\">Effectuer le retrait</button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
function openDepotModal(id, numero, name, solde) {
    document.getElementById('depotForm').action = '/admin/comptes/' + id + '/depot';
    document.getElementById('depot_info').textContent = name + ' - ' + numero;
    document.getElementById('depot_solde').textContent = parseFloat(solde).toLocaleString('fr-FR', {minimumFractionDigits:2}) + ' DT';
    \$('#depotModal').modal('show');
}

function openRetraitModal(id, numero, name, solde) {
    var form = document.getElementById('retraitForm');
    form.action = '/admin/comptes/' + id + '/retrait';
    form.dataset.currentSolde = solde;
    document.getElementById('retrait_info').textContent = name + ' - ' + numero;
    document.getElementById('retrait_solde').textContent = parseFloat(solde).toLocaleString('fr-FR', {minimumFractionDigits:2}) + ' DT';
    \$('#retraitModal').modal('show');
}

var depotForm = document.getElementById('depotForm');
var retraitForm = document.getElementById('retraitForm');

if (depotForm) {
    var depotMontantField = depotForm.querySelector('[name=\"montant\"]');
    var depotErrorEl = depotForm.querySelector('[data-error-for=\"montant\"]');

    function validateDepotField() {
        var isValid = depotMontantField.checkValidity();
        var message = '';

        if (!isValid) {
            if (depotMontantField.validity.valueMissing) {
                message = 'Le montant du depot est obligatoire.';
            } else if (depotMontantField.validity.rangeUnderflow) {
                message = 'Le montant doit etre positif.';
            } else {
                message = 'Le montant saisi est invalide.';
            }
        }

        depotMontantField.classList.toggle('input-error', !isValid);
        depotErrorEl.textContent = message;
        depotErrorEl.classList.toggle('is-visible', !isValid);

        return isValid;
    }

    depotMontantField.addEventListener('input', validateDepotField);

    depotForm.addEventListener('submit', function(event) {
        if (!validateDepotField()) {
            event.preventDefault();
            depotMontantField.focus();
        }
    });
}

if (retraitForm) {
    var retraitMontantField = retraitForm.querySelector('[name=\"montant\"]');
    var retraitErrorEl = retraitForm.querySelector('[data-error-for=\"montant\"]');

    function validateRetraitField() {
        var isValid = retraitMontantField.checkValidity();
        var message = '';
        var currentSolde = parseFloat(retraitForm.dataset.currentSolde || '0');
        var montant = parseFloat(retraitMontantField.value || '0');

        if (!isValid) {
            if (retraitMontantField.validity.valueMissing) {
                message = 'Le montant du retrait est obligatoire.';
            } else if (retraitMontantField.validity.rangeUnderflow) {
                message = 'Le montant doit etre positif.';
            } else {
                message = 'Le montant saisi est invalide.';
            }
        } else if (montant > currentSolde) {
            isValid = false;
            message = 'Solde insuffisant pour effectuer ce retrait.';
        }

        retraitMontantField.classList.toggle('input-error', !isValid);
        retraitErrorEl.textContent = message;
        retraitErrorEl.classList.toggle('is-visible', !isValid);

        return isValid;
    }

    retraitMontantField.addEventListener('input', validateRetraitField);

    retraitForm.addEventListener('submit', function(event) {
        if (!validateRetraitField()) {
            event.preventDefault();
            retraitMontantField.focus();
        }
    });
}
</script>
{% endblock %}
", "admin/compte/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\admin\\compte\\index.html.twig");
    }
}
