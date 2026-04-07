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

/* error/_showcase.html.twig */
class __TwigTemplate_d059f0b30d54c0576eb2da9a7b1effa6 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "error/_showcase.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "error/_showcase.html.twig"));

        // line 1
        yield "<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("page_title", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["page_title"]) || array_key_exists("page_title", $context) ? $context["page_title"] : (function () { throw new RuntimeError('Variable "page_title" does not exist.', 6, $this->source); })()), ((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 6, $this->source); })()) . " - UniBank+"))) : (((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 6, $this->source); })()) . " - UniBank+"))), "html", null, true);
        yield "</title>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\">
    <style>
        :root {
            --ub-primary: #2259d6;
            --ub-primary-light: #2c83fe;
            --ub-primary-dark: #1a47b0;
            --ub-bg: #f8fafc;
            --ub-bg-soft: #eef5ff;
            --ub-border: #dce8fb;
            --ub-text: #1e293b;
            --ub-text-muted: #64748b;
            --ub-card: #ffffff;
            --ub-shadow: 0 28px 60px rgba(34, 89, 214, 0.12);
            --ub-shadow-soft: 0 18px 36px rgba(34, 89, 214, 0.10);
            --status: ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("accent", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["accent"]) || array_key_exists("accent", $context) ? $context["accent"] : (function () { throw new RuntimeError('Variable "accent" does not exist.', 21, $this->source); })()), "#2259d6")) : ("#2259d6")), "html", null, true);
        yield ";
            --status-soft: ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("accent_soft", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["accent_soft"]) || array_key_exists("accent_soft", $context) ? $context["accent_soft"] : (function () { throw new RuntimeError('Variable "accent_soft" does not exist.', 22, $this->source); })()), "#e8f1ff")) : ("#e8f1ff")), "html", null, true);
        yield ";
        }

        * { box-sizing: border-box; }

        html, body {
            min-height: 100%;
            margin: 0;
        }

        body {
            font-family: \"Open Sans\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", sans-serif;
            color: var(--ub-text);
            background:
                radial-gradient(circle at top right, rgba(44, 131, 254, 0.14), transparent 22%),
                radial-gradient(circle at left 20%, rgba(34, 89, 214, 0.08), transparent 20%),
                linear-gradient(180deg, #ffffff 0%, var(--ub-bg) 100%);
        }

        .page-shell {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid rgba(34, 89, 214, 0.08);
        }

        .topbar-inner,
        .content {
            width: min(1180px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 0;
        }

        .brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: #000;
            text-decoration: none;
            line-height: 1;
        }

        .brand span {
            color: var(--ub-primary);
        }

        .brand-note {
            color: var(--ub-text-muted);
            font-size: 0.95rem;
        }

        .content {
            flex: 1;
            display: grid;
            align-items: center;
            padding: 3rem 0;
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(320px, 0.95fr);
            gap: 2rem;
            align-items: center;
        }

        .copy {
            padding-right: 1rem;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: #fff;
            border: 1px solid var(--ub-border);
            box-shadow: 0 10px 25px rgba(34, 89, 214, 0.06);
            color: var(--ub-primary);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .eyebrow::before {
            content: \"\";
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--ub-primary-light), var(--status));
        }

        .code {
            margin: 1.25rem 0 0;
            font-size: clamp(4.2rem, 10vw, 7rem);
            line-height: 0.95;
            font-weight: 800;
            letter-spacing: -0.07em;
            color: var(--ub-primary);
        }

        .title {
            margin: 0.75rem 0 0;
            max-width: 10ch;
            font-size: clamp(2rem, 4.5vw, 3.3rem);
            line-height: 1.08;
            color: #0f172a;
            font-weight: 800;
        }

        .message {
            margin: 1rem 0 0;
            max-width: 40rem;
            color: var(--ub-text-muted);
            font-size: 1.03rem;
            line-height: 1.85;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.9rem;
            margin-top: 2rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 3.25rem;
            padding: 0.9rem 1.45rem;
            border-radius: 30px;
            font-size: 0.96rem;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(to right, var(--ub-primary), var(--ub-primary-light));
            box-shadow: var(--ub-shadow-soft);
        }

        .btn-secondary {
            color: var(--ub-primary);
            background: #fff;
            border: 1px solid var(--ub-border);
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .meta-card {
            padding: 1.1rem;
            background: #fff;
            border: 1px solid var(--ub-border);
            border-radius: 20px;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.04);
        }

        .meta-card strong {
            display: block;
            margin-bottom: 0.45rem;
            color: #0f172a;
            font-size: 0.98rem;
        }

        .meta-card span {
            color: var(--ub-text-muted);
            font-size: 0.92rem;
            line-height: 1.6;
        }

        .visual-card {
            position: relative;
            padding: 1.25rem;
            border-radius: 32px;
            background: linear-gradient(180deg, #ffffff, #f8fbff);
            border: 1px solid var(--ub-border);
            box-shadow: var(--ub-shadow);
        }

        .visual-card::before {
            content: \"\";
            position: absolute;
            inset: 1rem;
            border-radius: 24px;
            background: linear-gradient(135deg, rgba(34, 89, 214, 0.05), rgba(44, 131, 254, 0.10));
            pointer-events: none;
        }

        .visual-inner {
            position: relative;
            min-height: 420px;
            border-radius: 24px;
            overflow: hidden;
            background:
                linear-gradient(180deg, #f7fbff 0%, #edf5ff 100%);
            border: 1px solid rgba(34, 89, 214, 0.08);
        }

        .visual-badge {
            position: absolute;
            z-index: 2;
            top: 1.25rem;
            left: 1.25rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 0.85rem;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(34, 89, 214, 0.10);
            border-radius: 999px;
            color: var(--ub-primary);
            font-size: 0.82rem;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(34, 89, 214, 0.10);
        }

        .visual-badge::before {
            content: \"\";
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 50%;
            background: var(--status);
        }

        .visual-inner svg {
            position: relative;
            z-index: 1;
            display: block;
            width: 100%;
            height: auto;
        }

        .footer-note {
            padding: 0 0 2rem;
            text-align: center;
            color: var(--ub-text-muted);
            font-size: 0.92rem;
        }

        @media (max-width: 991px) {
            .hero {
                grid-template-columns: 1fr;
            }

            .copy {
                padding-right: 0;
            }
        }

        @media (max-width: 640px) {
            .content {
                padding: 2rem 0;
            }

            .meta-grid {
                grid-template-columns: 1fr;
            }

            .actions .btn {
                width: 100%;
            }

            .topbar-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .visual-inner {
                min-height: 320px;
            }
        }
    </style>
</head>
<body>
    <div class=\"page-shell\">
        <header class=\"topbar\">
            <div class=\"topbar-inner\">
                <a href=\"";
        // line 322
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"brand\">UniBank<span>+</span></a>
                <div class=\"brand-note\">Interface d'assistance et de navigation</div>
            </div>
        </header>

        <main class=\"content\">
            <section class=\"hero\">
                <div class=\"copy\">
                    <div class=\"eyebrow\">";
        // line 330
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("eyebrow", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["eyebrow"]) || array_key_exists("eyebrow", $context) ? $context["eyebrow"] : (function () { throw new RuntimeError('Variable "eyebrow" does not exist.', 330, $this->source); })()), "Assistance navigation")) : ("Assistance navigation")), "html", null, true);
        yield "</div>
                    <div class=\"code\">";
        // line 331
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 331, $this->source); })()), "html", null, true);
        yield "</div>
                    <h1 class=\"title\">";
        // line 332
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 332, $this->source); })()), "html", null, true);
        yield "</h1>
                    <p class=\"message\">";
        // line 333
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 333, $this->source); })()), "html", null, true);
        yield "</p>

                    <div class=\"actions\">
                        <a class=\"btn btn-primary\" href=\"";
        // line 336
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Retour a l'accueil</a>
                        <a class=\"btn btn-secondary\" href=\"javascript:history.back()\">Page precedente</a>
                    </div>

                    <div class=\"meta-grid\">
                        ";
        // line 341
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((array_key_exists("tips", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["tips"]) || array_key_exists("tips", $context) ? $context["tips"] : (function () { throw new RuntimeError('Variable "tips" does not exist.', 341, $this->source); })()), [])) : ([])));
        foreach ($context['_seq'] as $context["_key"] => $context["tip"]) {
            // line 342
            yield "                            <div class=\"meta-card\">
                                <strong>";
            // line 343
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tip"], "title", [], "any", false, false, false, 343), "html", null, true);
            yield "</strong>
                                <span>";
            // line 344
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tip"], "text", [], "any", false, false, false, 344), "html", null, true);
            yield "</span>
                            </div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tip'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 347
        yield "                    </div>
                </div>

                <div class=\"visual-card\" aria-hidden=\"true\">
                    <div class=\"visual-inner\">
                        <div class=\"visual-badge\">";
        // line 352
        yield ((((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 352, $this->source); })()) == "403")) ? ("Verification des droits") : ("Recherche de destination"));
        yield "</div>

                        ";
        // line 354
        if (((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 354, $this->source); })()) == "403")) {
            // line 355
            yield "                            <svg viewBox=\"0 0 560 440\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\">
                                <rect x=\"88\" y=\"70\" width=\"384\" height=\"250\" rx=\"28\" fill=\"#ffffff\" stroke=\"#dce8fb\"/>
                                <rect x=\"118\" y=\"102\" width=\"168\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"118\" y=\"136\" width=\"248\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <rect x=\"118\" y=\"162\" width=\"212\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <circle cx=\"404\" cy=\"122\" r=\"22\" fill=\"#eef5ff\"/>
                                <path d=\"M404 110c-7 0-12 5-12 12v4h24v-4c0-7-5-12-12-12Zm-18 19h36v27c0 10-8 18-18 18s-18-8-18-18v-27Z\" fill=\"#2259d6\"/>
                                <path d=\"M280 116c48 24 86 26 86 26v66c0 64-42 106-86 126-44-20-86-62-86-126v-66s38-2 86-26Z\" fill=\"url(#shieldGrad)\"/>
                                <path d=\"M280 176c18 0 32 14 32 31 0 11-6 20-15 26v26h-34v-26c-9-6-15-15-15-26 0-17 14-31 32-31Z\" fill=\"#ffffff\" opacity=\"0.95\"/>
                                <rect x=\"130\" y=\"352\" width=\"126\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"274\" y=\"352\" width=\"164\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <defs>
                                    <linearGradient id=\"shieldGrad\" x1=\"194\" y1=\"116\" x2=\"367\" y2=\"316\" gradientUnits=\"userSpaceOnUse\">
                                        <stop stop-color=\"#2c83fe\"/>
                                        <stop offset=\"1\" stop-color=\"#2259d6\"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        ";
        } else {
            // line 374
            yield "                            <svg viewBox=\"0 0 560 440\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\">
                                <rect x=\"84\" y=\"74\" width=\"392\" height=\"248\" rx=\"28\" fill=\"#ffffff\" stroke=\"#dce8fb\"/>
                                <rect x=\"116\" y=\"108\" width=\"184\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"116\" y=\"142\" width=\"252\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <rect x=\"116\" y=\"168\" width=\"144\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <circle cx=\"286\" cy=\"202\" r=\"66\" fill=\"#eef5ff\"/>
                                <circle cx=\"286\" cy=\"202\" r=\"50\" fill=\"none\" stroke=\"url(#searchGrad)\" stroke-width=\"16\"/>
                                <path d=\"M322 238 382 298\" stroke=\"url(#searchGrad)\" stroke-width=\"16\" stroke-linecap=\"round\"/>
                                <path d=\"M168 270c28-19 53-29 83-33\" stroke=\"#c9daf8\" stroke-width=\"10\" stroke-linecap=\"round\"/>
                                <circle cx=\"390\" cy=\"120\" r=\"18\" fill=\"#2259d6\" opacity=\"0.12\"/>
                                <circle cx=\"146\" cy=\"116\" r=\"10\" fill=\"#2c83fe\" opacity=\"0.18\"/>
                                <rect x=\"124\" y=\"352\" width=\"138\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"282\" y=\"352\" width=\"124\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <defs>
                                    <linearGradient id=\"searchGrad\" x1=\"236\" y1=\"152\" x2=\"382\" y2=\"298\" gradientUnits=\"userSpaceOnUse\">
                                        <stop stop-color=\"#2c83fe\"/>
                                        <stop offset=\"1\" stop-color=\"#2259d6\"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        ";
        }
        // line 395
        yield "                    </div>
                </div>
            </section>
        </main>

        <div class=\"footer-note\">UniBank+ vous redirige vers une zone sure de l'application.</div>
    </div>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "error/_showcase.html.twig";
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
        return array (  495 => 395,  472 => 374,  451 => 355,  449 => 354,  444 => 352,  437 => 347,  428 => 344,  424 => 343,  421 => 342,  417 => 341,  409 => 336,  403 => 333,  399 => 332,  395 => 331,  391 => 330,  380 => 322,  77 => 22,  73 => 21,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>{{ page_title|default(title ~ ' - UniBank+') }}</title>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\">
    <style>
        :root {
            --ub-primary: #2259d6;
            --ub-primary-light: #2c83fe;
            --ub-primary-dark: #1a47b0;
            --ub-bg: #f8fafc;
            --ub-bg-soft: #eef5ff;
            --ub-border: #dce8fb;
            --ub-text: #1e293b;
            --ub-text-muted: #64748b;
            --ub-card: #ffffff;
            --ub-shadow: 0 28px 60px rgba(34, 89, 214, 0.12);
            --ub-shadow-soft: 0 18px 36px rgba(34, 89, 214, 0.10);
            --status: {{ accent|default('#2259d6') }};
            --status-soft: {{ accent_soft|default('#e8f1ff') }};
        }

        * { box-sizing: border-box; }

        html, body {
            min-height: 100%;
            margin: 0;
        }

        body {
            font-family: \"Open Sans\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", sans-serif;
            color: var(--ub-text);
            background:
                radial-gradient(circle at top right, rgba(44, 131, 254, 0.14), transparent 22%),
                radial-gradient(circle at left 20%, rgba(34, 89, 214, 0.08), transparent 20%),
                linear-gradient(180deg, #ffffff 0%, var(--ub-bg) 100%);
        }

        .page-shell {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid rgba(34, 89, 214, 0.08);
        }

        .topbar-inner,
        .content {
            width: min(1180px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 0;
        }

        .brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: #000;
            text-decoration: none;
            line-height: 1;
        }

        .brand span {
            color: var(--ub-primary);
        }

        .brand-note {
            color: var(--ub-text-muted);
            font-size: 0.95rem;
        }

        .content {
            flex: 1;
            display: grid;
            align-items: center;
            padding: 3rem 0;
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(320px, 0.95fr);
            gap: 2rem;
            align-items: center;
        }

        .copy {
            padding-right: 1rem;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: #fff;
            border: 1px solid var(--ub-border);
            box-shadow: 0 10px 25px rgba(34, 89, 214, 0.06);
            color: var(--ub-primary);
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .eyebrow::before {
            content: \"\";
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--ub-primary-light), var(--status));
        }

        .code {
            margin: 1.25rem 0 0;
            font-size: clamp(4.2rem, 10vw, 7rem);
            line-height: 0.95;
            font-weight: 800;
            letter-spacing: -0.07em;
            color: var(--ub-primary);
        }

        .title {
            margin: 0.75rem 0 0;
            max-width: 10ch;
            font-size: clamp(2rem, 4.5vw, 3.3rem);
            line-height: 1.08;
            color: #0f172a;
            font-weight: 800;
        }

        .message {
            margin: 1rem 0 0;
            max-width: 40rem;
            color: var(--ub-text-muted);
            font-size: 1.03rem;
            line-height: 1.85;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.9rem;
            margin-top: 2rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 3.25rem;
            padding: 0.9rem 1.45rem;
            border-radius: 30px;
            font-size: 0.96rem;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(to right, var(--ub-primary), var(--ub-primary-light));
            box-shadow: var(--ub-shadow-soft);
        }

        .btn-secondary {
            color: var(--ub-primary);
            background: #fff;
            border: 1px solid var(--ub-border);
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .meta-card {
            padding: 1.1rem;
            background: #fff;
            border: 1px solid var(--ub-border);
            border-radius: 20px;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.04);
        }

        .meta-card strong {
            display: block;
            margin-bottom: 0.45rem;
            color: #0f172a;
            font-size: 0.98rem;
        }

        .meta-card span {
            color: var(--ub-text-muted);
            font-size: 0.92rem;
            line-height: 1.6;
        }

        .visual-card {
            position: relative;
            padding: 1.25rem;
            border-radius: 32px;
            background: linear-gradient(180deg, #ffffff, #f8fbff);
            border: 1px solid var(--ub-border);
            box-shadow: var(--ub-shadow);
        }

        .visual-card::before {
            content: \"\";
            position: absolute;
            inset: 1rem;
            border-radius: 24px;
            background: linear-gradient(135deg, rgba(34, 89, 214, 0.05), rgba(44, 131, 254, 0.10));
            pointer-events: none;
        }

        .visual-inner {
            position: relative;
            min-height: 420px;
            border-radius: 24px;
            overflow: hidden;
            background:
                linear-gradient(180deg, #f7fbff 0%, #edf5ff 100%);
            border: 1px solid rgba(34, 89, 214, 0.08);
        }

        .visual-badge {
            position: absolute;
            z-index: 2;
            top: 1.25rem;
            left: 1.25rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 0.85rem;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(34, 89, 214, 0.10);
            border-radius: 999px;
            color: var(--ub-primary);
            font-size: 0.82rem;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(34, 89, 214, 0.10);
        }

        .visual-badge::before {
            content: \"\";
            width: 0.6rem;
            height: 0.6rem;
            border-radius: 50%;
            background: var(--status);
        }

        .visual-inner svg {
            position: relative;
            z-index: 1;
            display: block;
            width: 100%;
            height: auto;
        }

        .footer-note {
            padding: 0 0 2rem;
            text-align: center;
            color: var(--ub-text-muted);
            font-size: 0.92rem;
        }

        @media (max-width: 991px) {
            .hero {
                grid-template-columns: 1fr;
            }

            .copy {
                padding-right: 0;
            }
        }

        @media (max-width: 640px) {
            .content {
                padding: 2rem 0;
            }

            .meta-grid {
                grid-template-columns: 1fr;
            }

            .actions .btn {
                width: 100%;
            }

            .topbar-inner {
                align-items: flex-start;
                flex-direction: column;
            }

            .visual-inner {
                min-height: 320px;
            }
        }
    </style>
</head>
<body>
    <div class=\"page-shell\">
        <header class=\"topbar\">
            <div class=\"topbar-inner\">
                <a href=\"{{ path('app_home') }}\" class=\"brand\">UniBank<span>+</span></a>
                <div class=\"brand-note\">Interface d'assistance et de navigation</div>
            </div>
        </header>

        <main class=\"content\">
            <section class=\"hero\">
                <div class=\"copy\">
                    <div class=\"eyebrow\">{{ eyebrow|default('Assistance navigation') }}</div>
                    <div class=\"code\">{{ code }}</div>
                    <h1 class=\"title\">{{ title }}</h1>
                    <p class=\"message\">{{ message }}</p>

                    <div class=\"actions\">
                        <a class=\"btn btn-primary\" href=\"{{ path('app_home') }}\">Retour a l'accueil</a>
                        <a class=\"btn btn-secondary\" href=\"javascript:history.back()\">Page precedente</a>
                    </div>

                    <div class=\"meta-grid\">
                        {% for tip in tips|default([]) %}
                            <div class=\"meta-card\">
                                <strong>{{ tip.title }}</strong>
                                <span>{{ tip.text }}</span>
                            </div>
                        {% endfor %}
                    </div>
                </div>

                <div class=\"visual-card\" aria-hidden=\"true\">
                    <div class=\"visual-inner\">
                        <div class=\"visual-badge\">{{ code == '403' ? 'Verification des droits' : 'Recherche de destination' }}</div>

                        {% if code == '403' %}
                            <svg viewBox=\"0 0 560 440\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\">
                                <rect x=\"88\" y=\"70\" width=\"384\" height=\"250\" rx=\"28\" fill=\"#ffffff\" stroke=\"#dce8fb\"/>
                                <rect x=\"118\" y=\"102\" width=\"168\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"118\" y=\"136\" width=\"248\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <rect x=\"118\" y=\"162\" width=\"212\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <circle cx=\"404\" cy=\"122\" r=\"22\" fill=\"#eef5ff\"/>
                                <path d=\"M404 110c-7 0-12 5-12 12v4h24v-4c0-7-5-12-12-12Zm-18 19h36v27c0 10-8 18-18 18s-18-8-18-18v-27Z\" fill=\"#2259d6\"/>
                                <path d=\"M280 116c48 24 86 26 86 26v66c0 64-42 106-86 126-44-20-86-62-86-126v-66s38-2 86-26Z\" fill=\"url(#shieldGrad)\"/>
                                <path d=\"M280 176c18 0 32 14 32 31 0 11-6 20-15 26v26h-34v-26c-9-6-15-15-15-26 0-17 14-31 32-31Z\" fill=\"#ffffff\" opacity=\"0.95\"/>
                                <rect x=\"130\" y=\"352\" width=\"126\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"274\" y=\"352\" width=\"164\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <defs>
                                    <linearGradient id=\"shieldGrad\" x1=\"194\" y1=\"116\" x2=\"367\" y2=\"316\" gradientUnits=\"userSpaceOnUse\">
                                        <stop stop-color=\"#2c83fe\"/>
                                        <stop offset=\"1\" stop-color=\"#2259d6\"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        {% else %}
                            <svg viewBox=\"0 0 560 440\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\">
                                <rect x=\"84\" y=\"74\" width=\"392\" height=\"248\" rx=\"28\" fill=\"#ffffff\" stroke=\"#dce8fb\"/>
                                <rect x=\"116\" y=\"108\" width=\"184\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"116\" y=\"142\" width=\"252\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <rect x=\"116\" y=\"168\" width=\"144\" height=\"14\" rx=\"7\" fill=\"#e9f1fd\"/>
                                <circle cx=\"286\" cy=\"202\" r=\"66\" fill=\"#eef5ff\"/>
                                <circle cx=\"286\" cy=\"202\" r=\"50\" fill=\"none\" stroke=\"url(#searchGrad)\" stroke-width=\"16\"/>
                                <path d=\"M322 238 382 298\" stroke=\"url(#searchGrad)\" stroke-width=\"16\" stroke-linecap=\"round\"/>
                                <path d=\"M168 270c28-19 53-29 83-33\" stroke=\"#c9daf8\" stroke-width=\"10\" stroke-linecap=\"round\"/>
                                <circle cx=\"390\" cy=\"120\" r=\"18\" fill=\"#2259d6\" opacity=\"0.12\"/>
                                <circle cx=\"146\" cy=\"116\" r=\"10\" fill=\"#2c83fe\" opacity=\"0.18\"/>
                                <rect x=\"124\" y=\"352\" width=\"138\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <rect x=\"282\" y=\"352\" width=\"124\" height=\"18\" rx=\"9\" fill=\"#dce8fb\"/>
                                <defs>
                                    <linearGradient id=\"searchGrad\" x1=\"236\" y1=\"152\" x2=\"382\" y2=\"298\" gradientUnits=\"userSpaceOnUse\">
                                        <stop stop-color=\"#2c83fe\"/>
                                        <stop offset=\"1\" stop-color=\"#2259d6\"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        {% endif %}
                    </div>
                </div>
            </section>
        </main>

        <div class=\"footer-note\">UniBank+ vous redirige vers une zone sure de l'application.</div>
    </div>
</body>
</html>
", "error/_showcase.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\error\\_showcase.html.twig");
    }
}
