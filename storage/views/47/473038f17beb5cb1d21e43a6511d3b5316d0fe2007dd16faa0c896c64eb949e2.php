<?php

/* /Home/index.html */
class __TwigTemplate_5531d795332e5561cf3b1f19f42efbd57ddd4df45415fe89ec6f13849a0beb2f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <title>Kickpeach</title>

    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,600\" rel=\"stylesheet\" type=\"text/css\">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class=\"flex-center position-ref full-height\">

    <div class=\"content\">
        <div class=\"title m-b-md\">
            ";
        // line 71
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "
        </div>

        <div class=\"links\">
            <a href=\"#\">文档</a>
            <a href=\"https://github.com/KickPeach/kickPeach\">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "/Home/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 71,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <title>Kickpeach</title>

    <!-- Fonts -->
    <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,600\" rel=\"stylesheet\" type=\"text/css\">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class=\"flex-center position-ref full-height\">

    <div class=\"content\">
        <div class=\"title m-b-md\">
            {{name}}
        </div>

        <div class=\"links\">
            <a href=\"#\">文档</a>
            <a href=\"https://github.com/KickPeach/kickPeach\">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>
", "/Home/index.html", "/home/vagrant/Code/kickPeach/public/views/Home/index.html");
    }
}
