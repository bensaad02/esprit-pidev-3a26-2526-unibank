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

/* home/index.html.twig */
class __TwigTemplate_7e07eb93b4fdce95234995972b53e374 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

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

        yield "UniBank+ - Votre banque de confiance";
        
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
        yield "
    <div class=\"site-blocks-cover overlay\" style=\"background-image: url(";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/hero_2.jpg"), "html", null, true);
        yield ");\" data-aos=\"fade\" id=\"home-section\">
      <div class=\"container\">
        <div class=\"row align-items-center justify-content-center\">
          <div class=\"col-md-10 mt-lg-5 text-center\">
            <div class=\"single-text owl-carousel\">
              <div class=\"slide\">
                <h1 class=\"text-uppercase\" data-aos=\"fade-up\">Solutions Bancaires</h1>
                <p class=\"mb-5 desc\" data-aos=\"fade-up\" data-aos-delay=\"100\">Decouvrez nos solutions bancaires innovantes pour gerer vos finances en toute simplicite et securite.</p>
                <div data-aos=\"fade-up\" data-aos-delay=\"100\">
                  <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-primary mr-2 mb-2\">Ouvrir un compte</a>
                  <a href=\"#contact-section\" class=\"btn btn-outline-light mr-2 mb-2\">Nous contacter</a>
                </div>
              </div>
              <div class=\"slide\">
                <h1 class=\"text-uppercase\" data-aos=\"fade-up\">Credits et Financements</h1>
                <p class=\"mb-5 desc\" data-aos=\"fade-up\" data-aos-delay=\"100\">Des solutions de financement adaptees a vos projets personnels et professionnels avec des taux competitifs.</p>
                <div data-aos=\"fade-up\" data-aos-delay=\"100\">
                  <a href=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-primary mr-2 mb-2\">En savoir plus</a>
                </div>
              </div>
              <div class=\"slide\">
                <h1 class=\"text-uppercase\" data-aos=\"fade-up\">Comptes Epargne</h1>
                <p class=\"mb-5 desc\" data-aos=\"fade-up\" data-aos-delay=\"100\">Faites fructifier votre epargne avec nos comptes a taux avantageux et nos plans d'investissement.</p>
                <div data-aos=\"fade-up\" data-aos-delay=\"100\">
                  <a href=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-primary mr-2 mb-2\">Commencer</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href=\"#next\" class=\"mouse smoothscroll\">
        <span class=\"mouse-icon\">
          <span class=\"mouse-wheel\"></span>
        </span>
      </a>
    </div>

    <div class=\"site-section cta-big-image\" id=\"about-section\">
      <div class=\"container\">
        <div class=\"row mb-5 justify-content-center\">
          <div class=\"col-md-8 text-center\">
            <h2 class=\"section-title mb-3\" data-aos=\"fade-up\">A propos de nous</h2>
            <p class=\"lead\" data-aos=\"fade-up\" data-aos-delay=\"100\">UniBank+ est une banque moderne qui place la satisfaction client au coeur de ses priorites.</p>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <figure class=\"circle-bg\">
              <img src=\"";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_2.jpg"), "html", null, true);
        yield "\" alt=\"UniBank+\" class=\"img-fluid\">
            </figure>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <h3 class=\"text-black mb-4\">Nous resolvons vos problemes financiers</h3>
            <p>Avec UniBank+, beneficiez d'un accompagnement personnalise pour tous vos besoins bancaires. Notre equipe d'experts est a votre disposition pour vous guider dans vos decisions financieres.</p>
            <p>Que ce soit pour un compte courant, un credit immobilier ou une carte bancaire, nous avons la solution qu'il vous faut.</p>
          </div>
        </div>
      </div>
    </div>

    <div class=\"site-section\" id=\"next\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-md-4 text-center\" data-aos=\"fade-up\">
            <img src=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/001-wallet.svg"), "html", null, true);
        yield "\" alt=\"Epargne\" class=\"img-fluid w-25 mb-4\">
            <h3 class=\"card-title\">Epargne securisee</h3>
            <p>Faites fructifier votre argent avec nos comptes epargne a taux competitifs.</p>
          </div>
          <div class=\"col-md-4 text-center\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <img src=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/004-cart.svg"), "html", null, true);
        yield "\" alt=\"Paiements\" class=\"img-fluid w-25 mb-4\">
            <h3 class=\"card-title\">Paiements en ligne</h3>
            <p>Effectuez vos achats en ligne en toute securite avec nos cartes bancaires.</p>
          </div>
          <div class=\"col-md-4 text-center\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <img src=\"";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/006-credit-card.svg"), "html", null, true);
        yield "\" alt=\"Cartes\" class=\"img-fluid w-25 mb-4\">
            <h3 class=\"card-title\">Cartes bancaires</h3>
            <p>Choisissez parmi notre gamme de cartes adaptees a vos besoins.</p>
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <figure class=\"circle-bg\">
              <img src=\"";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/about_2.jpg"), "html", null, true);
        yield "\" alt=\"UniBank+\" class=\"img-fluid\">
            </figure>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"mb-4\">
              <h3 class=\"h3 mb-4 text-black\">Les solutions bancaires sont notre priorite</h3>
              <p>Nous nous engageons a fournir des services bancaires de qualite superieure.</p>
            </div>
            <div class=\"mb-4\">
              <ul class=\"list-unstyled ul-check success\">
                <li>Gestion de compte en ligne 24h/24</li>
                <li>Service client disponible et reactif</li>
                <li>Taux d'interet competitifs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class=\"site-section border-bottom\" id=\"team-section\">
      <div class=\"container\">
        <div class=\"row mb-5 justify-content-center\">
          <div class=\"col-md-8 text-center\">
            <h2 class=\"section-title mb-3\" data-aos=\"fade-up\">Notre Equipe</h2>
            <p class=\"lead\" data-aos=\"fade-up\" data-aos-delay=\"100\">Une equipe de professionnels devoues a votre service.</p>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-6 col-lg-4 mb-4\" data-aos=\"fade-up\">
            <div class=\"team-member\">
              <figure>
                <ul class=\"social\">
                  <li><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-linkedin\"></span></a></li>
                </ul>
                <img src=\"";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_1.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              </figure>
              <div class=\"p-3\">
                <h3>Kaiara Spencer</h3>
                <span class=\"position\">Comptable</span>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"team-member\">
              <figure>
                <ul class=\"social\">
                  <li><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-linkedin\"></span></a></li>
                </ul>
                <img src=\"";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_2.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              </figure>
              <div class=\"p-3\">
                <h3>Dave Simpson</h3>
                <span class=\"position\">Agent bancaire</span>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"team-member\">
              <figure>
                <ul class=\"social\">
                  <li><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-linkedin\"></span></a></li>
                </ul>
                <img src=\"";
        // line 160
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_3.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              </figure>
              <div class=\"p-3\">
                <h3>Ben Thompson</h3>
                <span class=\"position\">Agent bancaire</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\" id=\"gallery-section\" data-aos=\"fade\">
      <div class=\"container\">
        <div class=\"row mb-3\">
          <div class=\"col-12 text-center\">
            <h2 class=\"section-title mb-3\">Galerie</h2>
          </div>
        </div>
        <div id=\"posts\" class=\"row no-gutter\">
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 181
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_1.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_1.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 187
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_2.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 189
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_2.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
          <div class=\"item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_3.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 195
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_3.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
          <div class=\"item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 199
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_4.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_4.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 205
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_5.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 207
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_5.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
          <div class=\"item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_1.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 213
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_1.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 217
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_2.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 219
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_2.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
          <div class=\"item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"";
        // line 223
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_3.jpg"), "html", null, true);
        yield "\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"";
        // line 225
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_3.jpg"), "html", null, true);
        yield "\">
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\">
      <div class=\"container\">
        <div class=\"row mb-5 justify-content-center\">
          <div class=\"col-md-7 text-center\">
            <h2 class=\"section-title mb-3\" data-aos=\"fade-up\">Comment ca marche</h2>
            <p class=\"lead\" data-aos=\"fade-up\" data-aos-delay=\"100\">Ouvrir un compte UniBank+ est simple et rapide en seulement 3 etapes.</p>
          </div>
        </div>
        <div class=\"row align-items-lg-center\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <div class=\"owl-carousel slide-one-item-alt\">
              <img src=\"";
        // line 243
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_1.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              <img src=\"";
        // line 244
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_2.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              <img src=\"";
        // line 245
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_3.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
            </div>
            <div class=\"custom-direction\">
              <a href=\"#\" class=\"custom-prev\"><span><span class=\"icon-keyboard_backspace\"></span></span></a>
              <a href=\"#\" class=\"custom-next\"><span><span class=\"icon-keyboard_backspace\"></span></span></a>
            </div>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"owl-carousel slide-one-item-alt-text\">
              <div>
                <h2 class=\"section-title mb-3\">01. Inscription en ligne</h2>
                <p>Remplissez le formulaire d'inscription avec vos informations personnelles. C'est rapide et securise.</p>
                <p><a href=\"";
        // line 257
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-primary mr-2 mb-2\">S'inscrire</a></p>
              </div>
              <div>
                <h2 class=\"section-title mb-3\">02. Validation du compte</h2>
                <p>Notre equipe verifie vos informations et valide votre compte dans les plus brefs delais.</p>
                <p><a href=\"#\" class=\"btn btn-primary mr-2 mb-2\">En savoir plus</a></p>
              </div>
              <div>
                <h2 class=\"section-title mb-3\">03. Acces a vos services</h2>
                <p>Profitez de tous nos services bancaires : virements, cartes, credits et bien plus encore.</p>
                <p><a href=\"#\" class=\"btn btn-primary mr-2 mb-2\">Decouvrir</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section border-bottom bg-light\" id=\"services-section\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\" data-aos=\"fade\">
            <h2 class=\"section-title mb-3\">Nos Services</h2>
          </div>
        </div>
        <div class=\"row align-items-stretch\">
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"";
        // line 286
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/001-wallet.svg"), "html", null, true);
        yield "\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Comptes bancaires</h3>
                <p>Comptes courants et epargne avec des conditions avantageuses pour tous vos besoins.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"";
        // line 298
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/006-credit-card.svg"), "html", null, true);
        yield "\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Cartes bancaires</h3>
                <p>Une gamme complete de cartes bancaires pour vos paiements quotidiens et vos voyages.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"";
        // line 310
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/002-rich.svg"), "html", null, true);
        yield "\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Suivi des revenus</h3>
                <p>Suivez vos revenus et depenses en temps reel depuis votre tableau de bord.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"";
        // line 322
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/003-notes.svg"), "html", null, true);
        yield "\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Credits et prets</h3>
                <p>Des solutions de financement flexibles avec des taux d'interet competitifs.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"";
        // line 334
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/004-cart.svg"), "html", null, true);
        yield "\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Virements</h3>
                <p>Effectuez vos virements nationaux et internationaux en toute simplicite.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"";
        // line 346
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/flaticon-svg/svg/005-megaphone.svg"), "html", null, true);
        yield "\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Support client</h3>
                <p>Une equipe dediee pour repondre a toutes vos questions et reclamations.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section testimonial-wrap\" id=\"testimonials-section\" data-aos=\"fade\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\">
            <h2 class=\"section-title mb-3\">Clients satisfaits</h2>
          </div>
        </div>
      </div>
      <div class=\"slide-one-item home-slider owl-carousel\">
        <div>
          <div class=\"testimonial\">
            <blockquote class=\"mb-5\">
              <p>&laquo; UniBank+ a transforme ma facon de gerer mes finances. Le service est rapide, securise et le support client est toujours disponible. &raquo;</p>
            </blockquote>
            <figure class=\"mb-4 d-flex align-items-center justify-content-center\">
              <div><img src=\"";
        // line 374
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_1.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"w-50 img-fluid mb-3\"></div>
              <p>Ahmed Ben Ali</p>
            </figure>
          </div>
        </div>
        <div>
          <div class=\"testimonial\">
            <blockquote class=\"mb-5\">
              <p>&laquo; J'ai obtenu mon credit immobilier en un temps record. Les taux sont tres competitifs et l'equipe est tres professionnelle. &raquo;</p>
            </blockquote>
            <figure class=\"mb-4 d-flex align-items-center justify-content-center\">
              <div><img src=\"";
        // line 385
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_2.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"w-50 img-fluid mb-3\"></div>
              <p>Fatma Souissi</p>
            </figure>
          </div>
        </div>
        <div>
          <div class=\"testimonial\">
            <blockquote class=\"mb-5\">
              <p>&laquo; La carte bancaire UniBank+ est parfaite pour mes achats en ligne. Je recommande vivement cette banque. &raquo;</p>
            </blockquote>
            <figure class=\"mb-4 d-flex align-items-center justify-content-center\">
              <div><img src=\"";
        // line 396
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_3.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"w-50 img-fluid mb-3\"></div>
              <p>Mohamed Trabelsi</p>
            </figure>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section bg-light\" id=\"pricing-section\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\" data-aos=\"fade-up\">
            <h2 class=\"section-title mb-3\">Nos Offres</h2>
          </div>
        </div>
        <div class=\"row mb-5\">
          <div class=\"col-md-6 mb-4 mb-lg-0 col-lg-4\" data-aos=\"fade-up\">
            <div class=\"pricing\">
              <h3 class=\"text-center text-black\">Basique</h3>
              <div class=\"price text-center mb-4\">
                <span><span>0 DT</span> / mois</span>
              </div>
              <ul class=\"list-unstyled ul-check success mb-5\">
                <li>Compte courant gratuit</li>
                <li>Carte bancaire classique</li>
                <li class=\"remove\">Virements internationaux</li>
                <li class=\"remove\">Credit immobilier</li>
                <li class=\"remove\">Conseiller dedie</li>
              </ul>
              <p class=\"text-center\">
                <a href=\"";
        // line 426
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-secondary\">Choisir</a>
              </p>
            </div>
          </div>
          <div class=\"col-md-6 mb-4 mb-lg-0 col-lg-4 pricing-popular\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"pricing\">
              <h3 class=\"text-center text-black\">Premium</h3>
              <div class=\"price text-center mb-4\">
                <span><span>15 DT</span> / mois</span>
              </div>
              <ul class=\"list-unstyled ul-check success mb-5\">
                <li>Compte courant + epargne</li>
                <li>Carte bancaire Gold</li>
                <li>Virements internationaux</li>
                <li>Credit immobilier</li>
                <li class=\"remove\">Conseiller dedie</li>
              </ul>
              <p class=\"text-center\">
                <a href=\"";
        // line 444
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-primary\">Choisir</a>
              </p>
            </div>
          </div>
          <div class=\"col-md-6 mb-4 mb-lg-0 col-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"pricing\">
              <h3 class=\"text-center text-black\">Professionnel</h3>
              <div class=\"price text-center mb-4\">
                <span><span>45 DT</span> / mois</span>
              </div>
              <ul class=\"list-unstyled ul-check success mb-5\">
                <li>Compte courant + epargne</li>
                <li>Carte bancaire Platinum</li>
                <li>Virements internationaux</li>
                <li>Credit immobilier</li>
                <li>Conseiller dedie</li>
              </ul>
              <p class=\"text-center\">
                <a href=\"";
        // line 462
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-secondary\">Choisir</a>
              </p>
            </div>
          </div>
        </div>

        <div class=\"row site-section\" id=\"faq-section\">
          <div class=\"col-12 text-center\" data-aos=\"fade\">
            <h2 class=\"section-title\">Questions frequentes</h2>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-lg-6\">
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Comment ouvrir un compte UniBank+ ?</h3>
              <p>Il suffit de remplir le formulaire d'inscription en ligne avec vos informations personnelles. Votre demande sera traitee sous 24 a 48 heures.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Quels documents sont necessaires ?</h3>
              <p>Vous aurez besoin de votre CIN (carte d'identite nationale), un justificatif de domicile et un numero de telephone valide.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Comment demander un credit ?</h3>
              <p>Une fois votre compte valide, vous pouvez soumettre une demande de credit directement depuis votre espace client.</p>
            </div>
          </div>
          <div class=\"col-lg-6\">
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Les virements sont-ils gratuits ?</h3>
              <p>Les virements locaux sont gratuits avec toutes nos offres. Les virements internationaux sont inclus dans les offres Premium et Professionnel.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Quels sont les horaires du service client ?</h3>
              <p>Notre service client est disponible du lundi au vendredi de 8h a 18h, et le samedi de 9h a 13h.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Comment signaler un probleme ?</h3>
              <p>Vous pouvez soumettre une reclamation depuis votre espace client ou nous contacter directement par telephone ou email.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\">
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <figure class=\"circle-bg\">
              <img src=\"";
        // line 511
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_4.jpg"), "html", null, true);
        yield "\" alt=\"UniBank+\" class=\"img-fluid\">
            </figure>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"row\">
              <div class=\"col-12 mb-4\" data-aos=\"fade-up\">
                <div class=\"unit-4 d-flex\">
                  <div class=\"unit-4-icon mr-4 mb-3\"><span class=\"text-primary flaticon-head\"></span></div>
                  <div>
                    <h3>Prets bancaires</h3>
                    <p>Des solutions de financement adaptees a vos projets avec des taux competitifs et des durees flexibles.</p>
                    <p class=\"mb-0\"><a href=\"#\">En savoir plus</a></p>
                  </div>
                </div>
              </div>
              <div class=\"col-12 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
                <div class=\"unit-4 d-flex\">
                  <div class=\"unit-4-icon mr-4 mb-3\"><span class=\"text-primary flaticon-smartphone\"></span></div>
                  <div>
                    <h3>Conseil bancaire</h3>
                    <p>Nos conseillers vous accompagnent pour optimiser la gestion de votre patrimoine financier.</p>
                    <p class=\"mb-0\"><a href=\"#\">En savoir plus</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\" id=\"blog-section\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\" data-aos=\"fade\">
            <h2 class=\"section-title mb-3\">Notre Blog</h2>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\">
            <div class=\"h-entry\">
              <img src=\"";
        // line 552
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_1.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              <h2 class=\"font-size-regular\"><a href=\"#\">Comment bien gerer son budget mensuel ?</a></h2>
              <div class=\"meta mb-4\">UniBank+ <span class=\"mx-2\">&bullet;</span> Jan 18, 2024<span class=\"mx-2\">&bullet;</span> <a href=\"#\">Conseils</a></div>
              <p>Decouvrez nos astuces pour mieux gerer votre budget et epargner efficacement chaque mois.</p>
              <p><a href=\"#\">Lire la suite...</a></p>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"h-entry\">
              <img src=\"";
        // line 561
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_4.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              <h2 class=\"font-size-regular\"><a href=\"#\">Les avantages du paiement en ligne</a></h2>
              <div class=\"meta mb-4\">UniBank+ <span class=\"mx-2\">&bullet;</span> Feb 10, 2024<span class=\"mx-2\">&bullet;</span> <a href=\"#\">Technologie</a></div>
              <p>Le paiement en ligne est devenu incontournable. Voici pourquoi vous devriez l'adopter.</p>
              <p><a href=\"#\">Lire la suite...</a></p>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"h-entry\">
              <img src=\"";
        // line 570
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_3.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
              <h2 class=\"font-size-regular\"><a href=\"#\">Guide complet du credit immobilier</a></h2>
              <div class=\"meta mb-4\">UniBank+ <span class=\"mx-2\">&bullet;</span> Mar 5, 2024<span class=\"mx-2\">&bullet;</span> <a href=\"#\">Credits</a></div>
              <p>Tout ce que vous devez savoir avant de demander un credit immobilier chez UniBank+.</p>
              <p><a href=\"#\">Lire la suite...</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section bg-light\" id=\"contact-section\" data-aos=\"fade\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\">
            <h2 class=\"section-title mb-3\">Contactez-nous</h2>
          </div>
        </div>
        <div class=\"row mb-5\">
          <div class=\"col-md-4 text-center\">
            <p class=\"mb-4\">
              <span class=\"icon-room d-block h2 text-primary\"></span>
              <span>Avenue Habib Bourguiba, Tunis, Tunisie</span>
            </p>
          </div>
          <div class=\"col-md-4 text-center\">
            <p class=\"mb-4\">
              <span class=\"icon-phone d-block h2 text-primary\"></span>
              <a href=\"#\">+216 71 123 456</a>
            </p>
          </div>
          <div class=\"col-md-4 text-center\">
            <p class=\"mb-0\">
              <span class=\"icon-mail_outline d-block h2 text-primary\"></span>
              <a href=\"#\">contact@unibank.tn</a>
            </p>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-12 mb-5\">
            <form action=\"#\" class=\"p-5 bg-white\">
              <h2 class=\"h4 text-black mb-5\">Formulaire de contact</h2>
              <div class=\"row form-group\">
                <div class=\"col-md-6 mb-3 mb-md-0\">
                  <label class=\"text-black\" for=\"fname\">Prenom</label>
                  <input type=\"text\" id=\"fname\" class=\"form-control\">
                </div>
                <div class=\"col-md-6\">
                  <label class=\"text-black\" for=\"lname\">Nom</label>
                  <input type=\"text\" id=\"lname\" class=\"form-control\">
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <label class=\"text-black\" for=\"email\">Email</label>
                  <input type=\"email\" id=\"email\" class=\"form-control\">
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <label class=\"text-black\" for=\"subject\">Sujet</label>
                  <input type=\"text\" id=\"subject\" class=\"form-control\">
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <label class=\"text-black\" for=\"message\">Message</label>
                  <textarea name=\"message\" id=\"message\" cols=\"30\" rows=\"7\" class=\"form-control\" placeholder=\"Ecrivez votre message ici...\"></textarea>
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <input type=\"submit\" value=\"Envoyer\" class=\"btn btn-primary btn-md text-white\">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

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
        return "home/index.html.twig";
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
        return array (  807 => 570,  795 => 561,  783 => 552,  739 => 511,  687 => 462,  666 => 444,  645 => 426,  612 => 396,  598 => 385,  584 => 374,  553 => 346,  538 => 334,  523 => 322,  508 => 310,  493 => 298,  478 => 286,  446 => 257,  431 => 245,  427 => 244,  423 => 243,  402 => 225,  397 => 223,  390 => 219,  385 => 217,  378 => 213,  373 => 211,  366 => 207,  361 => 205,  354 => 201,  349 => 199,  342 => 195,  337 => 193,  330 => 189,  325 => 187,  318 => 183,  313 => 181,  289 => 160,  270 => 144,  251 => 128,  211 => 91,  199 => 82,  191 => 77,  183 => 72,  164 => 56,  136 => 31,  126 => 24,  115 => 16,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}UniBank+ - Votre banque de confiance{% endblock %}

{% block body %}

    <div class=\"site-blocks-cover overlay\" style=\"background-image: url({{ asset('images/hero_2.jpg') }});\" data-aos=\"fade\" id=\"home-section\">
      <div class=\"container\">
        <div class=\"row align-items-center justify-content-center\">
          <div class=\"col-md-10 mt-lg-5 text-center\">
            <div class=\"single-text owl-carousel\">
              <div class=\"slide\">
                <h1 class=\"text-uppercase\" data-aos=\"fade-up\">Solutions Bancaires</h1>
                <p class=\"mb-5 desc\" data-aos=\"fade-up\" data-aos-delay=\"100\">Decouvrez nos solutions bancaires innovantes pour gerer vos finances en toute simplicite et securite.</p>
                <div data-aos=\"fade-up\" data-aos-delay=\"100\">
                  <a href=\"{{ path('app_register') }}\" class=\"btn btn-primary mr-2 mb-2\">Ouvrir un compte</a>
                  <a href=\"#contact-section\" class=\"btn btn-outline-light mr-2 mb-2\">Nous contacter</a>
                </div>
              </div>
              <div class=\"slide\">
                <h1 class=\"text-uppercase\" data-aos=\"fade-up\">Credits et Financements</h1>
                <p class=\"mb-5 desc\" data-aos=\"fade-up\" data-aos-delay=\"100\">Des solutions de financement adaptees a vos projets personnels et professionnels avec des taux competitifs.</p>
                <div data-aos=\"fade-up\" data-aos-delay=\"100\">
                  <a href=\"{{ path('app_register') }}\" class=\"btn btn-primary mr-2 mb-2\">En savoir plus</a>
                </div>
              </div>
              <div class=\"slide\">
                <h1 class=\"text-uppercase\" data-aos=\"fade-up\">Comptes Epargne</h1>
                <p class=\"mb-5 desc\" data-aos=\"fade-up\" data-aos-delay=\"100\">Faites fructifier votre epargne avec nos comptes a taux avantageux et nos plans d'investissement.</p>
                <div data-aos=\"fade-up\" data-aos-delay=\"100\">
                  <a href=\"{{ path('app_register') }}\" class=\"btn btn-primary mr-2 mb-2\">Commencer</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href=\"#next\" class=\"mouse smoothscroll\">
        <span class=\"mouse-icon\">
          <span class=\"mouse-wheel\"></span>
        </span>
      </a>
    </div>

    <div class=\"site-section cta-big-image\" id=\"about-section\">
      <div class=\"container\">
        <div class=\"row mb-5 justify-content-center\">
          <div class=\"col-md-8 text-center\">
            <h2 class=\"section-title mb-3\" data-aos=\"fade-up\">A propos de nous</h2>
            <p class=\"lead\" data-aos=\"fade-up\" data-aos-delay=\"100\">UniBank+ est une banque moderne qui place la satisfaction client au coeur de ses priorites.</p>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <figure class=\"circle-bg\">
              <img src=\"{{ asset('images/img_2.jpg') }}\" alt=\"UniBank+\" class=\"img-fluid\">
            </figure>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <h3 class=\"text-black mb-4\">Nous resolvons vos problemes financiers</h3>
            <p>Avec UniBank+, beneficiez d'un accompagnement personnalise pour tous vos besoins bancaires. Notre equipe d'experts est a votre disposition pour vous guider dans vos decisions financieres.</p>
            <p>Que ce soit pour un compte courant, un credit immobilier ou une carte bancaire, nous avons la solution qu'il vous faut.</p>
          </div>
        </div>
      </div>
    </div>

    <div class=\"site-section\" id=\"next\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-md-4 text-center\" data-aos=\"fade-up\">
            <img src=\"{{ asset('images/flaticon-svg/svg/001-wallet.svg') }}\" alt=\"Epargne\" class=\"img-fluid w-25 mb-4\">
            <h3 class=\"card-title\">Epargne securisee</h3>
            <p>Faites fructifier votre argent avec nos comptes epargne a taux competitifs.</p>
          </div>
          <div class=\"col-md-4 text-center\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <img src=\"{{ asset('images/flaticon-svg/svg/004-cart.svg') }}\" alt=\"Paiements\" class=\"img-fluid w-25 mb-4\">
            <h3 class=\"card-title\">Paiements en ligne</h3>
            <p>Effectuez vos achats en ligne en toute securite avec nos cartes bancaires.</p>
          </div>
          <div class=\"col-md-4 text-center\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <img src=\"{{ asset('images/flaticon-svg/svg/006-credit-card.svg') }}\" alt=\"Cartes\" class=\"img-fluid w-25 mb-4\">
            <h3 class=\"card-title\">Cartes bancaires</h3>
            <p>Choisissez parmi notre gamme de cartes adaptees a vos besoins.</p>
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <figure class=\"circle-bg\">
              <img src=\"{{ asset('images/about_2.jpg') }}\" alt=\"UniBank+\" class=\"img-fluid\">
            </figure>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"mb-4\">
              <h3 class=\"h3 mb-4 text-black\">Les solutions bancaires sont notre priorite</h3>
              <p>Nous nous engageons a fournir des services bancaires de qualite superieure.</p>
            </div>
            <div class=\"mb-4\">
              <ul class=\"list-unstyled ul-check success\">
                <li>Gestion de compte en ligne 24h/24</li>
                <li>Service client disponible et reactif</li>
                <li>Taux d'interet competitifs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class=\"site-section border-bottom\" id=\"team-section\">
      <div class=\"container\">
        <div class=\"row mb-5 justify-content-center\">
          <div class=\"col-md-8 text-center\">
            <h2 class=\"section-title mb-3\" data-aos=\"fade-up\">Notre Equipe</h2>
            <p class=\"lead\" data-aos=\"fade-up\" data-aos-delay=\"100\">Une equipe de professionnels devoues a votre service.</p>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-6 col-lg-4 mb-4\" data-aos=\"fade-up\">
            <div class=\"team-member\">
              <figure>
                <ul class=\"social\">
                  <li><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-linkedin\"></span></a></li>
                </ul>
                <img src=\"{{ asset('images/person_1.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              </figure>
              <div class=\"p-3\">
                <h3>Kaiara Spencer</h3>
                <span class=\"position\">Comptable</span>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"team-member\">
              <figure>
                <ul class=\"social\">
                  <li><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-linkedin\"></span></a></li>
                </ul>
                <img src=\"{{ asset('images/person_2.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              </figure>
              <div class=\"p-3\">
                <h3>Dave Simpson</h3>
                <span class=\"position\">Agent bancaire</span>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"team-member\">
              <figure>
                <ul class=\"social\">
                  <li><a href=\"#\"><span class=\"icon-facebook\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-twitter\"></span></a></li>
                  <li><a href=\"#\"><span class=\"icon-linkedin\"></span></a></li>
                </ul>
                <img src=\"{{ asset('images/person_3.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              </figure>
              <div class=\"p-3\">
                <h3>Ben Thompson</h3>
                <span class=\"position\">Agent bancaire</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\" id=\"gallery-section\" data-aos=\"fade\">
      <div class=\"container\">
        <div class=\"row mb-3\">
          <div class=\"col-12 text-center\">
            <h2 class=\"section-title mb-3\">Galerie</h2>
          </div>
        </div>
        <div id=\"posts\" class=\"row no-gutter\">
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_1.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_1.jpg') }}\">
            </a>
          </div>
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_2.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_2.jpg') }}\">
            </a>
          </div>
          <div class=\"item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_3.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_3.jpg') }}\">
            </a>
          </div>
          <div class=\"item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_4.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_4.jpg') }}\">
            </a>
          </div>
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_5.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_5.jpg') }}\">
            </a>
          </div>
          <div class=\"item brand col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_1.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_1.jpg') }}\">
            </a>
          </div>
          <div class=\"item web col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_2.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_2.jpg') }}\">
            </a>
          </div>
          <div class=\"item design col-sm-6 col-md-4 col-lg-4 col-xl-3 mb-4\">
            <a href=\"{{ asset('images/img_3.jpg') }}\" class=\"item-wrap fancybox\" data-fancybox=\"gallery2\">
              <span class=\"icon-search2\"></span>
              <img class=\"img-fluid\" src=\"{{ asset('images/img_3.jpg') }}\">
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\">
      <div class=\"container\">
        <div class=\"row mb-5 justify-content-center\">
          <div class=\"col-md-7 text-center\">
            <h2 class=\"section-title mb-3\" data-aos=\"fade-up\">Comment ca marche</h2>
            <p class=\"lead\" data-aos=\"fade-up\" data-aos-delay=\"100\">Ouvrir un compte UniBank+ est simple et rapide en seulement 3 etapes.</p>
          </div>
        </div>
        <div class=\"row align-items-lg-center\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <div class=\"owl-carousel slide-one-item-alt\">
              <img src=\"{{ asset('images/img_1.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              <img src=\"{{ asset('images/img_2.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              <img src=\"{{ asset('images/img_3.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
            </div>
            <div class=\"custom-direction\">
              <a href=\"#\" class=\"custom-prev\"><span><span class=\"icon-keyboard_backspace\"></span></span></a>
              <a href=\"#\" class=\"custom-next\"><span><span class=\"icon-keyboard_backspace\"></span></span></a>
            </div>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"owl-carousel slide-one-item-alt-text\">
              <div>
                <h2 class=\"section-title mb-3\">01. Inscription en ligne</h2>
                <p>Remplissez le formulaire d'inscription avec vos informations personnelles. C'est rapide et securise.</p>
                <p><a href=\"{{ path('app_register') }}\" class=\"btn btn-primary mr-2 mb-2\">S'inscrire</a></p>
              </div>
              <div>
                <h2 class=\"section-title mb-3\">02. Validation du compte</h2>
                <p>Notre equipe verifie vos informations et valide votre compte dans les plus brefs delais.</p>
                <p><a href=\"#\" class=\"btn btn-primary mr-2 mb-2\">En savoir plus</a></p>
              </div>
              <div>
                <h2 class=\"section-title mb-3\">03. Acces a vos services</h2>
                <p>Profitez de tous nos services bancaires : virements, cartes, credits et bien plus encore.</p>
                <p><a href=\"#\" class=\"btn btn-primary mr-2 mb-2\">Decouvrir</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section border-bottom bg-light\" id=\"services-section\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\" data-aos=\"fade\">
            <h2 class=\"section-title mb-3\">Nos Services</h2>
          </div>
        </div>
        <div class=\"row align-items-stretch\">
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"{{ asset('images/flaticon-svg/svg/001-wallet.svg') }}\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Comptes bancaires</h3>
                <p>Comptes courants et epargne avec des conditions avantageuses pour tous vos besoins.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"{{ asset('images/flaticon-svg/svg/006-credit-card.svg') }}\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Cartes bancaires</h3>
                <p>Une gamme complete de cartes bancaires pour vos paiements quotidiens et vos voyages.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"{{ asset('images/flaticon-svg/svg/002-rich.svg') }}\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Suivi des revenus</h3>
                <p>Suivez vos revenus et depenses en temps reel depuis votre tableau de bord.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"{{ asset('images/flaticon-svg/svg/003-notes.svg') }}\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Credits et prets</h3>
                <p>Des solutions de financement flexibles avec des taux d'interet competitifs.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"{{ asset('images/flaticon-svg/svg/004-cart.svg') }}\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Virements</h3>
                <p>Effectuez vos virements nationaux et internationaux en toute simplicite.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"unit-4\">
              <div class=\"unit-4-icon\">
                <img src=\"{{ asset('images/flaticon-svg/svg/005-megaphone.svg') }}\" alt=\"\" class=\"img-fluid w-25 mb-4\">
              </div>
              <div>
                <h3>Support client</h3>
                <p>Une equipe dediee pour repondre a toutes vos questions et reclamations.</p>
                <p><a href=\"#\">En savoir plus</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section testimonial-wrap\" id=\"testimonials-section\" data-aos=\"fade\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\">
            <h2 class=\"section-title mb-3\">Clients satisfaits</h2>
          </div>
        </div>
      </div>
      <div class=\"slide-one-item home-slider owl-carousel\">
        <div>
          <div class=\"testimonial\">
            <blockquote class=\"mb-5\">
              <p>&laquo; UniBank+ a transforme ma facon de gerer mes finances. Le service est rapide, securise et le support client est toujours disponible. &raquo;</p>
            </blockquote>
            <figure class=\"mb-4 d-flex align-items-center justify-content-center\">
              <div><img src=\"{{ asset('images/person_1.jpg') }}\" alt=\"Image\" class=\"w-50 img-fluid mb-3\"></div>
              <p>Ahmed Ben Ali</p>
            </figure>
          </div>
        </div>
        <div>
          <div class=\"testimonial\">
            <blockquote class=\"mb-5\">
              <p>&laquo; J'ai obtenu mon credit immobilier en un temps record. Les taux sont tres competitifs et l'equipe est tres professionnelle. &raquo;</p>
            </blockquote>
            <figure class=\"mb-4 d-flex align-items-center justify-content-center\">
              <div><img src=\"{{ asset('images/person_2.jpg') }}\" alt=\"Image\" class=\"w-50 img-fluid mb-3\"></div>
              <p>Fatma Souissi</p>
            </figure>
          </div>
        </div>
        <div>
          <div class=\"testimonial\">
            <blockquote class=\"mb-5\">
              <p>&laquo; La carte bancaire UniBank+ est parfaite pour mes achats en ligne. Je recommande vivement cette banque. &raquo;</p>
            </blockquote>
            <figure class=\"mb-4 d-flex align-items-center justify-content-center\">
              <div><img src=\"{{ asset('images/person_3.jpg') }}\" alt=\"Image\" class=\"w-50 img-fluid mb-3\"></div>
              <p>Mohamed Trabelsi</p>
            </figure>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section bg-light\" id=\"pricing-section\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\" data-aos=\"fade-up\">
            <h2 class=\"section-title mb-3\">Nos Offres</h2>
          </div>
        </div>
        <div class=\"row mb-5\">
          <div class=\"col-md-6 mb-4 mb-lg-0 col-lg-4\" data-aos=\"fade-up\">
            <div class=\"pricing\">
              <h3 class=\"text-center text-black\">Basique</h3>
              <div class=\"price text-center mb-4\">
                <span><span>0 DT</span> / mois</span>
              </div>
              <ul class=\"list-unstyled ul-check success mb-5\">
                <li>Compte courant gratuit</li>
                <li>Carte bancaire classique</li>
                <li class=\"remove\">Virements internationaux</li>
                <li class=\"remove\">Credit immobilier</li>
                <li class=\"remove\">Conseiller dedie</li>
              </ul>
              <p class=\"text-center\">
                <a href=\"{{ path('app_register') }}\" class=\"btn btn-secondary\">Choisir</a>
              </p>
            </div>
          </div>
          <div class=\"col-md-6 mb-4 mb-lg-0 col-lg-4 pricing-popular\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"pricing\">
              <h3 class=\"text-center text-black\">Premium</h3>
              <div class=\"price text-center mb-4\">
                <span><span>15 DT</span> / mois</span>
              </div>
              <ul class=\"list-unstyled ul-check success mb-5\">
                <li>Compte courant + epargne</li>
                <li>Carte bancaire Gold</li>
                <li>Virements internationaux</li>
                <li>Credit immobilier</li>
                <li class=\"remove\">Conseiller dedie</li>
              </ul>
              <p class=\"text-center\">
                <a href=\"{{ path('app_register') }}\" class=\"btn btn-primary\">Choisir</a>
              </p>
            </div>
          </div>
          <div class=\"col-md-6 mb-4 mb-lg-0 col-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"pricing\">
              <h3 class=\"text-center text-black\">Professionnel</h3>
              <div class=\"price text-center mb-4\">
                <span><span>45 DT</span> / mois</span>
              </div>
              <ul class=\"list-unstyled ul-check success mb-5\">
                <li>Compte courant + epargne</li>
                <li>Carte bancaire Platinum</li>
                <li>Virements internationaux</li>
                <li>Credit immobilier</li>
                <li>Conseiller dedie</li>
              </ul>
              <p class=\"text-center\">
                <a href=\"{{ path('app_register') }}\" class=\"btn btn-secondary\">Choisir</a>
              </p>
            </div>
          </div>
        </div>

        <div class=\"row site-section\" id=\"faq-section\">
          <div class=\"col-12 text-center\" data-aos=\"fade\">
            <h2 class=\"section-title\">Questions frequentes</h2>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-lg-6\">
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Comment ouvrir un compte UniBank+ ?</h3>
              <p>Il suffit de remplir le formulaire d'inscription en ligne avec vos informations personnelles. Votre demande sera traitee sous 24 a 48 heures.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Quels documents sont necessaires ?</h3>
              <p>Vous aurez besoin de votre CIN (carte d'identite nationale), un justificatif de domicile et un numero de telephone valide.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Comment demander un credit ?</h3>
              <p>Une fois votre compte valide, vous pouvez soumettre une demande de credit directement depuis votre espace client.</p>
            </div>
          </div>
          <div class=\"col-lg-6\">
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Les virements sont-ils gratuits ?</h3>
              <p>Les virements locaux sont gratuits avec toutes nos offres. Les virements internationaux sont inclus dans les offres Premium et Professionnel.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Quels sont les horaires du service client ?</h3>
              <p>Notre service client est disponible du lundi au vendredi de 8h a 18h, et le samedi de 9h a 13h.</p>
            </div>
            <div class=\"mb-5\" data-aos=\"fade-up\" data-aos-delay=\"100\">
              <h3 class=\"text-black h4 mb-4\">Comment signaler un probleme ?</h3>
              <p>Vous pouvez soumettre une reclamation depuis votre espace client ou nous contacter directement par telephone ou email.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\">
      <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-lg-6 mb-5\" data-aos=\"fade-up\">
            <figure class=\"circle-bg\">
              <img src=\"{{ asset('images/img_4.jpg') }}\" alt=\"UniBank+\" class=\"img-fluid\">
            </figure>
          </div>
          <div class=\"col-lg-5 ml-auto\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"row\">
              <div class=\"col-12 mb-4\" data-aos=\"fade-up\">
                <div class=\"unit-4 d-flex\">
                  <div class=\"unit-4-icon mr-4 mb-3\"><span class=\"text-primary flaticon-head\"></span></div>
                  <div>
                    <h3>Prets bancaires</h3>
                    <p>Des solutions de financement adaptees a vos projets avec des taux competitifs et des durees flexibles.</p>
                    <p class=\"mb-0\"><a href=\"#\">En savoir plus</a></p>
                  </div>
                </div>
              </div>
              <div class=\"col-12 mb-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
                <div class=\"unit-4 d-flex\">
                  <div class=\"unit-4-icon mr-4 mb-3\"><span class=\"text-primary flaticon-smartphone\"></span></div>
                  <div>
                    <h3>Conseil bancaire</h3>
                    <p>Nos conseillers vous accompagnent pour optimiser la gestion de votre patrimoine financier.</p>
                    <p class=\"mb-0\"><a href=\"#\">En savoir plus</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section\" id=\"blog-section\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\" data-aos=\"fade\">
            <h2 class=\"section-title mb-3\">Notre Blog</h2>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\">
            <div class=\"h-entry\">
              <img src=\"{{ asset('images/img_1.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              <h2 class=\"font-size-regular\"><a href=\"#\">Comment bien gerer son budget mensuel ?</a></h2>
              <div class=\"meta mb-4\">UniBank+ <span class=\"mx-2\">&bullet;</span> Jan 18, 2024<span class=\"mx-2\">&bullet;</span> <a href=\"#\">Conseils</a></div>
              <p>Decouvrez nos astuces pour mieux gerer votre budget et epargner efficacement chaque mois.</p>
              <p><a href=\"#\">Lire la suite...</a></p>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"100\">
            <div class=\"h-entry\">
              <img src=\"{{ asset('images/img_4.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              <h2 class=\"font-size-regular\"><a href=\"#\">Les avantages du paiement en ligne</a></h2>
              <div class=\"meta mb-4\">UniBank+ <span class=\"mx-2\">&bullet;</span> Feb 10, 2024<span class=\"mx-2\">&bullet;</span> <a href=\"#\">Technologie</a></div>
              <p>Le paiement en ligne est devenu incontournable. Voici pourquoi vous devriez l'adopter.</p>
              <p><a href=\"#\">Lire la suite...</a></p>
            </div>
          </div>
          <div class=\"col-md-6 col-lg-4 mb-4 mb-lg-4\" data-aos=\"fade-up\" data-aos-delay=\"200\">
            <div class=\"h-entry\">
              <img src=\"{{ asset('images/img_3.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
              <h2 class=\"font-size-regular\"><a href=\"#\">Guide complet du credit immobilier</a></h2>
              <div class=\"meta mb-4\">UniBank+ <span class=\"mx-2\">&bullet;</span> Mar 5, 2024<span class=\"mx-2\">&bullet;</span> <a href=\"#\">Credits</a></div>
              <p>Tout ce que vous devez savoir avant de demander un credit immobilier chez UniBank+.</p>
              <p><a href=\"#\">Lire la suite...</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class=\"site-section bg-light\" id=\"contact-section\" data-aos=\"fade\">
      <div class=\"container\">
        <div class=\"row mb-5\">
          <div class=\"col-12 text-center\">
            <h2 class=\"section-title mb-3\">Contactez-nous</h2>
          </div>
        </div>
        <div class=\"row mb-5\">
          <div class=\"col-md-4 text-center\">
            <p class=\"mb-4\">
              <span class=\"icon-room d-block h2 text-primary\"></span>
              <span>Avenue Habib Bourguiba, Tunis, Tunisie</span>
            </p>
          </div>
          <div class=\"col-md-4 text-center\">
            <p class=\"mb-4\">
              <span class=\"icon-phone d-block h2 text-primary\"></span>
              <a href=\"#\">+216 71 123 456</a>
            </p>
          </div>
          <div class=\"col-md-4 text-center\">
            <p class=\"mb-0\">
              <span class=\"icon-mail_outline d-block h2 text-primary\"></span>
              <a href=\"#\">contact@unibank.tn</a>
            </p>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-md-12 mb-5\">
            <form action=\"#\" class=\"p-5 bg-white\">
              <h2 class=\"h4 text-black mb-5\">Formulaire de contact</h2>
              <div class=\"row form-group\">
                <div class=\"col-md-6 mb-3 mb-md-0\">
                  <label class=\"text-black\" for=\"fname\">Prenom</label>
                  <input type=\"text\" id=\"fname\" class=\"form-control\">
                </div>
                <div class=\"col-md-6\">
                  <label class=\"text-black\" for=\"lname\">Nom</label>
                  <input type=\"text\" id=\"lname\" class=\"form-control\">
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <label class=\"text-black\" for=\"email\">Email</label>
                  <input type=\"email\" id=\"email\" class=\"form-control\">
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <label class=\"text-black\" for=\"subject\">Sujet</label>
                  <input type=\"text\" id=\"subject\" class=\"form-control\">
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <label class=\"text-black\" for=\"message\">Message</label>
                  <textarea name=\"message\" id=\"message\" cols=\"30\" rows=\"7\" class=\"form-control\" placeholder=\"Ecrivez votre message ici...\"></textarea>
                </div>
              </div>
              <div class=\"row form-group\">
                <div class=\"col-md-12\">
                  <input type=\"submit\" value=\"Envoyer\" class=\"btn btn-primary btn-md text-white\">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

{% endblock %}
", "home/index.html.twig", "C:\\Users\\asala\\Downloads\\unibank+ (3)\\unibank+\\templates\\home\\index.html.twig");
    }
}
