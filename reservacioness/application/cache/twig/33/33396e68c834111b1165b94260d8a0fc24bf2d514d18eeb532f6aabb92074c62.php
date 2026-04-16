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

/* rooms/add_room.twig */
class __TwigTemplate_d9036f427be8a7a6b42c9c5e953a6ad40c944b9ad6fa77789c79181666cca447 extends \Twig\Template
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
        echo "\t<!-- add room -->
\t<div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"addRoomModal\">
\t  <div class=\"modal-dialog\" role=\"document\">
\t    <div class=\"modal-content\">
\t      <div class=\"modal-header\">
\t        <h4 class=\"modal-title\"><i class=\"fas fa-door-closed\"></i> &nbsp;Añadir nuevo tipo de habitación</h4>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t      </div>
\t      <div class=\"modal-body\">

\t      <form method=\"post\" action=\"";
        // line 11
        echo twig_escape_filter($this->env, base_url(), "html", null, true);
        echo "rooms/add-room\" id=\"addRoomForm\">

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"name\">Nombre</label>
\t\t\t\t\t\t<input type=\"text\" class=\"form-control input-name\" name=\"name\">
\t\t\t\t\t\t<small id=\"nameHelp\" class=\"form-text text-muted\">Nombre del tipo de habitación</small>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"description\">Descripción</label>
\t\t\t\t\t\t<textarea class=\"form-control input-description\" name=\"description\" rows=\"4\" cols=\"80\"></textarea>
\t\t\t\t\t\t<small id=\"descriptionHelp\" class=\"form-text text-muted\">Describa las características del tipo de habitación.</small>
\t\t\t\t\t</div>

          <div class=\"form-group\">
\t\t\t\t\t\t<label for=\"image_cover\">URL Portada</label>
\t\t\t\t\t\t<input class=\"form-control input-image-cover\" name=\"image_cover\" maxlength=\"255\">
\t\t\t\t\t\t<small id=\"image_coverHelp\" class=\"form-text text-muted\">URL de la imagen de la portada de la habitación.</small>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"price\">Precio</label>
\t\t\t\t\t\t<input type=\"number\" min=\"00.00\" step=\"0.01\" class=\"form-control input-price\" name=\"price\">
\t\t\t\t\t\t<small id=\"priceHelp\" class=\"form-text text-muted\">Exprese el precio con punto decimal, omita las comas y el IVA.</small>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"availability\">Disponibilidad</label>
\t\t\t\t\t\t<input type=\"number\" min=\"0\" class=\"form-control input-availability\" name=\"availability\">
\t\t\t\t\t\t<small id=\"availabilityHelp\" class=\"form-text text-muted\">Cantidad de habitaciones de este tipo disponibles.</small>
\t\t\t\t\t</div>

\t      </div><!-- ./ modal-body -->

\t      <div class=\"modal-footer\">
\t        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
\t        <button type=\"submit\" class=\"btn btn-success\">Añadir nuevo</button>
\t      </div>

\t      </form>

\t    </div><!-- /.modal-content -->
\t  </div><!-- /.modal-dialog -->
\t</div><!-- /.modal -->
\t<!-- ./edit room -->
";
    }

    public function getTemplateName()
    {
        return "rooms/add_room.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 11,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("\t<!-- add room -->
\t<div class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" id=\"addRoomModal\">
\t  <div class=\"modal-dialog\" role=\"document\">
\t    <div class=\"modal-content\">
\t      <div class=\"modal-header\">
\t        <h4 class=\"modal-title\"><i class=\"fas fa-door-closed\"></i> &nbsp;Añadir nuevo tipo de habitación</h4>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t      </div>
\t      <div class=\"modal-body\">

\t      <form method=\"post\" action=\"{{ base_url() }}rooms/add-room\" id=\"addRoomForm\">

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"name\">Nombre</label>
\t\t\t\t\t\t<input type=\"text\" class=\"form-control input-name\" name=\"name\">
\t\t\t\t\t\t<small id=\"nameHelp\" class=\"form-text text-muted\">Nombre del tipo de habitación</small>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"description\">Descripción</label>
\t\t\t\t\t\t<textarea class=\"form-control input-description\" name=\"description\" rows=\"4\" cols=\"80\"></textarea>
\t\t\t\t\t\t<small id=\"descriptionHelp\" class=\"form-text text-muted\">Describa las características del tipo de habitación.</small>
\t\t\t\t\t</div>

          <div class=\"form-group\">
\t\t\t\t\t\t<label for=\"image_cover\">URL Portada</label>
\t\t\t\t\t\t<input class=\"form-control input-image-cover\" name=\"image_cover\" maxlength=\"255\">
\t\t\t\t\t\t<small id=\"image_coverHelp\" class=\"form-text text-muted\">URL de la imagen de la portada de la habitación.</small>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"price\">Precio</label>
\t\t\t\t\t\t<input type=\"number\" min=\"00.00\" step=\"0.01\" class=\"form-control input-price\" name=\"price\">
\t\t\t\t\t\t<small id=\"priceHelp\" class=\"form-text text-muted\">Exprese el precio con punto decimal, omita las comas y el IVA.</small>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label for=\"availability\">Disponibilidad</label>
\t\t\t\t\t\t<input type=\"number\" min=\"0\" class=\"form-control input-availability\" name=\"availability\">
\t\t\t\t\t\t<small id=\"availabilityHelp\" class=\"form-text text-muted\">Cantidad de habitaciones de este tipo disponibles.</small>
\t\t\t\t\t</div>

\t      </div><!-- ./ modal-body -->

\t      <div class=\"modal-footer\">
\t        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
\t        <button type=\"submit\" class=\"btn btn-success\">Añadir nuevo</button>
\t      </div>

\t      </form>

\t    </div><!-- /.modal-content -->
\t  </div><!-- /.modal-dialog -->
\t</div><!-- /.modal -->
\t<!-- ./edit room -->
", "rooms/add_room.twig", "C:\\Bitnami\\wampstack-7.2.24-0\\apache2\\htdocs\\motor-mtz\\application\\views\\rooms\\add_room.twig");
    }
}
