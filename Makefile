.SHELLFLAGS = -Command
SHELL = powershell.exe

.PHONY: install up down reset sh logs migrate test artisan

install:
	if (-not (Test-Path "artisan")) { Write-Host "Instalando Laravel..." -ForegroundColor Green; docker compose run --rm app sh -c "composer create-project laravel/laravel /tmp/laravel; cp -r /tmp/laravel/. /var/www/html/" }
	if (-not (Test-Path ".env")) { Copy-Item ".env.example" ".env"; Write-Host ".env creado." -ForegroundColor Green }
	docker compose run --rm app php artisan key:generate
	docker compose run --rm app php artisan storage:link
	Write-Host "Instalacion completada." -ForegroundColor Green

up:
	docker compose up -d --build

down:
	docker compose down

reset:
	docker compose down -v
	(Test-Path "vendor") && Remove-Item -Recurse -Force vendor
	(Test-Path "node_modules") && Remove-Item -Recurse -Force node_modules
	(Test-Path "bootstrap/cache") && (Get-ChildItem "bootstrap/cache/*.php" -EA 0 | Remove-Item -Force)
	(Test-Path "public/storage") && Remove-Item -Recurse -Force public/storage
	(Test-Path ".env") && Remove-Item ".env"

sh:
	docker compose exec -u www-data app bash

logs:
	docker compose logs -f --tail=100

migrate:
	docker compose run --rm app php artisan migrate

test:
	docker compose run --rm app php artisan test -q

artisan:
	docker compose run --rm app php artisan $(CMD)