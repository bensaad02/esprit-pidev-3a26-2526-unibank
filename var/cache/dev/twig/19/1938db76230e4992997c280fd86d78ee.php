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

    // line 3
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

    // line 5
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

    // line 7
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

        // line 8
        yield "<style>
";
        // line 10
        yield ".field-error {
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

    // line 31
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

        // line 32
        yield "

";
        // line 35
        yield "


<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-calculator mr-2\" style=\"color:var(--primary);\"></i>Simulateur & Demande de credit</h5>
    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        ";
        // line 44
        yield "        <form method=\"post\" action=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_apply");
        yield "\" id=\"creditForm\" novalidate data-inline-validate>
            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    ";
        // line 48
        yield "                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant du credit (DT)</label>
                    <input type=\"range\" id=\"montantSlider\" min=\"1000\" max=\"500000\" step=\"1000\" value=\"50000\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    ";
        // line 51
        yield "                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 000</span><span id=\"montantVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">50 000 DT</span><span>500 000</span></div>
                    ";
        // line 53
        yield "                    <input type=\"hidden\" name=\"montant\" id=\"montantInput\" value=\"50000\">
                    ";
        // line 55
        yield "                    <div class=\"field-error\" data-error-for=\"montant\"></div>
                </div>
                <div class=\"col-md-6 mb-3\">
                    ";
        // line 59
        yield "                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                    <input type=\"range\" id=\"dureeSlider\" min=\"1\" max=\"25\" step=\"1\" value=\"5\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    ";
        // line 62
        yield "                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 an</span><span id=\"dureeVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">5 ans</span><span>25 ans</span></div>
                    ";
        // line 64
        yield "                    <input type=\"hidden\" name=\"duree\" id=\"dureeInput\" value=\"5\">
                    ";
        // line 66
        yield "                    <div class=\"field-error\" data-error-for=\"duree\"></div>
                </div>
            </div>

            ";
        // line 71
        yield "            <div style=\"background:var(--bg);border-radius:12px;padding:20px;margin:15px 0;display:flex;gap:30px;flex-wrap:wrap;justify-content:center;\">
                <div style=\"text-align:center;\">
                    <div style=\"font-size:12px;color:var(--text-secondary);\">Taux annuel</div>
                    <div style=\"font-size:18px;font-weight:700;color:var(--primary);\">";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tauxBase"]) || array_key_exists("tauxBase", $context) ? $context["tauxBase"] : (function () { throw new RuntimeError('Variable "tauxBase" does not exist.', 74, $this->source); })()), "html", null, true);
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

            ";
        // line 91
        yield "            <div id=\"capacityBox\" style=\"background:#f8fafc;border-radius:10px;padding:15px;margin-bottom:15px;display:none;\">
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
                    ";
        // line 108
        yield "                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                    <input type=\"number\" name=\"salaire\" id=\"salaireInput\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"Ex: 2500\" oninput=\"updateSimulation()\">
                    <div class=\"field-error\" data-error-for=\"salaire\"></div>
                </div>
                <div class=\"col-md-8 mb-3\">
                    ";
        // line 114
        yield "                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif de la demande (min. 10 caracteres)</label>
                    <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"10\" placeholder=\"Decrivez le motif de votre demande de credit...\"></textarea>
                    <div class=\"field-error\" data-error-for=\"motif\"></div>
                </div>
            </div>
            ";
        // line 120
        yield "
            <button type=\"submit\" class=\"btn-admin primary\" id=\"submitBtn\">Soumettre la demande</button>
        </form>
    </div>
</div>

";
        // line 126
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 126, $this->source); })())) > 0)) {
            // line 127
            yield "
";
            // line 129
            yield "


<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-list mr-2\" style=\"color:var(--primary);\"></i>Mes demandes de credit (";
            // line 134
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 134, $this->source); })())), "html", null, true);
            yield ")</h5>
    </div>
    <div class=\"card-body\">
        <table class=\"admin-table\">
            <thead>
                <tr><th>Montant</th><th>Duree</th><th>Mensualite</th><th>Statut</th><th>Date</th><th>Actions</th></tr>
            </thead>
            <tbody>
                ";
            // line 143
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 143, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 144
                yield "                <tr>
                    <td style=\"font-weight:700;\">";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 145), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td>";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dureeEnMois", [], "any", false, false, false, 146), "html", null, true);
                yield " mois</td>
                    <td style=\"color:var(--success);font-weight:600;\">";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "mensualite", [], "any", false, false, false, 147), 2, ",", " "), "html", null, true);
                yield " DT</td>
                    <td>
                        ";
                // line 149
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 149), "value", [], "any", false, false, false, 149) == "PENDING")) {
                    // line 150
                    yield "                            <span class=\"badge-status pending\">En attente</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 151
$context["c"], "statut", [], "any", false, false, false, 151), "value", [], "any", false, false, false, 151) == "APPROVED")) {
                    // line 152
                    yield "                            <span class=\"badge-status approved\">Approuve</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 153
$context["c"], "statut", [], "any", false, false, false, 153), "value", [], "any", false, false, false, 153) == "CONTRACT_PENDING")) {
                    // line 154
                    yield "                            <span class=\"badge-status\" style=\"background:#E7EDFF;color:var(--primary);\">Contrat en cours</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 155
$context["c"], "statut", [], "any", false, false, false, 155), "value", [], "any", false, false, false, 155) == "REJECTED")) {
                    // line 156
                    yield "                            <span class=\"badge-status rejected\">Rejete</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 157
$context["c"], "statut", [], "any", false, false, false, 157), "value", [], "any", false, false, false, 157) == "ACTIVE")) {
                    // line 158
                    yield "                            <span class=\"badge-status active\">Actif</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 159
$context["c"], "statut", [], "any", false, false, false, 159), "value", [], "any", false, false, false, 159) == "COMPLETED")) {
                    // line 160
                    yield "                            <span class=\"badge-status\" style=\"background:#E0F8EF;color:#1A9E6E;\">Termine</span>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 161
$context["c"], "statut", [], "any", false, false, false, 161), "value", [], "any", false, false, false, 161) == "CANCELLED")) {
                    // line 162
                    yield "                            <span class=\"badge-status suspended\">Annule</span>
                        ";
                }
                // line 164
                yield "                    </td>
                    <td style=\"font-size:13px;\">";
                // line 165
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dateCreation", [], "any", false, false, false, 165), "d/m/Y"), "html", null, true);
                yield "</td>
                    <td style=\"white-space:nowrap;\">
                        ";
                // line 167
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 167), "value", [], "any", false, false, false, 167) == "PENDING")) {
                    // line 168
                    yield "

                            ";
                    // line 171
                    yield "

                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier\" onclick=\"openModifyModal(";
                    // line 173
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 173), "html", null, true);
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 173), "html", null, true);
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((CoreExtension::getAttribute($this->env, $this->source, $context["c"], "dureeEnMois", [], "any", false, false, false, 173) / 12)), "html", null, true);
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "salaireMensuel", [], "any", false, false, false, 173), "html", null, true);
                    yield ", '";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifDemande", [], "any", false, false, false, 173), "js"), "html", null, true);
                    yield "')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                            <form method=\"post\" action=\"";
                    // line 176
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_cancel", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 176)]), "html", null, true);
                    yield "\" style=\"display:inline;\">
                            <button type=\"submit\" class=\"btn-action delete\" title=\"Annuler\" onclick=\"return confirm('Annuler cette demande ?')\"><i class=\"fas fa-times\"></i></button>
                            </form>
                            ";
                    // line 180
                    yield "                            <form method=\"post\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 180)]), "html", null, true);
                    yield "\" style=\"display:inline;\">
                                <button type=\"submit\" class=\"btn-action delete\" title=\"Supprimer\" onclick=\"return confirm('Supprimer definitivement cette demande de credit ?')\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 185
$context["c"], "statut", [], "any", false, false, false, 185), "value", [], "any", false, false, false, 185) == "APPROVED")) {
                    // line 186
                    yield "
                            ";
                    // line 188
                    yield "

                            <button type=\"button\" class=\"btn-admin primary\" style=\"padding:4px 12px;font-size:12px;\" onclick=\"\$('#contractModal";
                    // line 190
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 190), "html", null, true);
                    yield "').modal('show')\">
                                <i class=\"fas fa-file-contract mr-1\"></i>Choisir contrat
                            </button>
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 193
$context["c"], "statut", [], "any", false, false, false, 193), "value", [], "any", false, false, false, 193) == "CONTRACT_PENDING")) {
                    // line 194
                    yield "

                            ";
                    // line 197
                    yield "


                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier le type de contrat\" onclick=\"\$('#contractModal";
                    // line 200
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 200), "html", null, true);
                    yield "').modal('show')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                    
                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 204
$context["c"], "statut", [], "any", false, false, false, 204), "value", [], "any", false, false, false, 204) == "ACTIVE")) {
                    // line 205
                    yield "

                            ";
                    // line 208
                    yield "


                            <a href=\"";
                    // line 211
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 211)]), "html", null, true);
                    yield "\" class=\"btn-action\" title=\"Telecharger le contrat PDF\" style=\"color:var(--primary);\">
                                <i class=\"fas fa-file-pdf\"></i>
                            </a>
                        ";
                } elseif (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 214
$context["c"], "statut", [], "any", false, false, false, 214), "value", [], "any", false, false, false, 214) == "REJECTED") && CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifRejet", [], "any", false, false, false, 214))) {
                    // line 215
                    yield "                            ";
                    // line 216
                    yield "                            <button type=\"button\" class=\"btn-action\" style=\"color:var(--danger);\" title=\"Motif: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifRejet", [], "any", false, false, false, 216), "html_attr");
                    yield "\" onclick=\"alert('Motif du rejet:\\n\\n";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "motifRejet", [], "any", false, false, false, 216), "js"), "html", null, true);
                    yield "')\"><i class=\"fas fa-info-circle\"></i></button>
                        ";
                }
                // line 218
                yield "                    </td>
                </tr>

                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['c'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 222
            yield "            </tbody>
        </table>
    </div>
</div>

";
            // line 228
            yield "


";
            // line 231
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["credits"]) || array_key_exists("credits", $context) ? $context["credits"] : (function () { throw new RuntimeError('Variable "credits" does not exist.', 231, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 232
                if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 232), "value", [], "any", false, false, false, 232) == "APPROVED") || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["c"], "statut", [], "any", false, false, false, 232), "value", [], "any", false, false, false, 232) == "CONTRACT_PENDING"))) {
                    // line 233
                    yield "<div class=\"modal fade modal-admin\" id=\"contractModal";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 233), "html", null, true);
                    yield "\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-file-contract mr-2\"></i>Choisir le type de contrat</h5>
                <small style=\"color:rgba(255,255,255,0.8);\">Credit de ";
                    // line 238
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["c"], "montant", [], "any", false, false, false, 238), 2, ",", " "), "html", null, true);
                    yield " DT</small>
            </div>
            ";
                    // line 241
                    yield "            <form method=\"post\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credit_contract", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["c"], "idCredit", [], "any", false, false, false, 241)]), "html", null, true);
                    yield "\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    ";
                    // line 244
                    yield "                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PRELEVEMENT_AUTOMATIQUE\" required style=\"margin-right:10px;\">
                        <strong>Prelevement automatique</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Prelevement le 5 de chaque mois. Pas de majoration. Penalite: 1.5%</div>
                    </label>
                    ";
                    // line 250
                    yield "                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PAIEMENT_MENSUEL\" style=\"margin-right:10px;\">
                        <strong>Paiement mensuel</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Paiement avant le 10 de chaque mois. Pas de majoration. Penalite: 3.0%</div>
                    </label>
                    ";
                    // line 256
                    yield "                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;\">
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
        // line 274
        yield "
";
        // line 276
        yield "



<div class=\"modal fade modal-admin\" id=\"modifyModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-pen mr-2\"></i>Modifier la demande</h5>
            </div>
            ";
        // line 287
        yield "            <form id=\"modifyForm\" method=\"post\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    <div class=\"row\">
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            ";
        // line 292
        yield "                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant (DT)</label>
                            <input type=\"number\" name=\"montant\" id=\"mod_montant\" min=\"1000\" max=\"500000\" step=\"1000\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"montant\"></div>
                        </div>
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            ";
        // line 298
        yield "                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                            <input type=\"number\" name=\"duree\" id=\"mod_duree\" min=\"1\" max=\"25\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"duree\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:15px;\">
                        ";
        // line 305
        yield "                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                        <input type=\"number\" name=\"salaire\" id=\"mod_salaire\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                        <div class=\"field-error\" data-error-for=\"salaire\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        ";
        // line 311
        yield "                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif (min. 10 caracteres)</label>
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

    // line 326
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

        // line 327
        yield "<script>


// Lorsque la page se charge, ce script gere la simulation, la modification et la validation front
// Taux de base envoye par Twig depuis le controller


var tauxBase = ";
        // line 334
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tauxBase"]) || array_key_exists("tauxBase", $context) ? $context["tauxBase"] : (function () { throw new RuntimeError('Variable "tauxBase" does not exist.', 334, $this->source); })()), "html", null, true);
        yield ";

// Recalcule et met a jour toute la simulation du credit

function updateSimulation() {
    // Valeurs actuelles choisies par l'utilisateur
    var m = document.getElementById('montantSlider').value;
    var d = document.getElementById('dureeSlider').value;
    var s = parseFloat(document.getElementById('salaireInput').value) || 0;

    // Mise a jour des textes visibles et des champs caches envoyes au serveur

    document.getElementById('montantVal').textContent = parseInt(m).toLocaleString('fr-FR') + ' DT';
    document.getElementById('dureeVal').textContent = d + (d > 1 ? ' ans' : ' an');
    document.getElementById('montantInput').value = m;
    document.getElementById('dureeInput').value = d;

    // Calcul de la mensualite, du total et du cout du credit

    var montant = parseFloat(m);
    var mois = parseInt(d) * 12;
    var tm = tauxBase / 100 / 12;
    var mens = montant * (tm * Math.pow(1 + tm, mois)) / (Math.pow(1 + tm, mois) - 1);
    var total = mens * mois;
    document.getElementById('simMensualite').textContent = mens.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simTotal').textContent = total.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simCout').textContent = (total - montant).toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';

    // Verification de la regle des 33% du salaire

    
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

// Lance une premiere simulation au chargement de la page
updateSimulation();

// Ouvre la modale de modification et remplit les champs avec les donnees du credit
function openModifyModal(id, montant, duree, salaire, motif) {
    document.getElementById('modifyForm').action = '/client/credits/' + id + '/modify';
    document.getElementById('mod_montant').value = montant;
    document.getElementById('mod_duree').value = duree;
    document.getElementById('mod_salaire').value = salaire;
    document.getElementById('mod_motif').value = motif;
    \$('#modifyModal').modal('show');
}

// Retourne le message adapte selon l'erreur HTML de validation


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

// Valide un champ et affiche ou masque son message d'erreur
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

// Active la validation en direct sur tous les champs d'un formulaire
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

    // Au submit, on bloque l'envoi si au moins un champ est invalide
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

// Applique la validation a tous les formulaires qui demandent ce comportement
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
        return array (  650 => 334,  641 => 327,  628 => 326,  604 => 311,  597 => 305,  589 => 298,  582 => 292,  576 => 287,  564 => 276,  561 => 274,  538 => 256,  531 => 250,  524 => 244,  518 => 241,  513 => 238,  504 => 233,  502 => 232,  498 => 231,  493 => 228,  486 => 222,  477 => 218,  469 => 216,  467 => 215,  465 => 214,  459 => 211,  454 => 208,  450 => 205,  448 => 204,  441 => 200,  436 => 197,  432 => 194,  430 => 193,  424 => 190,  420 => 188,  417 => 186,  415 => 185,  406 => 180,  400 => 176,  386 => 173,  382 => 171,  378 => 168,  376 => 167,  371 => 165,  368 => 164,  364 => 162,  362 => 161,  359 => 160,  357 => 159,  354 => 158,  352 => 157,  349 => 156,  347 => 155,  344 => 154,  342 => 153,  339 => 152,  337 => 151,  334 => 150,  332 => 149,  327 => 147,  323 => 146,  319 => 145,  316 => 144,  311 => 143,  300 => 134,  293 => 129,  290 => 127,  288 => 126,  280 => 120,  273 => 114,  266 => 108,  248 => 91,  229 => 74,  224 => 71,  218 => 66,  215 => 64,  212 => 62,  208 => 59,  203 => 55,  200 => 53,  197 => 51,  193 => 48,  186 => 44,  176 => 35,  172 => 32,  159 => 31,  129 => 10,  126 => 8,  113 => 7,  90 => 5,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'client/base.html.twig' %}
{# Titre de l'onglet du navigateur #}
{% block title %}Mes Credits - UniBank+{% endblock %}
{# Titre affiche dans le layout client #}
{% block page_title %}Mes Credits{% endblock %}

{% block stylesheets %}
<style>
{# Zone qui affiche les messages d'erreur sous les champs #}
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


{# Lorsque le client veut faire une nouvelle demande de credit,  #}



<div class=\"admin-card mb-4\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-calculator mr-2\" style=\"color:var(--primary);\"></i>Simulateur & Demande de credit</h5>
    </div>
    <div class=\"card-body\" style=\"padding:25px;\">
        {# Formulaire POST envoye vers la route de creation d'un credit #}
        <form method=\"post\" action=\"{{ path('app_client_credit_apply') }}\" id=\"creditForm\" novalidate data-inline-validate>
            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    {# Slider pour choisir le montant du credit #}
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant du credit (DT)</label>
                    <input type=\"range\" id=\"montantSlider\" min=\"1000\" max=\"500000\" step=\"1000\" value=\"50000\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    {# Valeur visuelle du slider montant #}
                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 000</span><span id=\"montantVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">50 000 DT</span><span>500 000</span></div>
                    {# Champ cache reellement envoye au serveur #}
                    <input type=\"hidden\" name=\"montant\" id=\"montantInput\" value=\"50000\">
                    {# Emplacement du message d'erreur du montant #}
                    <div class=\"field-error\" data-error-for=\"montant\"></div>
                </div>
                <div class=\"col-md-6 mb-3\">
                    {# Slider pour choisir la duree en annees #}
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                    <input type=\"range\" id=\"dureeSlider\" min=\"1\" max=\"25\" step=\"1\" value=\"5\" style=\"width:100%;\" oninput=\"updateSimulation()\">
                    {# Valeur visuelle du slider duree #}
                    <div class=\"d-flex justify-content-between\" style=\"font-size:12px;color:var(--text-secondary);\"><span>1 an</span><span id=\"dureeVal\" style=\"font-weight:700;color:var(--primary);font-size:16px;\">5 ans</span><span>25 ans</span></div>
                    {# Champ cache reellement envoye au serveur #}
                    <input type=\"hidden\" name=\"duree\" id=\"dureeInput\" value=\"5\">
                    {# Emplacement du message d'erreur de la duree #}
                    <div class=\"field-error\" data-error-for=\"duree\"></div>
                </div>
            </div>

            {# Lorsque le client choisit le montant et la duree, ce bloc affiche la simulation du credit #}
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

            {# Lorsque le client saisit son salaire, ce bloc indique s'il est eligible selon la regle des 33% #}
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
                    {# Champ salaire obligatoire utilise aussi dans la simulation #}
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                    <input type=\"number\" name=\"salaire\" id=\"salaireInput\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required placeholder=\"Ex: 2500\" oninput=\"updateSimulation()\">
                    <div class=\"field-error\" data-error-for=\"salaire\"></div>
                </div>
                <div class=\"col-md-8 mb-3\">
                    {# Champ texte pour expliquer le motif de la demande #}
                    <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Motif de la demande (min. 10 caracteres)</label>
                    <textarea name=\"motif\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"10\" placeholder=\"Decrivez le motif de votre demande de credit...\"></textarea>
                    <div class=\"field-error\" data-error-for=\"motif\"></div>
                </div>
            </div>
            {# Bouton d'envoi de la demande #}

            <button type=\"submit\" class=\"btn-admin primary\" id=\"submitBtn\">Soumettre la demande</button>
        </form>
    </div>
</div>

{% if credits|length > 0 %}

{# Lorsque le client consulte ses demandes existantes, ce bloc affiche la liste des credits deja crees #}



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
                {# Boucle sur chaque credit envoye par le controller #}
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


                            {# Lorsque le client clique sur Modifier ou Annuler, il agit sur une demande encore en attente #}


                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier\" onclick=\"openModifyModal({{ c.idCredit }}, {{ c.montant }}, {{ (c.dureeEnMois / 12)|round }}, {{ c.salaireMensuel }}, '{{ c.motifDemande|e('js') }}')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                            <form method=\"post\" action=\"{{ path('app_client_credit_cancel', {id: c.idCredit}) }}\" style=\"display:inline;\">
                            <button type=\"submit\" class=\"btn-action delete\" title=\"Annuler\" onclick=\"return confirm('Annuler cette demande ?')\"><i class=\"fas fa-times\"></i></button>
                            </form>
                            {# Lorsque le client clique sur Supprimer, la demande est effacee definitivement avant verification admin #}
                            <form method=\"post\" action=\"{{ path('app_client_credit_delete', {id: c.idCredit}) }}\" style=\"display:inline;\">
                                <button type=\"submit\" class=\"btn-action delete\" title=\"Supprimer\" onclick=\"return confirm('Supprimer definitivement cette demande de credit ?')\">
                                    <i class=\"fas fa-trash\"></i>
                                </button>
                            </form>
                        {% elseif c.statut.value == 'APPROVED' %}

                            {# Lorsque le client clique sur Choisir contrat, il passe a l'etape de selection du type de contrat #}


                            <button type=\"button\" class=\"btn-admin primary\" style=\"padding:4px 12px;font-size:12px;\" onclick=\"\$('#contractModal{{ c.idCredit }}').modal('show')\">
                                <i class=\"fas fa-file-contract mr-1\"></i>Choisir contrat
                            </button>
                        {% elseif c.statut.value == 'CONTRACT_PENDING' %}


                            {# Lorsque le client reclique sur Modifier, il peut changer son type de contrat avant finalisation #}



                            <button type=\"button\" class=\"btn-action edit\" title=\"Modifier le type de contrat\" onclick=\"\$('#contractModal{{ c.idCredit }}').modal('show')\">
                                <i class=\"fas fa-pen\"></i>
                            </button>
                    
                        {% elseif c.statut.value == 'ACTIVE' %}


                            {# Lorsque le credit est actif, le client peut telecharger le contrat en PDF #}



                            <a href=\"{{ path('app_client_credit_pdf', {id: c.idCredit}) }}\" class=\"btn-action\" title=\"Telecharger le contrat PDF\" style=\"color:var(--primary);\">
                                <i class=\"fas fa-file-pdf\"></i>
                            </a>
                        {% elseif c.statut.value == 'REJECTED' and c.motifRejet %}
                            {# Si le credit est rejete, on affiche le motif dans une info-bulle/alerte #}
                            <button type=\"button\" class=\"btn-action\" style=\"color:var(--danger);\" title=\"Motif: {{ c.motifRejet|e('html_attr') }}\" onclick=\"alert('Motif du rejet:\\n\\n{{ c.motifRejet|e('js') }}')\"><i class=\"fas fa-info-circle\"></i></button>
                        {% endif %}
                    </td>
                </tr>

                {% endfor %}
            </tbody>
        </table>
    </div>
</div>

{# Lorsque le client clique sur Choisir contrat ou Modifier le type de contrat, cette modale s'affiche #}



{% for c in credits %}
{% if c.statut.value == 'APPROVED' or c.statut.value == 'CONTRACT_PENDING' %}
<div class=\"modal fade modal-admin\" id=\"contractModal{{ c.idCredit }}\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-file-contract mr-2\"></i>Choisir le type de contrat</h5>
                <small style=\"color:rgba(255,255,255,0.8);\">Credit de {{ c.montant|number_format(2, ',', ' ') }} DT</small>
            </div>
            {# Formulaire POST qui enregistre le type de contrat choisi #}
            <form method=\"post\" action=\"{{ path('app_client_credit_contract', {id: c.idCredit}) }}\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    {# Option 1 : prelevement automatique #}
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PRELEVEMENT_AUTOMATIQUE\" required style=\"margin-right:10px;\">
                        <strong>Prelevement automatique</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Prelevement le 5 de chaque mois. Pas de majoration. Penalite: 1.5%</div>
                    </label>
                    {# Option 2 : paiement mensuel #}
                    <label style=\"display:block;padding:15px;border:2px solid var(--border);border-radius:10px;cursor:pointer;margin-bottom:10px;\">
                        <input type=\"radio\" name=\"type_contrat\" value=\"PAIEMENT_MENSUEL\" style=\"margin-right:10px;\">
                        <strong>Paiement mensuel</strong>
                        <div style=\"font-size:12px;color:var(--text-secondary);margin-top:4px;\">Paiement avant le 10 de chaque mois. Pas de majoration. Penalite: 3.0%</div>
                    </label>
                    {# Option 3 : paiement differe #}
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

{# Lorsque le client clique sur Modifier, cette modale lui permet de changer les informations du credit #}




<div class=\"modal fade modal-admin\" id=\"modifyModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border:none;border-radius:16px;overflow:hidden;\">
            <div style=\"background:linear-gradient(135deg,var(--primary),#4C49ED);padding:20px 25px;\">
                <h5 style=\"color:#fff;font-weight:700;margin:0;\"><i class=\"fas fa-pen mr-2\"></i>Modifier la demande</h5>
            </div>
            {# Le JS remplit cette modale avec les valeurs du credit selectionne #}
            <form id=\"modifyForm\" method=\"post\" novalidate data-inline-validate>
                <div style=\"padding:25px;\">
                    <div class=\"row\">
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            {# Nouveau montant #}
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Montant (DT)</label>
                            <input type=\"number\" name=\"montant\" id=\"mod_montant\" min=\"1000\" max=\"500000\" step=\"1000\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"montant\"></div>
                        </div>
                        <div class=\"col-6 form-group\" style=\"margin-bottom:15px;\">
                            {# Nouvelle duree #}
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Duree (annees)</label>
                            <input type=\"number\" name=\"duree\" id=\"mod_duree\" min=\"1\" max=\"25\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                            <div class=\"field-error\" data-error-for=\"duree\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:15px;\">
                        {# Nouveau salaire #}
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);display:block;margin-bottom:6px;\">Salaire mensuel (DT)</label>
                        <input type=\"number\" name=\"salaire\" id=\"mod_salaire\" step=\"0.01\" min=\"1\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                        <div class=\"field-error\" data-error-for=\"salaire\"></div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:0;\">
                        {# Nouveau motif #}
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


// Lorsque la page se charge, ce script gere la simulation, la modification et la validation front
// Taux de base envoye par Twig depuis le controller


var tauxBase = {{ tauxBase }};

// Recalcule et met a jour toute la simulation du credit

function updateSimulation() {
    // Valeurs actuelles choisies par l'utilisateur
    var m = document.getElementById('montantSlider').value;
    var d = document.getElementById('dureeSlider').value;
    var s = parseFloat(document.getElementById('salaireInput').value) || 0;

    // Mise a jour des textes visibles et des champs caches envoyes au serveur

    document.getElementById('montantVal').textContent = parseInt(m).toLocaleString('fr-FR') + ' DT';
    document.getElementById('dureeVal').textContent = d + (d > 1 ? ' ans' : ' an');
    document.getElementById('montantInput').value = m;
    document.getElementById('dureeInput').value = d;

    // Calcul de la mensualite, du total et du cout du credit

    var montant = parseFloat(m);
    var mois = parseInt(d) * 12;
    var tm = tauxBase / 100 / 12;
    var mens = montant * (tm * Math.pow(1 + tm, mois)) / (Math.pow(1 + tm, mois) - 1);
    var total = mens * mois;
    document.getElementById('simMensualite').textContent = mens.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simTotal').textContent = total.toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';
    document.getElementById('simCout').textContent = (total - montant).toLocaleString('fr-FR', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' DT';

    // Verification de la regle des 33% du salaire

    
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

// Lance une premiere simulation au chargement de la page
updateSimulation();

// Ouvre la modale de modification et remplit les champs avec les donnees du credit
function openModifyModal(id, montant, duree, salaire, motif) {
    document.getElementById('modifyForm').action = '/client/credits/' + id + '/modify';
    document.getElementById('mod_montant').value = montant;
    document.getElementById('mod_duree').value = duree;
    document.getElementById('mod_salaire').value = salaire;
    document.getElementById('mod_motif').value = motif;
    \$('#modifyModal').modal('show');
}

// Retourne le message adapte selon l'erreur HTML de validation


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

// Valide un champ et affiche ou masque son message d'erreur
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

// Active la validation en direct sur tous les champs d'un formulaire
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

    // Au submit, on bloque l'envoi si au moins un champ est invalide
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

// Applique la validation a tous les formulaires qui demandent ce comportement
document.querySelectorAll('form[data-inline-validate]').forEach(setupInlineValidation);
</script>
{% endblock %}
", "client/credit/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\client\\credit\\index.html.twig");
    }
}
