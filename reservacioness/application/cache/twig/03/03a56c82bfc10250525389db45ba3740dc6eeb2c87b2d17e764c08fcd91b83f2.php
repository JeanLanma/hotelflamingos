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

/* overall/layout.twig */
class __TwigTemplate_84276c3de95a5be5584ea63088d5125c7041b39218f85696eb230f77c1902dd6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'appHeader' => [$this, 'block_appHeader'],
            'appBody' => [$this, 'block_appBody'],
            'appFooter' => [$this, 'block_appFooter'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">

  <title>Recepción</title>

  <!-- Font Awesome Icons -->
  <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/plugins/fontawesome-free/css/all.min.css\">

  ";
        // line 13
        $this->displayBlock('appHeader', $context, $blocks);
        // line 14
        echo "
  <!-- Theme style -->
  <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/css/adminlte.min.css\">
  <!-- Google Font: Source Sans Pro -->
  <link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700\" rel=\"stylesheet\">
</head>
<body class=\"hold-transition layout-top-nav\">
<div class=\"wrapper\">

  <!-- Navbar -->
  <nav class=\"main-header navbar navbar-expand-md navbar-light navbar-white\">
    <div class=\"container\">
      <a href=\"";
        // line 26
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "\" class=\"navbar-brand\">
        <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/img/AdminLTELogo.png\" alt=\"AdminLTE Logo\" class=\"brand-image img-circle elevation-3\"
             style=\"opacity: .8\">
        <span class=\"brand-text font-weight-light\">Recepción</span>
      </a>

      <button class=\"navbar-toggler order-1\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      ";
        // line 44
        echo "
      <!-- Right navbar links -->
      <ul class=\"order-1 order-md-3 navbar-nav navbar-no-expand ml-auto\">
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "logout/\">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  ";
        // line 56
        $this->displayBlock('appBody', $context, $blocks);
        // line 57
        echo "  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class=\"main-footer\">
    <!-- To the right -->
    <div class=\"float-right d-none d-sm-inline\">
      Powered By PCBTroniks
    </div>
    <!-- Default to the left -->
    <strong>¿Tiene problemas con el sistema? <a href=\"#\">Click aqui para ponerse en contacto soporte técnico.</a>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/plugins/jquery/jquery.min.js\"></script>
<!-- Bootstrap 4 -->
<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>
<!-- custom -->
<script>
  const BASE_URL = '";
        // line 79
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "';
</script>
";
        // line 81
        $this->displayBlock('appFooter', $context, $blocks);
        // line 82
        echo "<!-- AdminLTE App -->
<script src=\"";
        // line 83
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "assets/js/adminlte.min.js\"></script>
</body>
</html>
";
    }

    // line 13
    public function block_appHeader($context, array $blocks = [])
    {
    }

    // line 56
    public function block_appBody($context, array $blocks = [])
    {
    }

    // line 81
    public function block_appFooter($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "overall/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 81,  156 => 56,  151 => 13,  143 => 83,  140 => 82,  138 => 81,  133 => 79,  127 => 76,  122 => 74,  103 => 57,  101 => 56,  90 => 48,  84 => 44,  73 => 27,  69 => 26,  56 => 16,  52 => 14,  50 => 13,  45 => 11,  33 => 1,);
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
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">

  <title>Recepción</title>

  <!-- Font Awesome Icons -->
  <link rel=\"stylesheet\" href=\"{{ base_url() }}assets/plugins/fontawesome-free/css/all.min.css\">

  {% block appHeader %}{% endblock %}

  <!-- Theme style -->
  <link rel=\"stylesheet\" href=\"{{ base_url() }}assets/css/adminlte.min.css\">
  <!-- Google Font: Source Sans Pro -->
  <link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700\" rel=\"stylesheet\">
</head>
<body class=\"hold-transition layout-top-nav\">
<div class=\"wrapper\">

  <!-- Navbar -->
  <nav class=\"main-header navbar navbar-expand-md navbar-light navbar-white\">
    <div class=\"container\">
      <a href=\"{{ base_url() }}\" class=\"navbar-brand\">
        <img src=\"{{ base_url() }}assets/img/AdminLTELogo.png\" alt=\"AdminLTE Logo\" class=\"brand-image img-circle elevation-3\"
             style=\"opacity: .8\">
        <span class=\"brand-text font-weight-light\">Recepción</span>
      </a>

      <button class=\"navbar-toggler order-1\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      {#
      <div class=\"collapse navbar-collapse order-3\" id=\"navbarCollapse\">
        <!-- Left navbar links -->
        <ul class=\"navbar-nav\">
          <li class=\"nav-item\">
            <a href=\"#\" class=\"nav-link\">Habitaciones</a>
          </li>
        </ul>
      </div>#}

      <!-- Right navbar links -->
      <ul class=\"order-1 order-md-3 navbar-nav navbar-no-expand ml-auto\">
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{base_url()}}logout/\">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  {% block appBody %}{% endblock %}
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class=\"main-footer\">
    <!-- To the right -->
    <div class=\"float-right d-none d-sm-inline\">
      Powered By PCBTroniks
    </div>
    <!-- Default to the left -->
    <strong>¿Tiene problemas con el sistema? <a href=\"#\">Click aqui para ponerse en contacto soporte técnico.</a>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=\"{{ base_url() }}assets/plugins/jquery/jquery.min.js\"></script>
<!-- Bootstrap 4 -->
<script src=\"{{ base_url() }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>
<!-- custom -->
<script>
  const BASE_URL = '{{ base_url() }}';
</script>
{% block appFooter %}{% endblock %}
<!-- AdminLTE App -->
<script src=\"{{ base_url() }}assets/js/adminlte.min.js\"></script>
</body>
</html>
", "overall/layout.twig", "/home/realmaes/public_html/reservacioness/application/views/overall/layout.twig");
    }
}
