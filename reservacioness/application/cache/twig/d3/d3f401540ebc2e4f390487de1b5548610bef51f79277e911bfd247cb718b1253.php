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

/* rooms/rooms.twig */
class __TwigTemplate_ce40fff86294d436d33e8bfdaf4b991ff36ed695ecfd19c9ea0249024faa1f45 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'appHeader' => [$this, 'block_appHeader'],
            'appBody' => [$this, 'block_appBody'],
            'appFooter' => [$this, 'block_appFooter'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "overall/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("overall/layout.twig", "rooms/rooms.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_appHeader($context, array $blocks = [])
    {
        // line 4
        echo "<!-- DataTables -->
<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css\">
";
    }

    // line 8
    public function block_appBody($context, array $blocks = [])
    {
        // line 9
        echo "  <div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
      <div class=\"container\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1>Tipos de Habitaciones&nbsp;
            <button class=\"btn btn-success btn-sm\" data-toggle=\"modal\" data-target=\"#addRoomModal\" onclick=\"addRoomModel()\"><i class=\"fa fa-plus\"></i> Añadir</button></h1>
          </div>
          <div class=\"col-sm-6\">
            <ol class=\"breadcrumb float-sm-right\">
              <li class=\"breadcrumb-item active\">Habitaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class=\"content\">
      <div class=\"container\">
        <div class=\"messages\"></div>

        <div class=\"card card-outline card-primary\">
          <div class=\"card-body\">

          <table id=\"listRoomTypes\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
              <th>Tipo de Habitación</th>
              <th>Precio</th>
              <th>Disponibilidad</th>
              <th>Modificación</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Tipo de Habitación</th>
              <th>Precio</th>
              <th>Disponibilidad</th>
              <th>Modificación</th>
              <th>Acciones</th>
            </tr>
            </tfoot>
          </table>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
    </section>
    <!-- /.content -->
  </div>
  ";
        // line 65
        $this->loadTemplate("rooms/add_room.twig", "rooms/rooms.twig", 65)->display($context);
        // line 66
        echo "  ";
        $this->loadTemplate("rooms/edit_room.twig", "rooms/rooms.twig", 66)->display($context);
    }

    // line 69
    public function block_appFooter($context, array $blocks = [])
    {
        // line 70
        echo "<!-- DataTables -->
<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "assets/plugins/datatables/jquery.dataTables.js\"></script>
<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js\"></script>
<!-- Custom -->
<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "custom/js/rooms.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "rooms/rooms.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 74,  131 => 72,  127 => 71,  124 => 70,  121 => 69,  116 => 66,  114 => 65,  56 => 9,  53 => 8,  47 => 5,  44 => 4,  41 => 3,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'overall/layout.twig' %}

{% block appHeader %}
<!-- DataTables -->
<link rel=\"stylesheet\" href=\"{{ base_url }}assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css\">
{% endblock %}

{% block appBody %}
  <div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
      <div class=\"container\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1>Tipos de Habitaciones&nbsp;
            <button class=\"btn btn-success btn-sm\" data-toggle=\"modal\" data-target=\"#addRoomModal\" onclick=\"addRoomModel()\"><i class=\"fa fa-plus\"></i> Añadir</button></h1>
          </div>
          <div class=\"col-sm-6\">
            <ol class=\"breadcrumb float-sm-right\">
              <li class=\"breadcrumb-item active\">Habitaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class=\"content\">
      <div class=\"container\">
        <div class=\"messages\"></div>

        <div class=\"card card-outline card-primary\">
          <div class=\"card-body\">

          <table id=\"listRoomTypes\" class=\"table table-bordered table-striped\">
            <thead>
            <tr>
              <th>Tipo de Habitación</th>
              <th>Precio</th>
              <th>Disponibilidad</th>
              <th>Modificación</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Tipo de Habitación</th>
              <th>Precio</th>
              <th>Disponibilidad</th>
              <th>Modificación</th>
              <th>Acciones</th>
            </tr>
            </tfoot>
          </table>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
    </section>
    <!-- /.content -->
  </div>
  {% include 'rooms/add_room.twig' %}
  {% include 'rooms/edit_room.twig' %}
{% endblock %}

{% block appFooter %}
<!-- DataTables -->
<script src=\"{{ base_url }}assets/plugins/datatables/jquery.dataTables.js\"></script>
<script src=\"{{ base_url }}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js\"></script>
<!-- Custom -->
<script src=\"{{ base_url }}custom/js/rooms.js\"></script>
{% endblock %}
", "rooms/rooms.twig", "C:\\Bitnami\\wampstack-7.2.24-0\\apache2\\htdocs\\motor-mtz\\application\\views\\rooms\\rooms.twig");
    }
}
