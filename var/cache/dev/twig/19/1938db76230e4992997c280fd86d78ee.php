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

/* client/credit/index.html.twig */
class __TwigTemplate_c204aaf8555b9b8ca6efcd53c8d17029 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/credit/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/credit/index.html.twig"));

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

        yield "Mes Credits - UniBank+";
        
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

        yield "Mes Credits";
        
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
        yield "<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-calculator mr-2\" style=\"color:var(--primary);\"></i>Simulateur & Demande de credit</h5>
    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        <form method=\"post\" action=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_apply");
        yield "\" id=\"creditForm\" novalidate data-inline-validate>
            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant du credit (DT)</label>
                    <input type=\"range\" id=\"montantSlider\" min=\"1000\" max=\"500000\" step=\"1000\" value=\"50000\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 000</span><span id=\"montantVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">50 000 DT</span><span>500 000</span></div>
                    <input type=\"hidden\" name=\"montant\" id=\"montantInput\" value=\"50000\">
                    <div class=\"field-error\" data-error-for=\"montant\"></div>
                </div>
                <div class=\"col-md-6 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                    <input type=\"range\" id=\"dureeSlider\" min=\"1\" max=\"25\" step=\"1\" value=\"5\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 an</span><span id=\"dureeVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">5 ans</span><span>25 ans</span></div>
                    <input type=\"hidden\" name=\"duree\" id=\"dureeInput\" value=\"5\">
                    <div class=\"field-error\" data-error-for=\"duree\"></div>
                </div>
            </div>

            <div style=\"background:var(--bg);border-radius:12px;padding:20px;margin:15px 0;display:flex;gap:30px;flex-wrap:wrap;justify-content:center;\">
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Taux annuel</div>
                    <div style=\"font-size:18px;font-weight:700;color:var(--primary);\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tauxBase"]) || array_key_exists("tauxBase", $context) ? $context["tauxBase"] : (function () { throw new RuntimeError('Variable "tauxBase" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "%</div>
                </div>
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Mensualite</div>
                    <div id=\"simMensualite\" style=\"font-size:18px;font-weight:700;color:var(--success);\">-</div>
                </div>
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Total a rembourser</div>
                    <div id=\"simTotal\" style=\"font-size:18px;font-weight:700;color:var(--primary-dark);\">-</div>
                </div>
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Cout du credit</div>
                    <div id=\"simCout\" style=\"font-size:18px;font-weight:700;color:var(--danger);\">-</div>
                </div>
            </div>

            <div id=\"capacityBox\" style=\"background:#f8fafc;border-radius:10px;padding:15px;margin-bottom:15px;display:none;\">
                <div class=\"d-flex justify-content-between align-items-center\" style=\"margin-bottom:8px;\">
                    <span style=\"font-size:13px;font-weight:600;color:var(--primary-dark);\">Capacite d'endettement (33% du salaire)</span>
                    <span id=\"capacityLabel\" style=\"font-size:13px;font-weight:700;\"></span>
                </div>
                <div style=\"background:#e2e8f0;border-radius:6px;height:10px;overflow:hidden;\">
                    <div id=\"capacityBar\" style=\"height:100%;border-radius:6px;transition:width 0.3s,background 0.3s;\"></div>
                </div>
                <div class=\"d-flex justify-content-between\" style=\"margin-top:6px;\">
                    <span id=\"capacityMens\" style=\"font-size:12px;color:var(--text-secondary);\"></span>
                    <span id=\"capacityMax\" style=\"font-size:12px;color:var(--text-secondary);\"></span>
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-md-4 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                    <input type=\"number\" name=\"salaire\" id=\"salaireInput\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"Ex: 2500\" oninput=\"updateSimulation()\">
                    <div class=\"field-error\" data-error-for=\"salaire\"></div>
                </div>
                <div class=\"col-md-8 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif de la demande (min. 10 caracteres)</label>
                    <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"10\" placeholder=\"Decrivez le motif de votre demande de credit...\"></textarea>
                    <div class=\"field-error\" data-error-for=\"motif\"></div>
                </div>
            </div>
            <button type=\"submit\" class=\"btn-admin primary\" id=\"submitBtn\">Soumettre la demande</button>
        </form>
    </div>
</div>

";
        // line 102
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 102, $this->source); })())) > 0)) {
            // line 103
            yield "<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-list mr-2\" style=\"color:var(--primary);\"></i>Mes demandes de credit (";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 105, $this->source); })())), "html", null, true);
            yield ")</h5>
    </div>
    <div class=\"card-body\">
        <table class=\"admin-table\">
            <thead>
                <tr><th>Montant</th><th>Duree</th><th>Mensualite</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                ";
            // line 113
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 113, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 114
                yield "                <tr>
                    <td style=\"font-weight:700;\">";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 115), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td>";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dureeEnMois", [], "any", false, false, false, 116), "html", null, true);
                yield " mois</td>
                    <td style=\"color:var(--success);font-weight:600;\">";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "mensualite", [], "any", false, false, false, 117), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td>
                        ";
                // line 119
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 119), "value", [], "any", false, false, false, 119) == "PENDING")) {
                    // line 120
                    yield "                            <span class=\"badge-status pending\">En attente</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 121
$context["c"], "statut", [], "any", false, false, false, 121), "value", [], "any", false, false, false, 121) == "APPROVED")) {
                    // line 122
                    yield "                            <span class=\"badge-status approved\">Approuve</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 123
$context["c"], "statut", [], "any", false, false, false, 123), "value", [], "any", false, false, false, 123) == "CONTRACT_PENDING")) {
                    // line 124
                    yield "                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">Contrat en cours</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 125
$context["c"], "statut", [], "any", false, false, false, 125), "value", [], "any", false, false, false, 125) == "REJECTED")) {
                    // line 126
                    yield "                            <span class=\"badge-status rejected\">Rejete</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 127
$context["c"], "statut", [], "any", false, false, false, 127), "value", [], "any", false, false, false, 127) == "ACTIVE")) {
                    // line 128
                    yield "                            <span class=\"badge-status active\">Actif</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 129
$context["c"], "statut", [], "any", false, false, false, 129), "value", [], "any", false, false, false, 129) == "COMPLETED")) {
                    // line 130
                    yield "                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Termine</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 131
$context["c"], "statut", [], "any", false, false, false, 131), "value", [], "any", false, false, false, 131) == "CANCELLED")) {
                    // line 132
                    yield "                            <span class=\"badge-status suspended\">Annule</span>
                        ";
                }
                // line 134
                yield "                    </td>
                    <td style=\"font-size:13px;\">";
                // line 135
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCreation", [], "any", false, false, false, 135), "d/m/Y"), "html", null, true);
                yield "</td>
                    <td style=\"white-space:nowrap;\">
                        ";
                // line 137
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 137), "value", [], "any", false, false, false, 137) == "PENDING")) {
                    // line 138
                    yield "                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier\" onclick=\"openModifyModal(";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 138), "html", null, true);
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 138), "html", null, true);
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dureeEnMois", [], "any", false, false, false, 138) / 12)), "html", null, true);
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "salaireMensuel", [], "any", false, false, false, 138), "html", null, true);
                    yield ", '";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifDemande", [], "any", false, false, false, 138), "js"), "html", null, true);
                    yield "')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                            <form method=\"post\" action=\"";
                    // line 141
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_cancel", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 141)]), "html", null, true);
                    yield "\" style=\"display:inline;\">
                                <button type=\"submit\" class=\"btn-action delete\" title=\"Annuler\" onclick=\"return confirm('Annuler cette demande ?')\"><i class=\"fas fa-times\"></i></button>
                            </form>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 144
$context["c"], "statut", [], "any", false, false, false, 144), "value", [], "any", false, false, false, 144) == "APPROVED")) {
                    // line 145
                    yield "                            <button type=\"button\" class=\"btn-admin primary\" style=\"padding:4px 12px;font-size:12px;\" onclick=\"\$('#contractModal";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 145), "html", null, true);
                    yield "').modal('show')\">
                                <i class=\"fas fa-file-contract mr-1\"></i>Choisir contrat
                            </button>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 148
$context["c"], "statut", [], "any", false, false, false, 148), "value", [], "any", false, false, false, 148) == "CONTRACT_PENDING")) {
                    // line 149
                    yield "                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier le type de contrat\" onclick=\"\$('#contractModal";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 149), "html", null, true);
                    yield "').modal('show')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 152
$context["c"], "statut", [], "any", false, false, false, 152), "value", [], "any", false, false, false, 152) == "ACTIVE")) {
                    // line 153
                    yield "                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 153)]), "html", null, true);
                    yield "\" class=\"btn-action\" title=\"Telecharger le contrat PDF\" style=\"color:var(--primary);\">
                                <i class=\"fas fa-file-pdf\"></i>
                            </a>
                        ";
                } elseif (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 156
$context["c"], "statut", [], "any", false, false, false, 156), "value", [], "any", false, false, false, 156) == "REJECTED") && CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifRejet", [], "any", false, false, false, 156))) {
                    // line 157
                    yield "                            <button type=\"button\" class=\"btn-action\" style=\"color:var(--danger);\" title=\"Motif: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifRejet", [], "any", false, false, false, 157), "html_attr");
                    yield "\" onclick=\"alert('Motif du rejet:\\n\\n";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifRejet", [], "any", false, false, false, 157), "js"), "html", null, true);
                    yield "')\"><i class=\"fas fa-info-circle\"></i></button>
                        ";
                }
                // line 159
                yield "                    </td>
                </tr>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            yield "            </tbody>
        </table>
    </div>
</div>

";
            // line 168
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 168, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 169
                if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 169), "value", [], "any", false, false, false, 169) == "APPROVED") || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 169), "value", [], "any", false, false, false, 169) == "CONTRACT_PENDING"))) {
                    // line 170
                    yield "<div class=\"modal fade modal-admin\" id=\"contractModal";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 170), "html", null, true);
                    yield "\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-file-contract mr-2\"></i>Choisir le type de contrat</h5>
                <small style=\"color:rgba(255,255,255,0.8);\">Credit de ";
                    // line 175
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 175), 2, ",", " "), "html", null, true);
                    yield " DT</small>
            </div>
            <form method=\"post\" action=\"";
                    // line 177
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_contract", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 177)]), "html", null, true);
                    yield "\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PRELEVEMENT_AUTOMATIQUE\" required style=\"margin-right:10px;\">
                        <strong>Prelevement automatique</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Prelevement le 5 de chaque mois. Pas de majoration. Penalite: 1.5%</div>
                    </label>
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PAIEMENT_MENSUEL\" style=\"margin-right:10px;\">
                        <strong>Paiement mensuel</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Paiement avant le 10 de chaque mois. Pas de majoration. Penalite: 3.0%</div>
                    </label>
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PAIEMENT_DIFFERE\" style=\"margin-right:10px;\">
                        <strong>Paiement differe</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Periode de grace. Majoration taux: +0.5%. Penalite: 2.0%</div>
                    </label>
                    <div class=\"field-error\" data-error-for=\"type_contrat\"></div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin primary\">Valider le choix</button>
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
        }
        // line 207
        yield "
<div class=\"modal fade modal-admin\" id=\"modifyModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-pen mr-2\"></i>Modifier la demande</h5>
            </div>
            <form id=\"modifyForm\" method=\"post\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    <div class=\"row\">
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant (DT)</label>
                            <input type=\"number\" name=\"montant\" id=\"mod_montant\" min=\"1000\" max=\"500000\" step=\"1000\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"montant\"></div>
                        </div>
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                            <input type=\"number\" name=\"duree\" id=\"mod_duree\" min=\"1\" max=\"25\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"duree\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:15px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                        <input type=\"number\" name=\"salaire\" id=\"mod_salaire\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                        <div class=\"field-error\" data-error-for=\"salaire\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif (min. 10 caracteres)</label>
                        <textarea name=\"motif\" id=\"mod_motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"10\"></textarea>
                        <div class=\"field-error\" data-error-for=\"motif\"></div>
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 249
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

        // line 250
        yield "<script>
var tauxBase = ";
        // line 251
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tauxBase"]) || array_key_exists("tauxBase", $context) ? $context["tauxBase"] : (function () { throw new RuntimeError('Variable "tauxBase" does not exist.', 251, $this->source); })()), "html", null, true);
        yield ";
function updateSimulation() {
    var m = document.getElementById('montantSlider').value;
    var d = document.getElementById('dureeSlider').value;
    var s = parseFloat(document.getElementById('salaireInput').value) || 0;
    document.getElementById('montantVal').textContent = parseInt(m).toLocaleString('fr-FR') + ' DT';
    document.getElementById('dureeVal').textContent = d + (d > 1 ? ' ans' : ' an');
    document.getElementById('montantInput').value = m;
    document.getElementById('dureeInput').value = d;
    var montant = parseFloat(m);
    var mois = parseInt(d) * 12;
    var tm = tauxBase / 100 / 12;
    var mens = montant * (tm * Math.pow(1 + tm, mois)) / (Math.pow(1 + tm, mois) - 1);
    var total = mens * mois;
    document.getElementById('simMensualite').textContent = mens.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simTotal').textContent = total.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simCout').textContent = (total - montant).toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';

    var box = document.getElementById('capacityBox');
    if (s > 0) {
        box.style.display = 'block';
        var maxAllowed = s * 0.33;
        var pct = Math.min((mens / maxAllowed) * 100, 100);
        var ok = mens <= maxAllowed;
        var bar = document.getElementById('capacityBar');
        bar.style.width = pct + '%';
        bar.style.background = ok ? '#41D4A8' : '#FE5C73';
        document.getElementById('capacityLabel').textContent = ok ? 'Eligible' : 'Non eligible';
        document.getElementById('capacityLabel').style.color = ok ? '#41D4A8' : '#FE5C73';
        document.getElementById('capacityMens').textContent = 'Mensualite: ' + mens.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
        document.getElementById('capacityMax').textContent = 'Max autorise (33%): ' + maxAllowed.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
        document.getElementById('submitBtn').disabled = !ok;
        document.getElementById('submitBtn').style.opacity = ok ? '1' : '0.5';
    } else {
        box.style.display = 'none';
        document.getElementById('submitBtn').disabled = false;
        document.getElementById('submitBtn').style.opacity = '1';
    }
}
updateSimulation();

function openModifyModal(id, montant, duree, salaire, motif) {
    document.getElementById('modifyForm').action = '/client/credits/' + id + '/modify';
    document.getElementById('mod_montant').value = montant;
    document.getElementById('mod_duree').value = duree;
    document.getElementById('mod_salaire').value = salaire;
    document.getElementById('mod_motif').value = motif;
    \$('#modifyModal').modal('show');
}

function getInlineValidationMessage(field) {
    if (field.validity.valueMissing) {
        return 'Ce champ est obligatoire.';
    }
    if (field.validity.rangeUnderflow || field.validity.rangeOverflow) {
        if (field.name === 'salaire') {
            return 'Le salaire doit etre superieur a 0.';
        }
        if (field.name === 'montant') {
            return 'Le montant doit etre entre 1 000 et 500 000 DT.';
        }
        if (field.name === 'duree') {
            return 'La duree doit etre entre 1 et 25 ans.';
        }
    }
    if (field.validity.tooShort) {
        return 'La valeur saisie est trop courte.';
    }
    if (field.type === 'radio') {
        return 'Veuillez choisir une option.';
    }
    return '';
}

function validateInlineField(field, form) {
    var targetName = field.name;
    var errorEl = form.querySelector('[data-error-for=\"' + targetName + '\"]');

    if (!errorEl) {
        return true;
    }

    var isValid = true;
    var message = '';

    if (field.type === 'radio') {
        var checked = form.querySelector('input[name=\"' + targetName + '\"]:checked');
        isValid = !!checked;
        message = checked ? '' : getInlineValidationMessage(field);
    } else {
        isValid = field.checkValidity();
        message = isValid ? '' : getInlineValidationMessage(field);
        field.classList.toggle('input-error', !isValid);
    }

    if (field.type === 'radio') {
        form.querySelectorAll('input[name=\"' + targetName + '\"]').forEach(function(radio) {
            radio.classList.toggle('input-error', !isValid);
        });
    }

    errorEl.textContent = message;
    errorEl.classList.toggle('is-visible', !isValid);

    return isValid;
}

function setupInlineValidation(form) {
    if (!form) {
        return;
    }

    var fields = form.querySelectorAll('input[name], textarea[name], select[name]');

    fields.forEach(function(field) {
        var eventName = field.type === 'radio' ? 'change' : 'input';
        field.addEventListener(eventName, function() {
            validateInlineField(field, form);
        });
    });

    form.addEventListener('submit', function(event) {
        var firstInvalid = null;
        var valid = true;

        fields.forEach(function(field) {
            if (!validateInlineField(field, form)) {
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

document.querySelectorAll('form[data-inline-validate]').forEach(setupInlineValidation);
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
        return "client/credit/index.html.twig";
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
        return array (  531 => 251,  528 => 250,  515 => 249,  464 => 207,  428 => 177,  423 => 175,  414 => 170,  412 => 169,  408 => 168,  401 => 163,  392 => 159,  384 => 157,  382 => 156,  375 => 153,  373 => 152,  366 => 149,  364 => 148,  357 => 145,  355 => 144,  349 => 141,  334 => 138,  332 => 137,  327 => 135,  324 => 134,  320 => 132,  318 => 131,  315 => 130,  313 => 129,  310 => 128,  308 => 127,  305 => 126,  303 => 125,  300 => 124,  298 => 123,  295 => 122,  293 => 121,  290 => 120,  288 => 119,  283 => 117,  279 => 116,  275 => 115,  272 => 114,  268 => 113,  257 => 105,  253 => 103,  251 => 102,  201 => 55,  177 => 34,  170 => 29,  157 => 28,  126 => 6,  113 => 5,  90 => 3,  67 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'client/base.html.twig' %}
{% block title %}Mes Credits - UniBank+{% endblock %}
{% block page_title %}Mes Credits{% endblock %}

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
<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-calculator mr-2\" style=\"color:var(--primary);\"></i>Simulateur & Demande de credit</h5>
    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        <form method=\"post\" action=\"{{ path('app_client_credit_apply') }}\" id=\"creditForm\" novalidate data-inline-validate>
            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant du credit (DT)</label>
                    <input type=\"range\" id=\"montantSlider\" min=\"1000\" max=\"500000\" step=\"1000\" value=\"50000\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 000</span><span id=\"montantVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">50 000 DT</span><span>500 000</span></div>
                    <input type=\"hidden\" name=\"montant\" id=\"montantInput\" value=\"50000\">
                    <div class=\"field-error\" data-error-for=\"montant\"></div>
                </div>
                <div class=\"col-md-6 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                    <input type=\"range\" id=\"dureeSlider\" min=\"1\" max=\"25\" step=\"1\" value=\"5\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 an</span><span id=\"dureeVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">5 ans</span><span>25 ans</span></div>
                    <input type=\"hidden\" name=\"duree\" id=\"dureeInput\" value=\"5\">
                    <div class=\"field-error\" data-error-for=\"duree\"></div>
                </div>
            </div>

            <div style=\"background:var(--bg);border-radius:12px;padding:20px;margin:15px 0;display:flex;gap:30px;flex-wrap:wrap;justify-content:center;\">
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Taux annuel</div>
                    <div style=\"font-size:18px;font-weight:700;color:var(--primary);\">{{ tauxBase }}%</div>
                </div>
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Mensualite</div>
                    <div id=\"simMensualite\" style=\"font-size:18px;font-weight:700;color:var(--success);\">-</div>
                </div>
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Total a rembourser</div>
                    <div id=\"simTotal\" style=\"font-size:18px;font-weight:700;color:var(--primary-dark);\">-</div>
                </div>
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Cout du credit</div>
                    <div id=\"simCout\" style=\"font-size:18px;font-weight:700;color:var(--danger);\">-</div>
                </div>
            </div>

            <div id=\"capacityBox\" style=\"background:#f8fafc;border-radius:10px;padding:15px;margin-bottom:15px;display:none;\">
                <div class=\"d-flex justify-content-between align-items-center\" style=\"margin-bottom:8px;\">
                    <span style=\"font-size:13px;font-weight:600;color:var(--primary-dark);\">Capacite d'endettement (33% du salaire)</span>
                    <span id=\"capacityLabel\" style=\"font-size:13px;font-weight:700;\"></span>
                </div>
                <div style=\"background:#e2e8f0;border-radius:6px;height:10px;overflow:hidden;\">
                    <div id=\"capacityBar\" style=\"height:100%;border-radius:6px;transition:width 0.3s,background 0.3s;\"></div>
                </div>
                <div class=\"d-flex justify-content-between\" style=\"margin-top:6px;\">
                    <span id=\"capacityMens\" style=\"font-size:12px;color:var(--text-secondary);\"></span>
                    <span id=\"capacityMax\" style=\"font-size:12px;color:var(--text-secondary);\"></span>
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-md-4 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                    <input type=\"number\" name=\"salaire\" id=\"salaireInput\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"Ex: 2500\" oninput=\"updateSimulation()\">
                    <div class=\"field-error\" data-error-for=\"salaire\"></div>
                </div>
                <div class=\"col-md-8 mb-3\">
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif de la demande (min. 10 caracteres)</label>
                    <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"10\" placeholder=\"Decrivez le motif de votre demande de credit...\"></textarea>
                    <div class=\"field-error\" data-error-for=\"motif\"></div>
                </div>
            </div>
            <button type=\"submit\" class=\"btn-admin primary\" id=\"submitBtn\">Soumettre la demande</button>
        </form>
    </div>
</div>

{% if credits|length > 0 %}
<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-list mr-2\" style=\"color:var(--primary);\"></i>Mes demandes de credit ({{ credits|length }})</h5>
    </div>
    <div class=\"card-body\">
        <table class=\"admin-table\">
            <thead>
                <tr><th>Montant</th><th>Duree</th><th>Mensualite</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                {% for c in credits %}
                <tr>
                    <td style=\"font-weight:700;\">{{ c.montant|number_format(2, ',', ' ') }} DT</td>
                    <td>{{ c.dureeEnMois }} mois</td>
                    <td style=\"color:var(--success);font-weight:600;\">{{ c.mensualite|number_format(2, ',', ' ') }} DT</td>
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
                        {% elseif c.statut.value == 'CANCELLED' %}
                            <span class=\"badge-status suspended\">Annule</span>
                        {% endif %}
                    </td>
                    <td style=\"font-size:13px;\">{{ c.dateCreation|date('d/m/Y') }}</td>
                    <td style=\"white-space:nowrap;\">
                        {% if c.statut.value == 'PENDING' %}
                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier\" onclick=\"openModifyModal({{ c.idCredit }}, {{ c.montant }}, {{ (c.dureeEnMois / 12)|round }}, {{ c.salaireMensuel }}, '{{ c.motifDemande|e('js') }}')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                            <form method=\"post\" action=\"{{ path('app_client_credit_cancel', {id: c.idCredit}) }}\" style=\"display:inline;\">
                                <button type=\"submit\" class=\"btn-action delete\" title=\"Annuler\" onclick=\"return confirm('Annuler cette demande ?')\"><i class=\"fas fa-times\"></i></button>
                            </form>
                        {% elseif c.statut.value == 'APPROVED' %}
                            <button type=\"button\" class=\"btn-admin primary\" style=\"padding:4px 12px;font-size:12px;\" onclick=\"\$('#contractModal{{ c.idCredit }}').modal('show')\">
                                <i class=\"fas fa-file-contract mr-1\"></i>Choisir contrat
                            </button>
                        {% elseif c.statut.value == 'CONTRACT_PENDING' %}
                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier le type de contrat\" onclick=\"\$('#contractModal{{ c.idCredit }}').modal('show')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                        {% elseif c.statut.value == 'ACTIVE' %}
                            <a href=\"{{ path('app_client_credit_pdf', {id: c.idCredit}) }}\" class=\"btn-action\" title=\"Telecharger le contrat PDF\" style=\"color:var(--primary);\">
                                <i class=\"fas fa-file-pdf\"></i>
                            </a>
                        {% elseif c.statut.value == 'REJECTED' and c.motifRejet %}
                            <button type=\"button\" class=\"btn-action\" style=\"color:var(--danger);\" title=\"Motif: {{ c.motifRejet|e('html_attr') }}\" onclick=\"alert('Motif du rejet:\\n\\n{{ c.motifRejet|e('js') }}')\"><i class=\"fas fa-info-circle\"></i></button>
                        {% endif %}
                    </td>
                </tr>

                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

{% for c in credits %}
{% if c.statut.value == 'APPROVED' or c.statut.value == 'CONTRACT_PENDING' %}
<div class=\"modal fade modal-admin\" id=\"contractModal{{ c.idCredit }}\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-file-contract mr-2\"></i>Choisir le type de contrat</h5>
                <small style=\"color:rgba(255,255,255,0.8);\">Credit de {{ c.montant|number_format(2, ',', ' ') }} DT</small>
            </div>
            <form method=\"post\" action=\"{{ path('app_client_credit_contract', {id: c.idCredit}) }}\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PRELEVEMENT_AUTOMATIQUE\" required style=\"margin-right:10px;\">
                        <strong>Prelevement automatique</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Prelevement le 5 de chaque mois. Pas de majoration. Penalite: 1.5%</div>
                    </label>
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PAIEMENT_MENSUEL\" style=\"margin-right:10px;\">
                        <strong>Paiement mensuel</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Paiement avant le 10 de chaque mois. Pas de majoration. Penalite: 3.0%</div>
                    </label>
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PAIEMENT_DIFFERE\" style=\"margin-right:10px;\">
                        <strong>Paiement differe</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Periode de grace. Majoration taux: +0.5%. Penalite: 2.0%</div>
                    </label>
                    <div class=\"field-error\" data-error-for=\"type_contrat\"></div>
                </div>
                <div style=\"padding:0 25px 25px;display:flex;gap:12px;justify-content:flex-end;\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin primary\">Valider le choix</button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endif %}
{% endfor %}
{% endif %}

<div class=\"modal fade modal-admin\" id=\"modifyModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-pen mr-2\"></i>Modifier la demande</h5>
            </div>
            <form id=\"modifyForm\" method=\"post\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    <div class=\"row\">
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant (DT)</label>
                            <input type=\"number\" name=\"montant\" id=\"mod_montant\" min=\"1000\" max=\"500000\" step=\"1000\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"montant\"></div>
                        </div>
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                            <input type=\"number\" name=\"duree\" id=\"mod_duree\" min=\"1\" max=\"25\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"duree\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:15px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                        <input type=\"number\" name=\"salaire\" id=\"mod_salaire\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                        <div class=\"field-error\" data-error-for=\"salaire\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif (min. 10 caracteres)</label>
                        <textarea name=\"motif\" id=\"mod_motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"10\"></textarea>
                        <div class=\"field-error\" data-error-for=\"motif\"></div>
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
{% endblock %}

{% block javascripts %}
<script>
var tauxBase = {{ tauxBase }};
function updateSimulation() {
    var m = document.getElementById('montantSlider').value;
    var d = document.getElementById('dureeSlider').value;
    var s = parseFloat(document.getElementById('salaireInput').value) || 0;
    document.getElementById('montantVal').textContent = parseInt(m).toLocaleString('fr-FR') + ' DT';
    document.getElementById('dureeVal').textContent = d + (d > 1 ? ' ans' : ' an');
    document.getElementById('montantInput').value = m;
    document.getElementById('dureeInput').value = d;
    var montant = parseFloat(m);
    var mois = parseInt(d) * 12;
    var tm = tauxBase / 100 / 12;
    var mens = montant * (tm * Math.pow(1 + tm, mois)) / (Math.pow(1 + tm, mois) - 1);
    var total = mens * mois;
    document.getElementById('simMensualite').textContent = mens.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simTotal').textContent = total.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simCout').textContent = (total - montant).toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';

    var box = document.getElementById('capacityBox');
    if (s > 0) {
        box.style.display = 'block';
        var maxAllowed = s * 0.33;
        var pct = Math.min((mens / maxAllowed) * 100, 100);
        var ok = mens <= maxAllowed;
        var bar = document.getElementById('capacityBar');
        bar.style.width = pct + '%';
        bar.style.background = ok ? '#41D4A8' : '#FE5C73';
        document.getElementById('capacityLabel').textContent = ok ? 'Eligible' : 'Non eligible';
        document.getElementById('capacityLabel').style.color = ok ? '#41D4A8' : '#FE5C73';
        document.getElementById('capacityMens').textContent = 'Mensualite: ' + mens.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
        document.getElementById('capacityMax').textContent = 'Max autorise (33%): ' + maxAllowed.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
        document.getElementById('submitBtn').disabled = !ok;
        document.getElementById('submitBtn').style.opacity = ok ? '1' : '0.5';
    } else {
        box.style.display = 'none';
        document.getElementById('submitBtn').disabled = false;
        document.getElementById('submitBtn').style.opacity = '1';
    }
}
updateSimulation();

function openModifyModal(id, montant, duree, salaire, motif) {
    document.getElementById('modifyForm').action = '/client/credits/' + id + '/modify';
    document.getElementById('mod_montant').value = montant;
    document.getElementById('mod_duree').value = duree;
    document.getElementById('mod_salaire').value = salaire;
    document.getElementById('mod_motif').value = motif;
    \$('#modifyModal').modal('show');
}

function getInlineValidationMessage(field) {
    if (field.validity.valueMissing) {
        return 'Ce champ est obligatoire.';
    }
    if (field.validity.rangeUnderflow || field.validity.rangeOverflow) {
        if (field.name === 'salaire') {
            return 'Le salaire doit etre superieur a 0.';
        }
        if (field.name === 'montant') {
            return 'Le montant doit etre entre 1 000 et 500 000 DT.';
        }
        if (field.name === 'duree') {
            return 'La duree doit etre entre 1 et 25 ans.';
        }
    }
    if (field.validity.tooShort) {
        return 'La valeur saisie est trop courte.';
    }
    if (field.type === 'radio') {
        return 'Veuillez choisir une option.';
    }
    return '';
}

function validateInlineField(field, form) {
    var targetName = field.name;
    var errorEl = form.querySelector('[data-error-for=\"' + targetName + '\"]');

    if (!errorEl) {
        return true;
    }

    var isValid = true;
    var message = '';

    if (field.type === 'radio') {
        var checked = form.querySelector('input[name=\"' + targetName + '\"]:checked');
        isValid = !!checked;
        message = checked ? '' : getInlineValidationMessage(field);
    } else {
        isValid = field.checkValidity();
        message = isValid ? '' : getInlineValidationMessage(field);
        field.classList.toggle('input-error', !isValid);
    }

    if (field.type === 'radio') {
        form.querySelectorAll('input[name=\"' + targetName + '\"]').forEach(function(radio) {
            radio.classList.toggle('input-error', !isValid);
        });
    }

    errorEl.textContent = message;
    errorEl.classList.toggle('is-visible', !isValid);

    return isValid;
}

function setupInlineValidation(form) {
    if (!form) {
        return;
    }

    var fields = form.querySelectorAll('input[name], textarea[name], select[name]');

    fields.forEach(function(field) {
        var eventName = field.type === 'radio' ? 'change' : 'input';
        field.addEventListener(eventName, function() {
            validateInlineField(field, form);
        });
    });

    form.addEventListener('submit', function(event) {
        var firstInvalid = null;
        var valid = true;

        fields.forEach(function(field) {
            if (!validateInlineField(field, form)) {
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

document.querySelectorAll('form[data-inline-validate]').forEach(setupInlineValidation);
</script>
{% endblock %}
", "client/credit/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\client\\credit\\index.html.twig");
    }
}
