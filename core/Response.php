<?php
namespace core;

class Response  {
	/*
	This method has a advance redirect method
	*/
	public static function redirect(
		string $url): void {
		header(
			"Location: {$url}");
		exit;
	}
	public static function json(
		array $data,
		int $statusCode = 200): void {
		http_response_code($statusCode);
		header(
            'Content-Type: application/json'
        );

        echo json_encode(
        	$data);

        exit;
	}

	private static function view(
    string $view,
    array $data = [],
    int $statusCode = 200
): void
{
    http_response_code($statusCode);

    extract($data);

    require_once __DIR__
        . "/../app/views/{$view}.php";

    exit;
}

	public static function notFound(): void
		{
		    self::view(
		        'errors/404',
		        [],
		        404
		    );
		}
}

 ?>