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

/* base.html.twig */
class __TwigTemplate_6cf2ed08c7f976a7c065b98e2de3ddbe extends Template
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
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

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

    <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,700\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("fonts/icomoon/style.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/jquery-ui.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/owl.carousel.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/owl.theme.default.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/jquery.fancybox.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap-datepicker.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("fonts/flaticon/font/flaticon.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/aos.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/custom.css"), "html", null, true);
        yield "\">
    ";
        // line 23
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 24
        yield "  </head>
  <body data-spy=\"scroll\" data-target=\".site-navbar-target\" data-offset=\"300\">

  <div id=\"overlayer\"></div>
  <div class=\"loader\">
    <div class=\"spinner-border text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
  </div>

  <div class=\"site-wrap\">

    <div class=\"site-mobile-menu site-navbar-target\">
      <div class=\"site-mobile-menu-header\">
        <div class=\"site-mobile-menu-close mt-3\">
          <span class=\"icon-close2 js-menu-toggle\"></span>
        </div>
      </div>
      <div class=\"site-mobile-menu-body\"></div>
    </div>

    <header class=\"site-navbar js-sticky-header site-navbar-target\" role=\"banner\">
      <div class=\"container\">
        <div class=\"row align-items-center\">

          <div class=\"col-6 col-xl-2\">
            <h1 class=\"mb-0 site-logo\"><a href=\"";
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"h2 mb-0\">UniBank<span class=\"text-primary\">+</span></a></h1>
          </div>

          <div class=\"col-12 col-md-10 d-none d-xl-block\">
            <nav class=\"site-navigation position-relative text-right\" role=\"navigation\">
              <ul class=\"site-menu main-menu js-clone-nav mr-auto d-none d-lg-block\">
                <li><a href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#home-section\" class=\"nav-link\">Accueil</a></li>
                <li class=\"has-children\">
                  <a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#about-section\" class=\"nav-link\">A propos</a>
                  <ul class=\"dropdown\">
                    <li><a href=\"";
        // line 60
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#team-section\" class=\"nav-link\">Equipe</a></li>
                    <li><a href=\"";
        // line 61
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#pricing-section\" class=\"nav-link\">Tarifs</a></li>
                    <li><a href=\"";
        // line 62
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#faq-section\" class=\"nav-link\">FAQ</a></li>
                    <li><a href=\"";
        // line 63
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#gallery-section\" class=\"nav-link\">Galerie</a></li>
                    <li><a href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#services-section\" class=\"nav-link\">Services</a></li>
                    <li><a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#testimonials-section\" class=\"nav-link\">Temoignages</a></li>
                  </ul>
                </li>
                <li><a href=\"";
        // line 68
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#blog-section\" class=\"nav-link\">Blog</a></li>
                <li><a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#contact-section\" class=\"nav-link\">Contact</a></li>
                ";
        // line 70
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "user", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 71
            yield "                  ";
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_AGENT")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 72
                yield "                    <li><a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
                yield "\" class=\"nav-link\">Dashboard</a></li>
                  ";
            } elseif ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_CLIENT")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 74
                yield "                    <li><a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_client_dashboard");
                yield "\" class=\"nav-link\">Mon espace</a></li>
                  ";
            }
            // line 76
            yield "                  <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"nav-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 76, $this->source); })()), "user", [], "any", false, false, false, 76), "prenom", [], "any", false, false, false, 76), "html", null, true);
            yield " (Deconnexion)</a></li>
                ";
        } else {
            // line 78
            yield "                  <li><a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"nav-link\">Connexion</a></li>
                  <li><a href=\"";
            // line 79
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"nav-link btn btn-primary text-white px-3 ml-2\" style=\"border-radius: 30px;\">Inscription</a></li>
                ";
        }
        // line 81
        yield "              </ul>
            </nav>
          </div>

          <div class=\"col-6 d-inline-block d-xl-none ml-md-0 py-3\" style=\"position: relative; top: 3px;\">
            <a href=\"#\" class=\"site-menu-toggle js-menu-toggle float-right\"><span class=\"icon-menu h3\"></span></a>
          </div>

        </div>
      </div>
    </header>

    ";
        // line 93
        $context["flashes"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 93, $this->source); })()), "flashes", [], "any", false, false, false, 93);
        // line 94
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["flashes"]) || array_key_exists("flashes", $context) ? $context["flashes"] : (function () { throw new RuntimeError('Variable "flashes" does not exist.', 94, $this->source); })())) > 0)) {
            // line 95
            yield "    <div id=\"flash-messages\" style=\"position: fixed; top: 20px; right: 20px; z-index: 99999; max-width: 450px; width: 100%;\">
      ";
            // line 96
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["flashes"]) || array_key_exists("flashes", $context) ? $context["flashes"] : (function () { throw new RuntimeError('Variable "flashes" does not exist.', 96, $this->source); })()));
            foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
                // line 97
                yield "        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 98
                    yield "          <div class=\"alert alert-";
                    yield ((($context["label"] == "error")) ? ("danger") : (((($context["label"] == "warning")) ? ("warning") : ("success"))));
                    yield " alert-dismissible fade show shadow-lg\" role=\"alert\" style=\"border-radius: 8px; border: none; margin-bottom: 10px;\">
            <div class=\"d-flex align-items-center\">
              ";
                    // line 100
                    if (($context["label"] == "success")) {
                        // line 101
                        yield "                <span class=\"mr-2\" style=\"font-size: 20px;\">&#10003;</span>
              ";
                    } elseif (((                    // line 102
$context["label"] == "error") || ($context["label"] == "danger"))) {
                        // line 103
                        yield "                <span class=\"mr-2\" style=\"font-size: 20px;\">&#10007;</span>
              ";
                    } else {
                        // line 105
                        yield "                <span class=\"mr-2\" style=\"font-size: 20px;\">&#9888;</span>
              ";
                    }
                    // line 107
                    yield "              <span>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "</span>
            </div>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </button>
          </div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 114
                yield "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 115
            yield "    </div>
    <script>setTimeout(function(){var el=document.getElementById('flash-messages');if(el){el.style.transition='opacity 0.5s';el.style.opacity='0';setTimeout(function(){el.remove()},500);}},5000);</script>
    ";
        }
        // line 118
        yield "
    ";
        // line 119
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 120
        yield "
    <footer class=\"site-footer\">
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-md-9\">
            <div class=\"row\">
              <div class=\"col-md-5\">
                <h2 class=\"footer-heading mb-4\">A propos</h2>
                <p>UniBank+ est votre partenaire bancaire de confiance. Nous offrons des solutions financieres modernes et securisees pour tous vos besoins.</p>
              </div>
              <div class=\"col-md-3 ml-auto\">
                <h2 class=\"footer-heading mb-4\">Liens rapides</h2>
                <ul class=\"list-unstyled\">
                  <li><a href=\"";
        // line 133
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#about-section\" class=\"smoothscroll\">A propos</a></li>
                  <li><a href=\"";
        // line 134
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#services-section\" class=\"smoothscroll\">Services</a></li>
                  <li><a href=\"";
        // line 135
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#testimonials-section\" class=\"smoothscroll\">Temoignages</a></li>
                  <li><a href=\"";
        // line 136
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "#contact-section\" class=\"smoothscroll\">Contact</a></li>
                  <li><a href=\"";
        // line 137
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Connexion</a></li>
                  <li><a href=\"";
        // line 138
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">Inscription</a></li>
                </ul>
              </div>
              <div class=\"col-md-3 footer-social\">
                <h2 class=\"footer-heading mb-4\">Suivez-nous</h2>
                <a href=\"#\" class=\"pl-0 pr-3\"><span class=\"icon-facebook\"></span></a>
                <a href=\"#\" class=\"pl-3 pr-3\"><span class=\"icon-twitter\"></span></a>
                <a href=\"#\" class=\"pl-3 pr-3\"><span class=\"icon-instagram\"></span></a>
                <a href=\"#\" class=\"pl-3 pr-3\"><span class=\"icon-linkedin\"></span></a>
              </div>
            </div>
          </div>
          <div class=\"col-md-3\">
            <h2 class=\"footer-heading mb-4\">Newsletter</h2>
            <form action=\"#\" method=\"post\" class=\"footer-subscribe\">
              <div class=\"input-group mb-3\">
                <input type=\"text\" class=\"form-control border-secondary text-white bg-transparent\" placeholder=\"Votre email\" aria-label=\"Votre email\" aria-describedby=\"button-addon2\">
                <div class=\"input-group-append\">
                  <button class=\"btn btn-primary text-white\" type=\"button\" id=\"button-addon2\">Envoyer</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class=\"row pt-5 mt-5 text-center\">
          <div class=\"col-md-12\">
            <div class=\"border-top pt-5\">
              <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> UniBank+. Tous droits reserves.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>

  <script src=\"";
        // line 174
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery-3.3.1.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery-ui.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 176
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/popper.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 177
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 178
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/owl.carousel.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 179
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.countdown.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 180
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.easing.1.3.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 181
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/aos.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.fancybox.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.sticky.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 184
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/isotope.pkgd.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 185
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/main.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 186
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/password-toggle.js"), "html", null, true);
        yield "\"></script>
  ";
        // line 187
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 188
        yield "
  </body>
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

        yield "UniBank+";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 23
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

    // line 119
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

    // line 187
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
        return "base.html.twig";
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
        return array (  527 => 187,  505 => 119,  483 => 23,  460 => 4,  446 => 188,  444 => 187,  440 => 186,  436 => 185,  432 => 184,  428 => 183,  424 => 182,  420 => 181,  416 => 180,  412 => 179,  408 => 178,  404 => 177,  400 => 176,  396 => 175,  392 => 174,  353 => 138,  349 => 137,  345 => 136,  341 => 135,  337 => 134,  333 => 133,  318 => 120,  316 => 119,  313 => 118,  308 => 115,  302 => 114,  288 => 107,  284 => 105,  280 => 103,  278 => 102,  275 => 101,  273 => 100,  267 => 98,  262 => 97,  258 => 96,  255 => 95,  252 => 94,  250 => 93,  236 => 81,  231 => 79,  226 => 78,  218 => 76,  212 => 74,  206 => 72,  203 => 71,  201 => 70,  197 => 69,  193 => 68,  187 => 65,  183 => 64,  179 => 63,  175 => 62,  171 => 61,  167 => 60,  162 => 58,  157 => 56,  148 => 50,  120 => 24,  118 => 23,  114 => 22,  110 => 21,  106 => 20,  102 => 19,  98 => 18,  94 => 17,  90 => 16,  86 => 15,  82 => 14,  78 => 13,  74 => 12,  67 => 8,  63 => 7,  57 => 4,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
  <head>
    <title>{% block title %}UniBank+{% endblock %}</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\">
    <link rel=\"apple-touch-icon\" href=\"{{ asset('apple-touch-icon.png') }}\">

    <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,700\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css\">
    <link rel=\"stylesheet\" href=\"{{ asset('fonts/icomoon/style.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/jquery-ui.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/owl.carousel.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/owl.theme.default.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/jquery.fancybox.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap-datepicker.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('fonts/flaticon/font/flaticon.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/aos.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/custom.css') }}\">
    {% block stylesheets %}{% endblock %}
  </head>
  <body data-spy=\"scroll\" data-target=\".site-navbar-target\" data-offset=\"300\">

  <div id=\"overlayer\"></div>
  <div class=\"loader\">
    <div class=\"spinner-border text-primary\" role=\"status\">
      <span class=\"sr-only\">Loading...</span>
    </div>
  </div>

  <div class=\"site-wrap\">

    <div class=\"site-mobile-menu site-navbar-target\">
      <div class=\"site-mobile-menu-header\">
        <div class=\"site-mobile-menu-close mt-3\">
          <span class=\"icon-close2 js-menu-toggle\"></span>
        </div>
      </div>
      <div class=\"site-mobile-menu-body\"></div>
    </div>

    <header class=\"site-navbar js-sticky-header site-navbar-target\" role=\"banner\">
      <div class=\"container\">
        <div class=\"row align-items-center\">

          <div class=\"col-6 col-xl-2\">
            <h1 class=\"mb-0 site-logo\"><a href=\"{{ path('app_home') }}\" class=\"h2 mb-0\">UniBank<span class=\"text-primary\">+</span></a></h1>
          </div>

          <div class=\"col-12 col-md-10 d-none d-xl-block\">
            <nav class=\"site-navigation position-relative text-right\" role=\"navigation\">
              <ul class=\"site-menu main-menu js-clone-nav mr-auto d-none d-lg-block\">
                <li><a href=\"{{ path('app_home') }}#home-section\" class=\"nav-link\">Accueil</a></li>
                <li class=\"has-children\">
                  <a href=\"{{ path('app_home') }}#about-section\" class=\"nav-link\">A propos</a>
                  <ul class=\"dropdown\">
                    <li><a href=\"{{ path('app_home') }}#team-section\" class=\"nav-link\">Equipe</a></li>
                    <li><a href=\"{{ path('app_home') }}#pricing-section\" class=\"nav-link\">Tarifs</a></li>
                    <li><a href=\"{{ path('app_home') }}#faq-section\" class=\"nav-link\">FAQ</a></li>
                    <li><a href=\"{{ path('app_home') }}#gallery-section\" class=\"nav-link\">Galerie</a></li>
                    <li><a href=\"{{ path('app_home') }}#services-section\" class=\"nav-link\">Services</a></li>
                    <li><a href=\"{{ path('app_home') }}#testimonials-section\" class=\"nav-link\">Temoignages</a></li>
                  </ul>
                </li>
                <li><a href=\"{{ path('app_home') }}#blog-section\" class=\"nav-link\">Blog</a></li>
                <li><a href=\"{{ path('app_home') }}#contact-section\" class=\"nav-link\">Contact</a></li>
                {% if app.user %}
                  {% if is_granted('ROLE_AGENT') %}
                    <li><a href=\"{{ path('app_admin_dashboard') }}\" class=\"nav-link\">Dashboard</a></li>
                  {% elseif is_granted('ROLE_CLIENT') %}
                    <li><a href=\"{{ path('app_client_dashboard') }}\" class=\"nav-link\">Mon espace</a></li>
                  {% endif %}
                  <li><a href=\"{{ path('app_logout') }}\" class=\"nav-link\">{{ app.user.prenom }} (Deconnexion)</a></li>
                {% else %}
                  <li><a href=\"{{ path('app_login') }}\" class=\"nav-link\">Connexion</a></li>
                  <li><a href=\"{{ path('app_register') }}\" class=\"nav-link btn btn-primary text-white px-3 ml-2\" style=\"border-radius: 30px;\">Inscription</a></li>
                {% endif %}
              </ul>
            </nav>
          </div>

          <div class=\"col-6 d-inline-block d-xl-none ml-md-0 py-3\" style=\"position: relative; top: 3px;\">
            <a href=\"#\" class=\"site-menu-toggle js-menu-toggle float-right\"><span class=\"icon-menu h3\"></span></a>
          </div>

        </div>
      </div>
    </header>

    {% set flashes = app.flashes %}
    {% if flashes|length > 0 %}
    <div id=\"flash-messages\" style=\"position: fixed; top: 20px; right: 20px; z-index: 99999; max-width: 450px; width: 100%;\">
      {% for label, messages in flashes %}
        {% for message in messages %}
          <div class=\"alert alert-{{ label == 'error' ? 'danger' : (label == 'warning' ? 'warning' : 'success') }} alert-dismissible fade show shadow-lg\" role=\"alert\" style=\"border-radius: 8px; border: none; margin-bottom: 10px;\">
            <div class=\"d-flex align-items-center\">
              {% if label == 'success' %}
                <span class=\"mr-2\" style=\"font-size: 20px;\">&#10003;</span>
              {% elseif label == 'error' or label == 'danger' %}
                <span class=\"mr-2\" style=\"font-size: 20px;\">&#10007;</span>
              {% else %}
                <span class=\"mr-2\" style=\"font-size: 20px;\">&#9888;</span>
              {% endif %}
              <span>{{ message }}</span>
            </div>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </button>
          </div>
        {% endfor %}
      {% endfor %}
    </div>
    <script>setTimeout(function(){var el=document.getElementById('flash-messages');if(el){el.style.transition='opacity 0.5s';el.style.opacity='0';setTimeout(function(){el.remove()},500);}},5000);</script>
    {% endif %}

    {% block body %}{% endblock %}

    <footer class=\"site-footer\">
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-md-9\">
            <div class=\"row\">
              <div class=\"col-md-5\">
                <h2 class=\"footer-heading mb-4\">A propos</h2>
                <p>UniBank+ est votre partenaire bancaire de confiance. Nous offrons des solutions financieres modernes et securisees pour tous vos besoins.</p>
              </div>
              <div class=\"col-md-3 ml-auto\">
                <h2 class=\"footer-heading mb-4\">Liens rapides</h2>
                <ul class=\"list-unstyled\">
                  <li><a href=\"{{ path('app_home') }}#about-section\" class=\"smoothscroll\">A propos</a></li>
                  <li><a href=\"{{ path('app_home') }}#services-section\" class=\"smoothscroll\">Services</a></li>
                  <li><a href=\"{{ path('app_home') }}#testimonials-section\" class=\"smoothscroll\">Temoignages</a></li>
                  <li><a href=\"{{ path('app_home') }}#contact-section\" class=\"smoothscroll\">Contact</a></li>
                  <li><a href=\"{{ path('app_login') }}\">Connexion</a></li>
                  <li><a href=\"{{ path('app_register') }}\">Inscription</a></li>
                </ul>
              </div>
              <div class=\"col-md-3 footer-social\">
                <h2 class=\"footer-heading mb-4\">Suivez-nous</h2>
                <a href=\"#\" class=\"pl-0 pr-3\"><span class=\"icon-facebook\"></span></a>
                <a href=\"#\" class=\"pl-3 pr-3\"><span class=\"icon-twitter\"></span></a>
                <a href=\"#\" class=\"pl-3 pr-3\"><span class=\"icon-instagram\"></span></a>
                <a href=\"#\" class=\"pl-3 pr-3\"><span class=\"icon-linkedin\"></span></a>
              </div>
            </div>
          </div>
          <div class=\"col-md-3\">
            <h2 class=\"footer-heading mb-4\">Newsletter</h2>
            <form action=\"#\" method=\"post\" class=\"footer-subscribe\">
              <div class=\"input-group mb-3\">
                <input type=\"text\" class=\"form-control border-secondary text-white bg-transparent\" placeholder=\"Votre email\" aria-label=\"Votre email\" aria-describedby=\"button-addon2\">
                <div class=\"input-group-append\">
                  <button class=\"btn btn-primary text-white\" type=\"button\" id=\"button-addon2\">Envoyer</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class=\"row pt-5 mt-5 text-center\">
          <div class=\"col-md-12\">
            <div class=\"border-top pt-5\">
              <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> UniBank+. Tous droits reserves.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>

  <script src=\"{{ asset('js/jquery-3.3.1.min.js') }}\"></script>
  <script src=\"{{ asset('js/jquery-ui.js') }}\"></script>
  <script src=\"{{ asset('js/popper.min.js') }}\"></script>
  <script src=\"{{ asset('js/bootstrap.min.js') }}\"></script>
  <script src=\"{{ asset('js/owl.carousel.min.js') }}\"></script>
  <script src=\"{{ asset('js/jquery.countdown.min.js') }}\"></script>
  <script src=\"{{ asset('js/jquery.easing.1.3.js') }}\"></script>
  <script src=\"{{ asset('js/aos.js') }}\"></script>
  <script src=\"{{ asset('js/jquery.fancybox.min.js') }}\"></script>
  <script src=\"{{ asset('js/jquery.sticky.js') }}\"></script>
  <script src=\"{{ asset('js/isotope.pkgd.min.js') }}\"></script>
  <script src=\"{{ asset('js/main.js') }}\"></script>
  <script src=\"{{ asset('js/password-toggle.js') }}\"></script>
  {% block javascripts %}{% endblock %}

  </body>
</html>
", "base.html.twig", "/Users/aziz/Downloads/symfony-etude/unibank+/unibank+/templates/base.html.twig");
    }
}
