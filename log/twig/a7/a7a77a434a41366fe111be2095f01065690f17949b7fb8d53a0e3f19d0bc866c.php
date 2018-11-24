<?php

/* layout.html */
class __TwigTemplate_24566ab6a3e2b430ed58eb23518778f3225304bddb41c0c6533076e95625de6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<body>
<header>header</header>

<content>
    ";
        // line 6
        $this->displayBlock('content', $context, $blocks);
        // line 8
        echo "</content>

<footer>footer</footer>
</body>
</html>
";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  41 => 7,  38 => 6,  29 => 8,  27 => 6,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
<body>
<header>header</header>

<content>
    {% block content %}
    {% endblock %}
</content>

<footer>footer</footer>
</body>
</html>
", "layout.html", "D:\\phpStudy\\PHPTutorial\\WWW\\pan\\app\\index\\views\\layout.html");
    }
}
