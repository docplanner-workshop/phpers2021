<?php

$config = new PhpCsFixer\Config();

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->files();

return $config
    ->setRiskyAllowed(true)
    ->setRules([
			'@Symfony'                   => true,
			'@PSR2'                      => true,
			'array_syntax'               => ['syntax' => 'short'],
			'declare_strict_types'       => true,
			'logical_operators'          => true,
			'constant_case'              => true,
			'concat_space'               => ['spacing' => 'one'],
			'is_null'                    => true,
			'modernize_types_casting'    => true,
			'native_constant_invocation' => true,
			'native_function_invocation' => ['include' => ['@all']],
			'psr_autoloading'            => true,
			'strict_comparison'          => true,
			'ternary_to_null_coalescing' => true,
			'void_return'                => true,
			'types_spaces'               => ['space' => 'single'],
		]
    )
    ->setFinder($finder);
