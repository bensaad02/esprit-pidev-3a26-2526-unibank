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

/* admin/base.html.twig */
class __TwigTemplate_02ea91f2ef64d936f72a2e93f835e58d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
        yield "\" class=\"";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "request", [], "any", false, false, false, 26), "get", ["_route"], "method", false, false, false, 26) == "app_admin_dashboard")) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-th-large\"></i> Tableau de bord
            </a>
            <a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_pending");
        yield "\" class=\"";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 29, $this->source); })()), "request", [], "any", false, false, false, 29), "get", ["_route"], "method", false, false, false, 29) == "app_admin_pending")) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-clock\"></i> Demandes en attente
            </a>

            <div class=\"nav-section\">Gestion</div>
            <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_users");
        yield "\" class=\"";
        if ((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "request", [], "any", false, false, false, 34), "get", ["_route"], "method", false, false, false, 34)) && is_string($_v1 = "app_admin_user") && str_starts_with($_v0, $_v1))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-users\"></i> Gestion Clients
            </a>
            <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_comptes");
        yield "\" class=\"";
        if ((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "request", [], "any", false, false, false, 37), "get", ["_route"], "method", false, false, false, 37)) && is_string($_v3 = "app_admin_compte") && str_starts_with($_v2, $_v3))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-wallet\"></i> Gestion Comptes
            </a>
            <a href=\"";
        // line 40
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_credits");
        yield "\" class=\"";
        if ((is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "request", [], "any", false, false, false, 40), "get", ["_route"], "method", false, false, false, 40)) && is_string($_v5 = "app_admin_credit") && str_starts_with($_v4, $_v5))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-hand-holding-usd\"></i> Gestion Credits
            </a>
            <a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_contrats");
        yield "\" class=\"";
        if ((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "request", [], "any", false, false, false, 43), "get", ["_route"], "method", false, false, false, 43)) && is_string($_v7 = "app_admin_contrat") && str_starts_with($_v6, $_v7))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-file-contract\"></i> Contrats
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-credit-card\"></i> Gestion Cartes
            </a>
            <a href=\"";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_transactions");
        yield "\" class=\"";
        if ((is_string($_v8 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "request", [], "any", false, false, false, 49), "get", ["_route"], "method", false, false, false, 49)) && is_string($_v9 = "app_admin_transaction") && str_starts_with($_v8, $_v9))) {
            yield "active";
        }
        yield "\">
                <i class=\"fas fa-exchange-alt\"></i> Transactions
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-comment-alt\"></i> Reclamations
            </a>

            <div class=\"nav-section\">Compte</div>
            <a href=\"";
        // line 57
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
        // line 68
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</span>
        </div>
        <div class=\"topbar-right\">
            <div class=\"topbar-user-info\">
                <div class=\"text-right d-none d-md-block\">
                    <div class=\"user-name\">";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 73, $this->source); })()), "user", [], "any", false, false, false, 73), "prenom", [], "any", false, false, false, 73), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 73, $this->source); })()), "user", [], "any", false, false, false, 73), "nom", [], "any", false, false, false, 73), "html", null, true);
        yield "</div>
                    <div class=\"user-role\">Agent</div>
                </div>
                <div class=\"user-avatar\" style=\"width:40px;height:40px;font-size:16px;\">
                    ";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "user", [], "any", false, false, false, 77), "prenom", [], "any", false, false, false, 77)), "html", null, true);
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "user", [], "any", false, false, false, 77), "nom", [], "any", false, false, false, 77)), "html", null, true);
        yield "
                </div>
            </div>
        </div>
    </header>

    ";
        // line 83
        $context["flashes"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "flashes", [], "any", false, false, false, 83);
        // line 84
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["flashes"]) || array_key_exists("flashes", $context) ? $context["flashes"] : (function () { throw new RuntimeError('Variable "flashes" does not exist.', 84, $this->source); })())) > 0)) {
            // line 85
            yield "    <div id=\"flash-messages\" style=\"position:fixed;top:20px;right:20px;z-index:99999;max-width:450px;width:100%;\">
        ";
            // line 86
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["flashes"]) || array_key_exists("flashes", $context) ? $context["flashes"] : (function () { throw new RuntimeError('Variable "flashes" does not exist.', 86, $this->source); })()));
            foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
                // line 87
                yield "            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 88
                    yield "                <div class=\"alert alert-";
                    yield ((($context["label"] == "error")) ? ("danger") : (((($context["label"] == "warning")) ? ("warning") : ("success"))));
                    yield " alert-dismissible fade show shadow-lg\" role=\"alert\" style=\"border-radius:10px;border:none;border-left:4px solid;margin-bottom:10px;font-size:14px;\">
                    ";
                    // line 89
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span></button>
                </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 93
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            yield "    </div>
    <script>setTimeout(function(){var e=document.getElementById('flash-messages');if(e){e.style.transition='opacity .5s';e.style.opacity='0';setTimeout(function(){e.remove()},500);}},5000);</script>
    ";
        }
        // line 97
        yield "
    <main class=\"admin-content\">
        ";
        // line 99
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 100
        yield "    </main>

    <div class=\"modal fade\" id=\"confirmModal\" tabindex=\"-1\" style=\"z-index:100000;\">
        <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
            <div class=\"modal-content\" style=\"border:none;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,0.15);overflow:hidden;\">
                <div class=\"modal-body p-0\">
                    <div id=\"confirmIcon\" style=\"text-align:center;padding:30px 30px 15px;\"></div>
                    <div style=\"text-align:center;padding:0 30px;\">
                        <h5 id=\"confirmTitle\" style=\"font-weight:700;color:var(--primary-dark);margin-bottom:8px;\"></h5>
                        <p id=\"confirmMessage\" style=\"color:var(--text-secondary);font-size:14px;margin-bottom:0;\"></p>
                    </div>
                    <div style=\"display:flex;gap:12px;padding:25px 30px 30px;justify-content:center;\">
                        <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\" style=\"min-width:120px;\">Annuler</button>
                        <button type=\"button\" id=\"confirmBtn\" class=\"btn-admin\" style=\"min-width:120px;\"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=\"";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery-3.3.1.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/popper.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
    <script>
    function confirmAction(options) {
        var icons = {
            approve: '<div style=\"width:70px;height:70px;border-radius:50%;background:#E0F8EF;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-check-circle\" style=\"font-size:32px;color:#41D4A8;\"></i></div>',
            reject: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFE8EB;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-times-circle\" style=\"font-size:32px;color:#FE5C73;\"></i></div>',
            ban: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFF5E6;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-ban\" style=\"font-size:32px;color:#fc7900;\"></i></div>',
            unban: '<div style=\"width:70px;height:70px;border-radius:50%;background:#E0F8EF;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-unlock\" style=\"font-size:32px;color:#41D4A8;\"></i></div>',
            delete: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFE8EB;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-trash-alt\" style=\"font-size:32px;color:#FE5C73;\"></i></div>',
            warning: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFF5E6;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-exclamation-triangle\" style=\"font-size:32px;color:#fc7900;\"></i></div>'
        };
        var btnClasses = {
            approve: 'success', reject: 'danger', ban: 'primary', unban: 'success', delete: 'danger', warning: 'primary'
        };
        var type = options.type || 'warning';
        document.getElementById('confirmIcon').innerHTML = icons[type] || icons.warning;
        document.getElementById('confirmTitle').textContent = options.title || 'Confirmer';
        document.getElementById('confirmMessage').textContent = options.message || '';
        var btn = document.getElementById('confirmBtn');
        btn.textContent = options.btnText || 'Confirmer';
        btn.className = 'btn-admin ' + (btnClasses[type] || 'primary');
        btn.style.minWidth = '120px';
        btn.onclick = function() {
            \$('#confirmModal').modal('hide');
            if (options.onConfirm) options.onConfirm();
        };
        \$('#confirmModal').modal('show');
    }
    function confirmSubmit(formOrAction, options) {
        confirmAction({
            type: options.type || 'warning',
            title: options.title || 'Confirmer',
            message: options.message || '',
            btnText: options.btnText || 'Confirmer',
            onConfirm: function() {
                if (typeof formOrAction === 'string') {
                    var f = document.createElement('form');
                    f.method = 'POST';
                    f.action = formOrAction;
                    document.body.appendChild(f);
                    f.submit();
                } else {
                    formOrAction.submit();
                }
            }
        });
    }
    </script>
    <script src=\"";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/password-toggle.js"), "html", null, true);
        yield "\"></script>
    ";
        // line 171
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 172
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

        yield "Admin - UniBank+";
        
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

    // line 68
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

        yield "Dashboard";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 99
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

    // line 171
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
        return "admin/base.html.twig";
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
        return array (  461 => 171,  439 => 99,  416 => 68,  394 => 13,  371 => 4,  358 => 172,  356 => 171,  352 => 170,  301 => 122,  297 => 121,  293 => 120,  271 => 100,  269 => 99,  265 => 97,  260 => 94,  254 => 93,  244 => 89,  239 => 88,  234 => 87,  230 => 86,  227 => 85,  224 => 84,  222 => 83,  212 => 77,  203 => 73,  195 => 68,  181 => 57,  166 => 49,  153 => 43,  143 => 40,  133 => 37,  123 => 34,  111 => 29,  101 => 26,  93 => 21,  84 => 14,  82 => 13,  78 => 12,  74 => 11,  68 => 8,  64 => 7,  58 => 4,  53 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
<head>
    <title>{% block title %}Admin - UniBank+{% endblock %}</title>
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
            <a href=\"{{ path('app_admin_dashboard') }}\" class=\"{% if app.request.get('_route') == 'app_admin_dashboard' %}active{% endif %}\">
                <i class=\"fas fa-th-large\"></i> Tableau de bord
            </a>
            <a href=\"{{ path('app_admin_pending') }}\" class=\"{% if app.request.get('_route') == 'app_admin_pending' %}active{% endif %}\">
                <i class=\"fas fa-clock\"></i> Demandes en attente
            </a>

            <div class=\"nav-section\">Gestion</div>
            <a href=\"{{ path('app_admin_users') }}\" class=\"{% if app.request.get('_route') starts with 'app_admin_user' %}active{% endif %}\">
                <i class=\"fas fa-users\"></i> Gestion Clients
            </a>
            <a href=\"{{ path('app_admin_comptes') }}\" class=\"{% if app.request.get('_route') starts with 'app_admin_compte' %}active{% endif %}\">
                <i class=\"fas fa-wallet\"></i> Gestion Comptes
            </a>
            <a href=\"{{ path('app_admin_credits') }}\" class=\"{% if app.request.get('_route') starts with 'app_admin_credit' %}active{% endif %}\">
                <i class=\"fas fa-hand-holding-usd\"></i> Gestion Credits
            </a>
            <a href=\"{{ path('app_admin_contrats') }}\" class=\"{% if app.request.get('_route') starts with 'app_admin_contrat' %}active{% endif %}\">
                <i class=\"fas fa-file-contract\"></i> Contrats
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-credit-card\"></i> Gestion Cartes
            </a>
            <a href=\"{{ path('app_admin_transactions') }}\" class=\"{% if app.request.get('_route') starts with 'app_admin_transaction' %}active{% endif %}\">
                <i class=\"fas fa-exchange-alt\"></i> Transactions
            </a>
            <a href=\"#\" class=\"disabled\" style=\"opacity:0.4;pointer-events:none;\">
                <i class=\"fas fa-comment-alt\"></i> Reclamations
            </a>

            <div class=\"nav-section\">Compte</div>
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
            <span class=\"page-title\">{% block page_title %}Dashboard{% endblock %}</span>
        </div>
        <div class=\"topbar-right\">
            <div class=\"topbar-user-info\">
                <div class=\"text-right d-none d-md-block\">
                    <div class=\"user-name\">{{ app.user.prenom }} {{ app.user.nom }}</div>
                    <div class=\"user-role\">Agent</div>
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

    <div class=\"modal fade\" id=\"confirmModal\" tabindex=\"-1\" style=\"z-index:100000;\">
        <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:420px;\">
            <div class=\"modal-content\" style=\"border:none;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,0.15);overflow:hidden;\">
                <div class=\"modal-body p-0\">
                    <div id=\"confirmIcon\" style=\"text-align:center;padding:30px 30px 15px;\"></div>
                    <div style=\"text-align:center;padding:0 30px;\">
                        <h5 id=\"confirmTitle\" style=\"font-weight:700;color:var(--primary-dark);margin-bottom:8px;\"></h5>
                        <p id=\"confirmMessage\" style=\"color:var(--text-secondary);font-size:14px;margin-bottom:0;\"></p>
                    </div>
                    <div style=\"display:flex;gap:12px;padding:25px 30px 30px;justify-content:center;\">
                        <button type=\"button\" class=\"btn-admin outline\" data-dismiss=\"modal\" style=\"min-width:120px;\">Annuler</button>
                        <button type=\"button\" id=\"confirmBtn\" class=\"btn-admin\" style=\"min-width:120px;\"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=\"{{ asset('js/jquery-3.3.1.min.js') }}\"></script>
    <script src=\"{{ asset('js/popper.min.js') }}\"></script>
    <script src=\"{{ asset('js/bootstrap.min.js') }}\"></script>
    <script>
    function confirmAction(options) {
        var icons = {
            approve: '<div style=\"width:70px;height:70px;border-radius:50%;background:#E0F8EF;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-check-circle\" style=\"font-size:32px;color:#41D4A8;\"></i></div>',
            reject: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFE8EB;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-times-circle\" style=\"font-size:32px;color:#FE5C73;\"></i></div>',
            ban: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFF5E6;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-ban\" style=\"font-size:32px;color:#fc7900;\"></i></div>',
            unban: '<div style=\"width:70px;height:70px;border-radius:50%;background:#E0F8EF;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-unlock\" style=\"font-size:32px;color:#41D4A8;\"></i></div>',
            delete: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFE8EB;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-trash-alt\" style=\"font-size:32px;color:#FE5C73;\"></i></div>',
            warning: '<div style=\"width:70px;height:70px;border-radius:50%;background:#FFF5E6;display:inline-flex;align-items:center;justify-content:center;\"><i class=\"fas fa-exclamation-triangle\" style=\"font-size:32px;color:#fc7900;\"></i></div>'
        };
        var btnClasses = {
            approve: 'success', reject: 'danger', ban: 'primary', unban: 'success', delete: 'danger', warning: 'primary'
        };
        var type = options.type || 'warning';
        document.getElementById('confirmIcon').innerHTML = icons[type] || icons.warning;
        document.getElementById('confirmTitle').textContent = options.title || 'Confirmer';
        document.getElementById('confirmMessage').textContent = options.message || '';
        var btn = document.getElementById('confirmBtn');
        btn.textContent = options.btnText || 'Confirmer';
        btn.className = 'btn-admin ' + (btnClasses[type] || 'primary');
        btn.style.minWidth = '120px';
        btn.onclick = function() {
            \$('#confirmModal').modal('hide');
            if (options.onConfirm) options.onConfirm();
        };
        \$('#confirmModal').modal('show');
    }
    function confirmSubmit(formOrAction, options) {
        confirmAction({
            type: options.type || 'warning',
            title: options.title || 'Confirmer',
            message: options.message || '',
            btnText: options.btnText || 'Confirmer',
            onConfirm: function() {
                if (typeof formOrAction === 'string') {
                    var f = document.createElement('form');
                    f.method = 'POST';
                    f.action = formOrAction;
                    document.body.appendChild(f);
                    f.submit();
                } else {
                    formOrAction.submit();
                }
            }
        });
    }
    </script>
    <script src=\"{{ asset('js/password-toggle.js') }}\"></script>
    {% block javascripts %}{% endblock %}
</body>
</html>
", "admin/base.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\admin\\base.html.twig");
    }
}
