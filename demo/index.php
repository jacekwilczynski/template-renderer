<?php 

require_once __DIR__ . '/../TemplateRenderer.php';

$article = TemplateRenderer::fromFile('templates/article.php');

echo $article->render(array(
    'class'   => 'article',
    'title'   => 'Title!',
    'content' => 'Awesome content.',
));
