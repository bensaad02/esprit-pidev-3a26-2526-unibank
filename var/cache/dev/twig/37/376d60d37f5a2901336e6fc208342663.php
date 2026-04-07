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

/* registration/register.html.twig */
class __TwigTemplate_a689bd681211e13acc98950ce678a498 extends Template
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
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "registration/register.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Inscription - UniBank+";
        
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
        yield "<div class=\"site-section bg-light\" style=\"min-height: 80vh;\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 col-lg-7\">
                <div class=\"bg-white p-5 rounded shadow\">
                    <div class=\"text-center mb-4\">
                        <div class=\"text-center mb-2\">
                            <img src=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/unibank-plus.png"), "html", null, true);
        yield "\" alt=\"UniBank+\" style=\"height: 80px;\">
                        </div>
                        <h2 class=\"h4 text-black\">Creer un compte</h2>
                        <p class=\"text-muted\">Remplissez le formulaire pour ouvrir votre compte</p>
                    </div>

                    ";
        // line 19
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 19, $this->source); })()), 'form_start');
        yield "

                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            ";
        // line 23
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 23, $this->source); })()), "nom", [], "any", false, false, false, 23), 'row');
        yield "
                        </div>
                        <div class=\"col-md-6 form-group\">
                            ";
        // line 26
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 26, $this->source); })()), "prenom", [], "any", false, false, false, 26), 'row');
        yield "
                        </div>
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 31, $this->source); })()), "email", [], "any", false, false, false, 31), 'row');
        yield "
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 36, $this->source); })()), "telephone", [], "any", false, false, false, 36), 'row');
        yield "
                        </div>
                        <div class=\"col-md-6 form-group\">
                            ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 39, $this->source); })()), "cin", [], "any", false, false, false, 39), 'row');
        yield "
                        </div>
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 44, $this->source); })()), "dateNaissance", [], "any", false, false, false, 44), 'row');
        yield "
                    </div>

                    <div class=\"form-group\">
                        ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 48, $this->source); })()), "adresse", [], "any", false, false, false, 48), 'row');
        yield "
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            ";
        // line 53
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 53, $this->source); })()), "plainPassword", [], "any", false, false, false, 53), "first", [], "any", false, false, false, 53), 'row');
        yield "
                        </div>
                        <div class=\"col-md-6 form-group\">
                            ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 56, $this->source); })()), "plainPassword", [], "any", false, false, false, 56), "second", [], "any", false, false, false, 56), 'row');
        yield "
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"h-captcha\" data-sitekey=\"";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["hcaptcha_site_key"]) || array_key_exists("hcaptcha_site_key", $context) ? $context["hcaptcha_site_key"] : (function () { throw new RuntimeError('Variable "hcaptcha_site_key" does not exist.', 61, $this->source); })()), "html", null, true);
        yield "\"></div>
                    </div>

                    <button type=\"submit\" class=\"btn btn-primary btn-block py-2\">S'inscrire</button>

                    ";
        // line 66
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 66, $this->source); })()), 'form_end');
        yield "

                    <div class=\"text-center mt-4\">
                        <p class=\"mb-0\">Deja inscrit ? <a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\"><strong>Se connecter</strong></a></p>
                    </div>
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

    // line 78
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

        // line 79
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script src=\"https://js.hcaptcha.com/1/api.js\" async defer></script>
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
        return "registration/register.html.twig";
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
        return array (  237 => 79,  224 => 78,  205 => 69,  199 => 66,  191 => 61,  183 => 56,  177 => 53,  169 => 48,  162 => 44,  154 => 39,  148 => 36,  140 => 31,  132 => 26,  126 => 23,  119 => 19,  110 => 13,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Inscription - UniBank+{% endblock %}

{% block body %}
<div class=\"site-section bg-light\" style=\"min-height: 80vh;\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-8 col-lg-7\">
                <div class=\"bg-white p-5 rounded shadow\">
                    <div class=\"text-center mb-4\">
                        <div class=\"text-center mb-2\">
                            <img src=\"{{ asset('images/unibank-plus.png') }}\" alt=\"UniBank+\" style=\"height: 80px;\">
                        </div>
                        <h2 class=\"h4 text-black\">Creer un compte</h2>
                        <p class=\"text-muted\">Remplissez le formulaire pour ouvrir votre compte</p>
                    </div>

                    {{ form_start(registrationForm) }}

                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            {{ form_row(registrationForm.nom) }}
                        </div>
                        <div class=\"col-md-6 form-group\">
                            {{ form_row(registrationForm.prenom) }}
                        </div>
                    </div>

                    <div class=\"form-group\">
                        {{ form_row(registrationForm.email) }}
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            {{ form_row(registrationForm.telephone) }}
                        </div>
                        <div class=\"col-md-6 form-group\">
                            {{ form_row(registrationForm.cin) }}
                        </div>
                    </div>

                    <div class=\"form-group\">
                        {{ form_row(registrationForm.dateNaissance) }}
                    </div>

                    <div class=\"form-group\">
                        {{ form_row(registrationForm.adresse) }}
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 form-group\">
                            {{ form_row(registrationForm.plainPassword.first) }}
                        </div>
                        <div class=\"col-md-6 form-group\">
                            {{ form_row(registrationForm.plainPassword.second) }}
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"h-captcha\" data-sitekey=\"{{ hcaptcha_site_key }}\"></div>
                    </div>

                    <button type=\"submit\" class=\"btn btn-primary btn-block py-2\">S'inscrire</button>

                    {{ form_end(registrationForm) }}

                    <div class=\"text-center mt-4\">
                        <p class=\"mb-0\">Deja inscrit ? <a href=\"{{ path('app_login') }}\"><strong>Se connecter</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"https://js.hcaptcha.com/1/api.js\" async defer></script>
{% endblock %}
", "registration/register.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/registration/register.html.twig");
    }
}
