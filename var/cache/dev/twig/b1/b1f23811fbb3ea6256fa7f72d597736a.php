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

/* admin/user/list.html.twig */
class __TwigTemplate_efdabe2d47ad1b81270a8054effcafc0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/user/list.html.twig"));

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

        yield "Gestion Clients - Admin UniBank+";
        
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

        yield "Gestion Clients";
        
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
        <h5><i class=\"fas fa-users mr-2\" style=\"color:var(--primary);\"></i>Liste des clients (";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["clients"]) || array_key_exists("clients", $context) ? $context["clients"] : (function () { throw new RuntimeError('Variable "clients" does not exist.', 8, $this->source); })())), "html", null, true);
        yield ")</h5>
        <form method=\"get\" action=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_users");
        yield "\" class=\"filter-bar\">
            <input type=\"text\" name=\"q\" value=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 10, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher nom, email, CIN...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:220px;\">
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" ";
        // line 12
        yield ((((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 12, $this->source); })()) == "all")) ? ("selected") : (""));
        yield ">Tous les statuts</option>
                <option value=\"PENDING\" ";
        // line 13
        yield ((((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 13, $this->source); })()) == "PENDING")) ? ("selected") : (""));
        yield ">En attente</option>
                <option value=\"APPROVED\" ";
        // line 14
        yield ((((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 14, $this->source); })()) == "APPROVED")) ? ("selected") : (""));
        yield ">Approuve</option>
                <option value=\"REJECTED\" ";
        // line 15
        yield ((((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 15, $this->source); })()) == "REJECTED")) ? ("selected") : (""));
        yield ">Rejete</option>
                <option value=\"SUSPENDED\" ";
        // line 16
        yield ((((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 16, $this->source); })()) == "SUSPENDED")) ? ("selected") : (""));
        yield ">Suspendu</option>
            </select>
            ";
        // line 18
        if (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 18, $this->source); })()) || ((isset($context["statusFilter"]) || array_key_exists("statusFilter", $context) ? $context["statusFilter"] : (function () { throw new RuntimeError('Variable "statusFilter" does not exist.', 18, $this->source); })()) != "all"))) {
            // line 19
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_users");
            yield "\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            ";
        }
        // line 21
        yield "        </form>
    </div>
    <div class=\"card-body\">
        ";
        // line 24
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["clients"]) || array_key_exists("clients", $context) ? $context["clients"] : (function () { throw new RuntimeError('Variable "clients" does not exist.', 24, $this->source); })())) > 0)) {
            // line 25
            yield "        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>CIN</th>
                    <th>Telephone</th>
                    <th>Statut</th>
                    <th>Etat</th>
                    <th>Inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["clients"]) || array_key_exists("clients", $context) ? $context["clients"] : (function () { throw new RuntimeError('Variable "clients" does not exist.', 38, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                // line 39
                yield "                <tr>
                    <td>
                        <div class=\"user-cell\">
                            <div class=\"user-avatar\">";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 42)), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 42)), "html", null, true);
                yield "</div>
                            <div class=\"user-details\">
                                <div class=\"user-name\">";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 44), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 44), "html", null, true);
                yield "</div>
                                <div class=\"user-email\">";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "email", [], "any", false, false, false, 45), "html", null, true);
                yield "</div>
                            </div>
                        </div>
                    </td>
                    <td>";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "cin", [], "any", false, false, false, 49), "html", null, true);
                yield "</td>
                    <td>";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "telephone", [], "any", false, false, false, 50), "html", null, true);
                yield "</td>
                    <td>
                        ";
                // line 52
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["client"], "clientStatus", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 53
                    yield "                            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["client"], "clientStatus", [], "any", false, false, false, 53), "value", [], "any", false, false, false, 53) == "APPROVED")) {
                        // line 54
                        yield "                                <span class=\"badge-status approved\">Approuve</span>
                            ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                     // line 55
$context["client"], "clientStatus", [], "any", false, false, false, 55), "value", [], "any", false, false, false, 55) == "PENDING")) {
                        // line 56
                        yield "                                <span class=\"badge-status pending\">En attente</span>
                            ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                     // line 57
$context["client"], "clientStatus", [], "any", false, false, false, 57), "value", [], "any", false, false, false, 57) == "REJECTED")) {
                        // line 58
                        yield "                                <span class=\"badge-status rejected\">Rejete</span>
                            ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                     // line 59
$context["client"], "clientStatus", [], "any", false, false, false, 59), "value", [], "any", false, false, false, 59) == "SUSPENDED")) {
                        // line 60
                        yield "                                <span class=\"badge-status suspended\">Suspendu</span>
                            ";
                    }
                    // line 62
                    yield "                        ";
                } else {
                    // line 63
                    yield "                            <span class=\"badge-status suspended\">-</span>
                        ";
                }
                // line 65
                yield "                    </td>
                    <td>
                        ";
                // line 67
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["client"], "estActif", [], "any", false, false, false, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 68
                    yield "                            <span class=\"badge-status active\">Actif</span>
                        ";
                } else {
                    // line 70
                    yield "                            <span class=\"badge-status banned\">Banni</span>
                        ";
                }
                // line 72
                yield "                    </td>
                    <td>";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "dateCreation", [], "any", false, false, false, 73), "d/m/Y"), "html", null, true);
                yield "</td>
                    <td style=\"white-space:nowrap;\">
                        <button class=\"btn-action edit\" title=\"Modifier\" onclick=\"openEditModal(";
                // line 75
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 75), "html", null, true);
                yield ", '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 75), "js"), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 75), "js"), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "email", [], "any", false, false, false, 75), "js"), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "telephone", [], "any", false, false, false, 75), "js"), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "cin", [], "any", false, false, false, 75), "js"), "html", null, true);
                yield "', '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "adresse", [], "any", false, false, false, 75), "js"), "html", null, true);
                yield "')\">
                            <i class=\"fas fa-pen\"></i>
                        </button>
                        ";
                // line 78
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["client"], "estActif", [], "any", false, false, false, 78)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 79
                    yield "                            <button type=\"button\" class=\"btn-action ban\" title=\"Bannir\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_ban", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 79)]), "html", null, true);
                    yield "', {type:'ban', title:'Bannir le client', message:'";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 79), "js"), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 79), "js"), "html", null, true);
                    yield " ne pourra plus acceder a son compte.', btnText:'Bannir'})\">
                                <i class=\"fas fa-ban\"></i>
                            </button>
                        ";
                } else {
                    // line 83
                    yield "                            <button type=\"button\" class=\"btn-action unban\" title=\"Debannir\" onclick=\"confirmSubmit('";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_user_ban", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 83)]), "html", null, true);
                    yield "', {type:'unban', title:'Debannir le client', message:'";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 83), "js"), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 83), "js"), "html", null, true);
                    yield " pourra a nouveau acceder a son compte.', btnText:'Debannir'})\">
                                <i class=\"fas fa-unlock\"></i>
                            </button>
                        ";
                }
                // line 87
                yield "                        <button class=\"btn-action delete\" title=\"Supprimer\" onclick=\"openDeleteModal(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "idUtilisateur", [], "any", false, false, false, 87), "html", null, true);
                yield ", '";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "prenom", [], "any", false, false, false, 87), "js"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["client"], "nom", [], "any", false, false, false, 87), "js"), "html", null, true);
                yield "')\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['client'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            yield "            </tbody>
        </table>
        ";
        } else {
            // line 96
            yield "        <div class=\"empty-state\">
            <i class=\"fas fa-search\"></i>
            <p>Aucun client trouve</p>
        </div>
        ";
        }
        // line 101
        yield "    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"editModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\"><i class=\"fas fa-pen mr-2\"></i>Modifier le client</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span>&times;</span></button>
            </div>
            <form id=\"editForm\" method=\"post\">
                <div class=\"modal-body\">
                    <div id=\"edit_global_error\" class=\"alert alert-danger\" style=\"display:none;font-size:13px;padding:8px 14px;border-radius:8px;\"></div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            <label>Prenom</label>
                            <input type=\"text\" name=\"prenom\" id=\"edit_prenom\" class=\"form-control\">
                            <div class=\"invalid-feedback\" id=\"err_prenom\"></div>
                        </div>
                        <div class=\"col-md-6 form-group\">
                            <label>Nom</label>
                            <input type=\"text\" name=\"nom\" id=\"edit_nom\" class=\"form-control\">
                            <div class=\"invalid-feedback\" id=\"err_nom\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label>Email</label>
                        <input type=\"email\" name=\"email\" id=\"edit_email\" class=\"form-control\">
                        <div class=\"invalid-feedback\" id=\"err_email\"></div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            <label>Telephone</label>
                            <input type=\"text\" name=\"telephone\" id=\"edit_telephone\" class=\"form-control\">
                            <div class=\"invalid-feedback\" id=\"err_telephone\"></div>
                        </div>
                        <div class=\"col-md-6 form-group\">
                            <label>CIN</label>
                            <input type=\"text\" name=\"cin\" id=\"edit_cin\" class=\"form-control\" maxlength=\"8\" pattern=\"\\d{8}\" inputmode=\"numeric\">
                            <div class=\"invalid-feedback\" id=\"err_cin\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label>Adresse</label>
                        <textarea name=\"adresse\" id=\"edit_adresse\" class=\"form-control\" rows=\"2\"></textarea>
                        <div class=\"invalid-feedback\" id=\"err_adresse\"></div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin primary\" id=\"edit_submit_btn\">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"deleteModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-sm\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\"><i class=\"fas fa-exclamation-triangle mr-2\" style=\"color:var(--danger);\"></i>Supprimer</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span>&times;</span></button>
            </div>
            <form id=\"deleteForm\" method=\"post\">
                <div class=\"modal-body\">
                    <p>Supprimer definitivement <strong id=\"delete_name\"></strong> ?</p>
                    <p style=\"font-size:13px;color:var(--text-secondary);\">Tapez <strong>SUPPRIMER</strong> pour confirmer</p>
                    <input type=\"text\" id=\"delete_confirm\" class=\"form-control\" placeholder=\"SUPPRIMER\" autocomplete=\"off\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin danger\" id=\"delete_btn\" disabled>Supprimer</button>
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

    // line 181
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

        // line 182
        yield "<script>
function clearEditErrors() {
    ['nom','prenom','email','telephone','cin','adresse'].forEach(function(f) {
        var input = document.getElementById('edit_' + f);
        var err = document.getElementById('err_' + f);
        input.classList.remove('is-invalid');
        err.textContent = '';
    });
    var global = document.getElementById('edit_global_error');
    global.style.display = 'none';
    global.textContent = '';
}

function openEditModal(id, nom, prenom, email, telephone, cin, adresse) {
    document.getElementById('editForm').action = '/admin/users/' + id + '/edit';
    document.getElementById('edit_nom').value = nom;
    document.getElementById('edit_prenom').value = prenom;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_telephone').value = telephone;
    document.getElementById('edit_cin').value = cin;
    document.getElementById('edit_adresse').value = adresse;
    clearEditErrors();
    \$('#editModal').modal('show');
}

document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    clearEditErrors();
    var form = this;
    var btn = document.getElementById('edit_submit_btn');
    btn.disabled = true;
    btn.textContent = 'Enregistrement...';

    fetch(form.action, {
        method: 'POST',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        body: new FormData(form)
    })
    .then(function(r) { return r.json(); })
    .then(function(data) {
        btn.disabled = false;
        btn.textContent = 'Enregistrer';
        if (data.success) {
            \$('#editModal').modal('hide');
            location.reload();
        } else {
            var errors = data.errors || {};
            if (errors._global) {
                var g = document.getElementById('edit_global_error');
                g.textContent = errors._global;
                g.style.display = 'block';
            }
            ['nom','prenom','email','telephone','cin','adresse'].forEach(function(f) {
                if (errors[f]) {
                    document.getElementById('edit_' + f).classList.add('is-invalid');
                    document.getElementById('err_' + f).textContent = errors[f];
                }
            });
        }
    })
    .catch(function() {
        btn.disabled = false;
        btn.textContent = 'Enregistrer';
        var g = document.getElementById('edit_global_error');
        g.textContent = 'Une erreur est survenue. Veuillez reessayer.';
        g.style.display = 'block';
    });
});

function openDeleteModal(id, name) {
    document.getElementById('deleteForm').action = '/admin/users/' + id + '/delete';
    document.getElementById('delete_name').textContent = name;
    document.getElementById('delete_confirm').value = '';
    document.getElementById('delete_btn').disabled = true;
    \$('#deleteModal').modal('show');
}
document.getElementById('delete_confirm').addEventListener('input', function() {
    document.getElementById('delete_btn').disabled = this.value !== 'SUPPRIMER';
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
        return "admin/user/list.html.twig";
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
        return array (  458 => 182,  445 => 181,  356 => 101,  349 => 96,  344 => 93,  327 => 87,  315 => 83,  303 => 79,  301 => 78,  283 => 75,  278 => 73,  275 => 72,  271 => 70,  267 => 68,  265 => 67,  261 => 65,  257 => 63,  254 => 62,  250 => 60,  248 => 59,  245 => 58,  243 => 57,  240 => 56,  238 => 55,  235 => 54,  232 => 53,  230 => 52,  225 => 50,  221 => 49,  214 => 45,  208 => 44,  202 => 42,  197 => 39,  193 => 38,  178 => 25,  176 => 24,  171 => 21,  165 => 19,  163 => 18,  158 => 16,  154 => 15,  150 => 14,  146 => 13,  142 => 12,  137 => 10,  133 => 9,  129 => 8,  125 => 6,  112 => 5,  89 => 3,  66 => 2,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block title %}Gestion Clients - Admin UniBank+{% endblock %}
{% block page_title %}Gestion Clients{% endblock %}

{% block body %}
<div class=\"admin-card\">
    <div class=\"card-header\">
        <h5><i class=\"fas fa-users mr-2\" style=\"color:var(--primary);\"></i>Liste des clients ({{ clients|length }})</h5>
        <form method=\"get\" action=\"{{ path('app_admin_users') }}\" class=\"filter-bar\">
            <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher nom, email, CIN...\" oninput=\"clearTimeout(this.t);this.t=setTimeout(()=>this.form.submit(),400)\" style=\"width:220px;\">
            <select name=\"status\" onchange=\"this.form.submit()\">
                <option value=\"all\" {{ statusFilter == 'all' ? 'selected' : '' }}>Tous les statuts</option>
                <option value=\"PENDING\" {{ statusFilter == 'PENDING' ? 'selected' : '' }}>En attente</option>
                <option value=\"APPROVED\" {{ statusFilter == 'APPROVED' ? 'selected' : '' }}>Approuve</option>
                <option value=\"REJECTED\" {{ statusFilter == 'REJECTED' ? 'selected' : '' }}>Rejete</option>
                <option value=\"SUSPENDED\" {{ statusFilter == 'SUSPENDED' ? 'selected' : '' }}>Suspendu</option>
            </select>
            {% if search or statusFilter != 'all' %}
                <a href=\"{{ path('app_admin_users') }}\" class=\"btn-admin outline\" style=\"padding:8px 14px;font-size:13px;\">Reset</a>
            {% endif %}
        </form>
    </div>
    <div class=\"card-body\">
        {% if clients|length > 0 %}
        <table class=\"admin-table\">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>CIN</th>
                    <th>Telephone</th>
                    <th>Statut</th>
                    <th>Etat</th>
                    <th>Inscription</th>
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
                    <td>
                        {% if client.clientStatus %}
                            {% if client.clientStatus.value == 'APPROVED' %}
                                <span class=\"badge-status approved\">Approuve</span>
                            {% elseif client.clientStatus.value == 'PENDING' %}
                                <span class=\"badge-status pending\">En attente</span>
                            {% elseif client.clientStatus.value == 'REJECTED' %}
                                <span class=\"badge-status rejected\">Rejete</span>
                            {% elseif client.clientStatus.value == 'SUSPENDED' %}
                                <span class=\"badge-status suspended\">Suspendu</span>
                            {% endif %}
                        {% else %}
                            <span class=\"badge-status suspended\">-</span>
                        {% endif %}
                    </td>
                    <td>
                        {% if client.estActif %}
                            <span class=\"badge-status active\">Actif</span>
                        {% else %}
                            <span class=\"badge-status banned\">Banni</span>
                        {% endif %}
                    </td>
                    <td>{{ client.dateCreation|date('d/m/Y') }}</td>
                    <td style=\"white-space:nowrap;\">
                        <button class=\"btn-action edit\" title=\"Modifier\" onclick=\"openEditModal({{ client.idUtilisateur }}, '{{ client.nom|e('js') }}', '{{ client.prenom|e('js') }}', '{{ client.email|e('js') }}', '{{ client.telephone|e('js') }}', '{{ client.cin|e('js') }}', '{{ client.adresse|e('js') }}')\">
                            <i class=\"fas fa-pen\"></i>
                        </button>
                        {% if client.estActif %}
                            <button type=\"button\" class=\"btn-action ban\" title=\"Bannir\" onclick=\"confirmSubmit('{{ path('app_admin_user_ban', {id: client.idUtilisateur}) }}', {type:'ban', title:'Bannir le client', message:'{{ client.prenom|e('js') }} {{ client.nom|e('js') }} ne pourra plus acceder a son compte.', btnText:'Bannir'})\">
                                <i class=\"fas fa-ban\"></i>
                            </button>
                        {% else %}
                            <button type=\"button\" class=\"btn-action unban\" title=\"Debannir\" onclick=\"confirmSubmit('{{ path('app_admin_user_ban', {id: client.idUtilisateur}) }}', {type:'unban', title:'Debannir le client', message:'{{ client.prenom|e('js') }} {{ client.nom|e('js') }} pourra a nouveau acceder a son compte.', btnText:'Debannir'})\">
                                <i class=\"fas fa-unlock\"></i>
                            </button>
                        {% endif %}
                        <button class=\"btn-action delete\" title=\"Supprimer\" onclick=\"openDeleteModal({{ client.idUtilisateur }}, '{{ client.prenom|e('js') }} {{ client.nom|e('js') }}')\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        {% else %}
        <div class=\"empty-state\">
            <i class=\"fas fa-search\"></i>
            <p>Aucun client trouve</p>
        </div>
        {% endif %}
    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"editModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\"><i class=\"fas fa-pen mr-2\"></i>Modifier le client</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span>&times;</span></button>
            </div>
            <form id=\"editForm\" method=\"post\">
                <div class=\"modal-body\">
                    <div id=\"edit_global_error\" class=\"alert alert-danger\" style=\"display:none;font-size:13px;padding:8px 14px;border-radius:8px;\"></div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            <label>Prenom</label>
                            <input type=\"text\" name=\"prenom\" id=\"edit_prenom\" class=\"form-control\">
                            <div class=\"invalid-feedback\" id=\"err_prenom\"></div>
                        </div>
                        <div class=\"col-md-6 form-group\">
                            <label>Nom</label>
                            <input type=\"text\" name=\"nom\" id=\"edit_nom\" class=\"form-control\">
                            <div class=\"invalid-feedback\" id=\"err_nom\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label>Email</label>
                        <input type=\"email\" name=\"email\" id=\"edit_email\" class=\"form-control\">
                        <div class=\"invalid-feedback\" id=\"err_email\"></div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            <label>Telephone</label>
                            <input type=\"text\" name=\"telephone\" id=\"edit_telephone\" class=\"form-control\">
                            <div class=\"invalid-feedback\" id=\"err_telephone\"></div>
                        </div>
                        <div class=\"col-md-6 form-group\">
                            <label>CIN</label>
                            <input type=\"text\" name=\"cin\" id=\"edit_cin\" class=\"form-control\" maxlength=\"8\" pattern=\"\\d{8}\" inputmode=\"numeric\">
                            <div class=\"invalid-feedback\" id=\"err_cin\"></div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label>Adresse</label>
                        <textarea name=\"adresse\" id=\"edit_adresse\" class=\"form-control\" rows=\"2\"></textarea>
                        <div class=\"invalid-feedback\" id=\"err_adresse\"></div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin primary\" id=\"edit_submit_btn\">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=\"modal fade modal-admin\" id=\"deleteModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-sm\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\"><i class=\"fas fa-exclamation-triangle mr-2\" style=\"color:var(--danger);\"></i>Supprimer</h5>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span>&times;</span></button>
            </div>
            <form id=\"deleteForm\" method=\"post\">
                <div class=\"modal-body\">
                    <p>Supprimer definitivement <strong id=\"delete_name\"></strong> ?</p>
                    <p style=\"font-size:13px;color:var(--text-secondary);\">Tapez <strong>SUPPRIMER</strong> pour confirmer</p>
                    <input type=\"text\" id=\"delete_confirm\" class=\"form-control\" placeholder=\"SUPPRIMER\" autocomplete=\"off\">
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\">Annuler</button>
                    <button type=\"submit\" class=\"btn-admin danger\" id=\"delete_btn\" disabled>Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
function clearEditErrors() {
    ['nom','prenom','email','telephone','cin','adresse'].forEach(function(f) {
        var input = document.getElementById('edit_' + f);
        var err = document.getElementById('err_' + f);
        input.classList.remove('is-invalid');
        err.textContent = '';
    });
    var global = document.getElementById('edit_global_error');
    global.style.display = 'none';
    global.textContent = '';
}

function openEditModal(id, nom, prenom, email, telephone, cin, adresse) {
    document.getElementById('editForm').action = '/admin/users/' + id + '/edit';
    document.getElementById('edit_nom').value = nom;
    document.getElementById('edit_prenom').value = prenom;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_telephone').value = telephone;
    document.getElementById('edit_cin').value = cin;
    document.getElementById('edit_adresse').value = adresse;
    clearEditErrors();
    \$('#editModal').modal('show');
}

document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    clearEditErrors();
    var form = this;
    var btn = document.getElementById('edit_submit_btn');
    btn.disabled = true;
    btn.textContent = 'Enregistrement...';

    fetch(form.action, {
        method: 'POST',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        body: new FormData(form)
    })
    .then(function(r) { return r.json(); })
    .then(function(data) {
        btn.disabled = false;
        btn.textContent = 'Enregistrer';
        if (data.success) {
            \$('#editModal').modal('hide');
            location.reload();
        } else {
            var errors = data.errors || {};
            if (errors._global) {
                var g = document.getElementById('edit_global_error');
                g.textContent = errors._global;
                g.style.display = 'block';
            }
            ['nom','prenom','email','telephone','cin','adresse'].forEach(function(f) {
                if (errors[f]) {
                    document.getElementById('edit_' + f).classList.add('is-invalid');
                    document.getElementById('err_' + f).textContent = errors[f];
                }
            });
        }
    })
    .catch(function() {
        btn.disabled = false;
        btn.textContent = 'Enregistrer';
        var g = document.getElementById('edit_global_error');
        g.textContent = 'Une erreur est survenue. Veuillez reessayer.';
        g.style.display = 'block';
    });
});

function openDeleteModal(id, name) {
    document.getElementById('deleteForm').action = '/admin/users/' + id + '/delete';
    document.getElementById('delete_name').textContent = name;
    document.getElementById('delete_confirm').value = '';
    document.getElementById('delete_btn').disabled = true;
    \$('#deleteModal').modal('show');
}
document.getElementById('delete_confirm').addEventListener('input', function() {
    document.getElementById('delete_btn').disabled = this.value !== 'SUPPRIMER';
});
</script>
{% endblock %}
", "admin/user/list.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/admin/user/list.html.twig");
    }
}
