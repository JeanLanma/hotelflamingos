<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* login/login.twig */
class __TwigTemplate_a5d7e3d16d455bbb736f76a540c9a519cbe572ac601cd6df3cbf47951f9fe163 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

  <!-- Font Awesome -->
  <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/plugins/fontawesome-free/css/all.min.css\">
  <!-- Ionicons -->
  <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">
  <!-- icheck bootstrap -->
  <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css\">
  <!-- Theme style -->
  <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/css/adminlte.min.css\">
  <!-- Google Font: Source Sans Pro -->
  <link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700\" rel=\"stylesheet\">
  <!-- custom -->
  <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "custom/css/login.css\">
</head>
<body class=\"hold-transition login-page\">
<div class=\"login-box\">

  <div class=\"card\">
    <div class=\"card-body login-card-body\">

      <div align=\"center\">
        <img src=\"../custom/img/logo.png\" class=\"logo-img\">
      </div>

      <p class=\"login-box-msg\">Ingrese a su cuenta</p>

      ";
        // line 35
        if (($context["error_message"] ?? null)) {
            // line 36
            echo "      <div class=\"alert alert-";
            echo twig_escape_filter($this->env, ($context["error_type"] ?? null), "html", null, true);
            echo " text-center\">
        ";
            // line 37
            echo twig_escape_filter($this->env, ($context["error_message"] ?? null), "html", null, true);
            echo "
      </div>
      ";
        }
        // line 40
        echo "
      <form action=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "login/authentication\" method=\"post\">
        <div class=\"input-group mb-3\">
          <input type=\"text\" class=\"form-control\" name=\"username\" placeholder=\"Usuario\">
          <div class=\"input-group-append\">
            <div class=\"input-group-text\">
              <span class=\"fas fa-user\"></span>
            </div>
          </div>
        </div>
        <div class=\"input-group mb-3\">
          <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Contraseña\">
          <div class=\"input-group-append\">
            <div class=\"input-group-text\">
              <span class=\"fas fa-lock\"></span>
            </div>
          </div>
        </div>
        <div class=\"input-group mb-3\">
          <button type=\"submit\" class=\"btn btn-primary btn-block\">Iniciar sesión</button>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/plugins/jquery/jquery.min.js\"></script>
<!-- Bootstrap 4 -->
<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>
<!-- AdminLTE App -->
<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/js/adminlte.min.js\"></script>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "login/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 74,  131 => 72,  126 => 70,  94 => 41,  91 => 40,  85 => 37,  80 => 36,  78 => 35,  61 => 21,  54 => 17,  49 => 15,  42 => 11,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

  <!-- Font Awesome -->
  <link rel=\"stylesheet\" href=\"{{ base_url() }}assets/plugins/fontawesome-free/css/all.min.css\">
  <!-- Ionicons -->
  <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">
  <!-- icheck bootstrap -->
  <link rel=\"stylesheet\" href=\"{{ base_url() }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css\">
  <!-- Theme style -->
  <link rel=\"stylesheet\" href=\"{{ base_url() }}assets/css/adminlte.min.css\">
  <!-- Google Font: Source Sans Pro -->
  <link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700\" rel=\"stylesheet\">
  <!-- custom -->
  <link rel=\"stylesheet\" href=\"{{ base_url() }}custom/css/login.css\">
</head>
<body class=\"hold-transition login-page\">
<div class=\"login-box\">

  <div class=\"card\">
    <div class=\"card-body login-card-body\">

      <div align=\"center\">
        <img src=\"../custom/img/logo.png\" class=\"logo-img\">
      </div>

      <p class=\"login-box-msg\">Ingrese a su cuenta</p>

      {% if error_message %}
      <div class=\"alert alert-{{ error_type }} text-center\">
        {{ error_message }}
      </div>
      {% endif %}

      <form action=\"{{ base_url }}login/authentication\" method=\"post\">
        <div class=\"input-group mb-3\">
          <input type=\"text\" class=\"form-control\" name=\"username\" placeholder=\"Usuario\">
          <div class=\"input-group-append\">
            <div class=\"input-group-text\">
              <span class=\"fas fa-user\"></span>
            </div>
          </div>
        </div>
        <div class=\"input-group mb-3\">
          <input type=\"password\" class=\"form-control\" name=\"password\" placeholder=\"Contraseña\">
          <div class=\"input-group-append\">
            <div class=\"input-group-text\">
              <span class=\"fas fa-lock\"></span>
            </div>
          </div>
        </div>
        <div class=\"input-group mb-3\">
          <button type=\"submit\" class=\"btn btn-primary btn-block\">Iniciar sesión</button>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=\"{{ base_url() }}assets/plugins/jquery/jquery.min.js\"></script>
<!-- Bootstrap 4 -->
<script src=\"{{ base_url() }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>
<!-- AdminLTE App -->
<script src=\"{{ base_url() }}assets/js/adminlte.min.js\"></script>

</body>
</html>
", "login/login.twig", "C:\\Bitnami\\wampstack-7.2.24-0\\apache2\\htdocs\\motor-mtz\\application\\views\\login\\login.twig");
    }
}
