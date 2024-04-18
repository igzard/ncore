<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules(array(
        '@PSR2' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP71Migration:risky' => true,
        'ordered_imports' => true,
        'strict_param' => true,
        'strict_comparison' => true,
        'array_syntax' => array('syntax' => 'short'),
        'no_superfluous_phpdoc_tags' => true,
        'blank_line_before_statement' => ['statements' => ['do', 'for', 'foreach', 'if', 'return', 'switch', 'try', 'while', 'yield']],
        'header_comment' => ['comment_type' => 'comment', 'header' => ''],
    ))
    ->setFinder($finder);