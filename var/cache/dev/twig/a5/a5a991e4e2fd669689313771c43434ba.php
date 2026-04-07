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

/* client/profile/index.html.twig */
class __TwigTemplate_e17129202d3f1b4564bc06fb9cedfdb0 extends Template
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
        return "client/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/profile/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/profile/index.html.twig"));

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

        yield "Mon Profil - UniBank+";
        
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

        yield "Mon Profil";
        
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
        yield "<div class=\"row\" style=\"display:flex;gap:25px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:2;min-width:350px;\">
        <div class=\"admin-card\" style=\"margin-bottom:25px;\">
            <div class=\"card-header\">
                <h5><i class=\"fas fa-user-edit mr-2\" style=\"color:var(--primary);\"></i>Informations personnelles</h5>
            </div>
            <div class=\"card-body\" style=\"padding:25px;\">
                <form method=\"post\" action=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_profile");
        yield "\">
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Prenom</label>
                            <input type=\"text\" name=\"prenom\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "user", [], "any", false, false, false, 17), "prenom", [], "any", false, false, false, 17), "html", null, true);
        yield "\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"2\">
                        </div>
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Nom</label>
                            <input type=\"text\" name=\"nom\" value=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "user", [], "any", false, false, false, 21), "nom", [], "any", false, false, false, 21), "html", null, true);
        yield "\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"2\">
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Email</label>
                            <input type=\"email\" value=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "email", [], "any", false, false, false, 27), "html", null, true);
        yield "\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;background:#f8f9fa;\" disabled>
                            <small style=\"color:var(--text-secondary);\">Non modifiable</small>
                        </div>
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Telephone</label>
                            <input type=\"text\" name=\"telephone\" value=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "user", [], "any", false, false, false, 32), "telephone", [], "any", false, false, false, 32), "html", null, true);
        yield "\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"8\">
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">CIN</label>
                            <input type=\"text\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "cin", [], "any", false, false, false, 38), "html", null, true);
        yield "\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;background:#f8f9fa;\" disabled>
                            <small style=\"color:var(--text-secondary);\">Non modifiable</small>
                        </div>
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Date de naissance</label>
                            <input type=\"text\" value=\"";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "user", [], "any", false, false, false, 43), "dateNaissance", [], "any", false, false, false, 43), "d/m/Y"), "html", null, true);
        yield "\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;background:#f8f9fa;\" disabled>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Adresse</label>
                        <textarea name=\"adresse\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"5\">";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 48, $this->source); })()), "user", [], "any", false, false, false, 48), "adresse", [], "any", false, false, false, 48), "html", null, true);
        yield "</textarea>
                    </div>
                    <button type=\"submit\" class=\"btn-admin primary\">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>

    <div class=\"col\" style=\"flex:1;min-width:300px;\">
        <div class=\"admin-card\" style=\"margin-bottom:25px;\">
            <div class=\"card-header\">
                <h5><i class=\"fas fa-lock mr-2\" style=\"color:var(--warning);\"></i>Changer le mot de passe</h5>
            </div>
            <div class=\"card-body\" style=\"padding:25px;\">
                <form method=\"post\" action=\"";
        // line 62
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_password");
        yield "\">
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Mot de passe actuel</label>
                        <input type=\"password\" name=\"current_password\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Nouveau mot de passe</label>
                        <input type=\"password\" name=\"new_password\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"8\">
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Confirmer</label>
                        <input type=\"password\" name=\"confirm_password\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"8\">
                    </div>
                    <button type=\"submit\" class=\"btn-admin primary\">Changer le mot de passe</button>
                </form>
            </div>
        </div>

        <div class=\"admin-card\">
            <div class=\"card-header\">
                <h5><i class=\"fas fa-info-circle mr-2\" style=\"color:var(--text-secondary);\"></i>Mon compte</h5>
            </div>
            <div class=\"card-body\" style=\"padding:25px;\">
                <div style=\"margin-bottom:12px;\">
                    <small style=\"color:var(--text-secondary);\">Statut</small>
                    <div><span class=\"badge-status approved\">Approuve</span></div>
                </div>
                <div style=\"margin-bottom:12px;\">
                    <small style=\"color:var(--text-secondary);\">Membre depuis</small>
                    <div style=\"font-weight:600;color:var(--primary-dark);\">";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 91, $this->source); })()), "user", [], "any", false, false, false, 91), "dateCreation", [], "any", false, false, false, 91), "d/m/Y"), "html", null, true);
        yield "</div>
                </div>
                <div>
                    <small style=\"color:var(--text-secondary);\">Offre</small>
                    <div style=\"font-weight:600;color:var(--primary);\">";
        // line 95
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 95), "selectedOffer", [], "any", true, true, false, 95) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 95, $this->source); })()), "user", [], "any", false, false, false, 95), "selectedOffer", [], "any", false, false, false, 95)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 95, $this->source); })()), "user", [], "any", false, false, false, 95), "selectedOffer", [], "any", false, false, false, 95), "html", null, true)) : ("-"));
        yield "</div>
                </div>
            </div>
        </div>
    </div>
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
        return "client/profile/index.html.twig";
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
        return array (  245 => 95,  238 => 91,  206 => 62,  189 => 48,  181 => 43,  173 => 38,  164 => 32,  156 => 27,  147 => 21,  140 => 17,  133 => 13,  124 => 6,  111 => 5,  88 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'client/base.html.twig' %}
{% block title %}Mon Profil - UniBank+{% endblock %}
{% block page_title %}Mon Profil{% endblock %}

{% block body %}
<div class=\"row\" style=\"display:flex;gap:25px;flex-wrap:wrap;\">
    <div class=\"col\" style=\"flex:2;min-width:350px;\">
        <div class=\"admin-card\" style=\"margin-bottom:25px;\">
            <div class=\"card-header\">
                <h5><i class=\"fas fa-user-edit mr-2\" style=\"color:var(--primary);\"></i>Informations personnelles</h5>
            </div>
            <div class=\"card-body\" style=\"padding:25px;\">
                <form method=\"post\" action=\"{{ path('app_client_profile') }}\">
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Prenom</label>
                            <input type=\"text\" name=\"prenom\" value=\"{{ app.user.prenom }}\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"2\">
                        </div>
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Nom</label>
                            <input type=\"text\" name=\"nom\" value=\"{{ app.user.nom }}\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"2\">
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Email</label>
                            <input type=\"email\" value=\"{{ app.user.email }}\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;background:#f8f9fa;\" disabled>
                            <small style=\"color:var(--text-secondary);\">Non modifiable</small>
                        </div>
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Telephone</label>
                            <input type=\"text\" name=\"telephone\" value=\"{{ app.user.telephone }}\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"8\">
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">CIN</label>
                            <input type=\"text\" value=\"{{ app.user.cin }}\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;background:#f8f9fa;\" disabled>
                            <small style=\"color:var(--text-secondary);\">Non modifiable</small>
                        </div>
                        <div class=\"col-md-6 form-group\" style=\"margin-bottom:18px;\">
                            <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Date de naissance</label>
                            <input type=\"text\" value=\"{{ app.user.dateNaissance|date('d/m/Y') }}\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;background:#f8f9fa;\" disabled>
                        </div>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Adresse</label>
                        <textarea name=\"adresse\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" rows=\"2\" required minlength=\"5\">{{ app.user.adresse }}</textarea>
                    </div>
                    <button type=\"submit\" class=\"btn-admin primary\">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>

    <div class=\"col\" style=\"flex:1;min-width:300px;\">
        <div class=\"admin-card\" style=\"margin-bottom:25px;\">
            <div class=\"card-header\">
                <h5><i class=\"fas fa-lock mr-2\" style=\"color:var(--warning);\"></i>Changer le mot de passe</h5>
            </div>
            <div class=\"card-body\" style=\"padding:25px;\">
                <form method=\"post\" action=\"{{ path('app_client_password') }}\">
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Mot de passe actuel</label>
                        <input type=\"password\" name=\"current_password\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required>
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Nouveau mot de passe</label>
                        <input type=\"password\" name=\"new_password\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"8\">
                    </div>
                    <div class=\"form-group\" style=\"margin-bottom:18px;\">
                        <label style=\"font-size:13px;font-weight:600;color:var(--primary-dark);margin-bottom:6px;display:block;\">Confirmer</label>
                        <input type=\"password\" name=\"confirm_password\" class=\"form-control\" style=\"border-radius:10px;border:1px solid var(--border);padding:10px 15px;\" required minlength=\"8\">
                    </div>
                    <button type=\"submit\" class=\"btn-admin primary\">Changer le mot de passe</button>
                </form>
            </div>
        </div>

        <div class=\"admin-card\">
            <div class=\"card-header\">
                <h5><i class=\"fas fa-info-circle mr-2\" style=\"color:var(--text-secondary);\"></i>Mon compte</h5>
            </div>
            <div class=\"card-body\" style=\"padding:25px;\">
                <div style=\"margin-bottom:12px;\">
                    <small style=\"color:var(--text-secondary);\">Statut</small>
                    <div><span class=\"badge-status approved\">Approuve</span></div>
                </div>
                <div style=\"margin-bottom:12px;\">
                    <small style=\"color:var(--text-secondary);\">Membre depuis</small>
                    <div style=\"font-weight:600;color:var(--primary-dark);\">{{ app.user.dateCreation|date('d/m/Y') }}</div>
                </div>
                <div>
                    <small style=\"color:var(--text-secondary);\">Offre</small>
                    <div style=\"font-weight:600;color:var(--primary);\">{{ app.user.selectedOffer ?? '-' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "client/profile/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\client\\profile\\index.html.twig");
    }
}
