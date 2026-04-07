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

/* security/verification.html.twig */
class __TwigTemplate_fb4b82c71fd188176a42462a37a1c0ba extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/verification.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/verification.html.twig"));

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

        yield "Verification - UniBank+";
        
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
        yield "<div class=\"site-section bg-light\" style=\"min-height: 80vh; display: flex; align-items: center;\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-6 col-lg-5\">
                <div class=\"bg-white p-5 rounded shadow\">
                    <div class=\"text-center mb-4\">
                        <div class=\"text-center mb-2\">
                            <img src=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/unibank-plus.png"), "html", null, true);
        yield "\" alt=\"UniBank+\" style=\"height: 80px;\">
                        </div>
                        <h2 class=\"h4 text-black\">Verification du compte</h2>
                        <p class=\"text-muted\">Entrez le code de verification envoye a votre email</p>
                    </div>

                    <form method=\"post\">
                        <input type=\"hidden\" name=\"email\" value=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["email"]) || array_key_exists("email", $context) ? $context["email"] : (function () { throw new RuntimeError('Variable "email" does not exist.', 20, $this->source); })()), "html", null, true);
        yield "\">
                        <div class=\"form-group\">
                            <label class=\"text-black\" for=\"code\">Code de verification</label>
                            <input type=\"text\" id=\"code\" name=\"code\" required autofocus
                                   class=\"form-control text-center\" placeholder=\"XXXXXX\"
                                   style=\"font-size: 24px; letter-spacing: 8px; font-weight: bold;\"
                                   maxlength=\"6\">
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary btn-block py-2\">Verifier</button>
                    </form>

                    <div class=\"text-center mt-4\">
                        <p class=\"text-muted mb-2\">Vous n'avez pas recu le code ?</p>
                        <a href=\"";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_verification_resend", ["email" => (isset($context["email"]) || array_key_exists("email", $context) ? $context["email"] : (function () { throw new RuntimeError('Variable "email" does not exist.', 33, $this->source); })())]), "html", null, true);
        yield "\">Renvoyer le code</a>
                    </div>

                    <div class=\"text-center mt-3\">
                        <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Retour a la connexion</a>
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

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "security/verification.html.twig";
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
        return array (  142 => 37,  135 => 33,  119 => 20,  109 => 13,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Verification - UniBank+{% endblock %}

{% block body %}
<div class=\"site-section bg-light\" style=\"min-height: 80vh; display: flex; align-items: center;\">
    <div class=\"container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-md-6 col-lg-5\">
                <div class=\"bg-white p-5 rounded shadow\">
                    <div class=\"text-center mb-4\">
                        <div class=\"text-center mb-2\">
                            <img src=\"{{ asset('images/unibank-plus.png') }}\" alt=\"UniBank+\" style=\"height: 80px;\">
                        </div>
                        <h2 class=\"h4 text-black\">Verification du compte</h2>
                        <p class=\"text-muted\">Entrez le code de verification envoye a votre email</p>
                    </div>

                    <form method=\"post\">
                        <input type=\"hidden\" name=\"email\" value=\"{{ email }}\">
                        <div class=\"form-group\">
                            <label class=\"text-black\" for=\"code\">Code de verification</label>
                            <input type=\"text\" id=\"code\" name=\"code\" required autofocus
                                   class=\"form-control text-center\" placeholder=\"XXXXXX\"
                                   style=\"font-size: 24px; letter-spacing: 8px; font-weight: bold;\"
                                   maxlength=\"6\">
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary btn-block py-2\">Verifier</button>
                    </form>

                    <div class=\"text-center mt-4\">
                        <p class=\"text-muted mb-2\">Vous n'avez pas recu le code ?</p>
                        <a href=\"{{ path('app_verification_resend', {email: email}) }}\">Renvoyer le code</a>
                    </div>

                    <div class=\"text-center mt-3\">
                        <a href=\"{{ path('app_login') }}\">Retour a la connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "security/verification.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/security/verification.html.twig");
    }
}
