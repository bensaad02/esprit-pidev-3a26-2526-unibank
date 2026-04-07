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

/* client/base.html.twig */
class __TwigTemplate_837b223c688d0c6548aa7e68c9ae0771 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'page_title' => [$this, 'block_page_title'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/base.html.twig"));

        // line 1
        yield "<!doctype html>
<html lang=\"fr\">
<head>
    <title>";
        // line 4
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.ico"), "html", null, true);
        yield "\">
    <link rel=\"apple-touch-icon\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("apple-touch-icon.png"), "html", null, true);
        yield "\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/admin.css"), "html", null, true);
        yield "\">
    ";
        // line 13
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 14
        yield "</head>
<body class=\"admin-body\">

    <div class=\"sidebar-overlay\" id=\"sidebarOverlay\" onclick=\"document.getElementById('sidebar').classList.remove('open');this.classList.remove('show');\"></div>

    <aside class=\"admin-sidebar\" id=\"sidebar\">
        <div class=\"sidebar-logo\">
            <img src=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/unibank-icon.png"), "html", null, true);
        yield "\" alt=\"UniBank+\">
            <span>UniBank+</span>
        </div>
        <nav class=\"sidebar-nav\">
            <div class=\"nav-section\">Menu principal</div>
            <a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_dashboard");
        yield "\" class=\"";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "request", [], "any", false, false, false, 26), "get", ["_route"], "method", false, false, false, 26) == "app_client_dashboard")) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-th-large\"></i> Accueil
            </a>
            <a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_compte");
        yield "\" class=\"";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 29, $this->source); })()), "request", [], "any", false, false, false, 29), "get", ["_route"], "method", false, false, false, 29) == "app_client_compte")) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-wallet\"></i> Mon Compte
            </a>

            <div class=\"nav-section\">A venir</div>
            <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_transactions");
        yield "\" class=\"";
        if (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "request", [], "any", false, false, false, 34), "get", ["_route"], "method", false, false, false, 34)) && is_string($_v1 = "app_client_transaction") && str_starts_with($_v0, $_v1)) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "request", [], "any", false, false, false, 34), "get", ["_route"], "method", false, false, false, 34) == "app_client_extrait"))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-exchange-alt\"></i> Transactions
            </a>
            <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_credits");
        yield "\" class=\"";
        if ((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "request", [], "any", false, false, false, 37), "get", ["_route"], "method", false, false, false, 37)) && is_string($_v3 = "app_client_credit") && str_starts_with($_v2, $_v3))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-hand-holding-usd\"></i> Credits
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-credit-card\"></i> Cartes
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-comment-alt\"></i> Reclamations
            </a>

            <div class=\"nav-section\">Compte</div>
            <a href=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_profile");
        yield "\" class=\"";
        if (((is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 48, $this->source); })()), "request", [], "any", false, false, false, 48), "get", ["_route"], "method", false, false, false, 48)) && is_string($_v5 = "app_client_profile") && str_starts_with($_v4, $_v5)) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 48, $this->source); })()), "request", [], "any", false, false, false, 48), "get", ["_route"], "method", false, false, false, 48) == "app_client_password"))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-user-cog\"></i> Mon Profil
            </a>
            <a href=\"";
        // line 51
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"text-danger\">
                <i class=\"fas fa-sign-out-alt\"></i> Deconnexion
            </a>
        </nav>
    </aside>

    <header class=\"admin-topbar\">
        <div class=\"d-flex align-items-center gap-3\">
            <button class=\"btn d-lg-none p-0 border-0\" onclick=\"document.getElementById('sidebar').classList.toggle('open');document.getElementById('sidebarOverlay').classList.toggle('show');\">
                <i class=\"fas fa-bars\" style=\"font-size:20px;color:var(--primary-dark);\"></i>
            </button>
            <span class=\"page-title\">";
        // line 62
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</span>
        </div>
        <div class=\"topbar-right\">
            <div class=\"topbar-user-info\">
                <div class=\"text-right d-none d-md-block\">
                    <div class=\"user-name\">";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 67, $this->source); })()), "user", [], "any", false, false, false, 67), "prenom", [], "any", false, false, false, 67), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 67, $this->source); })()), "user", [], "any", false, false, false, 67), "nom", [], "any", false, false, false, 67), "html", null, true);
        yield "</div>
                    <div class=\"user-role\">Client</div>
                </div>
                <div class=\"user-avatar\" style=\"width:40px;height:40px;font-size:16px;\">
                    ";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "prenom", [], "any", false, false, false, 71)), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 71, $this->source); })()), "user", [], "any", false, false, false, 71), "nom", [], "any", false, false, false, 71)), "html", null, true);
        yield "
                </div>
            </div>
        </div>
    </header>

    ";
        // line 77
        $context["flashes"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "flashes", [], "any", false, false, false, 77);
        // line 78
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["flashes"]) || array_key_exists("flashes", $context) ? $context["flashes"] : (function () { throw new RuntimeError('Variable "flashes" does not exist.', 78, $this->source); })())) > 0)) {
            // line 79
            yield "    <div id=\"flash-messages\" style=\"position:fixed;top:20px;right:20px;z-index:99999;max-width:450px;width:100%;\">
        ";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["flashes"]) || array_key_exists("flashes", $context) ? $context["flashes"] : (function () { throw new RuntimeError('Variable "flashes" does not exist.', 80, $this->source); })()));
            foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
                // line 81
                yield "            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 82
                    yield "                <div class=\"alert alert-";
                    yield ((($context["label"] == "error")) ? ("danger") : (((($context["label"] == "warning")) ? ("warning") : ("success"))));
                    yield " alert-dismissible fade show shadow-lg\" role=\"alert\" style=\"border-radius:10px;border:none;border-left:4px solid;margin-bottom:10px;font-size:14px;\">
                    ";
                    // line 83
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span></button>
                </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 87
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            yield "    </div>
    <script>setTimeout(function(){var e=document.getElementById('flash-messages');if(e){e.style.transition='opacity .5s';e.style.opacity='0';setTimeout(function(){e.remove()},500);}},5000);</script>
    ";
        }
        // line 91
        yield "
    <main class=\"admin-content\">
        ";
        // line 93
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 94
        yield "    </main>

    <script src=\"";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery-3.3.1.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/popper.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/password-toggle.js"), "html", null, true);
        yield "\"></script>
    ";
        // line 100
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 101
        yield "</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 4
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

        yield "Client - UniBank+";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 13
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 62
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

        yield "Accueil";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 93
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 100
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/base.html.twig";
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
        return array (  376 => 100,  354 => 93,  331 => 62,  309 => 13,  286 => 4,  273 => 101,  271 => 100,  267 => 99,  263 => 98,  259 => 97,  255 => 96,  251 => 94,  249 => 93,  245 => 91,  240 => 88,  234 => 87,  224 => 83,  219 => 82,  214 => 81,  210 => 80,  207 => 79,  204 => 78,  202 => 77,  192 => 71,  183 => 67,  175 => 62,  161 => 51,  151 => 48,  133 => 37,  123 => 34,  111 => 29,  101 => 26,  93 => 21,  84 => 14,  82 => 13,  78 => 12,  74 => 11,  68 => 8,  64 => 7,  58 => 4,  53 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
<head>
    <title>{% block title %}Client - UniBank+{% endblock %}</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\">
    <link rel=\"apple-touch-icon\" href=\"{{ asset('apple-touch-icon.png') }}\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/admin.css') }}\">
    {% block stylesheets %}{% endblock %}
</head>
<body class=\"admin-body\">

    <div class=\"sidebar-overlay\" id=\"sidebarOverlay\" onclick=\"document.getElementById('sidebar').classList.remove('open');this.classList.remove('show');\"></div>

    <aside class=\"admin-sidebar\" id=\"sidebar\">
        <div class=\"sidebar-logo\">
            <img src=\"{{ asset('images/unibank-icon.png') }}\" alt=\"UniBank+\">
            <span>UniBank+</span>
        </div>
        <nav class=\"sidebar-nav\">
            <div class=\"nav-section\">Menu principal</div>
            <a href=\"{{ path('app_client_dashboard') }}\" class=\"{% if app.request.get('_route') == 'app_client_dashboard' %}active{% endif %}\">
                <i class=\"fas fa-th-large\"></i> Accueil
            </a>
            <a href=\"{{ path('app_client_compte') }}\" class=\"{% if app.request.get('_route') == 'app_client_compte' %}active{% endif %}\">
                <i class=\"fas fa-wallet\"></i> Mon Compte
            </a>

            <div class=\"nav-section\">A venir</div>
            <a href=\"{{ path('app_client_transactions') }}\" class=\"{% if app.request.get('_route') starts with 'app_client_transaction' or app.request.get('_route') == 'app_client_extrait' %}active{% endif %}\">
                <i class=\"fas fa-exchange-alt\"></i> Transactions
            </a>
            <a href=\"{{ path('app_client_credits') }}\" class=\"{% if app.request.get('_route') starts with 'app_client_credit' %}active{% endif %}\">
                <i class=\"fas fa-hand-holding-usd\"></i> Credits
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-credit-card\"></i> Cartes
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-comment-alt\"></i> Reclamations
            </a>

            <div class=\"nav-section\">Compte</div>
            <a href=\"{{ path('app_client_profile') }}\" class=\"{% if app.request.get('_route') starts with 'app_client_profile' or app.request.get('_route') == 'app_client_password' %}active{% endif %}\">
                <i class=\"fas fa-user-cog\"></i> Mon Profil
            </a>
            <a href=\"{{ path('app_logout') }}\" class=\"text-danger\">
                <i class=\"fas fa-sign-out-alt\"></i> Deconnexion
            </a>
        </nav>
    </aside>

    <header class=\"admin-topbar\">
        <div class=\"d-flex align-items-center gap-3\">
            <button class=\"btn d-lg-none p-0 border-0\" onclick=\"document.getElementById('sidebar').classList.toggle('open');document.getElementById('sidebarOverlay').classList.toggle('show');\">
                <i class=\"fas fa-bars\" style=\"font-size:20px;color:var(--primary-dark);\"></i>
            </button>
            <span class=\"page-title\">{% block page_title %}Accueil{% endblock %}</span>
        </div>
        <div class=\"topbar-right\">
            <div class=\"topbar-user-info\">
                <div class=\"text-right d-none d-md-block\">
                    <div class=\"user-name\">{{ app.user.prenom }} {{ app.user.nom }}</div>
                    <div class=\"user-role\">Client</div>
                </div>
                <div class=\"user-avatar\" style=\"width:40px;height:40px;font-size:16px;\">
                    {{ app.user.prenom|first }}{{ app.user.nom|first }}
                </div>
            </div>
        </div>
    </header>

    {% set flashes = app.flashes %}
    {% if flashes|length > 0 %}
    <div id=\"flash-messages\" style=\"position:fixed;top:20px;right:20px;z-index:99999;max-width:450px;width:100%;\">
        {% for label, messages in flashes %}
            {% for message in messages %}
                <div class=\"alert alert-{{ label == 'error' ? 'danger' : (label == 'warning' ? 'warning' : 'success') }} alert-dismissible fade show shadow-lg\" role=\"alert\" style=\"border-radius:10px;border:none;border-left:4px solid;margin-bottom:10px;font-size:14px;\">
                    {{ message }}
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span></button>
                </div>
            {% endfor %}
        {% endfor %}
    </div>
    <script>setTimeout(function(){var e=document.getElementById('flash-messages');if(e){e.style.transition='opacity .5s';e.style.opacity='0';setTimeout(function(){e.remove()},500);}},5000);</script>
    {% endif %}

    <main class=\"admin-content\">
        {% block body %}{% endblock %}
    </main>

    <script src=\"{{ asset('js/jquery-3.3.1.min.js') }}\"></script>
    <script src=\"{{ asset('js/popper.min.js') }}\"></script>
    <script src=\"{{ asset('js/bootstrap.min.js') }}\"></script>
    <script src=\"{{ asset('js/password-toggle.js') }}\"></script>
    {% block javascripts %}{% endblock %}
</body>
</html>
", "client/base.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/client/base.html.twig");
    }
}
